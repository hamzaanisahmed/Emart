<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login() {

        return view('frontend.user.login');
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->passes()) {

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password],
                $request->get('remember'))) {

                if (session()->has('url.intended')) {
                    return redirect(session()->get('url.intended'));
                }

                return view('frontend.user.profile');

            } else {

                return redirect()->route('user.login')->withInput($request->only('email'))
                    ->with('error', 'Either Email / Password Is Incorrect');
            }

        } else {

            return redirect()->route('user.login')->withErrors($validator)
                ->withInput($request->only('email'));
        }
    }

    public function register() {

        return view('frontend.user.register');
    }


    public function processRegister(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|max:11',
            'password' => 'required|min:5|confirmed',
            'password_confirmation' => 'required'
        ]);

        if ($validator->passes()) {

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone_number;
            $user->password = Hash::make($request->password);
            $user->save();

            return response()->json([
                'status' => true,
                'message' => 'Account Create Successfully'
            ]);

        } else {

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }


    public function userProfile() {

        return view('frontend.user.profile');

    }



    public function logout() {

        Auth::logout();

        return redirect()->route('user.login')->with('success', 'Logout Successfully');
    }
}
