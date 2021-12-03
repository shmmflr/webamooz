<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    public function upload(Request $request)

    {
        $file = $request->file('upload');

        // logo.png
        $base_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); // logo
        $ext = $file->getClientOriginalExtension(); // png

        $file_name = $base_name . '_' . time() . '.' . $ext;
//        dd($file_name);
        $file->storeAs('images/posts', $file_name, 'public_file');

        $function = $request->CKEditorFuncNum;
        $url = asset('images/posts/' . $file_name);

        return response("<script>window.parent.CKEDITOR.tools.callFunction({$function}, '{$url}', 'فایل به درستی اپلود شد')</script>");
    }

}

