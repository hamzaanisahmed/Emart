<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brands;
use Validator;

class BrandsController extends Controller
{

    public function index() {

        return view('Admin.brands.brand');
    }

    public function fetch() {

        $brands = Brands::all();
        return response()->json([
            'brands' => $brands,
        ]);
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:brands',
        ]);

        if($validator->fails()) {

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);

        } else {

            $brands = new Brands;
            $brands->name = $request->input('name');
            $brands->slug = $request->input('slug');
            $brands->status = $request->input('status');
            $brands->save();

            return response()->json([
                'status' => true,
                'message' => 'Brands Added Successfully'
            ]);
        }

    }


    public function edit($id) {

        $brands = Brands::find($id);

        if($brands) {

            return response()->json([
                'status' => true,
                'brands' => $brands
            ]);

        } else{

            return response()->json([
                'status' => false,
                'message' => 'Brands Not Found'
            ]);

        }
    }

    public function update($id, Request $request) {

        $brands = Brands::find($id);

        if(empty($brands)) {

            return response()->json([
                'status' => false,
                'message' => 'Brands Not Found'
            ]);

        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:brands,slug,'.$brands->id.',id'
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);

        } else {

            $brands = Brands::find($id);

            $brands->name = $request->input('name');
            $brands->slug = $request->input('slug');
            $brands->status = $request->input('status');
            $brands->update();

            return response()->json([
                'status' => true,
                'message' => 'Brands Added Successfully'
            ]);
        }

    }


    public function destroy($id) {

        $brands = Brands::find($id);
        $brands->delete();

        return response()->json([
            'status' => true,
            'message' => 'Brands Delete Successfully',
        ]);

    }

}
