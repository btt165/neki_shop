<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\ProductLine;
use Illuminate\Http\Request;

class ProductLineController extends Controller
{
    public function index(){
        $productLines = ProductLine::with('brand')->orderByDesc('id')->get();
        $brands = Brand::all();
        return view('admin.productLines.productLine', compact('productLines', 'brands'));
    }

    public function store(Request $request){
        ProductLine::create($request->only('name', 'brand_id'));
        return redirect()->back()->with('success', 'Đã thêm dòng sản phẩm!');
    }

    public function update(Request $request){
        $productLine = ProductLine::find($request->id);
        $productLine->update($request->only('name', 'brand_id'));

        return redirect()->back()->with('success', 'Đã cập nhật dòng sản phẩm!');
    }

    public function destroy($id){
        $productLine = ProductLine::find($id);
        $productLine->delete();

        return redirect()->back()->with('success','Đã xóa dòng sản phẩm!');
    }

    public function getByBrand($brand_id){
        $lines = ProductLine::where('brand_id', $brand_id)->get();
        return response()->json($lines);
    }

    
}
