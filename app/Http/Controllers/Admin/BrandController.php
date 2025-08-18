<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::with('category')->orderByDesc('id')->get();
        $categories = Category::all();
        return view('admin.brands.brand', compact('brands', 'categories'));
    }

    public function store(Request $request){
        Brand::create($request->only('name', 'category_id'));
        return redirect()->back()->with('success', 'Đã thêm thương hiệu thành công!');
    }

    public function update(Request $request){
        $brand = Brand::find($request->id);
        $brand->update($request->only('name', 'category_id'));

        return redirect()->back()->with('success', 'Đã cập nhật thương hiệu!');
    }

    public function destroy($id){
        $brand = Brand::find($id);
        $brand->delete();

        return redirect()->back()->with('success','Đã xóa thương hiệu!');
    }
}
