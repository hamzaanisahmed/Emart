<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class shopController extends Controller
{
    public function shop(Request $request, $categorySlug = null, $subcategorySlug = null) {

        $subcategorySelected = '';
        $brandsArray = [];

        $categories = Category::orderBy('name', 'ASC')->with('subcategory')->where('status',1)->get();
        $brands = Brands::orderBy('name', 'ASC')->where('status',1)->get();
        $products = Product::where('status', 1);

        if(!empty($subcategorySlug)) {
            $subcategory = SubCategory::where('slug', $subcategorySlug)->first();
            $products = $products->where('sub_category_id', $subcategory->id);
            $subcategorySelected = $subcategory->id;
        }

        if (!empty($request->get('brand'))) {
            $brandsArray = explode(',',$request->get('brand'));
            $products = $products->whereIn('brand_id', $brandsArray);
        }

        if ($request->get('sort') != '') {

            if($request->get('sort') == 'latest') {
                $products = $products->orderBy('created_at', 'DESC');

            } elseif ($request->get('sort') == 'low-high') {
                $products = $products->orderBy('price', 'ASC');

            } else {
                $products = $products->orderBy('price', 'DESC');

            }

        } else {
            $products = $products->orderBy('id', 'DESC');

        }

        $products = $products->paginate(12);


        $data['categories'] = $categories;
        $data['brands'] = $brands;
        $data['products'] = $products;
        $data['subcategorySelected'] = $subcategorySelected;
        $data['brandsArray'] = $brandsArray;
        $data['sort'] = $request->get('sort');

        return view('frontend.shop', $data);
    }


    public function detail($slug) {

        $product = Product::where('slug', $slug)->with('product_images')->first();

        if ($product == null) {
            abort(404);

        }



        $relatedProducts = [];

        if($product->related_products != '') {
            $productArray = explode(',',$product->related_products);
            $relatedProducts = Product::whereIn('id', $productArray)->with('product_images')->get();
        }

        $data['product'] = $product;
        $data['relatedProducts'] = $relatedProducts;

        return view('frontend.detail', $data);

    }

}
