<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use DB;

class ViewPostController extends Controller
{
    public function SinglePost($id){
        $post=Post::find($id);
        return view('main.single_post',['post'=>$post]);

    }


    public function CategoryPost($id){
        $catposts=DB::table('posts')->where('category_id',$id)->orderBy('id','asc')->paginate(5);
        // $catpost=Post::find($id);
        return view('main.allpost',['catposts'=>$catposts]);


    } 


    public function SubCategoryPost($id){
        $subcatposts=DB::table('posts')->where('subcategory_id',$id)->orderBy('id','asc')->paginate(5);
        return view('main.subpost',['subcatposts'=>$subcatposts]);
    }
}
