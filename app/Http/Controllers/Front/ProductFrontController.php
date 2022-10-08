<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductFrontController extends Controller
{
    public function createProduct(){
        return view('frontend.product.create');
    }

    public function storeProduct(ProductRequest $request)
    {
        if($files=$request->file('photos')){
            $photos = $this -> saveImages($files);
        }else{
            $photos="Product Photos";
        }
        $user_id =Auth::user('user')->id;
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
        return redirect()->route('home.profile',Auth::user('user')->name)->with(['success'=>'Product Added Successfully']) ;
    }

    public function destroy(Product $id)
    {
        if($id->user_id == Auth::user('user')->id){
            $product = Product::with('user')->where('user_id','=',Auth::user('user')->id)->find($id->id);
            $my_photos = explode('|', $product->photos);
            foreach ($my_photos as $photo){
                $image_path = public_path("site/images/products/$photo");

                if(File::exists($image_path)){
                    File::delete($image_path);
                }
            }
            $product->delete();
            return redirect()->back()->with(['success'=>'Product Deleted Successfully']) ;
        }else{
            return redirect()->route('home.index');
        }
    }

    public function editProduct(Product $product){
        return view('frontend.product.update',compact('product'));
    }

    public function updateProduct(Product $product ,ProductRequest $request)
    {
        $files= $request->file('photos');
        if($files){
            $NewPhotos = $this -> saveImages($files);

            $allphotos = explode('|',$product->photos);
            foreach ($NewPhotos as $thePhoto){
                array_push($allphotos,$thePhoto);
            }
            $product->update([
                'title' => $request -> title,
                'description'=> $request -> description,
                'keywords'=> $request -> keywords,
                'telephone'=> $request -> telephone,
                'slug'=> $request -> slug,
                'user_id'=> $request -> user_id,
                'photos'=> implode('|',$allphotos),
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
        return redirect()->back()->with(['success'=>'Product Updated Successfully']) ;
    }

    public function deletePhoto($id,$MyPhoto){
        $product = Product::with('user')->where('user_id','=',Auth::user('user')->id)->find($id);
        $photos = [];
        $photos = explode('|',$product->photos);
        unset($photos[array_search($MyPhoto,$photos)]);
        $photos = implode('|',$photos);
        $product->update([
            'title' => $product -> title,
            'description'=> $product -> description,
            'keywords'=> $product -> keywords,
            'telephone'=> $product -> telephone,
            'slug'=> $product -> slug,
            'user_id'=> $product -> user_id,
            'photos'=> $photos,
        ]);
        return redirect()->back();
    }
    public function addPhoto($id , Request $request){
        $product = Product::with('user')->where('user_id','=',Auth::user('user')->id)->find($id);
        $files= $request->file('photos');
        $NewPhotos = $this -> saveImages($files);
        $photos = [];
        $photos = explode('|',$product->photos);
        /////////////
        array_push($photos,$NewPhotos);
        $photos = implode('|',$photos);
        $product->update([
            'title' => $product -> title,
            'description'=> $product -> description,
            'keywords'=> $product -> keywords,
            'telephone'=> $product -> telephone,
            'slug'=> $product -> slug,
            'user_id'=> $product -> user_id,
            'photos'=> $photos,
        ]);
        return redirect()->back();
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
