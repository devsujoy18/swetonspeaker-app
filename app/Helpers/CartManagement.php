<?php

namespace App\Helpers;

use App\Models\Product;
use App\Models\Productcombination;
use Illuminate\Support\Facades\Session;

class CartManagement
{
    // Add items to cart
    public static function addItemsToCart($productId, $combinationId)
    {
        $cart_items = Session::get('cart_items', []);
        $existing_item = null;
        $message = '';

        // Check if the item already exists in the cart
        foreach ($cart_items as $key => $item) {
            if ($item['productId'] == $productId && $item['combinationId'] == $combinationId) {
                $existing_item = $key;
                break;
            }
        }

        if ($existing_item !== null) {
            $message = 'Item already exists in the compare list.';
        } elseif (count($cart_items) >= 3) {
            // If cart has reached the maximum limit of 3 items
            $message = 'Compare list is full. Maximum 3 items allowed.';
        } else {
            // Fetch the product with the specific combination
            $product = Product::with([
                'category',
                'combinations' => function ($query) use ($combinationId) {
                    $query->where('id', $combinationId);
                },
            ])
                ->where('status', 0)
                ->where('id', $productId)
                ->first();

            // If product exists, add it to the cart
            if ($product) {
                $combination = $product->combinations->first();
                $cart_items[] = [
                    'productId' => $productId,
                    'combinationId' => $combinationId,
                    'product_name' => $product->name,
                    'combination' => $combination->display_name,
                ];

                // Set success message
                $message = 'Item added to compare list successfully.';
            }
        }

        // Update the cart in the session
        Session::put('cart_items', $cart_items);

        // Return the count of items in the cart along with the message
        return [
            'cart_count' => count($cart_items),
            'message' => $message,
        ];
    }

    public static function getTotalItemsInCart()
    {
        $cart_items = Session::get('cart_items', []);

        return count($cart_items);
    }

    public static function removeItemFromCart($productId, $combinationId)
    {
        // Get the current cart items from the session
        $cart_items = Session::get('cart_items', []);

        // Search for the item with the matching productId and combinationId
        foreach ($cart_items as $key => $item) {
            if ($item['productId'] == $productId && $item['combinationId'] == $combinationId) {
                // Remove the item from the cart
                unset($cart_items[$key]);
                break;
            }
        }

        // Re-index the array to remove gaps
        $cart_items = array_values($cart_items);

        // Save the updated cart back to the session
        Session::put('cart_items', $cart_items);
    }

    // Clear all cart items
    public static function clearCartItems()
    {
        Session::forget('cart_items');
    }

    // Get all cart items
    public static function getCartItems()
    {
        return array_map(function (array $item): array {
            if (isset($item['combination'])) {
                $item['combination'] = Productcombination::formatCombinationName($item['combination']);
            }

            return $item;
        }, Session::get('cart_items', []));
    }
}
