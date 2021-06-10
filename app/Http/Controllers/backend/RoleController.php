<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;


class RoleController extends Controller
{

    public function __construct(){
        $this->middleware('auth');

    }

    


    
    public function AddWriter(){
        return view('backend.role.insert');

    }

    public function StoreWriter(Request $request){

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        User::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'category'=>$request->category,
            'district'=>$request->district,
            'post'=>$request->post,
            'setting'=>$request->setting,
            'website'=>$request->website,
            'gallery'=>$request->gallery,
            'advertisement'=>$request->advertisement,
            'role'=>$request->role,
            'type'=>0,
            
        ]);
        $notification=array(
            'message'=> 'User Added successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.writer')->with($notification);

    }

    public function AllWriter(){

        $users=User::where('type',0)->paginate(5);

        return view('backend.role.allwriter',['users'=>$users]);
    }


    public function EditWriter($id){

        $user=User::find($id);
        return view('backend.role.edit',['user'=>$user]);
    }

    public function UpdateWriter(Request $request,$id){

    

        User::find($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,

            'category'=>$request->category,
            'district'=>$request->district,
            'post'=>$request->post,
            'setting'=>$request->setting,
            'website'=>$request->website,
            'gallery'=>$request->gallery,
            'advertisement'=>$request->advertisement,
            'role'=>$request->role,

        ]);
        $notification=array(
            'message'=> 'Writer Updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.writer')->with($notification);


    }

    public function DeleteWriter($id){


        User::find($id)->delete();
        $notification=array(
            'message'=> 'Writer Deleted Successfully',
            'alert-type'=>'warning'
        );
        return redirect()->route('all.writer')->with($notification);;

    }








}
