<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;


class categoryController extends Controller
{

    // ---- Create Category ----
    // Function to show the create category view

    public function create()
    {
        return view('Admin.categories.create');
    }
    // -----


    // ---- Store Category ----
    // Function to store a new category

    public function store(Request $request)
    {
        //---- Form validation
        // Form validation using Laravel's Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:categories',

        ]);

        if ($validator->passes()) {

            $category = new Category();
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->status = $request->status;
            $category->homepage = $request->homepage;
            $category->save();

            // Save Image Here
            if (!empty($request->image_id)) {

                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.', $tempImage->name);
                $ext = last($extArray);

                $newImageName = $category->id . '.' . $ext;
                $sPath = public_path() . '/tempary/' . $tempImage->name;
                $dPath = public_path() . '/uploads/categories/' . $newImageName;
                File::copy($sPath, $dPath);

                //Generate image thumbnail with image intervention library
                $dPath = public_path() . '/uploads/categories/thumbnail/' . $newImageName;
                $img = Image::make($sPath);
                $img->resize(450, 600);
                $img->save($dPath);

                $category->image = $newImageName;
                $category->save();

            }

            // session msg
            $request->session()->flash('success', 'Category Added Succesfuly');

            // Return a JSON response indicating success
            return response()->json([
                'status' => true,
                'message' => "Category Added Successfully"
            ]);


        } else {
            // If form validation fails, return a JSON response with validation errors
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
    // -----

    // list category
    public function list(Request $request)
    {
        $categories = Category::latest();
        $categories = $categories->paginate(10);

        return view('Admin.categories.list', compact('categories'));
    }


    // --- Edit Category.

    public function edit($id) {

        $category = Category::find($id);

        return response()->json([
            'status' => true,
            'notFound' => true,
            'category' => $category,
        ]);

    }

    // ---- Update Category

    public function update($categoryId, Request $request) {

        $category = Category::find($categoryId);

        if(empty($category)) {
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => 'category not found'
            ]);
        }

        //---- Form validation
        // Form validation using Laravel's Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$category->id.'id',

        ]);

        // ---- Insert Query
        // If the form validation passes, execute the insert query

        if ($validator->passes()) {

            // Update the category model with new data
            $category->name = $request->input('name');
            $category->slug = $request->input('slug');
            $category->status = $request->input('status');
            $category->homepage = $request->input('homepage');
            $category->save(); // Save the updated data to the database

            $oldImage = $category->image;

            // Save Image Here
            if (!empty($request->image_id)) {

                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.', $tempImage->name);
                $ext = last($extArray);

                $newImageName = $category->id. '-' .time(). '.' .$ext;
                $sPath = public_path() . '/tempary/' . $tempImage->name;
                $dPath = public_path() . '/uploads/categories/' . $newImageName;
                File::copy($sPath, $dPath);

                //Generate image thumbnail with image intervention library
                $dPath = public_path() . '/uploads/categories/thumbnail/' . $newImageName;
                $img = Image::make($sPath);
                 $img->resize(450, 600);
                // $img->fit(450, 600, function ($constraint) {
                //     $constraint->upsize();
                // });
                $img->save($dPath);

                $category->image = $newImageName;
                $category->save();

                // Delete Old Image.
                File::delete(public_path(). '/uploads/categories/thumbnail/'. $oldImage);
                File::delete(public_path(). '/uploads/categories/'. $oldImage);

            }

            // session msg
            $request->session()->flash('success', 'Category Update Succesfuly');

            // Return a JSON response indicating success
            return response()->json([
                'status' => true,
                'message' => "Category Updated Successfully"
            ]);


        } else {

            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // Destroy Category.

    public function destroy($categoryId, Request $request) {

        $category = Category::find($categoryId);

        if(empty($category)) {

            $request->session()->flash('error', 'Category Not Found');
            return response()->json([
                'status' => true,
                'message' => 'Category Not Found'
            ]);

        }

        // Delete Image ALso.
        File::delete(public_path(). '/uploads/categories/thumbnail/'. $category->image);
        File::delete(public_path(). '/uploads/categories/'. $category->image);

        // Delete the category
        $category->delete();

        $request->session()->flash('success', 'Category Has Been Deleted');

        return response()->json([
            'status' => true,
            // 'category' => $category->id,
            'message' => 'Category has been deleted'
        ]);


    }


}
