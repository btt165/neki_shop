<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index(){
        $sizes = Size::orderByDesc('id')->get();
        return view('admin.sizes.size', compact('sizes'));
    }

    public function store(Request $request){
        Size::create(['name' => $request->name]);

        return redirect()->back()->with('success', 'Thêm size thành công!');
    }

    public function update(Request $request, $id){
        $size = Size::find($id);
        $size->update(['name'=> $request->name]);

        return redirect()->back()->with('success', 'Cập nhật size thành công!');
    }
    public function destroy($id){
        $size = Size::find($id);
        $size->delete();

        return redirect()->back()->with('success', 'Xóa size thành công!');
    }
}
