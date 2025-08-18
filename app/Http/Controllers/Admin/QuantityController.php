<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Quantity;
use App\Models\Size;
use Illuminate\Http\Request;

class QuantityController extends Controller
{
    public function index(){
        $quantities = Quantity::with(['product', 'size'])->latest()->get();
        $products = Product::all();
        $sizes = Size::all();

        return view('admin.quantities.quantity', compact('quantities', 'products', 'sizes'));
    }

    public function store(Request $request){
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'size_id' => 'required|exists:sizes,id',
        'amount' => 'required|integer|min:0'
    ]);

    Quantity::create($request->only(['product_id', 'size_id', 'amount']));

    return redirect()->back()->with('success', 'Đã thêm số lượng thành công!');
    }

    public function update(Request $request){
    $request->validate([
        'id' => 'required|exists:quantities,id',
        'amount' => 'required|integer|min:0'
    ]);

    $quantity = Quantity::findOrFail($request->id);
    $quantity->update(['amount' => $request->amount]);

    return redirect()->back()->with('success', 'Cập nhật số lượng thành công!');
    }

    public function destroy($id)
    {
    Quantity::where('id', $id)->delete();
    return redirect()->back()->with('success', 'Xóa thành công!');
    }

}
