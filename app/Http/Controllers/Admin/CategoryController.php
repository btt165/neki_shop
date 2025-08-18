<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(){
        $categories = Category::orderByDesc('id')->get();
        return view('admin.categories.category', compact('categories'));
    }

   public function store(Request $request){
        Category::create([
            'name' => $request->name
        ]);
       
        return redirect()->back()->with('success', 'Thêm danh mục thành công');
   }

   public function update(Request $request){
        $category = Category::find($request->id);
        $category->update(['name' => $request->name]);

        return redirect()->back()->with('success', 'Cập nhật danh mục thành công!');
   }

   public function destroy($id){
     $category = Category::find($id);

     if (!$category) {
          return redirect()->back()->with('success' , 'Không tìm thấy danh mục!');
     }
    $category->delete();
    return redirect()->back()->with('success', 'Đã xoá danh mục!');
   }
}
