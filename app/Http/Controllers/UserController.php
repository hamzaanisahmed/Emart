<?php

namespace App\Http\Controllers;

use App\Models\orderItems;
use App\Models\orders;
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

    // User Register form create
    public function register() {

        return view('frontend.user.register');
    }

    // User Register form store
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


    public function orders() {

        $user = Auth::user();
        $orders = orders::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        
        $data['orders'] = $orders;
        return view('frontend.user.orders', $data);
    }


    public function orderDetails($id) {
        $user = Auth::user();
        $order = orders::where('user_id', $user->id)->where('id', $id)->first();
        $data['order'] = $order;

        $orderItem = orderItems::where('orders_id', $id)->get();
        $data['orderItem'] = $orderItem;

        return view('frontend.user.orderDetails', $data);
    }

    // fetch all user details for Admin Dashboard.
    public function userCreate() {
        return view('Admin.users.create');
    }


    public function userStore(Request $request) {

        return $this->processRegister($request);
    }


    //List.
    public function users() {

        $users = User::latest()->paginate(10);
        return view('Admin.users.list', compact('users'));
    }


    public function userEdit($id) {

        $user = User::find($id);
        return view('Admin.users.edit', compact('user'));
    }

    public function userUpdate(Request $request, $id) {

        $user = User::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$user->id.'id',
            'phone_number' => 'required|max:11',
            'password' => 'required|min:5|confirmed',
            'password_confirmation' => 'required'
        ]);

        if ($validator->passes()) {

            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone_number;
            $user->password = Hash::make($request->password);
            $user->save();

            return response()->json([
                'status' => true,
                'message' => 'User Update Successfully'
            ]);

        } else {

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }


    public function userDelete($id) {

        $user = User::find($id);
        
        if (!empty($user)) {

            $user->delete();

            return response()->json([
                'status' => true,
                'message' => 'User Deleted Successfully',
            ]);
            
        } else {
            return response()->json([
                'status' => false,
                'message' => 'User Not found',
            ]);           
        }
    }
    
}
