<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageFaqRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\PageFaq;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;

class PageFaqController extends Controller
{
    public function index(): View
    {
        $pageFaqs = PageFaq::forType(PageFaq::TypeMainSite)
            ->ordered()
            ->get();

        return view('page_faq.index', [
            'pageFaqs' => $pageFaqs,
            'pageOptions' => $this->pageOptions(),
        ]);
    }

    public function store(PageFaqRequest $request): RedirectResponse
    {
        PageFaq::create($this->payload($request));

        return redirect()->route('page-faq.index')->with('success', 'FAQ data added successfully');
    }

    public function update(PageFaqRequest $request, PageFaq $pageFaq): RedirectResponse
    {
        $pageFaq->update($this->payload($request));

        return redirect()->route('page-faq.index')->with('success', 'FAQ data updated successfully');
    }

    public function destroy(PageFaq $pageFaq): RedirectResponse
    {
        $pageFaq->delete();

        return redirect()->route('page-faq.index')->with('success', 'FAQ data deleted successfully');
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    private function pageOptions(): array
    {
        $options = [
            PageFaq::PageTypePage => [
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
            PageFaq::PageTypeCategory => [],
            PageFaq::PageTypeProduct => [],
            PageFaq::PageTypeBlog => [],
            PageFaq::PageTypeEvent => [],
        ];

        Category::orderBy('type_id')->orderBy('order_no')->get()->each(function (Category $category) use (&$options): void {
            $type = $category->type_id == 1 ? 'pro-loudspeaker' : 'home-loudspeaker';

            $options[PageFaq::PageTypeCategory][(string) $category->id] = [
                'label' => $this->cleanOptionLabel($category->name),
                'page_type' => PageFaq::PageTypeCategory,
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

            $options[PageFaq::PageTypeProduct][(string) $product->id] = [
                'label' => $this->cleanOptionLabel($product->name),
                'page_type' => PageFaq::PageTypeProduct,
                'route_name' => 'product.public.details',
                'path' => '/speaker/'.$type.'/'.$product->category->slug.'/'.$product->slug,
                'entity_type' => Product::class,
                'entity_id' => $product->id,
                'slug' => $product->slug,
            ];
        });

        Blog::query()
            ->where('type', 'blog')
            ->whereNotNull('slug')
            ->orderBy('order_no')
            ->orderBy('title')
            ->get()
            ->each(function (Blog $blog) use (&$options): void {
                $options[PageFaq::PageTypeBlog][(string) $blog->id] = $this->contentOption(
                    content: $blog,
                    pageType: PageFaq::PageTypeBlog,
                    routeName: 'public.blog.show',
                    pathPrefix: 'blog',
                );
            });

        Blog::query()
            ->where('type', 'event')
            ->whereNotNull('slug')
            ->orderBy('order_no')
            ->orderBy('title')
            ->get()
            ->each(function (Blog $event) use (&$options): void {
                $options[PageFaq::PageTypeEvent][(string) $event->id] = $this->contentOption(
                    content: $event,
                    pageType: PageFaq::PageTypeEvent,
                    routeName: 'public.event.show',
                    pathPrefix: 'event',
                );
            });

        return $options;
    }

    /**
     * @return array<string, mixed>
     */
    private function contentOption(Blog $content, string $pageType, string $routeName, string $pathPrefix): array
    {
        return [
            'label' => $this->cleanOptionLabel($content->title),
            'page_type' => $pageType,
            'route_name' => $routeName,
            'path' => '/'.$pathPrefix.'/'.$content->slug,
            'entity_type' => Blog::class,
            'entity_id' => $content->id,
            'slug' => $content->slug,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private function pageOption(string $label, ?string $routeName, string $path): array
    {
        return [
            'label' => $label,
            'page_type' => PageFaq::PageTypePage,
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
            'Ã¢â‚¬Å“',
            'Ã¢â‚¬Â',
            'Ã¢â‚¬â„¢',
            'Ã¢â‚¬Ëœ',
            'Ã¢â‚¬â€œ',
            'Ã¢â‚¬â€',
            'Ã¢â€žÂ¦',
        ], [
            '"',
            '"',
            "'",
            "'",
            '-',
            '-',
            'Î©',
        ], $label);
    }

    /**
     * @return array<string, mixed>
     */
    private function payload(PageFaqRequest $request): array
    {
        $validated = $request->validated();
        $target = $this->resolveTarget($validated['page_type'], $validated['page_key']);

        return array_merge($target, Arr::only($validated, [
            'title',
            'description',
            'order_no',
            'is_active',
        ]), [
            'type' => PageFaq::TypeMainSite,
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
