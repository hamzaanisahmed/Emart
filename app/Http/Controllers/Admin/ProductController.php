<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Constraint;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{

    public function create() {
        $categories = Category::orderBy('name', 'ASC')->get();
        $brands = Brands::orderBy('name', 'ASC')->get();

        $data['categories'] = $categories;
        $data['brands'] = $brands;
        
        return view('Admin.products.create', $data);
    }


    public function store(Request $request) {

        $array = [
            'title' => 'required',
            'slug' => 'required|unique:products',
            'price' => 'required|numeric',
            'sku' => 'required|unique:products',
            'track_qty' => 'required|in:Yes,No',
            'category' => 'required|numeric',
            'is_featured' => 'required|in:Yes,No',
        ];

        if(!empty($request->track_qty) && $request->track_qty == 'Yes') {
            $array['qty'] = 'required|numeric';
        }

        $validator = Validator::make($request->all(),$array);

        if ($validator->passes()) {

            $product = new Product;
            $product->title = $request->title;
            $product->slug = $request->slug;
            $product->description = $request->description;
            $product->short_description = $request->short_description;
            $product->price = $request->price;
            $product->compare_price = $request->compare_price;
            $product->category_id = $request->category;
            $product->sub_category_id = $request->sub_category;
            $product->brand_id = $request->brand;
            $product->is_featured = $request->is_featured;
            $product->sku = $request->sku;
            $product->barcode = $request->barcode;
            $product->track_qty = $request->track_qty;
            $product->qty = $request->qty;
            $product->related_products = (!empty($request->related_products)) ? implode(',',$request->related_products) : '';
            $product->status = $request->status;
            $product->save();

            // Save Product Images.

            if(!empty($request->image_array)) {

                foreach ($request->image_array as $temp_image_id) {

                    $tempImage = TempImage::find($temp_image_id);
                    $extensionArray = explode('.', $tempImage->name);
                    $extension = last($extensionArray);

                    $productImage = new ProductImage();
                    $productImage->product_id = $product->id;
                    $productImage->image = 'NULL';
                    $productImage->save();

                    $productImageName = $product->id.'-'.$productImage->id.'-'.time().'.'.$extension;
                    $productImage->image = $productImageName;
                    $productImage->save();

                    // Generate Themnails.

                    // Large.
                    $sourcePath = public_path().'/tempary/'.$tempImage->name;
                    $desPath = public_path().'/uploads/products/large/'.$productImageName;
                    $image = Image::make($sourcePath);
                    $image->resize(1400, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });

                    $image->save($desPath);

                    // Small.
                    $desPath = public_path().'/uploads/products/small/'.$productImageName;
                    $image = Image::make($sourcePath);
                    $image->fit(300,300);
                    $image->save($desPath);

                }
            }

            return response()->json([
                'status' => true,
                'message' => 'Products Added Successfully',
            ]);

        } else {

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);

        }

    }


    public function list() {

        $products = Product::latest()->with('product_images')->paginate(10);
        return view('Admin.products.list', compact('products'));

    }

    public function edit($id, Request $request) {

        $product = Product::find($id);

        if(empty($product)) {
            return redirect()->route('product.list');
        }

        $productImage = ProductImage::where('product_id',$product->id)->get();
        $subcategories = SubCategory::where('category_id', $product->category_id)->get();

        // related_products
        $relatedProducts = [];

        if($product->related_products != '') {
            $productArray = explode(',', $product->related_products);
            $relatedProducts = Product::whereIn('id', $productArray)->get();
        }

        $categories = Category::orderBy('name', 'ASC')->get();
        $brands = Brands::orderBy('name', 'ASC')->get();
        $data['product'] = $product;
        $data['productImage'] = $productImage;
        $data['categories'] = $categories;
        $data['subcategories'] = $subcategories;
        $data['brands'] = $brands;
        $data['relatedProducts'] = $relatedProducts;

        return view('Admin.products.edit', $data);

    }


    public function update($id, Request $request) {

        $product = Product::find($id);

        $array = [
            'title' => 'required',
            'slug' => 'required|unique:products,slug,'.$product->id.'id',
            'price' => 'required|numeric',
            'sku' => 'required|unique:products,sku,'.$product->id.'id',
            'track_qty' => 'required|in:Yes,No',
            'category' => 'required|numeric',
            'is_featured' => 'required|in:Yes,No',
        ];

        if(!empty($request->track_qty) && $request->track_qty == 'Yes') {
            $array['qty'] = 'required|numeric';
        }

        $validator = Validator::make($request->all(),$array);

        if ($validator->passes()) {

            $product->title = $request->title;
            $product->slug = $request->slug;
            $product->description = $request->description;
            $product->short_description = $request->short_description;
            $product->price = $request->price;
            $product->compare_price = $request->compare_price;
            $product->category_id = $request->category;
            $product->sub_category_id = $request->sub_category;
            $product->brand_id = $request->brand;
            $product->is_featured = $request->is_featured;
            $product->sku = $request->sku;
            $product->barcode = $request->barcode;
            $product->track_qty = $request->track_qty;
            $product->qty = $request->qty;
            $product->related_products = (!empty($request->related_products)) ? implode(',',$request->related_products) : '';
            $product->status = $request->status;
            $product->save();

            // dd($request->all());

            // Save Product Images.

            return response()->json([
                'status' => true,
                'message' => 'Products Updated Successfully',
            ]);

        } else {

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);

        }
    }


    public function destroy($id, Request $request) {

        $product = Product::find($id);

        if(empty($product)) {

            return response()->json([
                'status' => false,
                'message' => 'product Not found',
            ]);
        }

        // Delete Images
        $productImage = ProductImage::where('product_id',$id)->get();

        if(!empty($productImage)) {
            foreach ($productImage as $productImage) {

                File::delete(public_path(). '/uploads/products/large/'. $productImage->image);
                File::delete(public_path(). '/uploads/products/small/'. $productImage->image);

            }

            ProductImage::where('product_id',$id)->delete();
        }

        $product->delete();

        return response()->json([
            'status' => true,
            'message' => 'product Delete Successfully',

        ]);
    }


    public function getproducts(Request $request) {

        $tempProduct = [];

        if($request->term != "") {
            $product = Product::where('title','like','%'.$request->term.'%')->get();

            if ($product != null) {
                foreach ($product as $product) {
                    $tempProduct[] = array('id' => $product->id, 'text' => $product->title);
                }
            }
        }

        return response()->json([
            'tags' => $tempProduct,
            'status' => true
        ]);
    }


}
