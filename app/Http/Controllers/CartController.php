<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request) {

        $product = Product::with('product_images')->find($request->id);

        if ($product == null) {

            return response()->json([
                'status' => false,
                'message' => 'product not found'
            ]);
        }

        if (Cart::count() > 0) {

            $cartContent = Cart::content();
            $productAlreadyExist = false;

            foreach ($cartContent as $item) {

                if ($item->id == $product->id) {
                    $productAlreadyExist = true;
                }
            }

            if ($productAlreadyExist == false) {

                Cart::add($product->id, $product->title, 1, $product->price, ['productImage' =>
                (!empty($product->product_images) ? $product->product_images->first() : '')]);

                $status = true;
                $message = $product->title.' SuccessFully Added In Cart';

            } else {

                $status = false;
                $message = $product->title.' Already Added In Cart';
            }

        } else {

            Cart::add($product->id, $product->title, 1, $product->price, ['productImage' => (
                !empty($product->product_images) ? $product->product_images->first() : '')]);

            $status = true;
            $message = $product->title.' SuccessFully Added In Cart';
        }

        return response()->json([
            'status' => $status,
            'message' => $message
        ]);

    }

    public function cart() {

        // dd(Cart::content());
        $cartContent = Cart::content();
        $data['cartContent'] = $cartContent;

        return view('frontend.cart', $data);
    }


    public function updateCart(Request $request) {

        $rowId = $request->rowId;
        $qty = $request->qty;

        $productInfo = Cart::get($rowId);
        $product = Product::find($productInfo->id);

        if ($product->track_qty == 'Yes') {

            if ($qty <= $product->qty) {
                Cart::update($rowId, $qty); // Will update the quantity

                $status = true;
                $message = 'Cart Updated Successfully';

            } else {
                $status = false;
                $message = 'Requested Quantity ('.$qty.') not available in stock';
            }
        }

        // Cart::update($rowId, $qty); // Will update the quantity

        return response()->json([
            'status' => $status,
            'message' => $message
        ]);


    }


    public function destroyCart(Request $request) {

        $productInfo = Cart::get($request->rowId);

        if ($productInfo == null) {
            $message = 'Product not found in cart';

            return response()->json([
                'status' => false,
                'message' => $message
            ]);
        }

        Cart::remove($request->rowId);

        $message = 'Product remove from cart successfully';

        return response()->json([
            'status' => true,
            'message' => $message
        ]);

    }
}
