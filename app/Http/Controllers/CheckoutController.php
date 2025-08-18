<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{

    public function index(){
        $cart = Session::get('cart', []);
        $title = 'Thanh toán';

        if(empty($cart)){
            return redirect()->route('cart.index');
        }

        $subTotal = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });
        
        return view('checkout', compact('cart', 'subTotal', 'title'));
    }

    public function store(Request $request){
        $cart = Session::get('cart', []);

        if (empty($cart)){
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống');
        }

        DB::beginTransaction();
        try {
            $order = Order::create([
                'fullname' => $request->fullname,
                'address' => $request->address,
                'city' => $request->city,
                'phone' => $request->phone,
                'email' => $request->email,
                'payment_method' => $request->payment,
                'total_price' => collect($cart)->sum(function ($item) {
                            return $item['price'] * $item['quantity']; 
                }),
                'status' => 'Chờ xác nhận',
            ]);
            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'product_name' => $item['name'],
                    'size' => $item['size_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'image' => $item['image']
                ]);
            }

            Session::forget('cart');
            DB::commit();

            return view('confirm',[
                'order' => $order->load('items'),
                'title' => 'Đặt hàng thành công'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }
}
