<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductLine;
use App\Models\Size;
use Illuminate\Http\Request;

class CategoryPagecontroller extends Controller
{
    public function index()
    {
        $products = Product::all();
        $colors = Color::all();
        $sizes = Size::all();
        $title = 'Danh mục';
        $breadcrumb = ['Danh mục' => null];
        $productLines = collect();

        return view('category', compact(
            'products', 
            'title',
            'breadcrumb',
            'productLines',
            'colors',
            'sizes'
        ));
    }

    public function showCategory($id){
        $category = Category::with('brands.productLines.products')->findOrFail($id);
        $products = Product::with(['sizes', 'color'])->where('category_id', $id)->get();
        $colors = Color::all();
        $sizes = Size::all();
        $title = $category->name;
        $breadcrumb = [$category->name => null];
        $productLines = $category->brands->flatMap->productLines;
        
        return view('category', compact(
            'products', 
            'title', 
            'breadcrumb', 
            'productLines',
            'colors',
            'sizes'
        ));
    }

    public function showProductLine($id){
        $productLine = ProductLine::with('products')->findOrFail($id);
        $colors = Color::all();
        $sizes = Size::all();
        $products = $productLine->products;
        $title = $productLine->name;
        $category = $productLine->brand->category;
        $breadcrumb = [
            $category->name => route('category.show', $category->id),
            $productLine->name => null
        ];
        
        $productLines = $productLine->brand->productLines;

        return view('category', compact(
            'products', 
            'title', 
            'breadcrumb',
            'productLines',
            'colors',
            'sizes'
        ));
    }
}
