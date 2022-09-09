<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('dashboard.admins.index',[
            'admins' =>Admin::query()->paginate(10),
        ]);
    }
    public function create(){
        return view('dashboard.admins.create');
    }
    //Store new User in DB
    public function store(AdminRequest $request){

        if(($request -> photo) != Null){
            $file_name = $this -> saveImages($request -> photo,'dashboardfile\images\admins');
        }else{
            $file_name = "avatar.png";
        }
        $my_admins = [
            'name' => $request -> name,
            'email'=> $request -> email,
            'password'=> $request -> password,
            'photo'=> $file_name,
        ];

        Admin::create($my_admins,$request->validated());

        return redirect()->route('dashboard.admins.index')->with(['success'=>'Admin Added Successfully']) ;
    }
    //Edit User
    public function edit(Admin $admin){
        return view('dashboard.admins.update',compact('admin'));
    }
    //update User && Store in DB
    public function update(Admin $admin,AdminRequest $request){

        if(($request -> photo) != Null){
            $file_name = $this -> saveImages($request -> photo,'dashboardfile\images\admins');
        }else{
            $file_name = $admin -> photo;
        }
        $admin->update([
            'name' => $request -> name,
            'email'=> $request -> email,
            'password'=> $request -> password,
            'photo'=> $file_name,
        ],$request->validated());

        return redirect()->route('dashboard.admins.index')->with(['success'=>'Admin Updated Successfully']) ;
    }
    //update User && Store in DB
    public function destroy(Admin $admin){
        $admin->delete();
        return redirect()->route('dashboard.admins.index')->with(['success'=>'Admin Deleted Successfully']) ;
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
