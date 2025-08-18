<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Size;
use BcMath\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function store(Request $request){
        $productId = $request->input('product_id');
        $sizeId = $request->input('size_id');
        $colorId = $request->input('color_id');
        $quantity = (int) $request->input('quantity', 1);

        $product = Product::with(['category', 'color'])->findOrFail($productId);

        $cart = session()->get('cart', []);

        $key = $productId . '_' . $sizeId . '_' . $colorId;

        if(isset($cart[$key])){
            $cart[$key]['quantity'] += $quantity;
        } else {
            $cart[$key] = [
                'name' => $product->name,
                'product_id' => $product->id,
                'image' => $product->image,
                'price' => $product->price,
                'quantity' => $quantity,
                'size_id' =>  $sizeId,
                'color_id' => $colorId,
                'category_name' => $product->category->name,
                'color_name' => $product->name,
            ];
        }

        session()->put('cart', $cart);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'cart_count' => count($cart),
                'product' => [
                    'name' => $product->name,
                    'image' => asset('storage/' . $product->image),
                    'price' => number_format($product->price, 0, ',', '.'),
                    'size' => $sizeId,
                    'category' => $product->category->name,
                ]
            ]);
        }

        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng!');
    }

    public function index(){
        $cart = session()->get('cart', []);
        $title = 'Giỏ hàng';
        $firsItem = !empty($cart) ? reset($cart) : null;
        $productId = $firsItem['product_id'] ?? null;

        return view('cart', compact('cart', 'title', 'productId'));
    }

    public function destroy($key){
        $cart = session()->get('cart', []);

        if (isset($cart[$key])){
            unset($cart[$key]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
    }

    public function update(Request $request){
        $key = $request->input('key');
        $quantity = (int)$request->input('quantity');

        $cart = session()->get('cart', []);

        if (isset($cart[$key]) && $quantity > 0){
            $cart[$key]['quantity'] = $quantity;
            session()->put('cart', $cart);
        }

        $itemTotal = $cart[$key]['price'] * $cart[$key]['quantity'];
        $subTotal = array_sum(array_map(function ($item){
            return $item['price'] * $item['quantity'];
        }, $cart));

        return response()->json([
            'item_total' => number_format($itemTotal, 0, ',', '.') . 'đ',
            'cart_total' => number_format($subTotal, 0, ',','.') . 'đ',
            'subtotal' => number_format($subTotal, 0,',','.'). 'đ'
        ]);
    }

}
