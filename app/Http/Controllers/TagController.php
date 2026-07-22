<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Tag;

class TagController extends Controller
{
	/**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tag.index');
    }
    
    /**
     * Public tags products
     **/
    public function search(Request $request){

        $tag = request('tag'); // slug from query parameter
        
        $searchedTag = Tag::where('slug', $tag)->first();

        $query = Product::query()
            ->with([
                'tags',
                'category',
                'productimages' => function ($query) {
                    $query->orderBy('order_no', 'asc')->take(1);
                },
                'combinations.productkeyfeatures' => function ($query) {
                    $query->where('status', 0)->orderBy('order_no');
                },
            ])
            ->where('status', 0)
            ->when($tag, function ($query) use ($tag) {
                $query->whereHas('tags', function ($q) use ($tag) {
                    $q->where('slug', $tag)
                      ->where('status', 0);
                });
            })
            ->orderBy('order_no');

        $products = $query->get();

        return view('tag_results', compact('products', 'searchedTag'));
    }
}
