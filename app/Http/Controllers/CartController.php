<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\DiscountCoupons;
use App\Models\orderItems;
use App\Models\orders;
use App\Models\Product;
use App\Models\ShippingCharges;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
                // $total = Cart::update($rowId, $qty)->subtotal();
                $message = 'Cart Updated Successfully';

            } else {
                $status = false;
                $message = 'Requested Quantity ('.$qty.') not available in stock';
            }
        }

        // Cart::update($rowId, $qty); // Will update the quantity
        return response()->json([
            'status' => $status,
            // 'total' => Cart::update($rowId, $qty)->subtotal(),
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

    public function create() {
        $discount = 0;

        if (Cart::count() == 0) {
            return redirect()->route('cart');
        }

        if (Auth::check() == false) {

            if (!session()->has('url.intended')) {
                session(['url.intended' => url()->current()]);
            }

            return redirect()->route('user.login');
        }

        session()->forget('url.intended');

        $countries = Country::orderBy('name', 'ASC')->get();
        $customerAddress = orders::where('user_id', Auth::user()->id)->first();

        // apply shipping.
        $userCountry = $customerAddress->country_id;
        $shippingInfo = ShippingCharges::where('country_id', $userCountry)->first();

        $totalQty = 0;
        $totalShippingCharge = 0;
        $grandTotal = 0;

        foreach (Cart::content() as $item) {
            $totalQty += $item->qty;
        }

        $totalShippingCharge = $shippingInfo->amount;
        $grandTotal = Cart::subtotal('2','.','')+$totalShippingCharge;

        $data['countries'] = $countries;
        $data['customerAddress'] = $customerAddress;
        $data['totalShippingCharge'] = $totalShippingCharge;
        $data['discount'] = $discount;
        $data['grandTotal'] = $grandTotal;

        return view('frontend.checkout', $data);

    }


    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
             'lastName' => 'required',
             'email' => 'required|email',
             'phone' => 'required|max:11',
             'country' => 'required',
             'address' => 'required',
             'apartment' => 'required',
             'city' => 'required',
             'state' => 'required'
        ]);

        if ($validator->passes()) {

            $user = Auth::user();

            $shipping = 0;
            $discount = 0;
            $subTotal = Cart::subtotal(2, '.', '');

            $shippingInfo = ShippingCharges::where('country_id', $request->country)->first();
            $totalQty = 0;
    
            foreach (Cart::content() as $item) {
                $totalQty += $item->qty;
            }
    
            $shipping = $shippingInfo->amount;
            $grandTotal = $subTotal+$shipping;

            if ($request->payment_method == 'cod') {

                $orders = new orders;
                $orders->subtotal = $subTotal;
                $orders->shipping = $shipping;
                $orders->grand_total = $grandTotal;
                $orders->payment_status = 'unpaid';
                $orders->status = 'pending';
    
                $orders->user_id = $user->id;
                $orders->first_name = $request->firstName;
                $orders->last_name = $request->lastName;
                $orders->email = $request->email;
                $orders->phone = $request->phone;
                $orders->company = $request->company;
                $orders->country_id = $request->country;
                $orders->address = $request->address;
                $orders->apartment = $request->apartment;
                $orders->city = $request->city;
                $orders->state = $request->state;
                $orders->save();

                //store order Item.
                foreach(Cart::content() as $item) {

                    $orderItems = new orderItems;
                    $orderItems->product_id = $item->id;
                    $orderItems->orders_id = $orders->id;
                    $orderItems->name = $item->name;
                    $orderItems->qty = $item->qty;
                    $orderItems->price = $item->price;
                    $orderItems->total = $item->price*$item->qty;
                    $orderItems->save();
                }
            }

            Cart::destroy();

            return response()->json([
                'status' => true,
                'message' => 'Thankyou for your order'
            ]);

        } else {

            return response()->json([
                'message' => 'Please fix these errors',
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function applyDiscountCoupons(Request $request) {

        $code = DiscountCoupons::where('code', $request->code)->first();
        if($code == null) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid coupon code',
            ]);
        }

        // Check if coupons start date & expire date is valid aur not.
        $now = Carbon::now();

        if ($code->starts_at != null) {
            $startDate = Carbon::createFromFormat('Y-m-d H:i:s', $code->starts_at);

            if ($now->lessThan($startDate)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid discountCoupon code'
                ]);
            }
        }

        if ($code->expires_at != null) {
            $expireDate = Carbon::createFromFormat('Y-m-d H:i:s', $code->expires_at);

            if ($now->greaterThan($expireDate)) {
                return response()->json([
                    'status' => false,
                    'message' => 'The Coupon Code Is Expired'
                ]);
            }
        }

        session()->put('code', $code);

        // To Be Continued...
    }



}
