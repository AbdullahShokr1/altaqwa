<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProfileRequest;
use App\Http\Requests\Dashboard\ReviewRequest;
use App\Http\Requests\Dashboard\UserRequest;
use App\Models\BCategory;
use App\Models\Blog;
use App\Models\BTag;
use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\Product;
use App\Models\Review;
use App\Models\Settings;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FrontController extends Controller
{
    public function index(){
        $categories = Category::get();
        $settings = Settings::query()->first();
        return view('frontend.home',compact('categories','settings'),[
            'posts'=> Post::query()->get(),
            'imposts'=> Post::latest()->take(12)->get(),
            'blogs'=> Blog::inRandomOrder()->limit(9)->get(),
            'products'=> Product::inRandomOrder()->limit(6)->get(),
        ]);
    }

    public function page($slug){
        $page = Page::where('slug','=',$slug)->first();
        if($page){
            return view('frontend.page',compact('page'));
        }else{
            return abort(404);
        }
    }

    public function PostAds($category,$slug){
        $post = Post::with('category')->where('slug','=',$slug)->first();
        if($post){
            return view('frontend.post',compact('post'));
        }else{
            return abort(404);
        }
    }

    public function products(){
        return view('frontend.products',[
            'products'=>Product::with('review','user')->get(),
        ]);
    }

    public function product($slug){
        $product = Product::where('slug','=',$slug)->with('review','user')->first();
        if($product){
            if(Auth::user('user')){
                $check =Review::with('user')->where('user_id','=',Auth::user('user')->id)->where('product_id','=',$product->id)->first();
            }else{
                $check="";
            }
            return view('frontend.product',compact('product','check'));
        }else{
            return abort(404);
        }
    }

    public function categories(){
        $categories = Category::get();
        return view('frontend.categories',compact('categories'));
    }

    public function category($slug){
        $myCategory = Category::where('slug','=',$slug)->first();
        if($myCategory){
            return view('frontend.category',compact('myCategory'));
        }else{
            return abort(404);
        }
    }

    public function tags(){
        $tags = Tag::get();
        return view('frontend.tags',compact('tags'));
    }

    public function tag($slug){
        $tag = Tag::where('slug','=',$slug)->first();
        if($tag){
            return view('frontend.tag',compact('tag'));
        }else{
            return abort(404);
        }
    }

    /*
     *
     * Start Functions of Blog
     *
     */
    public function blog()
    {
        return view('frontend.blog.index');

    }
    public function post($slug)
    {
        $post = Blog::where('slug','=',$slug)->first();
        if($post){
            return view('frontend.blog.post',compact('post'));
        }else{
            return abort(404);
        }
    }

    public function bCategories()
    {
        $categories = BCategory::get();
        return view('frontend.blog.categories',compact('categories'));
    }

    public function bCategory($slug)
    {
        $myCategory = BCategory::where('slug','=',$slug)->first();
        if($myCategory){
            return view('frontend.blog.category',compact('myCategory'));
        }else{
            return abort(404);
        }
    }

    public function bTags()
    {
        $tags = BTag::get();
        return view('frontend.blog.tags',compact('tags'));
    }

    public function bTag($slug)
    {
        $tag = BTag::where('slug','=',$slug)->first();
        if($tag){
            return view('frontend.blog.tag',compact('tag'));
        }else{
            return abort(404);
        }
    }

    /*
     *
     * End Functions of Blog
     *
     */
    /*
     *
     * Start Functions of Profile
     *
     */
    public function profile($name){
        if((Auth::user('user')->name) ==$name){
            $user = User::with('review','product')->where('name','=',$name)->first();
            return view('frontend.profile.index',compact('user'),[
                'myProducts'=> Product::with('review','user')->where('user_id','=',Auth::user('user')->id)->get(),
            ]);
        }else{
            return redirect()->route('home.index');
        }
    }
    public function profileRedirect(){
        return redirect()->route('home.profile',Auth::user('user')->name);
    }
    public function editProfile($name){
        if((Auth::user('user')->name) ==$name){
            $user = User::with('review','product')->where('name','=',$name)->first();
            return view('frontend.profile.update',compact('user'));
        }else{
            return redirect()->route('home.index');
        }
    }
    /*
     *
     * End Functions of Profile
     *
     */
    /*
     *
     * Start Functions of Review
     *
     */
    //Store new Review in DB
    public function storeReview(ReviewRequest $request){
        Review::create($request->validated());
        return redirect()->back()->with(['success'=>'Review Added Successfully']) ;

    }

    //update Review && Store in DB
    public function updateReview($id,ReviewRequest $request){
        if($request->user_id == Auth::user('user')->id && $request->product_id == $id){
            $review= Review::where('user_id','=',Auth::user('user')->id)->where('product_id','=',$id)->first();
            $review->update($request->validated());
            return redirect()->back()->with(['success'=>'Review Updated Successfully']) ;
        }else{
            return redirect()->route('home.index');
        }
    }
    public function deleteyMy(Review $id){
        if(Auth::user('user')->id == $id->user_id){
            Review::where('id','=',$id->id)->delete();
            return redirect()->back()->with(['success'=>'Review Deleted Successfully']) ;
        }else{
            return redirect()->back();
        }
    }
    /*
     *
     * End Functions of Review
     *
     */



}
