<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;
use Intervention\Image\Facades\Image;


class PhotoGalleryController extends Controller
{

    public function __construct(){
        $this->middleware('auth');

    }
    public function PhotoGallery(){
        $photos=Photo::orderBy('id','desc')->paginate(5);
        return view('backend/gallery/photos',['photos'=>$photos]);


    }

    public function AddPhoto(){
        
        return view('backend/gallery/createphoto');
    }

    public function StorePhoto(Request $request){
        $validated = $request->validate([
            'title' => 'required', 
            'photo' => 'required',
            'type' => 'required',
        ]);
        $image=$request->file('photo');
        if($image){
                $img_ext=strtolower($image->getClientOriginalExtension());
                $name_gen=hexdec(uniqid());
                $imagename=$name_gen. '.'.$img_ext;
                Image::make($image)->resize(500,300)->save('image/photogallery/'.$imagename);
                // unlink($old_image);
                // unlink('/image/postimg/'.$old_image);
               
        Photo::insert([
            'title'=>$request->title,
            'photo'=>$imagename,
            'type'=>$request->type,
            

        ]);
        $notification=array(
            'message'=> 'Photo is added successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('photo.gallery')->with($notification);
        
    }
        else{

        Photo::insert([
            'title'=>$request->title,
            'type'=>$request->type,
            
        ]);
        $notification=array(
            'message'=> 'Photo is added successfully',
            'alert-type'=>'warning'
        );
        return redirect()->route('photo.gallery')->with($notification);
    }
    
}

    public function EditPhoto($id){
        $photo=Photo::find($id);
        return view('backend/gallery/edit',['photo'=>$photo]);

    }

    public function UpdatePhoto(Request $request,$id){
        
        // $old=$request->oldphoto;
        $image=$request->file('photo');
        if($image){
                $img_ext=strtolower($image->getClientOriginalExtension());
                $name_gen=hexdec(uniqid());
                $imagename=$name_gen. '.'.$img_ext;
                Image::make($image)->resize(500,300)->save('image/photogallery/'.$imagename);
                // unlink($old);
                // unlink('/image/postimg/'.$old_image);
               
        Photo::find($id)->update([
            'title'=>$request->title,
            'photo'=>$imagename,
            'type'=>$request->type,
            

        ]);
        $notification=array(
            'message'=> 'Photo is updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('photo.gallery')->with($notification);
        
    }
        else{

        Photo::find($id)->update([
            'title'=>$request->title,
            'type'=>$request->type,
            
        ]);
        $notification=array(
            'message'=> 'Photo is updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('photo.gallery')->with($notification);
    }

    }
    public function DeletePhoto($id){
        Photo::find($id)->delete();
        $notification=array(
            'message'=> 'Photo is deleted successfully',
            'alert-type'=>'warning'
        );
        return redirect()->route('photo.gallery')->with($notification);
    }

    




}
