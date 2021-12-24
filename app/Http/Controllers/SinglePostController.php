<?php

namespace App\Http\Controllers;

use App\Models\Post;

class SinglePostController extends Controller
{

    public function show(Post $post)
    {
        $post->load(['user', 'categories', 'comments' => function ($query) {
            return $query->where('comment_id', null);
        }])->loadCount('comments');
        //   dd($post->toArray());
        return view('single-page', compact('post'));
    }

}