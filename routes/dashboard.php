<?php


use App\Http\Controllers\Dashboard\MenuController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::namespace("Dashboard")->prefix("dashboard")->name("dashboard.")->group(function(){
    Route::middleware(['auth:admin'])->group(function(){
        Route::get("/","DashboarController@index")->name('home');
        Route::resource("category",'CategoryController',['except' => [ 'show' ]]);
        Route::resource("tag",'TagController',['except' => [ 'show' ]]);
        Route::resource("post",'PostController',['except' => [ 'show' ]]);
        Route::resource("page",'PageController',['except' => [ 'show' ]]);
        Route::resource("product",'ProductController',['except' => [ 'show' ]]);
        Route::resource("comment",'CommentController',['except' => [ 'show','create','edit','update','store']]);
        Route::resource("review",'ReviewController',['except' => [ 'show','create','edit','store','update']]);
        //Start Route for Blog >>> that Contain (Post/Tags/Category)
        Route::prefix("blog")->name("blog.")->group(function(){
            Route::resource("category",'BCategoryController',['except' => [ 'show' ]]);
            Route::resource("tag",'BTagController',['except' => [ 'show' ]]);
            Route::resource("post",'BPostController',['except' => [ 'show' ]]);
        });
        //End Route for Blog >>> that Contain (Post/Tags/Category)
        Route::resource("users",'UserController',['except' => [ 'show' ]]);
        Route::resource("admins",'AdminController',['except' => [ 'show' ]]);
        ////Start Media Route
        Route::get('media','DashboarController@media')->name('media');
        /// End Media Route
        Route::get('settings','SettingsController@index')->name('settings');
        Route::get('settings/edit/{id}','SettingsController@edit')->name('edit-settings');
        Route::put('settings/update/{id}','SettingsController@update')->name('update-settings');
        //Route for menu
        Route::name("menu.")->prefix("menu")->group(function(){
            Route::get('manage-menus/{id?}',[MenuController::class,'index']);
            Route::post('create-menu',[MenuController::class,'store']);
            Route::get('add-categories-to-menu',[MenuController::class,'addCatToMenu'])->name('add-categories');
            Route::get('add-post-to-menu',[MenuController::class,'addPostToMenu'])->name('add-post');
            Route::get('add-custom-link',[MenuController::class,'addCustomLink'])->name('add-link');
            Route::get('update-menu',[MenuController::class,'updateMenu']);
            Route::post('update-menuitem/{id}',[MenuController::class,'updateMenuItem']);
            Route::get('delete-menuitem/{id}/{key}/{in?}',[MenuController::class,'deleteMenuItem']);
            Route::get('delete-menu/{id}',[MenuController::class,'destroy']);
            Route::get('menus-create',[MenuController::class,'create'])->name('create');
        });
    });
});
require __DIR__.'/admin.php';
