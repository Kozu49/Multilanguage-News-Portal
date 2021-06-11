<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{
    public function Logout(){

        Auth::logout();

        return redirect()->route('login');
    }   
    
    public function Accountsetting(){
        $id=Auth::user()->id;
        $edit=User::find($id);
        return view('backend.account.profile',['edit'=>$edit]);
    }

    public function AccountEdit($id){

        $user=User::find($id);
        return view('backend.account.edit',['user'=>$user]);
    }

    public function AccountUpdate(Request $request, $id){
        $user=User::find($id);
      
        $image=$request->file('image');
        if($image){
                $img_ext=strtolower($image->getClientOriginalExtension());
                $name_gen=hexdec(uniqid());
                $imagename=$name_gen. '.'.$img_ext;
                Image::make($image)->resize(500,500)->save('image/profileimage/'.$imagename);
                // unlink($old_image);
                // unlink('/image/postimg/'.$old_image);
               
        User::find($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'address'=>$request->address,
            'gender'=>$request->gender,
            'position'=>$request->position,
            'image'=>$imagename,
            

        ]);
        $notification=array(
            'message'=> 'Profile updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('account.setting')->with($notification);
        
    }
        else{

            User::find($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'mobile'=>$request->mobile,
                'address'=>$request->address,
                'gender'=>$request->gender,
                'position'=>$request->position,
            
        ]);
        $notification=array(
            'message'=> 'Profile updated successfully',
            'alert-type'=>'warning'
        );
        return redirect()->route('account.setting')->with($notification);
    }


    }

    public function PasswordChange($id){

        $user=User::find($id);
        return view('backend.account.password',['user'=>$user]);
    }

    public function PasswordUpdate(Request $request,$id){
        $user=User::find($id);

        $validated=$request->validate([
            'oldpassword'=> 'required',
            'password'=> 'required|confirmed',
        ]);
        $hashedpassword=$user->password;
        if(Hash::check($request->oldpassword,$hashedpassword)){
            $user=User::find($id);
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect()->route('admin.logout');
        
        }else{
            return redirect()->back();


        }



    }
    
}
