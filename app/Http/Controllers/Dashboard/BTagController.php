<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BTagRequest;
use App\Models\BTag;


class BTagController extends Controller
{
    public function index()
    {
        return view('dashboard.blog.tag.index',[
            'tags'=> BTag::query()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('dashboard.blog.tag.create');
    }

    public function store(BTagRequest $request)
    {
        BTag::create($request->validated());

        return redirect()->route('dashboard.blog.tag.index')->with(['success'=>'Tag Added Successfully']) ;
    }

    public function edit(BTag $tag)
    {
        return view('dashboard.blog.tag.update',compact('tag'));
    }


    public function update(BTagRequest $request, BTag $tag)
    {
        $tag->update($request->validated());

        return redirect()->route('dashboard.blog.tag.index')->with(['success'=>'Tag Updated Successfully']) ;
    }

    public function destroy(BTag $tag)
    {
        $tag->delete();
        return redirect()->route('dashboard.blog.tag.index')->with(['success'=>'Tag Deleted Successfully']) ;
    }
}
