<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    // public function uploadImage(Request $request){
    //     $fileName = time() . '-' . $_FILES['file']['name'];
    //     $request->file('file')->storeAs('public/upload', $fileName);
    //     $url = "/storage/upload/" . $fileName;
    //     return response()->json([
    //         'success' => true,
    //         'path' => $url
    //     ]);
    // }

    // public function uploadImages(Request $request){
    //     $thumbImages = $request->file('files');
    //     $url = [];
    //     for($i = 0; $i < count($thumbImages); $i++){
    //         $fileName = time() . '-' . $thumbImages[$i]->getClientOriginalName();
    //         $thumbImages[$i]->storeAs('public/upload', $fileName);
    //         $url[] = '/storage/upload/' . $fileName;
    //     }
    //     return response()->json([
    //         'success' => true,
    //         'paths' => $url
    //     ]);
    // }
}
