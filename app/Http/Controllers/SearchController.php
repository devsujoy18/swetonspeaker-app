<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $category = $request->input('category');
        $productName = $request->input('product_name');
        
        //$category = $category == 'pro-loudspeaker' ? 1 : 2;
        $categoryType = $category == 'pro-loudspeaker' ? 1 : ($category == 'home-loudspeaker' ? 2 : null);
        
        $query = Product::with([ 
            'category', 
            'productimages' => function ($query) { 
                $query->orderBy('order_no', 'asc')->take(1); 
            }, 
            'combinations.productkeyfeatures' => function ($query) { 
                $query->where('status', 0)->orderBy('order_no'); 
            },
            ]) 
            ->where('status', 0) 
            ->orderBy('order_no');
        
        if ($categoryType) {
            $query->whereHas('category', function($q) use ($categoryType) {
                $q->where('type_id', $categoryType);
            });
        }
        
        if ($productName) {
            $query->where('name', 'LIKE', '%' . $productName . '%');
        }
        
        $products = $query->get();
        
        return view('search_results', compact('products'));
    }
}
