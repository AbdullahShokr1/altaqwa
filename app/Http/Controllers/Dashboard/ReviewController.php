<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ReviewRequest;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    //Show all Reviews
    public function index(){
        return view('dashboard.review.index',[
            'reviews'=>Review::with('product','User')->paginate(10),
        ]);
    }
    //Delete Review && Store in DB
    public function destroy($id){
        $review = Review::where('id','=',$id)->find($id);
        $review->delete();
        return redirect()->back()->with(['success'=>'Review Deleted Successfully']) ;
    }
}
