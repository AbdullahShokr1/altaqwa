<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__.'/auth.php';
//Route By Middleware Auth
Route::middleware(['auth'])->namespace("Front")->name("home.")->group(function(){
    //Start Route for Product >>>
    Route::prefix("product")->name("product.")->group(function(){
        Route::get("create",'ProductFrontController@createProduct')->name('create');
        Route::post("store",'ProductFrontController@storeProduct')->name('store');
        Route::delete("delete/{id}",'ProductFrontController@destroy')->name('destroy');
        Route::get("{id}/delete-photo/{photo}",'ProductFrontController@deletePhoto')->name('deletePhoto');
        Route::get("edit/{product}",'ProductFrontController@editProduct')->name('edit');
        Route::put("update/{product}",'ProductFrontController@updateProduct')->name('update');
    });
    //End Route for Product >>>
    Route::get("/profile/","FrontController@profileRedirect")->name('redirect-profile');
    Route::get("/profile/{name}","FrontController@profile")->name('profile');
    Route::get("/profile/{name}/edit","FrontController@editProfile")->name('e-profile');
    ///////////////
    /// Route For Review
    ///////////////
    Route::name("review.")->prefix("review")->group(function(){
        Route::post("store",'FrontController@storeReview')->name('store');
        Route::put("update/{id}",'FrontController@updateReview')->name('update');
        Route::delete("destroy/{id}",'FrontController@deleteyMy')->name('delete');
    });
});
Route::namespace("Dashboard")->name("home.")->group(function(){
    Route::put("/profile/update/{user}","UserController@updateProfile")->name('u-profile');
    Route::middleware(['auth'])->group(function(){
        Route::resource("comment",'CommentController',['except' => [ 'show','create','edit','update','destroy','index']]);
    });
});
Route::namespace("Front")->prefix("/")->name("home.")->group(function(){
    Route::get("/","FrontController@index")->name('index');
    Route::get('tag/{slug}','FrontController@tag')->name('tag');
    Route::get('tag/','FrontController@tags')->name('tags');
    Route::get('category','FrontController@categories')->name('categories');
    //Route::get('category/{slug}','FrontController@category')->name('category');
    //Start Route for Blog >>> that Contain (Post/Tags/Category)
    Route::prefix("blog")->name("blog.")->group(function(){
        Route::get("/",'FrontController@blog')->name('index');
        Route::get("category",'FrontController@bCategories')->name('categories');
        Route::get('category/{slug}','FrontController@bCategory')->name('category');
        Route::get("tag",'FrontController@bTags')->name('tags');
        Route::get('tag/{slug}','FrontController@bTag')->name('tag');
        Route::get("{slug}",'FrontController@post')->name('post');
    });
    //End Route for Blog >>> that Contain (Post/Tags/Category)
    /***This Route has The Slug***/
    Route::get("/feed.xml","RSSFeedController@index")->name('rss');
    Route::get("/feed/","RSSFeedController@redirect");
    //<<< The Start Sitemap >>>//
    /*** Start This Routes For Sitemap ***/
    Route::get("/sitemap.xml","SitemapController@index")->name('sitemap');
    Route::get("/post-sitemap.xml","SitemapController@post")->name('post-sitemap');
    Route::get("/category-sitemap.xml","SitemapController@category")->name('category-sitemap');
    Route::get("/page-sitemap.xml","SitemapController@page")->name('page-sitemap');
    Route::get("/blog-sitemap.xml","SitemapController@blog")->name('blog-sitemap');
    Route::get("/category-blog-sitemap.xml","SitemapController@Cblog")->name('C-blog-sitemap');
    Route::get("/tags-blog-sitemap.xml","SitemapController@Tblog")->name('T-blog-sitemap');
    Route::get("/product-sitemap.xml","SitemapController@product")->name('product-sitemap');
    Route::get("/images-sitemap.xml","SitemapController@images")->name('images-sitemap');
    //<<< The End Sitemap >>>//
    /*** End This Routes For Sitemap ***/
    Route::get("/search","FrontController@search")->name('search');
    Route::get("/product/","FrontController@products")->name('products');
    Route::get("/product/{slug}","FrontController@product")->name('product');
    Route::get("page/{slug}","FrontController@page")->name('page');
    Route::get("/{category}/{slug}","FrontController@PostAds")->name('post');
    Route::get('/{category}','FrontController@category')->name('category');
});



