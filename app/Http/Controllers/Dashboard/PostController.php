<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\TagPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('dashboard.post.index',[
            'posts'=> Post::query()->paginate(10),
        ]);
    }


    public function create()
    {
        return view('dashboard.post.create',[
            'categories'=> Category::get(),
            'tags'=>Tag::get(),
        ]);
    }


    public function store(PostRequest $request)
    {
        if(($request -> photo) != Null){
            $file_name = $this -> saveImages($request -> photo,'site/images/post');
        }else{
            $file_name = "Post Photo";
        }
        $my_post = [
            'title' => $request -> title,
            'description'=> $request -> description,
            'keywords'=> $request -> keywords,
            'my_content'=> $request -> my_content,
            'telephone'=> $request -> telephone,
            'slug'=> $request -> slug,
            'category_id'=> $request -> category_id,
            'writer_id'=> $request -> writer_id,
            'photo'=> $file_name,
        ];

        $my_post = Post::create($my_post,$request->validated());

        $tags= $request -> tag_id;
        if($tags){
            foreach($tags as $tag) {
                TagPost::create([
                    'tag_id' => $tag,
                    'post_id' => $my_post->id,
                ]);
            }
        }

        return redirect()->route('dashboard.post.index')->with(['success'=>'Post Added Successfully']) ;
    }

    public function edit(Post $post)
    {
        return view('dashboard.post.update',[
            'categories'=> Category::get(),
            'tags'=>Tag::query()->with('tagpost')->get(),
        ],compact('post'));
    }


    public function update(PostRequest $request, Post $post)
    {
        if(($request -> photo) != Null){
            $file_name = $this -> saveImages($request -> photo,'site/images/post');
        }else{
            $file_name = $post -> photo;
        }
        $post->update([
            'title' => $request -> title,
            'description'=> $request -> description,
            'keywords'=> $request -> keywords,
            'my_content'=> $request -> my_content,
            'telephone'=> $request -> telephone,
            'slug'=> $request -> slug,
            'category_id'=> $request -> category_id,
            'photo'=> $file_name,
        ],$request->validated());

        $tags= $request -> tag_id;
        if($tags){
            TagPost::query()->with(['tag','post'])->where('post_id','=',$post->id)->delete();
            foreach($tags as $tag) {
                TagPost::create([
                    'tag_id' => $tag,
                    'post_id' => $post->id,
                ]);
            }
        }

        return redirect()->route('dashboard.post.index')->with(['success'=>'Post Updated Successfully']) ;
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('dashboard.post.index')->with(['success'=>'Post Deleted Successfully']) ;
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
