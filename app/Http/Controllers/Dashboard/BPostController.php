<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BlogRequest;
use App\Models\BCategory;
use App\Models\Blog;
use App\Models\BTag;
use App\Models\TagBlog;
use Illuminate\Http\Request;

class BPostController extends Controller
{
    public function index()
    {
        return view('dashboard.blog.post.index',[
            'posts'=> Blog::query()->with(['category','admin','tagblog','comment'])->paginate(10),
            'categories'=> BCategory::get(),
        ]);
    }


    public function create()
    {

        return view('dashboard.blog.post.create',[
            'categories'=> BCategory::get(),
            'tags'=>BTag::get(),
        ]);
    }


    public function store(BlogRequest $request)
    {
        if(($request -> photo) != Null){
            $file_name = $this -> saveImages($request -> photo,'site/images/blog');
        }else{
            $file_name = "Post Photo";
        }
        $my_post = [
            'title' => $request -> title,
            'description'=> $request -> description,
            'keywords'=> $request -> keywords,
            'my_content'=> $request -> my_content,
            'slug'=> $request -> slug,
            'writer_id'=> $request -> writer_id,
            'category_id'=> $request -> category_id,
            'photo'=> $file_name,
        ];
        $my_post = Blog::create($my_post,$request->validated());

        $tags= $request -> tag_id;
        if($tags){
            foreach($tags as $tag) {
                TagBlog::create([
                    'tag_id' => $tag,
                    'blog_id' => $my_post->id,
                ]);
            }
        }

        return redirect()->route('dashboard.blog.post.index')->with(['success'=>'Post Added Successfully']) ;
    }

    public function edit(Blog $post)
    {
        return view('dashboard.blog.post.update',compact('post'),[
            'categories'=> BCategory::get(),
            'tags'=>BTag::query()->with('tagblog')->get(),
        ]);
    }


    public function update(BlogRequest $request, Blog $post)
    {
        if(($request -> photo) != Null){
            $file_name = $this -> saveImages($request -> photo,'site/images/blog');
        }else{
            $file_name = $post -> photo;
        }
        $post->update([
            'title' => $request -> title,
            'description'=> $request -> description,
            'keywords'=> $request -> keywords,
            'my_content'=> $request -> my_content,
            'slug'=> $request -> slug,
            'writer_id'=> $request -> writer_id,
            'category_id'=> $request -> category_id,
            'photo'=> $file_name,
        ],$request->validated());


        $tags= $request -> tag_id;
        if($tags){
            TagBlog::query()->with(['btag','blog'])->where('blog_id','=',$post->id)->delete();
            foreach($tags as $tag) {
                TagBlog::create([
                    'tag_id' => $tag,
                    'blog_id' => $post->id,
                ]);
            }
        }

        return redirect()->route('dashboard.blog.post.index')->with(['success'=>'Post Updated Successfully']) ;
    }


    public function destroy(Blog $post)
    {
        $post->delete();
        return redirect()->route('dashboard.blog.post.index')->with(['success'=>'Post Deleted Successfully']) ;
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
