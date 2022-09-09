<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProductRequest;
use App\Models\Product;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;


class ProductController extends Controller
{
    public function index()
    {
        return view('dashboard.product.index',[
            'products'=> Product::query()->with('review','user')->paginate(10),
        ]);
    }

    public function create()
    {
        return view('dashboard.product.create');
    }


    public function store(ProductRequest $request)
    {
        if($files=$request->file('photos')){
            $photos = $this -> saveImages($files);
        }else{
            $photos="Product Photos";
        }
        if(Auth::user('user')){
            $user_id =Auth::user('user')->id;
        }else{
            $user_id=Auth::user('admin')->id;
        }
        $my_product = [
            'title' => $request -> title,
            'description'=> $request -> description,
            'keywords'=> $request -> keywords,
            'telephone'=> $request -> telephone,
            'slug'=> $request -> slug,
            'user_id'=> $user_id,
            'photos'=> implode('|',$photos),
        ];

        Product::create($my_product,$request->validated());
        if($request->routeIs('dashboard.*')){
            return redirect()->route('dashboard.product.index')->with(['success'=>'Product Added Successfully']) ;
        }else{
            return redirect()->back()->with(['success'=>'Product Added Successfully']) ;
        }
    }

    public function edit(Product $product)
    {
        return view('dashboard.product.update',compact('product'));
    }


    public function update(ProductRequest $request, Product $product)
    {
        $files= $request->file('photos');
        if($files){
            $photos = $this -> saveImages($files);
            $product->update([
                'title' => $request -> title,
                'description'=> $request -> description,
                'keywords'=> $request -> keywords,
                'telephone'=> $request -> telephone,
                'slug'=> $request -> slug,
                'user_id'=> $request -> user_id,
                'photos'=> implode('|',$photos),
            ],$request->validated());
        }else{
            $photos= $product->photos;
            $product->update([
                'title' => $request -> title,
                'description'=> $request -> description,
                'keywords'=> $request -> keywords,
                'telephone'=> $request -> telephone,
                'slug'=> $request -> slug,
                'user_id'=> $request -> user_id,
                'photos'=> $photos,
            ],$request->validated());
        }
        return redirect()->route('dashboard.product.index')->with(['success'=>'Product Updated Successfully']) ;
    }


    public function destroy(Product $product)
    {
        $my_photos = explode('|', $product->photos);
        foreach ($my_photos as $photo){
            $image_path = public_path("site/images/products/$photo");

            if(File::exists($image_path)){
                File::delete($image_path);
            }
        }

        $product->delete();
        return redirect()->route('dashboard.product.index')->with(['success'=>'Product Deleted Successfully']) ;
    }

    protected function saveImages($files)
    {
        $photos = array();
        foreach($files as $file){
            $ext=strtolower($file->getClientOriginalExtension());
            $photo_full_name=time().rand(1,1000).".".$ext;
            $upload_path='site/images/products/';
            $photo_url=$photo_full_name;
            $file->move($upload_path,$photo_full_name);
            $photos[]=$photo_url;
        }
        return $photos;
    }


}
