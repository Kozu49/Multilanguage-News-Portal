<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Website;

class WebController extends Controller
{

    public function __construct(){
        $this->middleware('auth');

    }
    public function AddWeb(){
        $webs=Website::all();
        return view('backend/website/create',['webs'=>$webs]);

    }

    public function StoreWeb(Request $request){

        $validated = $request->validate([
            'website_name' => 'required',     
            'website_link' => 'required',
          
        ]);
        Website::insert([
            'website_name'=>$request->website_name,
            'website_link'=>$request->website_link,

            
        ]);
        $notification=array(
            'message'=> 'Website is added successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('add.website')->with($notification);
    }

    public function allWeb(){

        $webs=Website::orderBy('id','desc')->paginate(5);
        return view('backend/website/index',['webs'=>$webs]);
    }

    public function EditWeb($id){

        $web=Website::find($id);
        return view('backend/website/edit',['web'=>$web]);
    }

    public function UpdateWeb(Request $request,$id){
        Website::find($id)->update([
            'website_name'=>$request->website_name,
            'website_link'=>$request->website_link,


        ]);
        $notification=array(
            'message'=> 'Website edited successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.website')->with($notification);

    }

    public function DeleteWeb($id){
        Website::find($id)->delete();
        $notification=array(
            'message'=> 'Website deleted successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.website')->with($notification);

    }
}
