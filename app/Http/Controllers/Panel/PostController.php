<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Post\CreatePostRequest;
use App\Http\Requests\Panel\Post\RequestCreatePost;
use App\Http\Requests\Panel\Post\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        dd($request->get('search'));
        if (auth()->user()->role === 'author') {
            $postQuery = Post::where('user_id', auth()->user()->id)->paginate();
            if ($request->get('search')) {
                $postQuery->where('title', "LIKE", "%{$request->get('search')}%")
                    ->orWhere('content', "LIKE", "%{$request->get('search')}%");
            }
            $posts = $postQuery->paginate();
        } else {
            $postsQuery = Post::with('user');
            if ($request->get('search')) {
                $postsQuery->where('title', "LIKE", "%{$request->get('search')}%")
                    ->orWhere('content', "LIKE", "%{$request->get('search')}%");;
            }

            $posts = $postsQuery->paginate();
        }
        return view('panel.posts.index', compact('posts'));

    }


    public function create()
    {
        return view('panel.posts.create');
    }


    public function store(CreatePostRequest $request)
    {
//        dd($request->all());
        $categoryIds = Category::whereIn('slug', $request->categories)->get()->pluck('id')->toArray();
        $file = $request->file('banner');
        $file_name = $file->getClientOriginalName();
        $file->storeAs('images/posts', $file_name, 'public_file');


        $data = $request->validated();
        $data['banner'] = $file_name;
        $data['user_id'] = auth()->user()->id;

        $post = Post::create(
            $data
        );
        $post->categories()->sync($categoryIds);

        return redirect()->route('post.index')->with('status', 'مقاله با موفقیت ایجاد شد.');
    }


    public function show(Post $post)
    {
        //
    }


    public function edit(Post $post)
    {
        return view('panel.posts.edit', compact('post'));
    }


    public function update(UpdatePostRequest $request, Post $post)
    {
        $categoryIds = Category::whereIn('slug', $request->categories)->get()->pluck('id')->toArray();
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        if ($request->hasFile('banner')) {

            $file = $request->file('banner');
            $file_name = $file->getClientOriginalName();
            $file->storeAs('images/posts', $file_name, 'public_file');
            $data['banner'] = $file_name;

        }


        $post->update(
            $data
        );
        $post->categories()->sync($categoryIds);

        return redirect()->route('post.index')->with('status', 'مقاله با موفقیت بروزرسانی شد.');
    }


    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->back()->with('status', 'حذف با موفقیت انجام شد.');
    }
}
