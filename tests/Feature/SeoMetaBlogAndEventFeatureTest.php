<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\SeoMeta;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class SeoMetaBlogAndEventFeatureTest extends TestCase
{
    use DatabaseTransactions;

    public function test_admin_seo_meta_page_has_separate_blog_and_event_options(): void
    {
        $response = $this->actingAs(User::factory()->create())
            ->get(route('seo-meta.index'));

        $response->assertOk();
        $response->assertViewHas('pageOptions', function (array $pageOptions): bool {
            $pages = $pageOptions[SeoMeta::PageTypePage];

            return $pages['blogs']['label'] === 'Blogs'
                && $pages['blogs']['route_name'] === 'public.blog.index'
                && $pages['blogs']['path'] === '/blogs'
                && $pages['events']['label'] === 'Events'
                && $pages['events']['route_name'] === 'public.event.index'
                && $pages['events']['path'] === '/events'
                && isset($pages['events-and-blogs']);
        });
    }

    public function test_blog_seo_meta_can_be_saved_and_is_rendered_on_the_blogs_page(): void
    {
        $this->actingAs(User::factory()->create())
            ->post(route('seo-meta.store'), $this->seoPayload(
                pageKey: 'blogs',
                title: 'Blog listing SEO title',
                keywords: 'blog keyword one, blog keyword two',
                description: 'Blog listing SEO description',
                canonicalUrl: 'https://www.example.com/blogs',
            ))
            ->assertRedirect(route('seo-meta.index'));

        $this->assertDatabaseHas('seo_metas', [
            'type' => SeoMeta::TypeMainSite,
            'page_type' => SeoMeta::PageTypePage,
            'route_name' => 'public.blog.index',
            'path' => '/blogs',
            'slug' => 'blogs',
            'title' => 'Blog listing SEO title',
        ]);

        $this->get(route('public.blog.index'))
            ->assertOk()
            ->assertSee('<title>Blog listing SEO title</title>', false)
            ->assertSee('content="blog keyword one, blog keyword two"', false)
            ->assertSee('content="Blog listing SEO description"', false)
            ->assertSee('content="index, follow"', false)
            ->assertSee('<link rel="canonical" href="https://www.example.com/blogs"', false);
    }

    public function test_event_seo_meta_can_be_saved_and_is_rendered_on_the_events_page(): void
    {
        $this->actingAs(User::factory()->create())
            ->post(route('seo-meta.store'), $this->seoPayload(
                pageKey: 'events',
                title: 'Event listing SEO title',
                keywords: 'event keyword one, event keyword two',
                description: 'Event listing SEO description',
                canonicalUrl: 'https://www.example.com/events',
            ))
            ->assertRedirect(route('seo-meta.index'));

        $this->assertDatabaseHas('seo_metas', [
            'type' => SeoMeta::TypeMainSite,
            'page_type' => SeoMeta::PageTypePage,
            'route_name' => 'public.event.index',
            'path' => '/events',
            'slug' => 'events',
            'title' => 'Event listing SEO title',
        ]);

        $this->get(route('public.event.index'))
            ->assertOk()
            ->assertSee('<title>Event listing SEO title</title>', false)
            ->assertSee('content="event keyword one, event keyword two"', false)
            ->assertSee('content="Event listing SEO description"', false)
            ->assertSee('content="index, follow"', false)
            ->assertSee('<link rel="canonical" href="https://www.example.com/events"', false);
    }

    public function test_admin_can_save_and_render_seo_meta_for_a_specific_blog_and_event(): void
    {
        $blog = $this->createContent('blog', 'Blog SEO detail target');
        $event = $this->createContent('event', 'Event SEO detail target');

        $response = $this->actingAs(User::factory()->create())
            ->get(route('seo-meta.index'));

        $response->assertViewHas('pageOptions', function (array $pageOptions) use ($blog, $event): bool {
            $blogOption = $pageOptions[SeoMeta::PageTypeBlog][(string) $blog->id];
            $eventOption = $pageOptions[SeoMeta::PageTypeEvent][(string) $event->id];

            return $blogOption['label'] === $blog->title
                && $blogOption['route_name'] === 'public.blog.show'
                && $blogOption['entity_type'] === Blog::class
                && $blogOption['entity_id'] === $blog->id
                && $eventOption['label'] === $event->title
                && $eventOption['route_name'] === 'public.event.show'
                && $eventOption['entity_type'] === Blog::class
                && $eventOption['entity_id'] === $event->id;
        });

        $this->post(route('seo-meta.store'), $this->seoPayload(
            pageKey: (string) $blog->id,
            title: 'Specific Blog SEO Title',
            keywords: 'specific blog keywords',
            description: 'Specific blog SEO description',
            canonicalUrl: 'https://www.example.com/blog/'.$blog->slug,
            pageType: SeoMeta::PageTypeBlog,
        ))->assertRedirect(route('seo-meta.index'));

        $this->post(route('seo-meta.store'), $this->seoPayload(
            pageKey: (string) $event->id,
            title: 'Specific Event SEO Title',
            keywords: 'specific event keywords',
            description: 'Specific event SEO description',
            canonicalUrl: 'https://www.example.com/event/'.$event->slug,
            pageType: SeoMeta::PageTypeEvent,
        ))->assertRedirect(route('seo-meta.index'));

        $this->assertDatabaseHas('seo_metas', [
            'page_type' => SeoMeta::PageTypeBlog,
            'entity_type' => Blog::class,
            'entity_id' => $blog->id,
            'route_name' => 'public.blog.show',
            'path' => '/blog/'.$blog->slug,
        ]);

        $this->assertDatabaseHas('seo_metas', [
            'page_type' => SeoMeta::PageTypeEvent,
            'entity_type' => Blog::class,
            'entity_id' => $event->id,
            'route_name' => 'public.event.show',
            'path' => '/event/'.$event->slug,
        ]);

        $this->get(route('public.blog.show', $blog->slug))
            ->assertOk()
            ->assertSee('<title>Specific Blog SEO Title</title>', false)
            ->assertSee('content="specific blog keywords"', false)
            ->assertSee('content="Specific blog SEO description"', false);

        $this->get(route('public.event.show', $event->slug))
            ->assertOk()
            ->assertSee('<title>Specific Event SEO Title</title>', false)
            ->assertSee('content="specific event keywords"', false)
            ->assertSee('content="Specific event SEO description"', false);
    }

    /**
     * @return array<string, string|int>
     */
    private function seoPayload(
        string $pageKey,
        string $title,
        string $keywords,
        string $description,
        string $canonicalUrl,
        string $pageType = SeoMeta::PageTypePage,
    ): array {
        return [
            'page_type' => $pageType,
            'page_key' => $pageKey,
            'title' => $title,
            'keywords' => $keywords,
            'description' => $description,
            'page_description' => '',
            'canonical_url' => $canonicalUrl,
            'robots' => 'index, follow',
            'is_active' => 1,
        ];
    }

    private function createContent(string $type, string $title): Blog
    {
        return Blog::query()->forceCreate([
            'type' => $type,
            'title' => $title,
            'slug' => str($title)->slug().'-'.str()->random(8),
            'publish_date' => now()->toDateString(),
            'status' => 0,
            'order_no' => -1000000,
        ]);
    }
}
