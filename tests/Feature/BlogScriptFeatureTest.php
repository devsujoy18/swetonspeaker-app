<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\BlogScript;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class BlogScriptFeatureTest extends TestCase
{
    use DatabaseTransactions;

    public function test_admin_can_assign_an_unmodified_header_script_to_a_specific_blog(): void
    {
        $blog = $this->createContent('blog', 'Header script target');
        $script = '<script type="application/ld+json">{"@context":"https://schema.org","@type":"BlogPosting"}</script>';

        $this->actingAs(User::factory()->create())
            ->post(route('blog-script.store'), [
                'page_type' => BlogScript::PageTypeBlog,
                'blog_id' => $blog->id,
                'position' => BlogScript::PositionHeader,
                'script' => $script,
                'is_active' => true,
            ])
            ->assertRedirect(route('blog-script.index'));

        $this->get(route('public.blog.show', $blog->slug))
            ->assertOk()
            ->assertSee($script, false);

        $this->assertSame($script, BlogScript::query()->sole()->script);
    }

    public function test_footer_script_only_renders_on_its_assigned_event(): void
    {
        $event = $this->createContent('event', 'Footer script event target');
        $otherEvent = $this->createContent('event', 'Other event');
        $script = '<script>window.eventScript = true;</script>';

        BlogScript::create([
            'page_type' => BlogScript::PageTypeEvent,
            'blog_id' => $event->id,
            'position' => BlogScript::PositionFooter,
            'script' => $script,
            'is_active' => true,
        ]);

        $this->get(route('public.event.show', $event->slug))
            ->assertOk()
            ->assertSee($script, false);

        $this->get(route('public.event.show', $otherEvent->slug))
            ->assertOk()
            ->assertDontSee($script, false);
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
