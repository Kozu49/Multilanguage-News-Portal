<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;




class SubCategoryController extends Controller
{

    public function __construct(){
        $this->middleware('auth');

    }
    public function Index(){

        $subcategories=SubCategory::orderBy('id','desc')->paginate(5);
        return view('backend.subcategory.index',['subcategories'=>$subcategories]);

    }

    public function AddSubCategory(){
        $categories=Category::all();
        return view('backend.subcategory.create',['categories'=>$categories]);

    }

    public function StoreSubCategory(Request $request){
        $validated = $request->validate([
            'subcategory_eng' => 'required|unique:sub_categories|max:255',
            'subcategory_nep' => 'required|unique:sub_categories|max:255',
        ]);
        SubCategory::insert([
            'subcategory_eng'=>$request->subcategory_eng,
            'subcategory_nep'=>$request->subcategory_nep,
            'category_id'=>$request->category_id,

        ]);
        $notification=array(
            'message'=> 'SubCategory Added successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('subcategories')->with($notification);

    }

    public function EditSubCategory($id){
        $categories=Category::all();
        $subcategory=SubCategory::find($id);
        return view('backend.subcategory.edit',['subcategory'=>$subcategory,'categories'=>$categories]);
    }

    public function UpdateSubCategory(Request $request, $id){
        // $category=Category::find($id);

        SubCategory::find($id)->update([
            'subcategory_eng'=>$request->subcategory_eng,
            'subcategory_nep'=>$request->subcategory_nep,
            'category_id'=>$request->category_id,
        ]);
        $notification=array(
            'message'=> 'SubCategory Updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('subcategories')->with($notification);;
        

    }

    public function DeleteSubCategory($id){
        SubCategory::find($id)->delete();
        $notification=array(
            'message'=> 'SubCategory Deleted Successfully',
            'alert-type'=>'warning'
        );
        return redirect()->route('subcategories')->with($notification);;

    }
}
