<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DiscountCoupons;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class DiscountCouponsController extends Controller
{

    public function index() {

        $discount = DiscountCoupons::latest()->paginate(10);
        $data['discount'] = $discount;
        return view('Admin.discount.list', $data);

    }

    public function create() {

        return view('Admin.discount.create');
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'type' => 'required',
            'discount_amount' => 'required|numeric',
            'status' => 'required',
            'starts_at' => 'required|date',
            'expires_at' => 'required|date|after:starts_at',
        ]);

        if($validator->passes()) {

            $discount = new DiscountCoupons();
            $discount->code = $request->code;
            $discount->name = $request->name;
            $discount->description = $request->description;
            $discount->max_uses = $request->max_uses;
            $discount->max_uses_user = $request->max_uses_user;
            $discount->type = $request->type;
            $discount->discount_amount = $request->discount_amount;
            $discount->min_amount = $request->min_amount;
            $discount->status = $request->status;
            $discount->starts_at = $request->starts_at;
            $discount->expires_at = $request->expires_at;
            $discount->save();

            return response()->json([
                'status' => true,
                'message' => 'Discount coupon created successfully',
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function edit($id) {

        $discount = DiscountCoupons::find($id);
        if(!empty($discount)) {
            return view('Admin.discount.edit', compact('discount'));

        } else {
            return redirect()->route('discountCoupons');
        }
    }

    public function update(Request $request, $id) {

        $discount = DiscountCoupons::find($id);

        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'type' => 'required',
            'discount_amount' => 'required|numeric',
            'status' => 'required',
            'starts_at' => 'required|date',
            'expires_at' => 'required|date|after:starts_at',
        ]);

        if($validator->passes()) {

            $discount->code = $request->code;
            $discount->name = $request->name;
            $discount->description = $request->description;
            $discount->max_uses = $request->max_uses;
            $discount->max_uses_user = $request->max_uses_user;
            $discount->type = $request->type;
            $discount->discount_amount = $request->discount_amount;
            $discount->min_amount = $request->min_amount;
            $discount->status = $request->status;
            $discount->starts_at = $request->starts_at;
            $discount->expires_at = $request->expires_at;
            $discount->save();

            return response()->json([
                'status' => true,
                'message' => 'Discount coupon updated successfully',
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function destroy($id) {

        $discount = DiscountCoupons::find($id);
        $discount->delete();

        return response()->json([
           'status' => true,
           'message' => 'Discount coupon deleted successfully',
        ]);
    }
}
