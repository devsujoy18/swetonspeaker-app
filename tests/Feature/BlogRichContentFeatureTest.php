<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class BlogRichContentFeatureTest extends TestCase
{
    use DatabaseTransactions;

    public function test_admin_can_save_and_public_page_can_render_long_rich_blog_content(): void
    {
        $title = 'Long rich content test '.str()->random(8);
        $longText = str_repeat('Long-form loudspeaker article content. ', 2200);
        $richContent = '<section class="article-card" style="background-color: #ffffff; padding: 24px">'
            .'<h2 style="color: #cf1f1f">The short answer</h2>'
            .'<p>'.$longText.'</p>'
            .'<img src="https://example.com/article-image.jpg" alt="Article illustration" onerror="alert(1)">'
            .'<script>alert(1)</script>'
            .'</section>';

        $this->actingAs(User::factory()->create())
            ->post(route('blog.store'), [
                'title' => $title,
                'type' => 'blog',
                'order_no' => 1,
                'long_description' => $richContent,
            ])
            ->assertRedirect(route('blog.index'));

        $blog = Blog::query()->where('title', $title)->firstOrFail();

        $this->assertGreaterThan(65535, strlen((string) $blog->long_description));
        $this->assertStringContainsString('<section class="article-card"', $blog->long_description);
        $this->assertStringContainsString('style="color: #cf1f1f"', $blog->long_description);
        $this->assertStringContainsString('src="https://example.com/article-image.jpg"', $blog->long_description);
        $this->assertStringNotContainsString('onerror', $blog->long_description);
        $this->assertStringNotContainsString('<script', $blog->long_description);

        $this->get(route('public.blog.show', $blog->slug))
            ->assertOk()
            ->assertSee('class="blog-sidebar__text-1 blog-rich-content"', false)
            ->assertSee('<h2 style="color: #cf1f1f">The short answer</h2>', false)
            ->assertSee('src="https://example.com/article-image.jpg"', false);
    }

    public function test_admin_can_upload_a_safe_blog_content_image(): void
    {
        $response = $this->actingAs(User::factory()->create())
            ->post(route('blog.content-image.upload'), [
                'image' => UploadedFile::fake()->image('article.jpg', 800, 600)->size(500),
            ]);

        $response->assertOk()->assertJsonStructure(['url']);

        $fileName = basename((string) parse_url($response->json('url'), PHP_URL_PATH));
        $uploadedPath = public_path('uploads/blog-content/'.$fileName);

        try {
            $this->assertFileExists($uploadedPath);
            $this->assertStringEndsWith('/uploads/blog-content/'.$fileName, $response->json('url'));
        } finally {
            File::delete($uploadedPath);
        }
    }

    public function test_public_page_renders_legacy_encoded_rich_content(): void
    {
        $blog = Blog::query()->forceCreate([
            'type' => 'blog',
            'title' => 'Legacy rich content '.str()->random(8),
            'slug' => 'legacy-rich-content-'.str()->random(8),
            'long_description' => '&amp;lt;p style=&amp;quot;color: #cf1f1f&amp;quot;&amp;gt;Legacy formatted content&amp;lt;/p&amp;gt;',
            'status' => 0,
            'order_no' => 1,
        ]);

        $this->get(route('public.blog.show', $blog->slug))
            ->assertOk()
            ->assertSee('<p style="color: #cf1f1f">Legacy formatted content</p>', false)
            ->assertDontSee('&amp;lt;p', false);
    }

    public function test_blog_content_image_upload_rejects_svg_files(): void
    {
        $this->actingAs(User::factory()->create())
            ->post(route('blog.content-image.upload'), [
                'image' => UploadedFile::fake()->createWithContent(
                    'unsafe.svg',
                    '<svg xmlns="http://www.w3.org/2000/svg"><script>alert(1)</script></svg>',
                ),
            ])
            ->assertSessionHasErrors('image');

    }
}
