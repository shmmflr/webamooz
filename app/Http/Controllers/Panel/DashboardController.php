<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\comment;
use App\Models\Post;
use App\Models\User;

class DashboardController extends Controller
{

    public function index()
    {
        $count_users = User::count();
        $count_posts = Post::count();
        $count_categories = Category::count();
        $count_comments = Comment::count();

        if (auth()->user()->role === 'author') {
            $count_posts = Post::where('user_id', auth()->user()->id)->count();
            $count_comments = Comment::whereHas('post', function ($query) { //post mean Model Post
                $tt = $query->where('user_id', auth()->user()->id);
                return $tt;
            })->count();
        }

        return view('panel.index', compact('count_users', 'count_posts', 'count_categories', 'count_comments'));
    }

}