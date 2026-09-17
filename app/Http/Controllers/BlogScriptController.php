<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogScriptRequest;
use App\Models\Blog;
use App\Models\BlogScript;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;

class BlogScriptController extends Controller
{
    public function index(): View
    {
        return view('blog_script.index', [
            'blogScripts' => BlogScript::query()->with('blog')->latest()->get(),
            'contentOptions' => $this->contentOptions(),
        ]);
    }

    public function store(BlogScriptRequest $request): RedirectResponse
    {
        BlogScript::create($this->payload($request));

        return redirect()->route('blog-script.index')->with('success', 'Script added successfully');
    }

    public function update(BlogScriptRequest $request, BlogScript $blogScript): RedirectResponse
    {
        $blogScript->update($this->payload($request));

        return redirect()->route('blog-script.index')->with('success', 'Script updated successfully');
    }

    public function destroy(BlogScript $blogScript): RedirectResponse
    {
        $blogScript->delete();

        return redirect()->route('blog-script.index')->with('success', 'Script deleted successfully');
    }

    /**
     * @return array<string, array<string, string>>
     */
    private function contentOptions(): array
    {
        $options = [
            BlogScript::PageTypeBlog => [],
            BlogScript::PageTypeEvent => [],
            BlogScript::PageTypeBlogList => [],
            BlogScript::PageTypeEventList => [],
        ];

        Blog::query()
            ->whereIn('type', [BlogScript::PageTypeBlog, BlogScript::PageTypeEvent])
            ->whereNotNull('slug')
            ->orderBy('type')
            ->orderBy('order_no')
            ->orderBy('title')
            ->get(['id', 'type', 'title'])
            ->each(function (Blog $blog) use (&$options): void {
                $options[$blog->type][(string) $blog->id] = $blog->title;
            });

        return $options;
    }

    /**
     * @return array<string, mixed>
     */
    private function payload(BlogScriptRequest $request): array
    {
        $validated = $request->validated();

        if (BlogScript::isListPageType($validated['page_type'])) {
            $blog = $this->listPageAnchor($validated['page_type']);

            return array_merge(Arr::only($validated, ['page_type', 'position', 'script', 'is_active']), [
                'blog_id' => $blog->id,
            ]);
        }

        $blog = Blog::query()
            ->whereKey($validated['blog_id'])
            ->where('type', $validated['page_type'])
            ->whereNotNull('slug')
            ->firstOrFail();

        return array_merge(Arr::only($validated, ['page_type', 'position', 'script', 'is_active']), [
            'blog_id' => $blog->id,
        ]);
    }

    private function listPageAnchor(string $pageType): Blog
    {
        $contentType = $pageType === BlogScript::PageTypeBlogList
            ? BlogScript::PageTypeBlog
            : BlogScript::PageTypeEvent;

        $blog = Blog::query()
            ->where('type', $contentType)
            ->oldest('id')
            ->first();

        if (! $blog) {
            throw ValidationException::withMessages([
                'page_type' => 'Create a '.$contentType.' before adding a script to its list page.',
            ]);
        }

        return $blog;
    }
}
