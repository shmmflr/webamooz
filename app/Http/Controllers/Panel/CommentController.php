<?php

namespace App\Http\Controllers\Panel;

use App\Models\comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{

    public function index()
    {
        $comments =comment::paginate();
        // dd($comments->toArray());
        return view('panel.comments.index' ,compact('comments'));
    }


    public function destroy(comment $comment)
    {
        //
    }
}