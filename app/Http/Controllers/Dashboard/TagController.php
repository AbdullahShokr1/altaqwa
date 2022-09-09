<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\TagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        return view('dashboard.tag.index',[
            'tags'=> Tag::query()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('dashboard.tag.create');
    }

    public function store(TagRequest $request)
    {
        Tag::create($request->validated());

        return redirect()->route('dashboard.tag.index')->with(['success'=>'Tag Added Successfully']) ;
    }

    public function edit(Tag $tag)
    {
        return view('dashboard.tag.update',compact('tag'));
    }


    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->validated());

        return redirect()->route('dashboard.tag.index')->with(['success'=>'Tag Updated Successfully']) ;
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('dashboard.tag.index')->with(['success'=>'Tag Deleted Successfully']) ;
    }
}
