<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request){
        $orders = Order::with('items.product')->orderByDesc('id')->get();
        return view('admin.orders.order', compact('orders'));
    }

    public function show($id){
        $order = Order::with('items.product')->find($id);
        return view('admin.orders.order', compact('order'));
    }

    public function updateStatus(Request $request){
        $order = Order::find($request->order_id);
        $order->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Cập nhật trạng thái đơn hàng thành công!');
    }

    public function destroy($id){
        $order = Order::find($id);
        $order->delete();

        return redirect()->back()->with('success', 'Xóa đơn hàng thành công!');
    }
}
