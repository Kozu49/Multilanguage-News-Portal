<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LiveTv;

class LiveTvController extends Controller
{
    public function LiveTvSetting(){

        $livetv=LiveTv::all()->first();
        return view('backend/setting/livetv',['livetv'=>$livetv]);

    }

    public function LiveTvUpdate(Request $request,$id){
        
        LiveTv::find($id)->update([
            'embed_code'=>$request->embed_code,
            

        ]);

        $notification=array(
            'message'=> 'LiveTv Settings Updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('livetv.setting')->with($notification);
    }

    public function ActiveSetting($id){
        LiveTv::find($id)->update([
            'status'=>1,
        ]);
        $notification=array(
            'message'=> 'Live Tv Activated successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function DeactiveSetting($id){
        LiveTv::find($id)->update([
            'status'=>0,
        ]);
        $notification=array(
            'message'=> 'Live Tv Deactivated successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);

    }
}
