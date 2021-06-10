<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seo;

class SeoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');

    }
    public function SeoSetting(){

        $seo=Seo::all()->first();
        return view('backend/setting/seo',['seo'=>$seo]);
    }

    public function SeoUpdate(Request $request,$id){
        Seo::find($id)->update([
            'meta_author'=>$request->meta_author,
            'meta_title'=>$request->meta_title,
            'meta_keyword'=>$request->meta_keyword,
            'meta_description'=>$request->meta_description,
            'google_analytics'=>$request->google_analytics,
            'google_verification'=>$request->google_verification,
            'alexa_analytics'=>$request->alexa_analytics,

        ]);

        $notification=array(
            'message'=> 'SEO Settings Updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('seo.setting')->with($notification);


    }
}
