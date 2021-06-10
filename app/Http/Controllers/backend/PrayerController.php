<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prayer;

class PrayerController extends Controller
{

    public function __construct(){
        $this->middleware('auth');

    }
    public function PrayerSetting(){
        $prayer=Prayer::all()->first();
        return view('backend/setting/prayer',['prayer'=>$prayer]);

    }

    public function PrayerUpdate(Request $request ,$id){

        Prayer::find($id)->update([
            'fajr'=>$request->fajr,
            'johor'=>$request->johor,
            'asor'=>$request->asor,
            'magrib'=>$request->magrib,
            'eaha'=>$request->eaha,
            'jummah'=>$request->jummah,

        ]);

        $notification=array(
            'message'=> 'Prayer Settings Updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('prayer.setting')->with($notification);
    }
}
