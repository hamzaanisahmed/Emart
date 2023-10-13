<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    public function create() {

        $categories = Category::orderBy('name', 'ASC')->get();
        return view('Admin.sub_categories.create', compact('categories'));
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:sub_categories',
            'category' => 'required',
        ]);

        if ($validator->passes()) {

            // Insert Query.

            $subcategory = new SubCategory();
            $subcategory->name = $request->name;
            $subcategory->slug = $request->slug;
            $subcategory->status = $request->status;
            $subcategory->homepage = $request->homepage;
            $subcategory->category_id = $request->category;
            $subcategory->save();

            $request->session()->flash('success', 'SubCategory Added Succesfuly');

            return response()->json([
                'status' => true,
                'message' => 'SubCategory Added Succesfuly'
            ]);

        } else {

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

    }

      public function list(Request $request) {

        $subcategories = SubCategory::select('sub_categories.*','categories.name as categoryName')->latest()
        ->leftJoin('categories', 'categories.id', 'sub_categories.category_id')->paginate(10);
        
        return view('Admin.sub_categories.list', compact('subcategories'));

    }

    public function edit($id, Request $request) {

        $subcategories = SubCategory::find($id);
        $category = Category::all();

        return response()->json([
            'status' => true,
            'subcategory' => $subcategories,
            'category' => $category,

        ]);


    }


    public function update($subcategoryId, Request $request) {

        $subcategory = SubCategory::find($subcategoryId);
        if(empty($subcategory)) {

            return response()->json([
                'status' => false,
                'message' => 'Subcategory Not Found'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:sub_categories,slug,'.$subcategory->id.',id'

        ]);

        if($validator->passes()) {

            $subcategory->name = $request->input('name');
            $subcategory->slug = $request->input('slug');
            $subcategory->status = $request->input('status');
            $subcategory->homepage = $request->input('homepage');
            $subcategory->category_id = $request->input('category');
            $subcategory->save();

            $request->session()->flash('success', 'Subcategory Updated Successfully');

            return response()->json([
                'status' => true,
                'message' => 'Subcategory Has Been Updated Successfully'
            ]);

        } else {

            $request->session()->flash('error', 'Subcategory Not Found');

            return response()->json([
                'status' => false,
                'errors' => $validator->errors()

            ]);
        }

    }


    public function destroy($subcategoryId, Request $request) {

        $subcategory = SubCategory::find($subcategoryId);

        if (empty($subcategory)) {

            $request->session()->flash('error', 'SubCategory Not Found');

            return response()->json([

                'status' => true,
                'message' => 'SubCategory Not Found',
            ]);
        }

        $subcategory->delete();

        $request->session()->flash('success', 'SubCategory Has Been Deleted');

        return response()->json([

            'status' => true,
            'message' => 'SubCategory Has Been Deleted',
        ]);

    }


}
