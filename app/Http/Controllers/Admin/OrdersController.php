<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\orderItems;
use App\Models\orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index() {

        $orders = orders::latest('orders.created_at')->select('orders.*', 'users.name', 'users.email');
        $orders = $orders->leftJoin('users', 'users.id', 'orders.user_id');
        $orders = $orders->paginate(10);
        // dd($orders->toArray());

        $data['orders'] = $orders;
        return view('Admin.orders.list', $data);
    }


    public function detail($id) {

        $order = orders::where('id', $id)->first();
        $data['order'] = $order;

        $orderItem = orderItems::where('orders_id', $id)->get();

        $data['orderItem'] = $orderItem;
        return view('Admin.orders.detail', $data);
    }


    public function orderStatus(Request $request, $id){
        
        $orders = orders::find($id);
        $orders->status = $request->status;
        $orders->shipped_date = $request->shipped_date;
        $orders->save();

        return response()->json([
            'status' => true,
            'message' => 'order status change Successfully',
        ]);
    }
}
