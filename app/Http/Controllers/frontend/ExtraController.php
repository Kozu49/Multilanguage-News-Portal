<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
class ExtraController extends Controller
{
    public function Nepali(){
        Session::get('lang');
        Session()->forget('lang');
        Session()->put('lang','nepali');
        return redirect()->back();



    }

    public function English(){
        Session::get('lang');
        Session()->forget('lang');
        Session()->put('lang','english');
        return redirect()->back();


    }

    public function SearchDistrict(Request $request){

        $districtid=$request->district_id;
        $subdistrictid=$request->subdistrict_id;

        $subdisposts=DB::table('posts')->where('district_id',$districtid)->where('subdistrict_id',$subdistrictid)->orderBy('id','desc')->paginate(5);
        return view('main.allpost',['catposts'=>$subdisposts]);


    }

    
}
