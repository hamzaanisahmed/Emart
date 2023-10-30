<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\ShippingCharges;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShippingChargesController extends Controller
{

    public function index() {

        $countries = Country::get();

        return view('Admin.shipping.shipping', compact('countries'));
    }

    public function list() {

        $shippping = ShippingCharges::all();
        $countries = Country::get();

        return response()->json([
            'shipping' => $shippping,
            'countries' => $countries
        ]);
    }


    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'country' => 'required',
            'amount' => 'required',
        ]);

        if ($validator->passes()) {

            $shipping = new ShippingCharges();

            $shipping->country_id = $request->country;
            $shipping->amount = $request->amount;
            $shipping->save();

            return response()->json([
                'status' => true,
                'message' => "Shippping Charges Added Successfully"
            ]);


        } else {

            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

    }



    public function edit($id) {

        $shipping = ShippingCharges::find($id);

        if ($shipping) {

            return response()->json([
                'status' => true,
                'shipping' => $shipping
            ]);

        } else {

            return response()->json([
                'status' => false,
                'message' => 'Shipping Charges Not Found'
            ]);
        }
    }


    public function update($id, Request $request) {

        $shipping = ShippingCharges::find($id);

        if(empty($shipping)) {

            return response()->json([
                'status' => false,
                'message' => 'Shipping Charges Not Found'
            ]);

        }

        $validator = Validator::make($request->all(), [
            'country' => 'required',
            'amount' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);

        } else {

            $shipping = ShippingCharges::find($id);

            $shipping->country_id = $request->input('country');
            $shipping->amount = $request->input('amount');
            $shipping->update();

            return response()->json([
                'status' => true,
                'message' => 'Shipping Charges Added Successfully'
            ]);
        }

    }



    public function destroy($id) {

        $shipping = ShippingCharges::find($id);
        $shipping->delete();

        return response()->json([
            'status' => true,
            'message' => 'Shipping Charges Delete Successfully'
        ]);

    }


}
