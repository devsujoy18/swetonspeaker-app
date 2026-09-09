<?php

namespace App\Support;

use DOMDocument;
use DOMElement;
use DOMNode;

class RichTextSanitizer
{
    /** @var list<string> */
    private const AllowedTags = [
        'a', 'article', 'b', 'blockquote', 'br', 'caption', 'code', 'col', 'colgroup',
        'div', 'em', 'figcaption', 'figure', 'font', 'h1', 'h2', 'h3', 'h4', 'h5',
        'h6', 'hr', 'i', 'img', 'li', 'ol', 'p', 'pre', 'section', 'small', 'span',
        'strike', 'strong', 'sub', 'sup', 'table', 'tbody', 'td', 'tfoot', 'th',
        'thead', 'tr', 'u', 'ul',
    ];

    /** @var list<string> */
    private const RemovedWithContent = [
        'applet', 'audio', 'button', 'embed', 'form', 'frame', 'frameset', 'iframe',
        'input', 'link', 'meta', 'noscript', 'object', 'script', 'select', 'style',
        'svg', 'template', 'textarea', 'video',
    ];

    /** @var list<string> */
    private const AllowedStyleProperties = [
        'background', 'background-color', 'border', 'border-bottom', 'border-color',
        'border-left', 'border-radius', 'border-right', 'border-style', 'border-top',
        'border-width', 'color', 'display', 'font-family', 'font-size', 'font-style',
        'font-weight', 'height', 'letter-spacing', 'line-height', 'list-style-type',
        'margin', 'margin-bottom', 'margin-left', 'margin-right', 'margin-top',
        'max-height', 'max-width', 'min-height', 'min-width', 'object-fit', 'overflow',
        'overflow-x', 'padding', 'padding-bottom', 'padding-left', 'padding-right',
        'padding-top', 'text-align', 'text-decoration', 'text-indent', 'text-transform',
        'vertical-align', 'white-space', 'width',
    ];

    public function sanitize(?string $html): ?string
    {
        if ($html === null || trim($html) === '') {
            return null;
        }

        $document = new DOMDocument('1.0', 'UTF-8');
        $previousErrorState = libxml_use_internal_errors(true);
        $rootId = 'rich-text-root-'.bin2hex(random_bytes(8));
        $normalizedHtml = $this->normalizeLegacyEncoding($html);

        $document->loadHTML(
            '<?xml encoding="UTF-8"><div id="'.$rootId.'">'.$normalizedHtml.'</div>',
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD,
        );

        libxml_clear_errors();
        libxml_use_internal_errors($previousErrorState);

        $root = $document->getElementById($rootId);

        if (! $root) {
            return null;
        }

        $this->sanitizeChildren($root);

        $sanitizedHtml = '';

        foreach ($root->childNodes as $childNode) {
            $sanitizedHtml .= $document->saveHTML($childNode);
        }

        return trim($sanitizedHtml) ?: null;
    }

    private function normalizeLegacyEncoding(string $html): string
    {
        for ($attempt = 0; $attempt < 3; $attempt++) {
            $decoded = htmlspecialchars_decode($html, ENT_QUOTES | ENT_HTML5);

            if ($decoded === $html) {
                break;
            }

            $html = $decoded;
        }

        return $html;
    }

    private function sanitizeChildren(DOMNode $parent): void
    {
        foreach (iterator_to_array($parent->childNodes) as $childNode) {
            if ($childNode->nodeType === XML_COMMENT_NODE) {
                $parent->removeChild($childNode);

                continue;
            }

            if (! $childNode instanceof DOMElement) {
                continue;
            }

            $tagName = strtolower($childNode->tagName);

            if (in_array($tagName, self::RemovedWithContent, true)) {
                $parent->removeChild($childNode);

                continue;
            }

            $this->sanitizeChildren($childNode);

            if (! in_array($tagName, self::AllowedTags, true)) {
                while ($childNode->firstChild) {
                    $parent->insertBefore($childNode->firstChild, $childNode);
                }

                $parent->removeChild($childNode);

                continue;
            }

            $this->sanitizeAttributes($childNode, $tagName);
        }
    }

    private function sanitizeAttributes(DOMElement $element, string $tagName): void
    {
        $allowedAttributes = ['class', 'style', 'title'];

        if ($tagName === 'a') {
            array_push($allowedAttributes, 'href', 'rel', 'target');
        }

        if ($tagName === 'img') {
            array_push($allowedAttributes, 'alt', 'height', 'loading', 'src', 'width');
        }

        if (in_array($tagName, ['td', 'th'], true)) {
            array_push($allowedAttributes, 'colspan', 'rowspan', 'scope');
        }

        $attributeNames = [];

        foreach ($element->attributes as $attribute) {
            $attributeNames[] = strtolower($attribute->name);
        }

        foreach ($attributeNames as $attributeName) {
            if (! in_array($attributeName, $allowedAttributes, true)) {
                $element->removeAttribute($attributeName);

                continue;
            }

            $value = trim($element->getAttribute($attributeName));

            if ($attributeName === 'style') {
                $value = $this->sanitizeStyle($value);
            } elseif ($attributeName === 'class') {
                $value = implode(' ', array_filter(
                    preg_split('/\s+/', $value) ?: [],
                    fn (string $className): bool => preg_match('/^[a-z0-9_-]+$/i', $className) === 1,
                ));
            } elseif (in_array($attributeName, ['href', 'src'], true)) {
                $value = $this->sanitizeUrl($value, $attributeName === 'href');
            } elseif (in_array($attributeName, ['height', 'width', 'colspan', 'rowspan'], true)) {
                $value = preg_replace('/[^0-9.%]/', '', $value) ?? '';
            } elseif ($attributeName === 'target' && ! in_array($value, ['_blank', '_self'], true)) {
                $value = '';
            } elseif ($attributeName === 'loading' && ! in_array($value, ['eager', 'lazy'], true)) {
                $value = '';
            }

            if ($value === '') {
                $element->removeAttribute($attributeName);
            } else {
                $element->setAttribute($attributeName, $value);
            }
        }

        if ($tagName === 'a' && $element->getAttribute('target') === '_blank') {
            $element->setAttribute('rel', 'noopener noreferrer');
        }

        if ($tagName === 'img' && ! $element->hasAttribute('loading')) {
            $element->setAttribute('loading', 'lazy');
        }
    }

    private function sanitizeStyle(string $style): string
    {
        $sanitizedDeclarations = [];

        foreach (explode(';', $style) as $declaration) {
            [$property, $value] = array_pad(explode(':', $declaration, 2), 2, null);
            $property = strtolower(trim((string) $property));
            $value = trim((string) $value);

            if (! in_array($property, self::AllowedStyleProperties, true)) {
                continue;
            }

            if ($value === '' || preg_match('/(?:expression|javascript|url\s*\(|@import|behavior|-moz-binding)/i', $value)) {
                continue;
            }

            if (preg_match('/^[#(),.%\w\s\'"\-+\/]+$/u', $value) !== 1) {
                continue;
            }

            $sanitizedDeclarations[] = $property.': '.$value;
        }

        return implode('; ', $sanitizedDeclarations);
    }

    private function sanitizeUrl(string $url, bool $allowLinkSchemes): string
    {
        $decodedUrl = html_entity_decode($url, ENT_QUOTES | ENT_HTML5);
        $normalizedUrl = preg_replace('/[\x00-\x20\x7F]+/', '', $decodedUrl) ?? '';

        if ($normalizedUrl === '' || str_starts_with($normalizedUrl, '#')) {
            return $normalizedUrl;
        }

        if (str_starts_with($normalizedUrl, '/') || str_starts_with($normalizedUrl, './') || str_starts_with($normalizedUrl, '../')) {
            return $normalizedUrl;
        }

        $scheme = strtolower((string) parse_url($normalizedUrl, PHP_URL_SCHEME));
        $allowedSchemes = $allowLinkSchemes ? ['http', 'https', 'mailto', 'tel'] : ['http', 'https'];

        if ($scheme === '') {
            return $normalizedUrl;
        }

        return in_array($scheme, $allowedSchemes, true) ? $normalizedUrl : '';
    }
}
