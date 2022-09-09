<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PageRequest;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('dashboard.page.index',[
            'pages'=> Page::query()->with('admin')->paginate(10),
        ]);
    }


    public function create()
    {
        return view('dashboard.page.create');
    }


    public function store(PageRequest $request)
    {
        if(($request -> photo) != Null){
            $file_name = $this -> saveImages($request -> photo,'site/images/page');
        }else{
            $file_name = "Page Photo";
        }
        $my_page = [
            'title' => $request -> title,
            'description'=> $request -> description,
            'keywords'=> $request -> keywords,
            'my_content'=> $request -> my_content,
            'slug'=> $request -> slug,
            'writer_id'=> $request -> writer_id,
            'photo'=> $file_name,
        ];

        Page::create($my_page,$request->validated());

        return redirect()->route('dashboard.page.index')->with(['success'=>'Page Added Successfully']) ;
    }

    public function edit(Page $page)
    {
        return view('dashboard.page.update',compact('page'));
    }


    public function update(PageRequest $request, Page $page)
    {
        if(($request -> photo) != Null){
            $file_name = $this -> saveImages($request -> photo,'site/images/page');
        }else{
            $file_name = $page -> photo;
        }
        $page->update([
            'title' => $request -> title,
            'description'=> $request -> description,
            'keywords'=> $request -> keywords,
            'my_content'=> $request -> my_content,
            'slug'=> $request -> slug,
            'photo'=> $file_name,
        ],$request->validated());

        return redirect()->route('dashboard.page.index')->with(['success'=>'Page Updated Successfully']) ;
    }


    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('dashboard.page.index')->with(['success'=>'Page Deleted Successfully']) ;
    }

    protected function saveImages($photo,$folder)
    {
        $file_ex = $photo->getClientOriginalExtension();
        $file_name = time() . '.' . $file_ex;
        $path = $folder;
        $photo->move($path, $file_name);
        return $file_name;
    }
}
