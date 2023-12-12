<?php
use App\Models\Category;
use App\Models\ProductImage;

function getCategories() {
    return Category::orderBy('name','ASC')->where('homepage','Yes')->with('subcategory')
    ->where('status',1)->get();
}


function getProductImages($id) {
    return ProductImage::where('product_id', $id)->first();
}

?>
