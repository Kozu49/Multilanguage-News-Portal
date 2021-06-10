<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');

    }
    public function VideoGallery(){
        $videos=Video::orderBy('id','desc')->paginate(5);
        return view('backend/gallery/video',['videos'=>$videos]);


    }

    public function AddVideo(){
        return view('backend/gallery/createvideo');
    }

    public function StoreVideo(Request $request){

        $validated = $request->validate([
            'title' => 'required', 
            'embed_code' => 'required',
            'type' => 'required',
        ]);
               
        Video::insert([
            'title'=>$request->title,
            'embed_code'=>$request->embed_code,
            'type'=>$request->type,
            

        ]);
        $notification=array(
            'message'=> 'Video is added successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('video.gallery')->with($notification);

        
    }

    public function EditVideo($id){

        $video=Video::find($id);
        return view('backend/gallery/editvideo',['video'=>$video]);
    }

    public function UpdateVideo(Request $request,$id){
        Video::find($id)->update([
            'title'=>$request->title,
            'embed_code'=>$request->embed_code,
            'type'=>$request->type,

        ]);
        $notification=array(
            'message'=> 'Video is updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('video.gallery')->with($notification);
    }

    public function DeleteVideo($id){

        Video::find($id)->delete();
        $notification=array(
            'message'=> 'Video is deleted successfully',
            'alert-type'=>'warning'
        );
        return redirect()->route('video.gallery')->with($notification);


    }










}
