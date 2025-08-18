<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductLine;
use App\Models\Quantity;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with(['category', 'brand', 'color', 'productLine', 'images'])->get();
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::all();
        $productLines = ProductLine::all();
        $sizes = Size::all();

        return view('admin.products.product', compact(
            'products', 'categories', 'brands', 'colors', 
            'productLines', 'sizes'
        ));
    }

 public function edit($id){
    $product = Product::with(['images', 'quantities.size'])->findOrFail($id);

    // Tạo map size_id => amount
    $quantityMap = [];
    foreach ($product->quantities as $q) {
        $quantityMap[$q->size_id] = $q->amount;
    }

    // Lấy danh sách tất cả size
    $sizes = Size::all();

    return response()->json([
        'product' => $product,
        'quantityMap' => $quantityMap,
        'sizes' => $sizes
    ]);
    }


    public function store(Request $request)
    {
        $data = $request->only([
            'name',
            'des',
            'price' ,
            'product_code' ,
            'category_id',
            'brand_id' ,
            'productLine_id' ,
            'color_id' ,
            'image' ,
            'thumb_images.*',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product = Product::create($data);

        if ($request->hasFile('thumb_images')) {
            foreach ($request->file('thumb_images') as $img) {
                $path = $img->store('products/thumbs', 'public');
                $product->images()->create(['image_path' => $path]);
            }
        }

        if ($request->sizes) {
            foreach ($request->sizes as $sizeId => $info) {
                if (isset($info['selected']) && $info['quantity'] > 0) {
                    Quantity::create([
                        'product_id' => $product->id,
                        'size_id' => $sizeId,
                        'amount' => $info['quantity'],
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Thêm sản phẩm thành công!');
    }

    public function update(Request $request){
        $product = Product::find($request->id);

        $data = $request->only([
            'name',
            'des' ,
            'price' ,
            'product_code' ,
            'category_id',
            'brand_id' ,
            'productLine_id',
            'color_id',
        ]);

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            $data['image'] = $request->file('image')->store('products', 'public');
        }


        // Xử lý ảnh phụ 
        if ($request->hasFile('thumb_images')) {
            foreach ($request->file('thumb_images') as $img) {
                $path = $img->store('products/thumbs', 'public');
                $product->images()->create(['image_path' => $path]);
            }
        }

        $product->update($data);

        // Cập nhật size và số lượng
        Quantity::where('product_id', $product->id)->delete();

        if ($request->sizes) {
            foreach ($request->sizes as $sizeId => $info) {
                if (isset($info['selected']) && $info['quantity'] > 0) {
                    Quantity::create([
                        'product_id' => $product->id,
                        'size_id' => $sizeId,
                        'amount' => $info['quantity'],
                    ]);
                }
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật sản phẩm thành công!'
        ]);
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        // Xóa ảnh chính
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        // Xóa ảnh phụ
        foreach ($product->images as $image) {
            if (Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }
            $image->delete();
        }

        // Xóa quantity
        Quantity::where('product_id', $product->id)->delete();

        $product->delete();

        return redirect()->back()->with('success', 'Xóa sản phẩm thành công!');
    }

    public function deleteThumb($id){
    $image = ProductImage::findOrFail($id);

    // Xóa file vật lý nếu tồn tại
    if ($image->image_path && Storage::disk('public')->exists($image->image_path)) {
        Storage::disk('public')->delete($image->image_path);
    }

    $image->delete();

    return response()->json([
        'success' => true,
        'message' => 'Ảnh đã được xóa thành công'
    ]);
    }

    public function getCategories(){

    return Category::select('id', 'name')->get();
    }

    public function getBrandsByCategory(Request $request)
    {
        return Brand::select('id', 'name')
        ->when($request->category_id, fn($q) => $q->where('category_id', $request->category_id))
        ->get();
    }

    public function getProductLinesByBrand(Request $request)
    {
        return ProductLine::select('id', 'name')
        ->when($request->brand_id, fn($q) => $q->where('brand_id', $request->brand_id))
        ->get();
    }

    public function getProducts(Request $request){
    $query = Product::with('images');

    if ($request->category_id) {
        $query->where('category_id', $request->category_id);
    }
    if ($request->brand_id) {
        $query->where('brand_id', $request->brand_id);
    }
    if ($request->productLine_id) {
        $query->where('productLine_id', $request->productLine_id);
    }

    return $query->get();
    }


}
