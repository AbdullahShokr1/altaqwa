<?php


namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.category.index',[
            'categories'=> Category::query()->paginate(10),
        ]);
    }


    public function create()
    {
        return view('dashboard.category.create');
    }


    public function store(CategoryRequest $request)
    {
        if(($request -> photo) != Null){
            $file_name = $this -> saveImages($request -> photo,'site/images/category');
        }else{
            $file_name = "User_Photo";
        }
        $my_category = [
            'title' => $request -> title,
            'description'=> $request -> description,
            'slug'=> $request -> slug,
            'photo'=> $file_name,
        ];

        Category::create($my_category,$request->validated());

        return redirect()->route('dashboard.category.index')->with(['success'=>'Category Added Successfully']) ;
    }

    public function edit(Category $category)
    {
        return view('dashboard.category.update',compact('category'));
    }


    public function update(CategoryRequest $request, Category $category)
    {
        if(($request -> photo) != Null){
            $file_name = $this -> saveImages($request -> photo,'site/images/category');
        }else{
            $file_name = $category -> photo;
        }
        $category->update([
            'title' => $request -> title,
            'description'=> $request -> description,
            'slug'=> $request -> slug,
            'photo'=> $file_name,
        ],$request->validated());

        return redirect()->route('dashboard.category.index')->with(['success'=>'Category Updated Successfully']) ;
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('dashboard.category.index')->with(['success'=>'Category Deleted Successfully']) ;
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
