<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Category\RequestCreateCategory;
use App\Http\Requests\Panel\Category\RequestUpadteCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::with('parent')->paginate();
        $parent_cats = Category::where('category_id', NULL)->get();
        return view('panel.categories.index', compact('categories', 'parent_cats'));
    }

    public function store(RequestCreateCategory $request)
    {
//
//        in category singular => y deleted and change ies =>categories
        $data = $request->validated();
        Category::create($data);
        $request->session()->flash('status', 'دسته بندی با موفقیت اضافه شد.');
        return redirect()->back();


    }

    public function edit(Category $category)
    {
        $parent_cats = Category::where('category_id', null)->where('id', '!=', $category->id)->get();
        return view('panel.categories.edit', compact('category', 'parent_cats'));
    }

    public function update(RequestUpadteCategory $request, Category $category)
    {

        $category->update(
            $request->validated()
        );
        session()->flash('status', 'با موفقیت بروزرسانی شد.');
        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('status', "دسته بندی با موفقیت پاک گردید !");
        return redirect()->back();
    }
}
