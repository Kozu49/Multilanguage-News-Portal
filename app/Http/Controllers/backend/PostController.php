<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\District;
use App\Models\SubDistrict;
use App\Models\Post;
use Intervention\Image\Facades\Image;
use  DB;
use Illuminate\Support\Carbon;
use Auth;



class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth');

    }
    public function create(){
        $categories=Category::all();
        $districts=District::all();
        return view('backend/post/create',['categories'=>$categories,'districts'=>$districts]);
    }

    public function GetSubCategory($category_id){
        
        // $sub=SubDistrict::where('category_id',$category_id)->get();
        $sub=DB::table('sub_categories')->where('category_id',$category_id)->get();
        return response()->json($sub);

    }

    public function GetSubDistrict($district_id){
        
        $sub=DB::table('sub_districts')->where('district_id',$district_id)->get();
        return response()->json($sub);
    }

    public function StorePost(Request $request){
        $validated = $request->validate([
            'category_id' => 'required',
           
            'title_eng' => 'required',
            'title_nep' => 'required',
            'image' => 'required',
            'details_eng' => 'required',
            'details_nep' => 'required',
            'tags_eng' => 'required',
            'tags_nep' => 'required',
        ]);

                $image=$request->file('image');
                $img_ext=strtolower($image->getClientOriginalExtension());
                $name_gen=hexdec(uniqid());
                $imagename=$name_gen. '.'.$img_ext;
                Image::make($image)->resize(500,300)->save('image/postimg/'.$imagename);
                
                // $image=$request->file('image');
                // $img_ext=strtolower($image->getClientOriginalExtension());
                // $name_gen=hexdec(uniqid());
                // $imagename=$name_gen. '.'.$img_ext;
                // $img=Image::make($image)->resize(500,300);
                // $up_location=public_path().'image/postimg/';
                // $img->save($up_location,$imagename);

        Post::insert([
            'title_eng'=>$request->title_eng,
            'title_nep'=>$request->title_nep,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'district_id'=>$request->district_id,
            'subdistrict_id'=>$request->subdistrict_id,
            'user_id'=>Auth::id(),
            'tags_eng'=>$request->tags_eng,
            'tags_nep'=>$request->tags_nep,
            'details_eng'=>$request->details_eng,
            'details_nep'=>$request->details_nep,
            'headline'=>$request->headline,
            'bigthumbnail'=>$request->bigthumbnail,
            'first_section'=>$request->first_section,
            'first_section_thumbnail'=>$request->first_section_thumbnail,
            'post_date'=>Carbon::now(),
            'post_month'=>date("F"),
            'image'=>$imagename,
            
            

        ]);
        $notification=array(
            'message'=> 'Post is added successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('create.post')->with($notification);

    }

    public function allPost(){

        $posts=Post::orderBy('id','desc')->paginate(5);
        return view('backend/post/index',['posts'=>$posts]);
    }

    public function EditPost($id){
        $post=DB::table('posts')->where('id',$id)->first();
        $categories=Category::all();
        $districts=District::all();

        return view('backend/post/edit',['post'=>$post,'districts'=>$districts,'categories'=>$categories]);
    }

    public function UpdatePost(Request $request,$id){
        
        $old_image=$request->oldimage;

        $image=$request->file('image');
        if($image){
                $img_ext=strtolower($image->getClientOriginalExtension());
                $name_gen=hexdec(uniqid());
                $imagename=$name_gen. '.'.$img_ext;
                Image::make($image)->resize(500,300)->save('image/postimg/'.$imagename);
                // unlink($old_image);
                // unlink('/image/postimg/'.$old_image);
               
        Post::find($id)->update([
            'title_eng'=>$request->title_eng,
            'title_nep'=>$request->title_nep,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'district_id'=>$request->district_id,
            'subdistrict_id'=>$request->subdistrict_id,      
            'tags_eng'=>$request->tags_eng,
            'tags_nep'=>$request->tags_nep,
            'details_eng'=>$request->details_eng,
            'details_nep'=>$request->details_nep,
            'headline'=>$request->headline,
            'bigthumbnail'=>$request->bigthumbnail,
            'first_section'=>$request->first_section,
            'first_section_thumbnail'=>$request->first_section_thumbnail,
            'image'=>$imagename,
            
            

        ]);
        $notification=array(
            'message'=> 'Post is updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.post')->with($notification);
        
    }
    else{
        Post::find($id)->update([
            'title_eng'=>$request->title_eng,
            'title_nep'=>$request->title_nep,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'district_id'=>$request->district_id,
            'subdistrict_id'=>$request->subdistrict_id,      
            'tags_eng'=>$request->tags_eng,
            'tags_nep'=>$request->tags_nep,
            'details_eng'=>$request->details_eng,
            'details_nep'=>$request->details_nep,
            'headline'=>$request->headline,
            'bigthumbnail'=>$request->bigthumbnail,
            'first_section'=>$request->first_section,
            'first_section_thumbnail'=>$request->first_section_thumbnail,
        ]);
        $notification=array(
            'message'=> 'Post is updated Successfully',
            'alert-type'=>'warning'
        );
        return redirect()->route('all.post')->with($notification);;


    }
    }

    public function DeletePost($id){

        $post=Post::find($id)->delete();
        // unlink($post->image);
        $notification=array(
            'message'=> 'Post is Deleted Successfully',
            'alert-type'=>'warning'
        );
        return redirect()->route('all.post')->with($notification);;

        
    }
}
