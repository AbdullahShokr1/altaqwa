<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SettingsRequest;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
        $settings = Settings::query()->find(1);
        return view('dashboard.settings.index',compact('settings'));
    }
    public function edit(){
        $settings = Settings::query()->first();
        return view('dashboard.settings.edit',compact('settings'));
    }

    public function update( Settings $settings ,SettingsRequest $request)
    {
        $settings = Settings::where('id','=',1)->first();
        if(($request -> photo) != Null  && ($request -> logo) != Null){
            $file_banner = $this -> saveImages($request -> photo,'site/images/');
            $file_logo = $this -> saveImages($request -> logo,'site/images/');
            $settings->update([
                'logo' => $file_logo,
                'name'=> $request -> name,
                'description'=> $request -> description,
                'social'=> implode('|',$request -> social),
                'photo'=> $file_banner,
            ],$request->validated());
        }elseif(($request -> logo) != Null){
            $file_logo = $this -> saveImages($request -> logo,'site/images/');
            $settings->update([
                'logo' => $file_logo,
                'name'=> $request -> name,
                'description'=> $request -> description,
                'social'=> implode('|',$request -> social),
                'photo'=> $settings->photo,
            ],$request->validated());
        }elseif(($request -> photo) != Null){
            $file_banner = $this -> saveImages($request -> photo,'site/images/');
            $settings->update([
                'logo' => $settings->logo,
                'name'=> $request -> name,
                'description'=> $request -> description,
                'social'=> implode('|',$request -> social),
                'photo'=> $file_banner,
            ],$request->validated());
        }else{
            $settings->update([
                'logo' => $settings->logo,
                'name'=> $request -> name,
                'description'=> $request -> description,
                'social'=> implode('|',$request -> social),
                'photo'=> $settings->photo,
            ],$request->validated());
        }
        return redirect()->route('dashboard.settings')->with(['success'=>'Product Updated Successfully']) ;
    }

    protected function saveImages($photo,$folder)
    {
        $file_ex = $photo->getClientOriginalExtension();
        $file_name = time() .rand(1,1000).'.' . $file_ex;
        $path = $folder;
        $photo->move($path, $file_name);
        return $file_name;
    }
}

//
//if($files || $files2){
//    $photo = $this -> saveImages($request -> photo,'site/images/');
//    $logo = $file_logo = $this -> saveImages($request -> logo,'site/images/');
//    $settings->update([
//        'logo' => $logo,
//        'name'=> $request -> name,
//        'description'=> $request -> description,
//        'social'=> $request -> social,
//        'photo'=> $photo,
//    ],$request->validated());
//}else{
//    $photo= $settings->photo;
//    $logo= $settings->photo;
//    $settings->update([
//        'logo' => $logo,
//        'name'=> $request -> name,
//        'description'=> $request -> description,
//        'social'=> $request -> social,
//        'photo'=> $photo,
//    ],$request->validated());
//}
