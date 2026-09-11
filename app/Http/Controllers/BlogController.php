<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Blogimage;
use App\Models\Blogreview;
use App\Models\BlogScript;
use App\Models\PageFaq;
use App\Support\RichTextSanitizer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct(private RichTextSanitizer $richTextSanitizer) {}

    /**
     * All public views
     */
    public function public_blog_list(): View
    {
        return $this->publicTypeList(
            type: null,
            pageTitle: 'Events & Blogs',
            detailRoute: 'public.blogdetails',
            emptyMessage: 'No events or blogs available at the moment.',
        );
    }

    public function public_blogs_list(): View
    {
        return $this->publicTypeList(
            type: 'blog',
            pageTitle: 'Blogs',
            detailRoute: 'public.blog.show',
            emptyMessage: 'No blogs available at the moment.',
        );
    }

    public function public_events_list(): View
    {
        return $this->publicTypeList(
            type: 'event',
            pageTitle: 'Events',
            detailRoute: 'public.event.show',
            emptyMessage: 'No events available at the moment.',
        );
    }

    public function public_blog_details(string $slug): View
    {
        return $this->publicTypeDetails(
            slug: $slug,
            type: null,
            pageTitle: 'Events & Blogs Details',
            latestTitle: 'Latest Events & Blogs',
            detailRoute: 'public.blogdetails',
            listRoute: 'public.blogs',
            listTitle: 'Events & Blogs',
            entityName: 'blog',
        );
    }

    public function public_blog_page_details(string $slug): View
    {
        return $this->publicTypeDetails(
            slug: $slug,
            type: 'blog',
            pageTitle: 'Blog Details',
            latestTitle: 'Latest Blogs',
            detailRoute: 'public.blog.show',
            listRoute: 'public.blog.index',
            listTitle: 'Blogs',
            entityName: 'blog',
        );
    }

    public function public_event_details(string $slug): View
    {
        return $this->publicTypeDetails(
            slug: $slug,
            type: 'event',
            pageTitle: 'Event Details',
            latestTitle: 'Latest Events',
            detailRoute: 'public.event.show',
            listRoute: 'public.event.index',
            listTitle: 'Events',
            entityName: 'event',
        );
    }

    private function publicTypeList(?string $type, string $pageTitle, string $detailRoute, string $emptyMessage): View
    {
        $blogs = Blog::query()
            ->where('status', 0)
            ->when($type, fn ($query) => $query->where('type', $type))
            ->orderBy('order_no')
            ->withCount('blogreviews')
            ->paginate(10);

        return view('pages.blog_list', compact('blogs', 'pageTitle', 'detailRoute', 'emptyMessage'));
    }

    private function publicTypeDetails(
        string $slug,
        ?string $type,
        string $pageTitle,
        string $latestTitle,
        string $detailRoute,
        string $listRoute,
        string $listTitle,
        string $entityName,
    ): View {
        $blog = Blog::query()
            ->with('blogimages')
            ->where('slug', $slug)
            ->when($type, fn ($query) => $query->where('type', $type))
            ->firstOrFail();

        $blog->long_description = $this->richTextSanitizer->sanitize($blog->long_description);

        $latestBlogsAndEvents = Blog::query()
            ->where('slug', '!=', $slug)
            ->when($type, fn ($query) => $query->where('type', $type))
            ->orderByDesc('publish_date')
            ->take(5)
            ->get();

        $blogreviews = Blogreview::query()
            ->where('blog_id', $blog->id)
            ->where('status', 1)
            ->get();

        $pageFaqs = PageFaq::query()
            ->active()
            ->forType(PageFaq::TypeMainSite)
            ->forPageType($blog->type)
            ->forEntity(Blog::class, $blog->id)
            ->ordered()
            ->get();

        $scriptsByPosition = BlogScript::query()
            ->active()
            ->forPageType($blog->type)
            ->forBlog($blog)
            ->orderBy('id')
            ->get()
            ->groupBy('position');

        $headerScripts = $scriptsByPosition->get(BlogScript::PositionHeader, collect());
        $footerScripts = $scriptsByPosition->get(BlogScript::PositionFooter, collect());

        return view('pages.blog_details', compact(
            'blog',
            'latestBlogsAndEvents',
            'blogreviews',
            'pageTitle',
            'latestTitle',
            'detailRoute',
            'listRoute',
            'listTitle',
            'entityName',
            'pageFaqs',
            'headerScripts',
            'footerScripts',
        ));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();

        return view('blog.index', compact('blogs'));
    }

    /**
     * Blog create
     */
    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'order_no' => 'required|numeric',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1024',
            'long_description' => 'nullable|string',
            'show_main_image_on_details' => ['required', 'boolean'],
        ]);

        $blog = new Blog;
        $blog->title = $request->title;
        $blog->type = $request->type;
        $blog->publish_date = $request->publish_date ?? date('Y-m-d');
        $blog->author = $request->author;
        $blog->video_link = $request->video_link;
        $blog->short_description = $request->short_description;

        $blog->long_description = $this->richTextSanitizer->sanitize($request->string('long_description')->toString());
        $blog->order_no = $request->order_no;
        $blog->is_current_event = $request->is_current_event ?? 0;
        $blog->show_on_home = $request->show_on_home ?? 0;
        $blog->show_main_image_on_details = $request->boolean('show_main_image_on_details');

        // Image Upload using Image intervention
        $imageName = '';
        if ($request->hasfile('image_path')) {
            $image_path = $request->file('image_path');
            $imageName = time().rand(100, 999999999).'-'.$request->file('image_path')->getClientOriginalName();
            $destinationPath = public_path('uploads/');
            $image_path->move($destinationPath, $imageName);
            $blog->image_path = $imageName;
        }
        $blog->save();

        return redirect()->route('blog.index')->with('success', 'Data added successfully');
    }

    public function change_status($id)
    {
        $blog = Blog::find($id);
        $blog->status = ($blog->status == 1) ? 0 : 1;
        $blog->save();

        return redirect()->route('blog.index')->with('success', 'Status updated successfully');
    }

    public function show($blogId)
    {
        $blog = Blog::find($blogId);

        return view('blog.show', compact('blog'));
    }

    public function edit($blogId)
    {
        $blog = Blog::find($blogId);

        return view('blog.edit', compact('blog'));
    }

    public function update(Request $request, $blogId)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'order_no' => 'required|numeric',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1024',
            'long_description' => 'nullable|string',
            'show_main_image_on_details' => ['required', 'boolean'],
        ]);

        $blog = Blog::find($blogId);

        $blog->slug = null; // For Update slug according to title

        if ($request->hasfile('image_path')) {
            $destinationPath = public_path('uploads/');

            $destinantion_two = $destinationPath.$blog->image;
            if (File::exists($destinantion_two)) {
                File::delete($destinantion_two);
            }

            $image_path = $request->file('image_path');
            $imageName = time().rand(100, 999999999).'-'.$request->file('image_path')->getClientOriginalName();
            $image_path->move($destinationPath, $imageName);
            $blog->image_path = $imageName;
        }

        $blog->title = $request->title;
        $blog->type = $request->type;
        $blog->publish_date = $request->publish_date ?? date('Y-m-d');
        $blog->author = $request->author;
        $blog->video_link = $request->video_link;
        $blog->short_description = $request->short_description;

        $blog->long_description = $this->richTextSanitizer->sanitize($request->string('long_description')->toString());
        $blog->order_no = $request->order_no;
        $blog->is_current_event = $request->is_current_event ?? 0;
        $blog->show_on_home = $request->show_on_home ?? 0;
        $blog->show_main_image_on_details = $request->boolean('show_main_image_on_details');
        $blog->save();

        return redirect()->route('blog.index')->with('success', 'Status updated successfully');
    }

    public function upload_content_image(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:5120'],
        ]);

        $image = $validated['image'];
        $destinationPath = public_path('uploads/blog-content');
        $fileName = Str::uuid().'.'.$image->extension();

        File::ensureDirectoryExists($destinationPath);
        $image->move($destinationPath, $fileName);

        return response()->json([
            'url' => asset('uploads/blog-content/'.$fileName),
        ]);
    }

    public function blog_images($blogId)
    {
        $blog = Blog::with('blogimages')->find($blogId);

        return view('blog.mul_image', compact('blog'));
    }

    public function upload_multi_image(Request $request, $blogId)
    {
        $request->validate([
            'img_path.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $blog = Blog::find($blogId);
        $orderNo = 1;
        if ($request->hasfile('img_path')) {
            foreach ($request->file('img_path') as $image) {
                $input['imagename'] = uniqid('image_').'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('uploads/');
                $image->move($destinationPath, $input['imagename']);

                // Insert it into db
                $blogimg = new Blogimage;
                $blogimg->blog_id = $blogId;
                $blogimg->img_path = $input['imagename'];
                $blogimg->order_no = $orderNo;
                $blogimg->save();
                $orderNo++;
            }
        }

        return redirect()->route('blog.images', $blogId)->with('success', 'Images uploaded successfully');
    }

    public function blog_images_del($imgId)
    {
        $blogimg = Blogimage::find($imgId);
        $blogId = $blogimg->blog_id;

        $destinationPath = public_path('uploads/').$blogimg->img_path;
        if (File::exists($destinationPath)) {
            File::delete($destinationPath);
        }
        $blogimg->delete();

        return redirect()->route('blog.images', $blogId)->with('success', 'Image deleted successfully');
    }

    /* All blog reviews */
    public function all_blog_reviews()
    {
        $blogreviews = Blogreview::with('blog')->get();

        return view('blog.all_review_list', compact('blogreviews'));
    }

    /* Change Status */
    public function change_review_status($id)
    {
        $blogreview = Blogreview::find($id);
        $blogreview->status = ($blogreview->status == 1) ? 0 : 1;
        $blogreview->save();

        return redirect()->route('blog.review.list')->with('success', 'Status updated successfully');
    }
}
