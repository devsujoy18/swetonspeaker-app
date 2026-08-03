<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Keyfeature;
use App\Models\SeoMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type_id' => 'required',
            'order_no' => 'required|numeric|unique:categories,order_no',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1024',
        ]);

        // Image Upload using Image intervention
        $imageName = '';
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $imageName = time().rand(100, 999999999).'-'.$request->file('image')->getClientOriginalName();
            $destinationPath = public_path('uploads/');
            $image->move($destinationPath, $imageName);

            $imgManager = new ImageManager(new Driver);
            $thumbImage = $imgManager->read($destinationPath.$imageName);
            $thumbImage->resize(400, 300);

            $thumbdestinationPath = public_path('uploads/thumbnails/');
            $thumbImage->save($thumbdestinationPath.$imageName);
        }

        $category = new Category;
        $category->name = $request->name;
        $category->type_id = $request->type_id;
        $category->image = $imageName;
        $category->show_on_home = $request->show_on_home ?? 0;
        $category->order_no = $request->order_no;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Data added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'type_id' => 'required',
            'order_no' => 'required|numeric|unique:categories,order_no,'.$category->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1024',
        ]);

        if ($request->hasfile('image')) {
            $destinationPath = public_path('uploads/');

            // Delete previous file
            $destinantion_one = $destinationPath.'thumbnail/'.$category->image;
            if (File::exists($destinantion_one)) {
                File::delete($destinantion_one);
            }

            $destinantion_two = $destinationPath.$category->image;
            if (File::exists($destinantion_two)) {
                File::delete($destinantion_two);
            }

            $image = $request->file('image');
            $imageName = time().rand(100, 999999999).'-'.$request->file('image')->getClientOriginalName();
            $image->move($destinationPath, $imageName);

            $imgManager = new ImageManager(new Driver);
            $thumbImage = $imgManager->read($destinationPath.$imageName);
            $thumbImage->resize(400, 300);

            $thumbdestinationPath = public_path('uploads/thumbnails/');
            $thumbImage->save($thumbdestinationPath.$imageName);

            $category->image = $imageName;
        }

        $category->name = $request->name;
        $category->type_id = $request->type_id;
        $category->show_on_home = $request->show_on_home ?? 0;
        $category->order_no = $request->order_no;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Data updated successfully');
    }

    public function change_status($id)
    {
        $category = Category::find($id);
        $category->status = ($category->status == 1) ? 0 : 1;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Status updated successfully');
    }

    /**
     ** Category keyfeatures add
     */
    public function keyfeature_add($id)
    {
        $category = Category::find($id);
        $keyfeatures = Keyfeature::where('status', 0)->orderby('order_no')->get();

        return view('category.keyfeature_add', compact('category', 'keyfeatures'));
    }

    /**
     ** Category keyfeatures store
     **/
    public function keyfeature_store(Request $request, $id)
    {
        $request->validate([
            'keyfeature_id' => 'required',
            'keyfeature_value' => 'required',
            'order_no' => 'required|numeric',
        ], [
            'keyfeature_id.required' => 'Please select keyfeature',
            'keyfeature_value.required' => 'Please enter keyfeature value',
            'order_no' => 'Please enter order no',
        ]);

        $category = Category::find($id);
        if (! $category) {
            // return redirect()->back()->with('error', 'Category not found.');
            abort(403);
        }

        if ($category->keyfeatures()->where('keyfeature_id', $request->keyfeature_id)->exists()) {
            session()->flash('error', 'This keyfeature has already been added to this category.');

            return redirect()->back();
        }

        $category->keyfeatures()->attach($request->keyfeature_id, [
            'keyfeature_value' => $request->keyfeature_value,
            'order_no' => $request->order_no,
        ]);

        return redirect()->route('category.show', $category->id)->with('success', 'Key features added successfully.');
    }

    /**
     ** Category keyfeature edit
     **/
    public function keyfeature_edit($categoryId, $editId)
    {
        $category = Category::find($categoryId);
        $keyfeatures = Keyfeature::where('status', 0)->orderby('order_no')->get();
        $category_keyfeature = $category->keyfeatures()->wherePivot('id', $editId)->first();

        return view('category.keyfeature_edit', compact('category', 'keyfeatures', 'category_keyfeature'));
    }

    /**
     ** Category keyfeatures update
     **/
    public function keyfeature_update(Request $request, $categoryId)
    {
        $request->validate([
            'keyfeature_id' => 'required',
            'keyfeature_value' => 'required',
            'order_no' => 'required|numeric',
        ], [
            'keyfeature_id.required' => 'Please select keyfeature',
            'keyfeature_value.required' => 'Please enter keyfeature value',
            'order_no.required' => 'Please enter order no',
        ]);

        // Find the category using the correct ID
        $category = Category::find($categoryId);
        if (! $category) {
            abort(403); // Category not found
        }

        // Find the current pivot record
        $currentPivot = $category->keyfeatures()->wherePivot('id', $request->editId)->first();
        if (! $currentPivot) {
            return redirect()->back()->with('error', 'Keyfeature not found in the selected category.');
        }

        // Check if the new keyfeature_id already exists in the category, excluding the current pivot
        $duplicate = $category->keyfeatures()
            ->where('keyfeature_id', $request->keyfeature_id)
            ->wherePivot('id', '!=', $request->editId)
            ->exists();

        if ($duplicate) {
            return redirect()->back()->with('error', 'This keyfeature has already been added to this category.');
        }

        // Update the existing pivot record with the correct keyfeature_id
        $category->keyfeatures()->updateExistingPivot($request->keyfeature_id, [
            'keyfeature_value' => $request->keyfeature_value,
            'order_no' => $request->order_no,
        ]);

        return redirect()->route('category.show', $categoryId)->with('success', 'Key features updated successfully.');
    }

    /**
     * Category list against type
     **/
    public function all_category($type)
    {
        $typeName = '';
        if (! empty($type) && ($type == 'pro-loudspeaker' || $type == 'home-loudspeaker')) {
            if ($type == 'pro-loudspeaker') {
                $typeName = 'Pro Loudspeaker';
                $categories = Category::with(['keyfeatures' => function ($query) {
                    $query->where('keyfeatures.status', 0)
                        ->orderBy('pivot_order_no', 'asc');
                }])
                    ->where('categories.status', 0)
                    ->where('show_on_home', 1)
                    ->where('type_id', 1)
                    ->orderBy('categories.order_no')
                    ->get();
            } else {
                $typeName = 'Home Loudspeaker';
                $categories = Category::with(['keyfeatures' => function ($query) {
                    $query->where('keyfeatures.status', 0)
                        ->orderBy('pivot_order_no', 'asc');
                }])
                    ->where('categories.status', 0)
                    ->where('show_on_home', 1)
                    ->where('type_id', 2)
                    ->orderBy('categories.order_no')
                    ->get();
            }

            $pageDescription = SeoMeta::active()
                ->forType(SeoMeta::TypeMainSite)
                ->forPath('/speaker/'.$type)
                ->value('page_description');

            return view('category.public_list', compact('categories', 'typeName', 'pageDescription'));
        } else {
            abort(404, 'Type not found');
        }
    }
}
