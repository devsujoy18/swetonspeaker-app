<?php

namespace Tests\Feature;

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

    /**
     * @return array<string, string|int>
     */
    private function seoPayload(
        string $pageKey,
        string $title,
        string $keywords,
        string $description,
        string $canonicalUrl,
    ): array {
        return [
            'page_type' => SeoMeta::PageTypePage,
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
}
