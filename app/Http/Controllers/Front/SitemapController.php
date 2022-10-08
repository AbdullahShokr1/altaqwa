<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BCategory;
use App\Models\Blog;
use App\Models\BTag;
use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->first();
        $categories = Category::latest()->first();
        $page = Page::latest()->first();
        $blog = Blog::latest()->first();
        $Cblog = BCategory::latest()->first();
        $Tblog = BTag::latest()->first();
        $products = Product::latest()->first();

        return response()->view('frontend.sitemap.sitemap', [
            'posts' => $posts,
            'categories' => $categories,
            'page' => $page,
            'blog' => $blog,
            'Cblog' => $Cblog,
            'Tblog' => $Tblog,
            'products' => $products,
        ])->header('Content-Type', 'text/xml');
    }

    public function post()
    {
        $post = Post::latest()->first();
        $posts = Post::with('category')->get();

        return response()->view('frontend.sitemap.post', [
            'post' => $post,
            'posts' => $posts,
        ])->header('Content-Type', 'text/xml');
    }

    public function category()
    {
        $categories = Category::get();

        return response()->view('frontend.sitemap.category', [
            'categories' => $categories,
        ])->header('Content-Type', 'text/xml');
    }

    public function page()
    {
        $pages = Page::get();

        return response()->view('frontend.sitemap.page', [
            'pages' => $pages,
        ])->header('Content-Type', 'text/xml');
    }

    /*
     *
     *  Start functions for Blog Sitemap
     *
     */
    public function blog()
    {
        $blogs = Blog::get();

        return response()->view('frontend.sitemap.blog', [
            'blogs' => $blogs,
        ])->header('Content-Type', 'text/xml');
    }

    public function Cblog()
    {
        $Cblog = BCategory::get();

        return response()->view('frontend.sitemap.Cblog', [
            'categories' => $Cblog,
        ])->header('Content-Type', 'text/xml');
    }

    public function Tblog()
    {
        $Tblog = BTag::get();

        return response()->view('frontend.sitemap.Tblog', [
            'tags' => $Tblog,
        ])->header('Content-Type', 'text/xml');
    }

    /*
     *
     *  End functions for Blog Sitemap
     *
     */
    public function product()
    {
        $products = Product::get();

        return response()->view('frontend.sitemap.product', [
            'products' => $products,
        ])->header('Content-Type', 'text/xml');
    }

    public function images()
    {
        $products = Product::get();
        $posts = Post::with('category')->get();
        $postss = Post::with('category')->get();
        $categories = Category::get();
        $page = Page::get();
        $pages = Page::get();
        $blog = Blog::get();
        $blogs = Blog::get();
        /**===========================================================================*/
        foreach ($postss as $title=>$post){
            unset($postss[$title]);
            $title = $post->id;
            $mycount[] =$title;
            preg_match_all( '/<img .*?(?=src)src=\"([^\"]+)\"/si', $post->my_content, $images);
            foreach ($images as $id=>$imgpost) {
                $array1[] = $imgpost;
                if ($id % 2 == 1) {
                    $postimages[] = $imgpost;
                }
            }
        }
        $postimgs =array_combine($mycount, $postimages);
        /**===========================================================================*/
        foreach ($pages as $title=>$mpage){
            unset($pages[$title]);
            $title = $mpage->id;
            $mycount1[] =$title;
            preg_match_all( '/<img .*?(?=src)src=\"([^\"]+)\"/si', $mpage->my_content, $images);
            foreach ($images as $id=>$imgpage) {
                $array1[] = $imgpage;
                if ($id % 2 == 1) {
                    $pageimages[] = $imgpage;
                }
            }
        }
        $pageimgs =array_combine($mycount1, $pageimages);
        /**===========================================================================*/
        foreach ($blogs as $title=>$post){
            unset($blogs[$title]);
            $title = $post->id;
            $mycount2[] =$title;
            preg_match_all( '/<img .*?(?=src)src=\"([^\"]+)\"/si', $post->my_content, $images);
            foreach ($images as $id=>$imgblog) {
                $array1[] = $imgblog;
                if ($id % 2 == 1) {
                    $blogimges[] = $imgblog;
                }
            }
        }
        $blogimg =array_combine($mycount2, $blogimges);
        /**===========================================================================*/
        return response()->view('frontend.sitemap.images', [
            'products' => $products,
            'posts' => $posts,
            'categories' => $categories,
            'page' => $page,
            'blog' => $blog,
            'postImages'=>$postimgs,
            'pageImages'=>$pageimgs,
            'blogImages'=>$blogimg,
        ])->header('Content-Type', 'text/xml');
    }
}
