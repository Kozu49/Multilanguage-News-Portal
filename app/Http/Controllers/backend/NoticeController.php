<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    public function NoticeSetting(){
        $notice=Notice::all()->first();
        return view('backend/setting/notice',['notice'=>$notice]);


    }

    public function NoticeUpdate(Request $request,$id){
        Notice::find($id)->update([
            'notice'=>$request->notice,
            

        ]);

        $notification=array(
            'message'=> 'Notice Settings Updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('notice.setting')->with($notification);
    }

    public function ActiveSetting($id){
        Notice::find($id)->update([
            'status'=>1,
        ]);
        $notification=array(
            'message'=> 'Notice Activated successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function DeactiveSetting($id){
        Notice::find($id)->update([
            'status'=>0,
        ]);
        $notification=array(
            'message'=> 'Notice Deactivated successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);

    }
}
