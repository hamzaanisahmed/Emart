<?php
use App\Models\Category;

function getCategories() {
    return Category::orderBy('name','ASC')->where('homepage','Yes')->with('subcategory')
    ->where('status',1)->get();
}


?>
