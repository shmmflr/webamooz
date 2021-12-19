<?php

namespace App\Http\Controllers;

use App\Models\Post;

class LandingController extends Controller
{

    public function index()
    {
        $posts = Post::paginate(5);
        return view('index', compact('posts'));

    }
}