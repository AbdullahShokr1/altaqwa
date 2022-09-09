<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BCategoryRequest;
use App\Models\BCategory;

class BCategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.blog.category.index',[
            'categories'=> BCategory::query()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('dashboard.blog.category.create');
    }

    public function store(BCategoryRequest $request)
    {
        BCategory::create($request->validated());

        return redirect()->route('dashboard.blog.category.index')->with(['success'=>'Category Added Successfully']) ;
    }

    public function edit(BCategory $category)
    {
        return view('dashboard.blog.category.update',compact('category'));
    }


    public function update(BCategoryRequest $request, BCategory $category)
    {
        $category->update($request->validated());

        return redirect()->route('dashboard.blog.category.index')->with(['success'=>'Category Updated Successfully']) ;
    }

    public function destroy(BCategory $category)
    {
        $category->delete();
        return redirect()->route('dashboard.blog.category.index')->with(['success'=>'Category Deleted Successfully']) ;
    }
}
