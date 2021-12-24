<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'content' => ['required'],
            'post_id' => ['required', 'exists:posts,id'],
            'comment_id' => ['nullable', 'exists:comments,id'],
        ]);
        $data = [
            'content' => $request->get('content'),
            'post_id' => $request->get('post_id'),
            'comment_id' => $request->get('comment_id'),
            'user_id' => auth()->user()->id,
            'status' => 'deActive',

        ];
        // dd($data);
        Comment::create($data);

        return redirect()->back()->with('status', 'پیام با موفقیت ثبت شد و پس از تایید به نمایش در خواهد آمد.');

    }

}