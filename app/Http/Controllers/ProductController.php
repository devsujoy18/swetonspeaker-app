<?php

namespace App\Http\Controllers;

use App\Helpers\CartManagement;
use App\Mail\ApplicationfordealershipMail;
use App\Mail\ContactusMail;
use App\Mail\ProductenquiryMail;
use App\Models\Applicatiodealership;
use App\Models\Category;
use App\Models\Contactus;
use App\Models\Keyfeature;
use App\Models\Mountinginfo;
use App\Models\Product;
use App\Models\Productcombination;
use App\Models\Productenquiry;
use App\Models\Productimage;
use App\Models\Productkeyfeature;
use App\Models\Productmountinginfo;
use App\Models\Productreconkit;
use App\Models\Productreview;
use App\Models\Productspecification;
use App\Models\Producttsparameter;
use App\Models\Reconkit;
use App\Models\SeoMeta;
use App\Models\Specification;
use App\Models\Tsparameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', 0)->get();

        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'order_no' => 'required|numeric|unique:products,order_no',
            'buy_link' => 'required_if:is_sealable,1',
            'drawing' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp,pdf,doc,docx|max:1024',
            'datasheet' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp,pdf,doc,docx|max:1024',
        ], [
            'buy_link.required_if' => 'The buy link field is required when is sealable is checked.',
        ]);

        $drawingName = '';
        if ($request->hasfile('drawing')) {
            $drawing = $request->file('drawing');
            $drawingName = time().rand(100, 999999999).'-'.$request->file('drawing')->getClientOriginalName();
            $destinationPath = public_path('uploads/');
            $drawing->move($destinationPath, $drawingName);
        }

        $datasheetName = '';
        if ($request->hasfile('datasheet')) {
            $datasheet = $request->file('datasheet');
            $datasheetName = time().rand(100, 999999999).'-'.$request->file('datasheet')->getClientOriginalName();
            $destinationPath = public_path('uploads/');
            $datasheet->move($destinationPath, $datasheetName);
        }

        $product = new Product;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->show_on_home = $request->show_on_home ?? 0;
        $product->is_sealable = $request->is_sealable ?? 0;
        $product->buy_link = $request->buy_link ?? null;
        $product->order_no = $request->order_no;
        $product->description = $request->description;
        $product->drawing = $drawingName;
        $product->datasheet = $datasheetName;
        $product->save();

        return redirect()->route('product.index')->with('success', 'Data added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($productId)
    {
        // $product = Product::with(['category','combinations'])->find($productId);
        $product = Product::with([
            'category',
            'combinations.productkeyfeatures' => function ($query) {
                $query->orderBy('order_no'); // Orders the productkeyfeatures by order_no
            },
            'combinations.productmountinginfos' => function ($query) {
                $query->orderBy('order_no'); // Orders the productkeyfeatures by order_no
            },
            'combinations.productspecifications' => function ($query) {
                $query->orderBy('order_no'); // Orders the productkeyfeatures by order_no
            },
            'combinations.producttsparameters' => function ($query) {
                $query->orderBy('order_no'); // Orders the productkeyfeatures by order_no
            },
            'combinations.productreconkits' => function ($query) {
                $query->orderBy('order_no'); // Orders the productkeyfeatures by order_no
            },
        ])->find($productId);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::where('status', 0)->get();

        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'order_no' => 'required|numeric|unique:products,order_no,'.$product->id,
            'buy_link' => 'required_if:is_sealable,1',
            'drawing' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp,pdf,doc,docx|max:1024',
            'datasheet' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp,pdf,doc,docx|max:1024',
        ], [
            'buy_link.required_if' => 'The buy link field is required when is sealable is checked.',
        ]);

        if ($request->hasfile('drawing')) {
            $destinationPath = public_path('uploads/');
            $filePath = public_path('uploads/'.$product->drawing);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }

            // $destinationPath = public_path('uploads/');
            // //Delete previous file
            // $destinantion_one = $destinationPath.'thumbnail/'.$product->drawing;
            // if(File::exists($destinantion_one)){
            //     File::delete($destinantion_one);
            // }
            $drawing = $request->file('drawing');
            $drawingName = time().rand(100, 999999999).'-'.$request->file('drawing')->getClientOriginalName();
            $drawing->move($destinationPath, $drawingName);
            $product->drawing = $drawingName;
        }

        if ($request->hasfile('datasheet')) {
            $destinationPath = public_path('uploads/');
            $filePath = public_path('uploads/'.$product->datasheet);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
            // $destinationPath = public_path('uploads/');
            // //Delete previous file
            // $destinantion_one = $destinationPath.'thumbnail/'.$product->datasheet;
            // if(File::exists($destinantion_one)){
            //     File::delete($destinantion_one);
            // }
            $datasheet = $request->file('datasheet');
            $datasheetName = time().rand(100, 999999999).'-'.$request->file('datasheet')->getClientOriginalName();
            $datasheet->move($destinationPath, $datasheetName);
            $product->datasheet = $datasheetName;
        }

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->show_on_home = $request->show_on_home ?? 0;
        $product->is_sealable = $request->is_sealable ?? 0;
        $product->buy_link = $request->buy_link ?? null;
        $product->order_no = $request->order_no;
        $product->description = $request->description;
        $product->save();

        return redirect()->route('product.index')->with('success', 'Data updated successfully');
    }

    /**
     * Remove Drawing
     */
    public function remove_drawing($productId)
    {
        if (empty($productId)) {
            abort(404);
        }

        $product = Product::findOrFail($productId);

        // Check if there's actually a drawing to delete
        if (! empty($product->drawing)) {
            $filePath = public_path('uploads/'.$product->drawing);
            // $thumbnailPath = public_path('uploads/thumbnail/' . $product->drawing);

            // Delete main file
            if (File::exists($filePath)) {
                File::delete($filePath);
            }

            // Delete thumbnail if exists
            // if (File::exists($thumbnailPath)) {
            //     File::delete($thumbnailPath);
            // }

            $product->drawing = null;
            $product->save();
        }

        return redirect()->route('product.show', $productId)
            ->with('success', 'Drawing deleted successfully');
    }

    // Remove Datasheet
    public function remove_datasheet($productId)
    {
        if (empty($productId)) {
            abort(404);
        }

        $product = Product::findOrFail($productId);

        // Check if there's actually a datasheet to delete
        if (! empty($product->datasheet)) {
            $filePath = public_path('uploads/'.$product->datasheet);
            // $thumbnailPath = public_path('uploads/thumbnail/' . $product->datasheet);

            // Delete main file
            if (File::exists($filePath)) {
                File::delete($filePath);
            }

            // Delete thumbnail if exists
            // if (File::exists($thumbnailPath)) {
            //     File::delete($thumbnailPath);
            // }

            $product->datasheet = null;
            $product->save();
        }

        return redirect()->route('product.show', $productId)
            ->with('success', 'Datasheet deleted successfully');
    }

    public function change_status($id)
    {
        $product = Product::find($id);
        $product->status = ($product->status == 1) ? 0 : 1;
        $product->save();

        return redirect()->route('product.index')->with('success', 'Status updated successfully');
    }

    public function upload_image($productId)
    {
        $product = Product::find($productId);

        return view('product.upload_image', compact('product'));
    }

    public function store_image(Request $request, $productId)
    {
        $request->validate([
            'order_no' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1024',
        ]);

        $product = Product::find($productId);
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

            $product->productimages()->create([
                'path' => $imageName,
                'order_no' => $request->order_no,
            ]);

            return redirect()->route('product.show', $productId)->with('success', 'Data added successfully');
        }
    }

    public function edit_image($productId, $editId)
    {
        $productimagge = Productimage::find($editId);

        return view('product.edit_image', compact('productimagge'));
    }

    public function update_image(Request $request, $productId)
    {
        $request->validate([
            'order_no' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1024',
        ]);

        $product = Product::find($productId);
        $productImage = Productimage::find($request->editId);
        if ($request->hasfile('image')) {

            // Delete the old image files
            $oldImagePath = public_path('uploads/'.$productImage->path);
            $oldThumbnailPath = public_path('uploads/thumbnails/'.$productImage->path);

            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            if (file_exists($oldThumbnailPath)) {
                unlink($oldThumbnailPath);
            }

            // Handle the new image upload
            $image = $request->file('image');
            $imageName = time().rand(100, 999999999).'-'.$image->getClientOriginalName();
            $destinationPath = public_path('uploads/');
            $image->move($destinationPath, $imageName);

            // Create and save the thumbnail
            $imgManager = new ImageManager(new Driver);
            $thumbImage = $imgManager->read($destinationPath.$imageName);
            $thumbImage->resize(400, 300);
            $thumbdestinationPath = public_path('uploads/thumbnails/');
            $thumbImage->save($thumbdestinationPath.$imageName);

            $productImage->update([
                'path' => $imageName,
                'order_no' => $request->order_no,
            ]);

        } else {
            // Update only the order number if no new image is uploaded
            $productImage->update([
                'order_no' => $request->order_no,
            ]);
        }

        return redirect()->route('product.show', $productId)->with('success', 'Data updated successfully');
    }

    public function combination_add($productId)
    {
        $product = Product::find($productId);

        return view('product.combination_add', compact('product'));
    }

    public function combination_store(Request $request, $productId)
    {
        $request->validate([
            'name' => 'required',
            'order_no' => 'required|numeric',
        ]);

        $product = Product::find($productId);
        $product->combinations()->create([
            'name' => $request->name,
            'order_no' => $request->order_no,
        ]);

        return redirect()->route('product.show', $productId)->with('success', 'Data added successfully');
    }

    public function combination_edit($productId, $editId)
    {
        $product_combination = Productcombination::find($editId);

        return view('product.combination_edit', compact('product_combination'));
    }

    public function combination_update(Request $request, $productId)
    {
        $request->validate([
            'name' => 'required',
            'order_no' => 'required|numeric',
        ]);

        $product_combination = Productcombination::find($request->editId);

        $product_combination->update([
            'name' => $request->name,
            'order_no' => $request->order_no,
        ]);

        return redirect()->route('product.show', $productId)->with('success', 'Data updated successfully');
    }

    // Product combination keyfeature
    public function combination_keyfeature_add($combinationId)
    {
        $keyfeatures = Keyfeature::where('status', 0)->orderby('order_no')->get();

        return view('product.combination_keyfeature_add', compact('keyfeatures', 'combinationId'));
    }

    public function combination_keyfeature_store(Request $request, $combinationId)
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

        $productcombination = Productcombination::find($combinationId);

        $productkeyfeature = new Productkeyfeature;

        $productkeyfeature->product_id = $productcombination->product_id;
        $productkeyfeature->productcombination_id = $productcombination->id;
        $productkeyfeature->keyfeature_id = $request->keyfeature_id;
        $productkeyfeature->value = $request->keyfeature_value;
        $productkeyfeature->order_no = $request->order_no;
        $productkeyfeature->save();

        return redirect()->route('product.show', $productcombination->product_id)->with('success', 'Data added successfully');
    }

    public function combination_keyfeature_edit($editId)
    {
        $productkeyfeature = Productkeyfeature::find($editId);
        $keyfeatures = Keyfeature::where('status', 0)->orderby('order_no')->get();

        return view('product.combination_keyfeature_edit', compact('keyfeatures', 'productkeyfeature'));
    }

    public function combination_keyfeature_update(Request $request, $editId)
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

        $productkeyfeature = Productkeyfeature::find($editId);
        $productkeyfeature->keyfeature_id = $request->keyfeature_id;
        $productkeyfeature->value = $request->keyfeature_value;
        $productkeyfeature->order_no = $request->order_no;
        $productkeyfeature->save();

        return redirect()->route('product.show', $productkeyfeature->product_id)->with('success', 'Data updated successfully');
    }

    public function combination_mountinginfo_add($combinationId)
    {
        $mountinginfos = Mountinginfo::where('status', 0)->orderby('order_no')->get();

        return view('product.combination_mountinginfo_add', compact('mountinginfos', 'combinationId'));
    }

    public function combination_mountinginfo_store(Request $request, $combinationId)
    {
        $request->validate([
            'mountinginfo_id' => 'required',
            'value' => 'required',
            'order_no' => 'required|numeric',
        ], [
            'mountinginfo_id.required' => 'Please select mountinginfo',
            'value.required' => 'Please enter mountinginfo value',
            'order_no.required' => 'Please enter order no',
        ]);

        $productcombination = Productcombination::find($combinationId);

        $productmountinginfo = new Productmountinginfo;

        $productmountinginfo->product_id = $productcombination->product_id;
        $productmountinginfo->productcombination_id = $productcombination->id;
        $productmountinginfo->mountinginfo_id = $request->mountinginfo_id;
        $productmountinginfo->value = $request->value;
        $productmountinginfo->order_no = $request->order_no;
        $productmountinginfo->save();

        return redirect()->route('product.show', $productcombination->product_id)->with('success', 'Data added successfully');
    }

    public function combination_mountinginfo_edit($editId)
    {
        $productmountinginfo = Productmountinginfo::find($editId);
        $mountinginfos = Mountinginfo::where('status', 0)->orderby('order_no')->get();

        return view('product.combination_mountinginfo_edit', compact('mountinginfos', 'productmountinginfo'));
    }

    public function combination_mountinginfo_update(Request $request, $editId)
    {
        $request->validate([
            'mountinginfo_id' => 'required',
            'value' => 'required',
            'order_no' => 'required|numeric',
        ], [
            'mountinginfo_id.required' => 'Please select mountinginfo',
            'value.required' => 'Please enter mountinginfo value',
            'order_no.required' => 'Please enter order no',
        ]);

        $productmountinginfo = Productmountinginfo::find($editId);
        $productmountinginfo->mountinginfo_id = $request->mountinginfo_id;
        $productmountinginfo->value = $request->value;
        $productmountinginfo->order_no = $request->order_no;
        $productmountinginfo->save();

        return redirect()->route('product.show', $productmountinginfo->product_id)->with('success', 'Data updated successfully');
    }

    // Product combination specifications
    public function combination_specification_add($combinationId)
    {
        $specifications = Specification::where('status', 0)->orderby('order_no')->get();

        return view('product.combination_specification_add', compact('specifications', 'combinationId'));
    }

    public function combination_specification_store(Request $request, $combinationId)
    {
        $request->validate([
            'specification_id' => 'required',
            'value' => 'required',
            'order_no' => 'required|numeric',
        ], [
            'specification_id.required' => 'Please select specification',
            'value.required' => 'Please enter specification value',
            'order_no.required' => 'Please enter order no',
        ]);

        $productcombination = Productcombination::find($combinationId);

        $productspecification = new Productspecification;

        $productspecification->product_id = $productcombination->product_id;
        $productspecification->productcombination_id = $productcombination->id;
        $productspecification->specification_id = $request->specification_id;
        $productspecification->value = $request->value;
        $productspecification->order_no = $request->order_no;
        $productspecification->save();

        return redirect()->route('product.show', $productcombination->product_id)->with('success', 'Data added successfully');
    }

    public function combination_specification_edit($editId)
    {
        $productspecification = Productspecification::find($editId);
        $specifications = Specification::where('status', 0)->orderby('order_no')->get();

        return view('product.combination_specification_edit', compact('specifications', 'productspecification'));
    }

    public function combination_specification_update(Request $request, $editId)
    {
        $request->validate([
            'specification_id' => 'required',
            'value' => 'required',
            'order_no' => 'required|numeric',
        ], [
            'specification_id.required' => 'Please select specification',
            'value.required' => 'Please enter specification value',
            'order_no.required' => 'Please enter order no',
        ]);

        $productspecification = Productspecification::find($editId);
        $productspecification->specification_id = $request->specification_id;
        $productspecification->value = $request->value;
        $productspecification->order_no = $request->order_no;
        $productspecification->save();

        return redirect()->route('product.show', $productspecification->product_id)->with('success', 'Data updated successfully');
    }

    // Product combination tsparameter
    public function combination_tsparameter_add($combinationId)
    {
        $tsparameters = Tsparameter::where('status', 0)->orderby('order_no')->get();

        return view('product.combination_tsparameter_add', compact('tsparameters', 'combinationId'));
    }

    public function combination_tsparameter_store(Request $request, $combinationId)
    {
        $request->validate([
            'tsparameter_id' => 'required',
            'value' => 'required',
            'order_no' => 'required|numeric',
        ], [
            'tsparameter_id.required' => 'Please select tsparameter',
            'value.required' => 'Please enter tsparameter value',
            'order_no.required' => 'Please enter order no',
        ]);

        $productcombination = Productcombination::find($combinationId);

        $producttsparameter = new Producttsparameter;

        $producttsparameter->product_id = $productcombination->product_id;
        $producttsparameter->productcombination_id = $productcombination->id;
        $producttsparameter->tsparameter_id = $request->tsparameter_id;
        $producttsparameter->value = $request->value;
        $producttsparameter->order_no = $request->order_no;
        $producttsparameter->save();

        return redirect()->route('product.show', $productcombination->product_id)->with('success', 'Data added successfully');
    }

    public function combination_tsparameter_edit($editId)
    {
        $producttsparameter = Producttsparameter::find($editId);
        $tsparameters = Tsparameter::where('status', 0)->orderby('order_no')->get();

        return view('product.combination_tsparameter_edit', compact('tsparameters', 'producttsparameter'));
    }

    public function combination_tsparameter_update(Request $request, $editId)
    {
        $request->validate([
            'tsparameter_id' => 'required',
            'value' => 'required',
            'order_no' => 'required|numeric',
        ], [
            'tsparameter_id.required' => 'Please select tsparameter',
            'value.required' => 'Please enter tsparameter value',
            'order_no.required' => 'Please enter order no',
        ]);

        $producttsparameter = Producttsparameter::find($editId);
        $producttsparameter->tsparameter_id = $request->tsparameter_id;
        $producttsparameter->value = $request->value;
        $producttsparameter->order_no = $request->order_no;
        $producttsparameter->save();

        return redirect()->route('product.show', $producttsparameter->product_id)->with('success', 'Data updated successfully');
    }

    // Product combination reconkit
    public function combination_reconkit_add($combinationId)
    {
        $reconkits = Reconkit::where('status', 0)->orderby('order_no')->get();

        return view('product.combination_reconkit_add', compact('reconkits', 'combinationId'));
    }

    public function combination_reconkit_store(Request $request, $combinationId)
    {
        $request->validate([
            'reconkit_id' => 'required',
            'value' => 'required',
            'order_no' => 'required|numeric',
        ], [
            'reconkit_id.required' => 'Please select tsparameter',
            'value.required' => 'Please enter tsparameter value',
            'order_no.required' => 'Please enter order no',
        ]);

        $productcombination = Productcombination::find($combinationId);

        $productreconkit = new Productreconkit;

        $productreconkit->product_id = $productcombination->product_id;
        $productreconkit->productcombination_id = $productcombination->id;
        $productreconkit->reconkit_id = $request->reconkit_id;
        $productreconkit->value = $request->value;
        $productreconkit->order_no = $request->order_no;
        $productreconkit->save();

        return redirect()->route('product.show', $productcombination->product_id)->with('success', 'Data added successfully');
    }

    public function combination_reconkit_edit($editId)
    {
        $productreconkit = Productreconkit::find($editId);
        $reconkits = Reconkit::where('status', 0)->orderby('order_no')->get();

        return view('product.combination_reconkit_edit', compact('reconkits', 'productreconkit'));
    }

    public function combination_reconkit_update(Request $request, $editId)
    {
        $request->validate([
            'reconkit_id' => 'required',
            'value' => 'required',
            'order_no' => 'required|numeric',
        ], [
            'reconkit_id.required' => 'Please select tsparameter',
            'value.required' => 'Please enter tsparameter value',
            'order_no.required' => 'Please enter order no',
        ]);

        $productreconkit = Productreconkit::find($editId);
        $productreconkit->reconkit_id = $request->reconkit_id;
        $productreconkit->value = $request->value;
        $productreconkit->order_no = $request->order_no;
        $productreconkit->save();

        return redirect()->route('product.show', $productreconkit->product_id)->with('success', 'Data updated successfully');
    }

    /**
     * Products against category
     **/
    public function category_products($type, $slug)
    {
        $typeId = $this->categoryTypeId($type);

        if (! $typeId) {
            abort(404, 'The type does not exist.');
        }

        $category = Category::where('slug', $slug)
            ->where('type_id', $typeId)
            ->first();

        if (! $category) {
            abort(404, 'The specified category slug does not exist.');
        }

        $pageDescription = SeoMeta::active()
            ->forType(SeoMeta::TypeMainSite)
            ->forPageType(SeoMeta::PageTypeCategory)
            ->forSlug($slug)
            ->value('page_description');

        return view('product.category_wise_product_list', [
            'slug' => $slug,
            'pageDescription' => $pageDescription,
        ]);
    }

    /**
     **  Product public details
     **/
    public function product_public_details($type, $category_slug, $slug)
    {
        $typeId = $this->categoryTypeId($type);

        if (! $typeId) {
            abort(404, 'The type does not exist.');
        }

        $category = Category::where('slug', $category_slug)
            ->where('type_id', $typeId)
            ->first();

        if (! $category) {
            abort(404, 'The specified category does not exist.');
        }

        $product = Product::with([
            'category',
            'productimages' => function ($query) {
                $query->where('status', 0)
                    ->orderBy('order_no');
            },
            'combinations.productkeyfeatures' => function ($query) {
                $query->where('status', 0)
                    ->orderBy('order_no');
            },
            'combinations.productmountinginfos' => function ($query) {
                $query->where('status', 0)
                    ->orderBy('order_no');
            },
            'combinations.productspecifications' => function ($query) {
                $query->where('status', 0)
                    ->orderBy('order_no');
            },
            'combinations.producttsparameters' => function ($query) {
                $query->where('status', 0)
                    ->orderBy('order_no');
            },
            'combinations.productreconkits' => function ($query) {
                $query->where('status', 0)
                    ->orderBy('order_no');
            },
        ])
            ->where('slug', $slug)
            ->where('category_id', $category->id)
            ->first();

        if (! $product) {
            abort(404, 'The specified product does not exist.');
        }

        // Check product exist or not and get specific product details
        return view('product.product_public_details', compact('product', 'type', 'category'));
    }

    private function categoryTypeId(string $type): ?int
    {
        return match ($type) {
            'pro-loudspeaker' => 1,
            'home-loudspeaker' => 2,
            default => null,
        };
    }

    /**
     * Product Compare
     **/
    public function product_compare()
    {
        $cart_items = CartManagement::getCartItems();
        $product_ids = array_column($cart_items, 'productId');
        $combination_ids = array_column($cart_items, 'combinationId');

        $products_with_combinations = Product::with([
            'category',
            'productimages' => function ($query) {
                $query->where('status', 0)
                    ->orderBy('order_no');
            },
            'combinations' => function ($query) use ($combination_ids) {
                // Use whereIn to fetch only the relevant combinations
                $query->whereIn('id', $combination_ids);
            },
            'combinations.productkeyfeatures' => function ($query) {
                $query->where('status', 0)
                    ->orderBy('order_no');
            },
            'combinations.productmountinginfos' => function ($query) {
                $query->where('status', 0)
                    ->orderBy('order_no');
            },
            'combinations.productspecifications' => function ($query) {
                $query->where('status', 0)
                    ->orderBy('order_no');
            },
            'combinations.producttsparameters' => function ($query) {
                $query->where('status', 0)
                    ->orderBy('order_no');
            },
            'combinations.productreconkits' => function ($query) {
                $query->where('status', 0)
                    ->orderBy('order_no');
            },
        ])->whereIn('id', $product_ids)  // Use whereIn for product IDs
            ->get();

        $productCombinations = [];
        foreach ($products_with_combinations as $product) {
            foreach ($product->combinations as $combination) {
                $productCombinations[] = [
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'combination_id' => $combination->id,
                    'combination_name' => $combination->display_name,
                ];
            }
        }

        // Organize all data with N/A handling
        $keyfeatures = $this->organizeWithNA($products_with_combinations, 'productkeyfeatures', 'keyfeature', $productCombinations);
        $specifications = $this->organizeWithNA($products_with_combinations, 'productspecifications', 'specification', $productCombinations);
        $mountinginfos = $this->organizeWithNA($products_with_combinations, 'productmountinginfos', 'mountinginfo', $productCombinations);
        $tsparameters = $this->organizeWithNA($products_with_combinations, 'producttsparameters', 'tsparameter', $productCombinations);
        $reconkits = $this->organizeWithNA($products_with_combinations, 'productreconkits', 'reconkit', $productCombinations);

        return view('product.compare_details', [
            'products_with_combinations' => $products_with_combinations,
            'keyfeatures' => $keyfeatures,
            'specifications' => $specifications,
            'mountinginfos' => $mountinginfos,
            'tsparameters' => $tsparameters,
            'reconkits' => $reconkits,
        ]);
    }

    // Function to organize data with N/A for missing values
    public function organizeWithNA($products_with_combinations, $relation, $relationName, $productCombinations)
    {
        $organized = [];

        // First collect all possible items (specs/features/etc)
        $allItems = [];
        foreach ($products_with_combinations as $product) {
            foreach ($product->combinations as $combination) {
                foreach ($combination->$relation as $item) {
                    $allItems[$item->$relationName->name] = true;
                }
            }
        }

        // For each item, ensure all product-combinations are represented
        foreach (array_keys($allItems) as $itemName) {
            $organized[$itemName] = [];

            foreach ($productCombinations as $pc) {
                $found = false;

                // Find the matching product and combination
                foreach ($products_with_combinations as $product) {
                    if ($product->id == $pc['product_id']) {
                        foreach ($product->combinations as $combination) {
                            if ($combination->id == $pc['combination_id']) {
                                // Check if this combination has the item
                                foreach ($combination->$relation as $item) {
                                    if ($item->$relationName->name == $itemName) {
                                        $organized[$itemName][] = [
                                            'product_name' => $pc['product_name'],
                                            'combination_name' => $pc['combination_name'],
                                            'value' => $item->value,
                                        ];
                                        $found = true;
                                        break 3; // break out of all nested loops
                                    }
                                }
                            }
                        }
                    }
                }

                if (! $found) {
                    $organized[$itemName][] = [
                        'product_name' => $pc['product_name'],
                        'combination_name' => $pc['combination_name'],
                        'value' => 'N/A',
                    ];
                }
            }
        }

        return $organized;
    }

    /**
     * Product Enquiry
     **/
    public function product_enquiry(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'whatsapp_no' => 'required|numeric|digits_between:10,15',
            'email' => 'required|email|max:255',
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'location' => 'required|string|max:255',
            'comments' => 'nullable|string',
            'recaptcha_token' => 'required',
        ], [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a valid string.',
            'name.max' => 'The name may not be greater than 255 characters.',

            'whatsapp_no.required' => 'The WhatsApp number is required.',
            'whatsapp_no.numeric' => 'The WhatsApp number must be numeric.',
            'whatsapp_no.digits_between' => 'The WhatsApp number must be between 10 and 15 digits.',

            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.max' => 'The email may not be greater than 255 characters.',

            'product_name.required' => 'The product name is required.',
            'product_name.string' => 'The product name must be a valid string.',
            'product_name.max' => 'The product name may not be greater than 255 characters.',

            'quantity.required' => 'The quantity is required.',
            'quantity.integer' => 'The quantity must be an integer.',
            'quantity.min' => 'The quantity must be at least 1.',

            'location.required' => 'The location is required.',
            'location.string' => 'The location must be a valid string.',
            'location.max' => 'The location may not be greater than 255 characters.',
        ]);

        $recaptchaResponse = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $request->recaptcha_token,
        ]);

        $recaptchaData = $recaptchaResponse->json();

        if (! $recaptchaData['success'] || $recaptchaData['score'] < 0.5) {
            return back()->withErrors(['recaptcha' => 'reCAPTCHA verification failed. Please try again.']);
        }

        $productenquiry = new Productenquiry;
        $productenquiry->name = $request->name;
        $productenquiry->email = $request->email;
        $productenquiry->whatsapp_no = $request->whatsapp_no;
        $productenquiry->product_name = $request->product_name;
        $productenquiry->quantity = $request->quantity;
        $productenquiry->location = $request->location;
        $productenquiry->comments = $request->comments;
        $productenquiry->save();

        Mail::to('satnam1122@gmail.com')->send(new ProductenquiryMail($productenquiry)); // Sending email to admin

        $msg = sprintf(
            "Name: %s\nEmail: %s\nWhatsapp No: %s\nProduct Name: %s\nEnquiry for: %s\nLocation: %s\nComments: %s",
            $productenquiry->name,
            $productenquiry->email ?? 'N/A',
            $productenquiry->whatsapp_no ?? 'N/A',
            $productenquiry->product_name ?? 'N/A',
            $productenquiry->quantity ?? 'N/A',
            $productenquiry->location ?? 'N/A',
            $productenquiry->comments ?? 'N/A'
        );

        $redirect_link = 'https://wa.me/917044411800?text='.urlencode($msg);
        // return redirect()->away($redirect_link);
        // return redirect()->route('product.enquiry')->with('success', 'Your requirement added successfully');

        return redirect()->route('product.enquiry.success')->with('whatsapp_link', $redirect_link);
    }

    /**
     **  All product enquiries for admin panel
     **/
    public function all_product_enquiries()
    {
        $productenquiries = Productenquiry::orderBy('created_at', 'desc')->get();

        return view('product.enquiry_list', compact('productenquiries'));
    }

    /**
     **  Delete product enquiry for admin panel
     **/
    public function delete_product_enquiry($id)
    {
        $productenquiry = Productenquiry::findOrFail($id);
        $productenquiry->delete();

        return redirect()->route('product.enquiry.list')->with('success', 'Enquiry deleted successfully');
    }

    /**
     * Application for dealership
     **/
    public function application_for_dealership(Request $request)
    {
        $validatedData = $request->validate([
            'organisation_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'address' => 'required|string',
            'mobile_no' => 'required|numeric|digits_between:10,15',
            'speaker' => 'required|array|min:1',
            'speaker.*' => 'string|in:PRO LOUDSPEAKER,HOME LOUDSPEAKER',
            'recaptcha_token' => 'required',
        ], [
            'organisation_name.required' => 'The organisation name field is required.',
            'organisation_name.string' => 'The organisation name must be a valid string.',
            'organisation_name.max' => 'The organisation name may not be greater than 255 characters.',

            'contact_person.required' => 'The contact person field is required.',
            'contact_person.string' => 'The contact person must be a valid string.',
            'contact_person.max' => 'The contact person may not be greater than 255 characters.',

            'address.required' => 'The address field is required.',
            'address.string' => 'The address must be a valid string.',

            'mobile_no.required' => 'The mobile number is required.',
            'mobile_no.numeric' => 'The mobile number must be numeric.',
            'mobile_no.digits_between' => 'The mobile number must be between 10 and 15 digits.',

            'speaker.required' => 'Please select at least one speaker type.',
            'speaker.array' => 'The speaker selection must be an array.',
            'speaker.*.string' => 'Each speaker type must be a valid string.',
            'speaker.*.in' => 'The selected speaker type is invalid.',
        ]);

        if (! app()->environment(['local', 'testing'])) {
            $recaptchaResponse = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => config('services.recaptcha.secret_key'),
                'response' => $request->recaptcha_token,
            ]);

            $recaptchaData = $recaptchaResponse->json();

            if (! $recaptchaResponse->successful() || ! ($recaptchaData['success'] ?? false) || ($recaptchaData['score'] ?? 0) < 0.5) {
                return back()->withErrors(['recaptcha' => 'reCAPTCHA verification failed. Please try again.']);
            }
        }

        $applicationDealership = new Applicatiodealership;
        $applicationDealership->organisation_name = $request->organisation_name;
        $applicationDealership->contact_person = $request->contact_person;
        $applicationDealership->address = $request->address;
        $applicationDealership->mobile_no = $request->mobile_no;
        $applicationDealership->speaker = implode(',', $request->speaker); // Store as a comma-separated string
        $applicationDealership->save();

        Mail::to('satnam1122@gmail.com')->send(new ApplicationfordealershipMail($applicationDealership)); // Sending email to admin

        $msg = sprintf(
            "Organisation Name: %s\nContact Person: %s\nAddress: %s\nMobile No: %s\nInterested In: %s",
            $applicationDealership->organisation_name,
            $applicationDealership->contact_person ?? 'N/A',
            $applicationDealership->address ?? 'N/A',
            $applicationDealership->mobile_no ?? 'N/A',
            $applicationDealership->speaker ?? 'N/A'
        );

        $redirect_link = 'https://wa.me/917044411800?text='.urlencode($msg);

        return redirect()->route('application.dealership.success')->with('whatsapp_link', $redirect_link);
    }

    /**
     **  All applications for dealerships
     **/
    public function all_applications_for_dealership()
    {
        $applicationDealerships = Applicatiodealership::orderBy('created_at', 'desc')->get();

        return view('product.applications_for_dealership_list', compact('applicationDealerships'));
    }

    /**
     * Contact Us
     **/
    public function contact_us_store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric|digits_between:10,15',
            'subject' => 'required|string|max:255',
            'message' => 'nullable|string',
            'recaptcha_token' => 'required',
        ], [
            'name.required' => 'The organisation name field is required.',
            'name.string' => 'The organisation name must be a valid string.',
            'name.max' => 'The organisation name may not be greater than 255 characters.',

            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.max' => 'The email may not be greater than 255 characters.',

            'phone.required' => 'The mobile number is required.',
            'phone.numeric' => 'The mobile number must be numeric.',
            'phone.digits_between' => 'The mobile number must be between 10 and 15 digits.',

            'subject.required' => 'The subject is required.',
            'subject.string' => 'The subject must be a valid string.',
            'subject.max' => 'The subject may not be greater than 255 characters.',
        ]);

        $recaptchaResponse = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $request->recaptcha_token,
        ]);

        $recaptchaData = $recaptchaResponse->json();

        if (! $recaptchaData['success'] || $recaptchaData['score'] < 0.5) {
            return back()->withErrors(['recaptcha' => 'reCAPTCHA verification failed. Please try again.']);
        }

        $contactus = new Contactus;
        $contactus->name = $request->name;
        $contactus->email = $request->email;
        $contactus->phone = $request->phone;
        $contactus->subject = $request->subject;
        $contactus->message = $request->message;
        $contactus->save();

        Mail::to('satnam1122@gmail.com')->send(new ContactusMail($contactus)); // Sending email to admin

        // WhatsApp Redirect Link (Proper Encoding)
        $msg = sprintf(
            "Name: %s\nPhone: %s\nEmail: %s\nSubject: %s\nMessage: %s",
            $contactus->name,
            $contactus->phone,
            $contactus->email,
            $contactus->subject,
            $contactus->message ?? 'N/A'
        );

        $redirect_link = 'https://wa.me/917044411800?text='.urlencode($msg);

        return redirect()->route('contact.us.success')->with('whatsapp_link', $redirect_link);
    }

    /**
     * All Contact Us
     **/
    public function all_contact_us()
    {
        $contactuses = Contactus::orderBy('created_at', 'desc')->get();

        return view('product.contact_us_list', compact('contactuses'));
    }

    /**
     * All product reviews
     **/
    public function all_reviews()
    {
        $productreviews = Productreview::with('product')->get();

        return view('product.all_review_list', compact('productreviews'));
    }

    /**
     * Change review status
     **/
    public function change_review_status($id)
    {
        $productreview = Productreview::find($id);
        $productreview->status = ($productreview->status == 1) ? 0 : 1;
        $productreview->save();

        return redirect()->route('all.product.review')->with('success', 'Status updated successfully');
    }
}
