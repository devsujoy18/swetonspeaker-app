<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\PageFaq;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class PageFaqFeatureTest extends TestCase
{
    use DatabaseTransactions;

    public function test_category_list_page_renders_matching_page_faqs(): void
    {
        PageFaq::create([
            'type' => PageFaq::TypeMainSite,
            'page_type' => PageFaq::PageTypePage,
            'route_name' => 'category.list',
            'path' => '/speaker/pro-loudspeaker',
            'title' => 'FAQ route test question',
            'description' => '<p>FAQ route test answer</p>',
            'order_no' => 1,
            'is_active' => true,
        ]);

        $response = $this->get(route('category.list', ['type' => 'pro-loudspeaker']));

        $response->assertStatus(200);
        $response->assertSee('Frequently Asked Question - Sweton Speakers');
        $response->assertSee('FAQ route test question');
        $response->assertSee('FAQ route test answer');
    }

    public function test_category_products_page_renders_matching_category_faqs(): void
    {
        PageFaq::create([
            'type' => PageFaq::TypeMainSite,
            'page_type' => PageFaq::PageTypeCategory,
            'route_name' => 'category.products',
            'path' => '/speaker/pro-loudspeaker/it-series',
            'entity_type' => 'App\Models\Category',
            'entity_id' => 1,
            'slug' => 'it-series',
            'title' => 'FAQ category test question',
            'description' => '<p>FAQ category test answer</p>',
            'order_no' => 1,
            'is_active' => true,
        ]);

        $response = $this->get(route('category.products', [
            'type' => 'pro-loudspeaker',
            'slug' => 'it-series',
        ]));

        $response->assertStatus(200);
        $response->assertSee('FAQ category test question');
        $response->assertSee('FAQ category test answer');
    }

    public function test_admin_page_offers_blog_and_event_faq_targets(): void
    {
        $blog = $this->createContent('blog', 'FAQ admin blog target');
        $event = $this->createContent('event', 'FAQ admin event target');

        $response = $this->actingAs(User::factory()->create())
            ->get(route('page-faq.index'));

        $response->assertOk();
        $response->assertViewHas('pageOptions', function (array $pageOptions) use ($blog, $event): bool {
            $blogOption = $pageOptions[PageFaq::PageTypeBlog][(string) $blog->id];
            $eventOption = $pageOptions[PageFaq::PageTypeEvent][(string) $event->id];

            return $blogOption['label'] === $blog->title
                && $blogOption['route_name'] === 'public.blog.show'
                && $blogOption['entity_type'] === Blog::class
                && $blogOption['entity_id'] === $blog->id
                && $eventOption['label'] === $event->title
                && $eventOption['route_name'] === 'public.event.show'
                && $eventOption['entity_type'] === Blog::class
                && $eventOption['entity_id'] === $event->id;
        });

        $this->post(route('page-faq.store'), [
            'page_type' => PageFaq::PageTypeBlog,
            'page_key' => (string) $blog->id,
            'title' => 'Admin-created blog FAQ',
            'description' => '<p>Admin-created blog answer</p>',
            'order_no' => 1,
            'is_active' => 1,
        ])->assertRedirect(route('page-faq.index'));

        $this->post(route('page-faq.store'), [
            'page_type' => PageFaq::PageTypeEvent,
            'page_key' => (string) $event->id,
            'title' => 'Admin-created event FAQ',
            'description' => '<p>Admin-created event answer</p>',
            'order_no' => 1,
            'is_active' => 1,
        ])->assertRedirect(route('page-faq.index'));

        $this->assertDatabaseHas('page_faqs', [
            'page_type' => PageFaq::PageTypeBlog,
            'entity_type' => Blog::class,
            'entity_id' => $blog->id,
            'route_name' => 'public.blog.show',
            'path' => '/blog/'.$blog->slug,
        ]);

        $this->assertDatabaseHas('page_faqs', [
            'page_type' => PageFaq::PageTypeEvent,
            'entity_type' => Blog::class,
            'entity_id' => $event->id,
            'route_name' => 'public.event.show',
            'path' => '/event/'.$event->slug,
        ]);
    }

    public function test_blog_faq_is_only_rendered_on_its_specific_blog_detail_page(): void
    {
        $targetBlog = $this->createContent('blog', 'FAQ target blog');
        $otherBlog = $this->createContent('blog', 'FAQ other blog');

        PageFaq::create([
            'type' => PageFaq::TypeMainSite,
            'page_type' => PageFaq::PageTypeBlog,
            'route_name' => 'public.blog.show',
            'path' => '/blog/'.$targetBlog->slug,
            'entity_type' => Blog::class,
            'entity_id' => $targetBlog->id,
            'slug' => $targetBlog->slug,
            'title' => 'Specific blog FAQ question',
            'description' => '<p>Specific blog FAQ answer</p>',
            'order_no' => 1,
            'is_active' => true,
        ]);

        $response = $this->get(route('public.blog.show', $targetBlog->slug));

        $response
            ->assertOk()
            ->assertSee('Specific blog FAQ question')
            ->assertSee('Specific blog FAQ answer')
            ->assertSeeTextInOrder(['Specific blog FAQ question', 'No comments', 'Add a comment']);

        $this->assertSame(1, substr_count($response->getContent(), 'Specific blog FAQ question'));

        $this->get(route('public.blog.show', $otherBlog->slug))
            ->assertOk()
            ->assertDontSee('Specific blog FAQ question');
    }

    public function test_event_faq_is_only_rendered_on_its_specific_event_detail_page(): void
    {
        $targetEvent = $this->createContent('event', 'FAQ target event');
        $otherEvent = $this->createContent('event', 'FAQ other event');

        PageFaq::create([
            'type' => PageFaq::TypeMainSite,
            'page_type' => PageFaq::PageTypeEvent,
            'route_name' => 'public.event.show',
            'path' => '/event/'.$targetEvent->slug,
            'entity_type' => Blog::class,
            'entity_id' => $targetEvent->id,
            'slug' => $targetEvent->slug,
            'title' => 'Specific event FAQ question',
            'description' => '<p>Specific event FAQ answer</p>',
            'order_no' => 1,
            'is_active' => true,
        ]);

        $response = $this->get(route('public.event.show', $targetEvent->slug));

        $response
            ->assertOk()
            ->assertSee('Specific event FAQ question')
            ->assertSee('Specific event FAQ answer')
            ->assertSeeTextInOrder(['Specific event FAQ question', 'No comments', 'Add a comment']);

        $this->assertSame(1, substr_count($response->getContent(), 'Specific event FAQ question'));

        $this->get(route('public.event.show', $otherEvent->slug))
            ->assertOk()
            ->assertDontSee('Specific event FAQ question');
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
