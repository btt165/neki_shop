<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::orderByDesc('created_at')->limit(10)->get();
        $slides = Slide::where('status', '1')->get();
        $title = 'Trang chủ';
        return view('home', compact('products','slides','title'));
    }

    public function getProduct($id){
    $product = Product::with([
        'category',
        'brand',
        'productLine',
        'color',
        'images',
        'sizes' 
    ])->findOrFail($id);

    $title = $product->name;

    return view('product', compact('product', 'title'));
    }
    
}
