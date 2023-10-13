<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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


    public function login() {

        return view('frontend.user.login');
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->passes()) {

            return response()->json([
                'status' => true,
                'message' => 'Login Successfully'
            ]);

        } else {

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

    public function register() {

        return view('frontend.user.register');
    }

}
