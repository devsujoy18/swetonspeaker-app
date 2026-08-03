<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeoMetaRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\SeoMeta;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;

class SeoMetaController extends Controller
{
    public function index(): View
    {
        $seoMetas = SeoMeta::forType(SeoMeta::TypeMainSite)
            ->latest()
            ->get();

        return view('seo_meta.index', [
            'seoMetas' => $seoMetas,
            'pageOptions' => $this->pageOptions(),
        ]);
    }

    public function store(SeoMetaRequest $request): RedirectResponse
    {
        SeoMeta::create($this->payload($request));

        return redirect()->route('seo-meta.index')->with('success', 'SEO data added successfully');
    }

    public function update(SeoMetaRequest $request, SeoMeta $seoMeta): RedirectResponse
    {
        $seoMeta->update($this->payload($request));

        return redirect()->route('seo-meta.index')->with('success', 'SEO data updated successfully');
    }

    public function destroy(SeoMeta $seoMeta): RedirectResponse
    {
        $seoMeta->delete();

        return redirect()->route('seo-meta.index')->with('success', 'SEO data deleted successfully');
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    private function pageOptions(): array
    {
        $options = [
            SeoMeta::PageTypePage => [
                'default' => [
                    'label' => 'Default SEO',
                    'page_type' => SeoMeta::PageTypeDefault,
                    'route_name' => null,
                    'path' => null,
                    'entity_type' => null,
                    'entity_id' => null,
                    'slug' => null,
                ],
                'home' => $this->pageOption('Home', 'home', '/'),
                'speaker/pro-loudspeaker' => $this->pageOption('Pro Loudspeaker', 'category.list', '/speaker/pro-loudspeaker'),
                'speaker/home-loudspeaker' => $this->pageOption('Home Loudspeaker', 'category.list', '/speaker/home-loudspeaker'),
                'about-us' => $this->pageOption('About Us', null, '/about-us'),
                'events-and-blogs' => $this->pageOption('Events & Blogs', 'public.blogs', '/events-and-blogs'),
                'videos' => $this->pageOption('Videos', null, '/videos'),
                'contact-us' => $this->pageOption('Contact Us', 'contact.us', '/contact-us'),
                'application-for-dealership' => $this->pageOption('Application for Dealership', 'application.dealership', '/application-for-dealership'),
                'privacy-policy' => $this->pageOption('Privacy Policy', null, '/privacy-policy'),
                'refund-policy' => $this->pageOption('Refund Policy', null, '/refund-policy'),
                'shipping-policy' => $this->pageOption('Shipping Policy', null, '/shipping-policy'),
                'terms-and-conditions' => $this->pageOption('Terms and Conditions', null, '/terms-and-conditions'),
                'legal-disclaimer' => $this->pageOption('Legal Disclaimer', null, '/legal-disclaimer'),
                'disclaimer' => $this->pageOption('Disclaimer', null, '/disclaimer'),
                'test-standard' => $this->pageOption('Test Standard', null, '/test-standard'),
                'attention-manufacturers' => $this->pageOption('Attention Manufacturers', null, '/attention-manufacturers'),
            ],
            SeoMeta::PageTypeCategory => [],
            SeoMeta::PageTypeProduct => [],
        ];

        Category::orderBy('type_id')->orderBy('order_no')->get()->each(function (Category $category) use (&$options): void {
            $type = $category->type_id == 1 ? 'pro-loudspeaker' : 'home-loudspeaker';

            $options[SeoMeta::PageTypeCategory][(string) $category->id] = [
                'label' => $this->cleanOptionLabel($category->name),
                'page_type' => SeoMeta::PageTypeCategory,
                'route_name' => 'category.products',
                'path' => '/speaker/'.$type.'/'.$category->slug,
                'entity_type' => Category::class,
                'entity_id' => $category->id,
                'slug' => $category->slug,
            ];
        });

        Product::with('category')->orderBy('category_id')->orderBy('order_no')->get()->each(function (Product $product) use (&$options): void {
            if (! $product->category) {
                return;
            }

            $type = $product->category->type_id == 1 ? 'pro-loudspeaker' : 'home-loudspeaker';

            $options[SeoMeta::PageTypeProduct][(string) $product->id] = [
                'label' => $this->cleanOptionLabel($product->name),
                'page_type' => SeoMeta::PageTypeProduct,
                'route_name' => 'product.public.details',
                'path' => '/speaker/'.$type.'/'.$product->category->slug.'/'.$product->slug,
                'entity_type' => Product::class,
                'entity_id' => $product->id,
                'slug' => $product->slug,
            ];
        });

        return $options;
    }

    /**
     * @return array<string, mixed>
     */
    private function pageOption(string $label, ?string $routeName, string $path): array
    {
        return [
            'label' => $label,
            'page_type' => SeoMeta::PageTypePage,
            'route_name' => $routeName,
            'path' => $path,
            'entity_type' => null,
            'entity_id' => null,
            'slug' => trim($path, '/') ?: null,
        ];
    }

    private function cleanOptionLabel(string $label): string
    {
        return str_replace([
            'â€œ',
            'â€',
            'â€™',
            'â€˜',
            'â€“',
            'â€”',
            'â„¦',
        ], [
            '"',
            '"',
            "'",
            "'",
            '-',
            '-',
            'Ω',
        ], $label);
    }

    /**
     * @return array<string, mixed>
     */
    private function payload(SeoMetaRequest $request): array
    {
        $validated = $request->validated();
        $target = $this->resolveTarget($validated['page_type'], $validated['page_key']);

        return array_merge($target, Arr::only($validated, [
            'title',
            'keywords',
            'description',
            'page_description',
            'canonical_url',
            'robots',
            'is_active',
        ]), [
            'type' => SeoMeta::TypeMainSite,
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    private function resolveTarget(string $pageType, string $pageKey): array
    {
        $options = $this->pageOptions();

        abort_if(! isset($options[$pageType][$pageKey]), 422, 'Selected page is invalid.');

        return Arr::except($options[$pageType][$pageKey], ['label']);
    }
}
