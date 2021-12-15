<?php

namespace App\Http\Controllers\Panel;

use App\Models\comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{

    public function index(Request $request)
    {
        // dd($request->status);
        if($request->status=="1"){
            $comments =comment::where('status','active')->with(['user','post'])->withCount('replace')->paginate();

         }
        elseif($request->status=="0"){ 

            $comments =comment::where('status','!=','active')->with(['user','post'])->withCount('replace')->paginate();
    
        }else{
            $comments =comment::with(['user','post'])->withCount('replace')->paginate();

        }
        return view('panel.comments.index' ,compact('comments'));
    }
    
    public function update(comment $comment)
    {
        // dd($comment->status);
        if($comment->status == 'active'){
            $data=['status'=>'deActive'];
        }
        else{
            
            $data=['status'=>'active'];
        }
        $comment->update($data);
        
        return redirect()->back()->with('status','با موفقیت بروزرسانی شد.');
    }

    public function destroy(comment $comment)
    {
       $comment->delete();
       return redirect()->back()->with('status','حذف با موفقیت انجام شد' );
    }
}