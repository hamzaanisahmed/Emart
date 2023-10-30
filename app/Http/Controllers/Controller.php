<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // ==== Home page ====
    public function index() {

        $featuredProducts = Product::where('is_featured', 'Yes')->where('status', 1)->get();

        $data['featuredProducts'] = $featuredProducts;

        return view('frontend.index', $data);
    }
    // ============




}
