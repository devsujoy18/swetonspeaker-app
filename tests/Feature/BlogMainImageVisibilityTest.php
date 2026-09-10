<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class BlogMainImageVisibilityTest extends TestCase
{
    use DatabaseTransactions;

    public function test_main_image_is_shown_on_details_page_by_default(): void
    {
        $blog = $this->createBlog('Default visible main image', 'default-visible-main-image.jpg');

        $this->assertTrue($blog->show_main_image_on_details);

        $this->get(route('public.blog.show', $blog->slug))
            ->assertOk()
            ->assertSee('default-visible-main-image.jpg', false);
    }

    public function test_main_image_can_be_hidden_only_from_details_page(): void
    {
        $blog = $this->createBlog('Hidden detail main image', 'hidden-detail-main-image.jpg', false);

        $this->get(route('public.blog.show', $blog->slug))
            ->assertOk()
            ->assertDontSee('hidden-detail-main-image.jpg', false);

        $this->get(route('public.blog.index'))
            ->assertOk()
            ->assertSee('hidden-detail-main-image.jpg', false);
    }

    public function test_admin_can_update_main_image_visibility(): void
    {
        $blog = $this->createBlog('Admin visibility update', 'admin-visibility-image.jpg');

        $this->actingAs(User::factory()->create())
            ->put(route('blog.update', $blog->id), [
                'title' => $blog->title,
                'type' => 'blog',
                'order_no' => $blog->order_no,
                'show_main_image_on_details' => '0',
            ])
            ->assertRedirect(route('blog.index'));

        $this->assertFalse($blog->refresh()->show_main_image_on_details);
        $this->assertSame('admin-visibility-image.jpg', $blog->image_path);
    }

    private function createBlog(string $title, string $imagePath, ?bool $showMainImage = null): Blog
    {
        $attributes = [
            'type' => 'blog',
            'title' => $title,
            'slug' => str($title)->slug().'-'.str()->random(8),
            'publish_date' => now()->toDateString(),
            'status' => 0,
            'order_no' => -1000000,
            'image_path' => $imagePath,
        ];

        if ($showMainImage !== null) {
            $attributes['show_main_image_on_details'] = $showMainImage;
        }

        return Blog::query()->forceCreate($attributes);
    }
}
