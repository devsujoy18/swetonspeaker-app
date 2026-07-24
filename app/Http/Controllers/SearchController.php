<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request): View
    {
        $category = $request->string('category')->toString();
        $productName = $request->string('product_name')->trim()->toString();
        $categoryType = $this->categoryType($category);

        $products = Product::query()
            ->select(['id', 'name', 'slug', 'category_id', 'order_no', 'status', 'is_sealable', 'buy_link'])
            ->with([
                'category:id,name,slug,type_id',
                'productimages' => function ($query): void {
                    $query->select(['id', 'product_id', 'path', 'order_no'])
                        ->orderBy('order_no')
                        ->limit(1);
                },
                'combinations' => function ($query): void {
                    $query->select(['id', 'product_id', 'name', 'order_no'])
                        ->orderBy('order_no');
                },
                'combinations.productkeyfeatures' => function ($query): void {
                    $query->select(['id', 'product_id', 'productcombination_id', 'keyfeature_id', 'value', 'order_no', 'status'])
                        ->where('status', 0)
                        ->orderBy('order_no');
                },
                'combinations.productkeyfeatures.keyfeature:id,name',
            ])
            ->where('status', 0)
            ->when($categoryType, function ($query, int $categoryType): void {
                $query->whereRelation('category', 'type_id', $categoryType);
            })
            ->when($productName !== '', function ($query) use ($productName): void {
                $query->where('name', 'LIKE', "%{$productName}%");
            })
            ->orderBy('order_no')
            ->simplePaginate(12)
            ->withQueryString();

        return view('search_results', compact('products', 'category', 'productName'));
    }

    private function categoryType(string $category): ?int
    {
        return match ($category) {
            'pro-loudspeaker' => 1,
            'home-loudspeaker' => 2,
            default => null,
        };
    }
}
