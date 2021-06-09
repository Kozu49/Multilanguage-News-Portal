<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class ViewPostController extends Controller
{
    public function SinglePost($id){
        $post=Post::find($id);
        return view('main.single_post',['post'=>$post]);



    }
}
