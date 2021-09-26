<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PageController extends Controller
{
    public function upload(Request $request) {
        $file = $request->file('photo');
        $newName = uniqid()."_".$file->getClientOriginalName();
//        $file->storeAs("public/photo",$newName);
        $img = Image::make($file);
        $watermark = Image::make(public_path('logo.png'));
        $watermark->fit(100,100);
        $img->insert($watermark,"bottom-right",10,10);
        $img->save("edited/".$newName);
        return redirect()->route("/");
    }
}
