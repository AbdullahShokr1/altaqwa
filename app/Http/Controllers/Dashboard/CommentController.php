<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        return view('dashboard.comment.index',[
            'comments' =>Comment::query()->with('post')->paginate(10),
        ]);
    }

    //Store new User in DB
    public function store(CommentRequest $request){

        Comment::create($request->validated());

        return redirect()->back()->with(['success'=>'Your Comment Added Successfully']) ;
    }

    //Delete User && Store in DB
    public function destroy(Comment $comment){
        $comment->delete();
        return redirect()->route('dashboard.comment.index')->with(['success'=>'Comment Deleted Successfully']) ;
    }
}
