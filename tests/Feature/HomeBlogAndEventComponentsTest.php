<?php

namespace Tests\Feature;

use App\Livewire\HomeBlogs;
use App\Livewire\HomeEvents;
use App\Models\Blog;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Cache;
use Livewire\Livewire;
use Tests\TestCase;

class HomeBlogAndEventComponentsTest extends TestCase
{
    use DatabaseTransactions;

    public function test_home_events_component_only_renders_active_homepage_events_with_event_links(): void
    {
        $event = $this->createContent('event', 'Homepage event', 0, 1);
        $blog = $this->createContent('blog', 'Homepage blog excluded from events', 0, 1);
        $inactiveEvent = $this->createContent('event', 'Inactive event excluded from homepage', 1, 1);
        $hiddenEvent = $this->createContent('event', 'Hidden event excluded from homepage', 0, 0);

        Cache::forget('home.home-events');

        try {
            Livewire::test(HomeEvents::class)
                ->assertSee('Recent Events')
                ->assertSee($event->title)
                ->assertSee(route('public.event.show', $event->slug), false)
                ->assertDontSee($blog->title)
                ->assertDontSee($inactiveEvent->title)
                ->assertDontSee($hiddenEvent->title);
        } finally {
            Cache::forget('home.home-events');
        }
    }

    public function test_home_blogs_component_only_renders_active_homepage_blogs_with_blog_links(): void
    {
        $blog = $this->createContent('blog', 'Homepage blog', 0, 1);
        $event = $this->createContent('event', 'Homepage event excluded from blogs', 0, 1);
        $inactiveBlog = $this->createContent('blog', 'Inactive blog excluded from homepage', 1, 1);
        $hiddenBlog = $this->createContent('blog', 'Hidden blog excluded from homepage', 0, 0);

        Cache::forget('home.home-blogs');

        try {
            Livewire::test(HomeBlogs::class)
                ->assertSee('Recent Blogs')
                ->assertSee($blog->title)
                ->assertSee(route('public.blog.show', $blog->slug), false)
                ->assertDontSee($event->title)
                ->assertDontSee($inactiveBlog->title)
                ->assertDontSee($hiddenBlog->title);
        } finally {
            Cache::forget('home.home-blogs');
        }
    }

    public function test_homepage_renders_both_content_components(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSeeLivewire(HomeEvents::class)
            ->assertSeeLivewire(HomeBlogs::class);
    }

    private function createContent(string $type, string $title, int $status, int $showOnHome): Blog
    {
        return Blog::query()->forceCreate([
            'type' => $type,
            'title' => $title,
            'slug' => str($title)->slug().'-'.str()->random(8),
            'publish_date' => now()->toDateString(),
            'status' => $status,
            'show_on_home' => $showOnHome,
            'order_no' => -1000000,
        ]);
    }
}
