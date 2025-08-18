<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ColorController extends Controller
{
    public function index(){
        $colors = Color::orderByDesc('id')->get();
        return view('admin.colors.color', compact('colors'));
    }

    public function store(Request $request){
        $path = null;

        if($request->hasFile('image')){
            $path = $request->file('image')->store('colors', 'public');
        }

        Color::create([
            'name' => $request->name,
            'image' => $path
        ]);

        return redirect()->back()->with('success', 'Thêm màu thành công!');
    }

    public function update(Request $request, Color $color){
    $data = [
        'name' => $request->name,
    ];

    if ($request->hasFile('image')) {
        if ($color->image && Storage::disk('public')->exists($color->image)) {
            Storage::disk('public')->delete($color->image);
        }
        $data['image'] = $request->file('image')->store('colors', 'public');
    }

    $color->update($data);

    return redirect()->back()->with('success', 'Cập nhật màu thành công!');
    }

    public function destroy($id){
        $color = Color::find($id);

        if (!$color) {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy màu.']);
        }

        if ($color->image) {
            Storage::disk('public')->delete($color->image);
        }

        $color->delete();
        return redirect()->back()->with('success', 'Xóa màu thành công!');
    }
}
