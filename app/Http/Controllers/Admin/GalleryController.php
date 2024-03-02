<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function ckeditor_image(Request $request)
    {
        if($request->hasFile('upload')){
            $name = time() .'.'.$request->upload->getClientOriginalExtension();
            $request->upload->storeAs('photos/articles',$name,'public');
            $url=url('photos/articles/'.$name);
            return response()->json(['url'=>$url]);
        }
    }
}
