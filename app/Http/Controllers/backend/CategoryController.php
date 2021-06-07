<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function Index(){
        $categories=Category::orderBy('id','desc')->paginate(5);
        return view('backend.category.index',['categories'=>$categories]);

    }

    public function AddCategory(){
        return view('backend.category.create');

    }

    public function StoreCategory(Request $request){
        $validated = $request->validate([
            'category_eng' => 'required|unique:categories|max:255',
            'category_nep' => 'required|unique:categories|max:255',
        ]);
        Category::insert([
            'category_eng'=>$request->category_eng,
            'category_nep'=>$request->category_nep,
        ]);
        $notification=array(
            'message'=> 'Category Added successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('categories')->with($notification);

    }

    public function EditCategory($id){
        $category=Category::find($id);
        return view('backend.category.edit',['category'=>$category]);
    }

    public function UpdateCategory(Request $request, $id){
        $category=Category::find($id);

        Category::find($id)->update([
            'category_eng'=>$request->category_eng,
            'category_nep'=>$request->category_nep,
        ]);
        $notification=array(
            'message'=> 'Category Updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('categories')->with($notification);
        

    }

    public function DeleteCategory($id){
        Category::find($id)->delete();
        $notification=array(
            'message'=> 'Category Deleted Successfully',
            'alert-type'=>'warning'
        );
        return redirect()->route('categories')->with($notification);;

    }
}

