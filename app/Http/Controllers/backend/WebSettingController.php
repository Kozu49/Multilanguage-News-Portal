<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteSetting;
use Intervention\Image\Facades\Image;


class WebSettingController extends Controller
{
    public function Websetting(){
        $websetting=WebsiteSetting::all()->first();
        return view('backend.websetting.index',['websetting'=>$websetting]);
    }

    public function UpdateWebSetting(Request $request,$id){
        $image=$request->file('logo');
        if($image){
                $img_ext=strtolower($image->getClientOriginalExtension());
                $name_gen=hexdec(uniqid());
                $imagename=$name_gen. '.'.$img_ext;
                Image::make($image)->resize(320,130)->save('image/logo/'.$imagename);
                // unlink($old_image);
                // unlink('/image/postimg/'.$old_image);
               
            WebsiteSetting::find($id)->update([
            'email'=>$request->email,
            'logo'=>$imagename,
            'address_eng'=>$request->address_eng,
            'address_nep'=>$request->address_nep,
            'phone_eng'=>$request->phone_eng,
            'phone_nep'=>$request->phone_nep,
            

        ]);
        $notification=array(
            'message'=> 'Websetting updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('website.setting')->with($notification);
        
    }
        else{

            WebsiteSetting::find($id)->update([
                'email'=>$request->email,
                'address_eng'=>$request->address_eng,
                'address_nep'=>$request->address_nep,
                'phone_eng'=>$request->phone_eng,
                'phone_nep'=>$request->phone_nep,
        ]);
        $notification=array(
            'message'=> 'Websetting updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('website.setting')->with($notification);
    }


    }
}
