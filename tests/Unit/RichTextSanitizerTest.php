<?php

namespace Tests\Unit;

use App\Support\RichTextSanitizer;
use Tests\TestCase;

class RichTextSanitizerTest extends TestCase
{
    public function test_it_preserves_rich_content_and_removes_unsafe_markup(): void
    {
        $html = <<<'HTML'
            <section class="article-card" style="background-color: #ffffff; padding: 24px; position: fixed">
                <h2 style="color: #cf1f1f">Rich heading</h2>
                <p onclick="alert('unsafe')">Formatted <strong>content</strong>.</p>
                <img src="https://example.com/article.jpg" alt="Article image" onerror="alert('unsafe')">
                <a href="javascript:alert('unsafe')">Unsafe link</a>
                <script>alert('unsafe')</script>
            </section>
            HTML;

        $sanitized = (new RichTextSanitizer)->sanitize($html);

        $this->assertNotNull($sanitized);
        $this->assertStringContainsString('<section class="article-card" style="background-color: #ffffff; padding: 24px">', $sanitized);
        $this->assertStringContainsString('<h2 style="color: #cf1f1f">Rich heading</h2>', $sanitized);
        $this->assertStringContainsString('<strong>content</strong>', $sanitized);
        $this->assertStringContainsString('src="https://example.com/article.jpg"', $sanitized);
        $this->assertStringContainsString('loading="lazy"', $sanitized);
        $this->assertStringNotContainsString('onclick', $sanitized);
        $this->assertStringNotContainsString('onerror', $sanitized);
        $this->assertStringNotContainsString('javascript:', $sanitized);
        $this->assertStringNotContainsString('<script', $sanitized);
        $this->assertStringNotContainsString('position:', $sanitized);
    }

    public function test_it_normalizes_legacy_encoded_html(): void
    {
        $legacyHtml = '&amp;lt;p&amp;gt;Existing &amp;amp;amp; formatted content&amp;lt;/p&amp;gt;';

        $sanitized = (new RichTextSanitizer)->sanitize($legacyHtml);

        $this->assertSame('<p>Existing &amp; formatted content</p>', $sanitized);
    }
}
