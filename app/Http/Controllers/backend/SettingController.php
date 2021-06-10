<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Social;

class SettingController extends Controller
{

    public function __construct(){
        $this->middleware('auth');

    }
    public function SocialSetting(){
        $social=Social::all()->first();
        return view('backend/setting/social',['social'=>$social]);

    }

    public function SocialUpdate(Request $request, $id){
        Social::find($id)->update([
            'facebook'=>$request->facebook,
            'youtube'=>$request->youtube,
            'twitter'=>$request->twitter,
            'linkedin'=>$request->linkedin,
            'instagram'=>$request->instagram,

        ]);

        $notification=array(
            'message'=> 'Social Settings Updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('social.setting')->with($notification);
    }
}
