<?php

namespace Tests\Feature;

use App\Models\Blog;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class PublicBlogAndEventPagesTest extends TestCase
{
    use DatabaseTransactions;

    public function test_blogs_page_only_lists_active_blogs(): void
    {
        $activeBlog = $this->createContent('blog', 0, 'Active blog for list');
        $event = $this->createContent('event', 0, 'Event excluded from blog list');
        $inactiveBlog = $this->createContent('blog', 1, 'Inactive blog excluded from list');

        $response = $this->get(route('public.blog.index'));

        $response->assertOk();
        $response->assertViewIs('pages.blog_list');
        $response->assertViewHas('pageTitle', 'Blogs');
        $response->assertViewHas('detailRoute', 'public.blog.show');
        $response->assertViewHas('blogs', function (LengthAwarePaginator $blogs) use ($activeBlog, $event, $inactiveBlog): bool {
            $listedIds = collect($blogs->items())->pluck('id');

            return $listedIds->contains($activeBlog->id)
                && ! $listedIds->contains($event->id)
                && ! $listedIds->contains($inactiveBlog->id)
                && collect($blogs->items())->every(
                    fn (Blog $blog): bool => $blog->type === 'blog' && $blog->status === 0
                );
        });
    }

    public function test_events_page_only_lists_active_events(): void
    {
        $activeEvent = $this->createContent('event', 0, 'Active event for list');
        $blog = $this->createContent('blog', 0, 'Blog excluded from event list');
        $inactiveEvent = $this->createContent('event', 1, 'Inactive event excluded from list');

        $response = $this->get(route('public.event.index'));

        $response->assertOk();
        $response->assertViewIs('pages.blog_list');
        $response->assertViewHas('pageTitle', 'Events');
        $response->assertViewHas('detailRoute', 'public.event.show');
        $response->assertViewHas('blogs', function (LengthAwarePaginator $blogs) use ($activeEvent, $blog, $inactiveEvent): bool {
            $listedIds = collect($blogs->items())->pluck('id');

            return $listedIds->contains($activeEvent->id)
                && ! $listedIds->contains($blog->id)
                && ! $listedIds->contains($inactiveEvent->id)
                && collect($blogs->items())->every(
                    fn (Blog $event): bool => $event->type === 'event' && $event->status === 0
                );
        });
    }

    public function test_blog_detail_route_only_resolves_blog_records(): void
    {
        $blog = $this->createContent('blog', 0, 'Blog detail route');
        $event = $this->createContent('event', 0, 'Event detail route mismatch');
        $inactiveBlog = $this->createContent('blog', 1, 'Inactive blog excluded from latest');

        $this->get(route('public.blog.show', $blog->slug))
            ->assertOk()
            ->assertViewIs('pages.blog_details')
            ->assertViewHas('blog', fn (Blog $viewBlog): bool => $viewBlog->is($blog))
            ->assertViewHas(
                'latestBlogsAndEvents',
                fn ($latestBlogs): bool => $latestBlogs->every(
                    fn (Blog $latestBlog): bool => $latestBlog->type === 'blog' && $latestBlog->status === 0
                ) && ! $latestBlogs->contains($inactiveBlog)
            )
            ->assertViewHas('pageTitle', 'Blog Details')
            ->assertViewHas('detailRoute', 'public.blog.show')
            ->assertSee('No latest blogs available at the moment.')
            ->assertSee('<a href="'.route('home').'">Home</a>', false)
            ->assertSee('<a href="'.route('public.blog.index').'">Blogs</a>', false)
            ->assertSeeTextInOrder(['Home', 'Blogs', $blog->title]);

        $this->get(route('public.blog.show', $event->slug))->assertNotFound();
        $this->get(route('public.blog.show', $inactiveBlog->slug))->assertNotFound();
    }

    public function test_event_detail_route_only_resolves_event_records(): void
    {
        $event = $this->createContent('event', 0, 'Event detail route');
        $blog = $this->createContent('blog', 0, 'Blog detail route mismatch');
        $inactiveEvent = $this->createContent('event', 1, 'Inactive event excluded from latest');

        $this->get(route('public.event.show', $event->slug))
            ->assertOk()
            ->assertViewIs('pages.blog_details')
            ->assertViewHas('blog', fn (Blog $viewEvent): bool => $viewEvent->is($event))
            ->assertViewHas(
                'latestBlogsAndEvents',
                fn ($latestEvents): bool => $latestEvents->every(
                    fn (Blog $latestEvent): bool => $latestEvent->type === 'event' && $latestEvent->status === 0
                ) && ! $latestEvents->contains($inactiveEvent)
            )
            ->assertViewHas('pageTitle', 'Event Details')
            ->assertViewHas('detailRoute', 'public.event.show')
            ->assertSee('No latest events available at the moment.')
            ->assertSee('<a href="'.route('home').'">Home</a>', false)
            ->assertSee('<a href="'.route('public.event.index').'">Events</a>', false)
            ->assertSeeTextInOrder(['Home', 'Events', $event->title]);

        $this->get(route('public.event.show', $blog->slug))->assertNotFound();
        $this->get(route('public.event.show', $inactiveEvent->slug))->assertNotFound();
    }

    public function test_legacy_combined_routes_remain_available(): void
    {
        $blog = $this->createContent('blog', 0, 'Legacy combined detail');

        $this->get(route('public.blogs'))
            ->assertOk()
            ->assertViewHas('pageTitle', 'Events & Blogs');

        $this->get(route('public.blogdetails', $blog->slug))
            ->assertOk()
            ->assertViewHas('blog', fn (Blog $viewBlog): bool => $viewBlog->is($blog));
    }

    private function createContent(string $type, int $status, string $title): Blog
    {
        return Blog::query()->forceCreate([
            'type' => $type,
            'title' => $title,
            'slug' => str($title)->slug().'-'.str()->random(8),
            'publish_date' => now()->toDateString(),
            'status' => $status,
            'order_no' => -1000000,
        ]);
    }
}
