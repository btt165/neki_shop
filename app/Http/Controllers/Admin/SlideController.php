<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
        return view('admin.slides.index', compact('slides'));
    }

    

    public function store(Request $request)
    {
        

        $path = $request->file('image')->store('slides', 'public');

        Slide::create([
            'title' => $request->title,
            'image' => $path,
            'link'  => $request->link,
            'status'=> '1'
        ]);

        return redirect()->route('slides.index')->with('success', 'Thêm slide thành công!');
    }

    public function update(Request $request, Slide $slide){
    $data = $request->only(['title', 'link', 'status']);

    if ($request->hasFile('image')) {
        // Xóa ảnh cũ nếu tồn tại
        if ($slide->image && Storage::disk('public')->exists($slide->image)) {
            Storage::disk('public')->delete($slide->image);
        }

        // Lưu ảnh mới
        $path = $request->file('image')->store('slides', 'public');
        $data['image'] = $path;
    }

    // Cập nhật slide
    $slide->update($data);

    return redirect()->route('slides.index')->with('success', 'Cập nhật slide thành công!');
    }

   public function destroy($id)
    {
        $slide = Slide::find($id);
        $slide->delete();
        return redirect()->route('slides.index')->with('success', 'Xóa slide thành công!');
    }
}
