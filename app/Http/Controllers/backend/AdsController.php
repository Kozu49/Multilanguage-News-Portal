<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use Intervention\Image\Facades\Image;


class AdsController extends Controller
{

    public function __construct(){
        $this->middleware('auth');

    }
    
    public function ListAds(){
        $adss=Advertisement::orderBy('id','desc')->paginate(5);
        return view('backend.ads.listads',['adss'=>$adss]);
    }


    public function AddAds(){

        return view('backend.ads.create');
    }


    public function StoreAds(Request $request){
        $validated = $request->validate([
            'link' => 'required', 
            'ads' => 'required',
            'type' => 'required',
        ]);
        $type=$request->type;
        $image=$request->file('ads');
        if($type==1){
                $img_ext=strtolower($image->getClientOriginalExtension());
                $name_gen=hexdec(uniqid());
                $imagename=$name_gen. '.'.$img_ext;
                Image::make($image)->resize(500,500)->save('image/ads/'.$imagename);
                // unlink($old_image);
                // unlink('/image/postimg/'.$old_image);
               
            Advertisement::insert([
            'link'=>$request->link,
            'ads'=>$imagename,
            'type'=>$request->type,
            

        ]);
        $notification=array(
            'message'=> 'Vertical Advertisement is added successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('list.ads')->with($notification);
        
    }
        else{

            $img_ext=strtolower($image->getClientOriginalExtension());
            $name_gen=hexdec(uniqid());
            $imagename=$name_gen. '.'.$img_ext;
            Image::make($image)->resize(970,90)->save('image/ads/'.$imagename);

            Advertisement::insert([
            'link'=>$request->link,
            'ads'=>$imagename,
            'type'=>$request->type,
            
        ]);
        $notification=array(
            'message'=> 'Horizontal Advertisement is added successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('list.ads')->with($notification);


    }


}

public function EditAds($id){
    $ads=Advertisement::find($id);

    return view ('backend.ads.edit',['ads'=>$ads]);
}

public function UpdateAds(Request $request,$id){
    $type=$request->type;
        $image=$request->file('ads');
        if($type==1){
                $img_ext=strtolower($image->getClientOriginalExtension());
                $name_gen=hexdec(uniqid());
                $imagename=$name_gen. '.'.$img_ext;
                Image::make($image)->resize(500,500)->save('image/ads/'.$imagename);
                // unlink($old_image);
                // unlink('/image/postimg/'.$old_image);
               
            Advertisement::find($id)->update([
            'link'=>$request->link,
            'ads'=>$imagename,
            'type'=>$request->type,
            

        ]);
        $notification=array(
            'message'=> 'Vertical Advertisement is updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('list.ads')->with($notification);
        
    }
        else{

            $img_ext=strtolower($image->getClientOriginalExtension());
            $name_gen=hexdec(uniqid());
            $imagename=$name_gen. '.'.$img_ext;
            Image::make($image)->resize(970,90)->save('image/ads/'.$imagename);

            Advertisement::find($id)->update([
            'link'=>$request->link,
            'ads'=>$imagename,
            'type'=>$request->type,
            
        ]);
        $notification=array(
            'message'=> 'Horizontal Advertisement is updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('list.ads')->with($notification);


    }




}


public function DeleteAds($id){

    Advertisement::find($id)->delete();
    $notification=array(
        'message'=> 'Advertisement is deleted successfully',
        'alert-type'=>'success'
    );
    return redirect()->route('list.ads')->with($notification);
}






}
