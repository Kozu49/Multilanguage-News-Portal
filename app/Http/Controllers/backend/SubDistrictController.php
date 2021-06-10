<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubDistrict;
use App\Models\District;


class SubDistrictController extends Controller
{

    public function __construct(){
        $this->middleware('auth');

    }
    public function Index(){

        $subdistricts=SubDistrict::orderBy('id','desc')->paginate(5);
        return view('backend.subdistrict.index',['subdistricts'=>$subdistricts]);

    }

    public function AddSubDistrict(){

        $districts=District::all();
        return view('backend.subdistrict.create',['districts'=>$districts]);
    }

    public function StoreSubDistrict(Request $request){
        $validated = $request->validate([
            'subdistrict_eng' => 'required|unique:sub_districts|max:255',
            'subdistrict_nep' => 'required|unique:sub_districts|max:255',
        ]);
        SubDistrict::insert([
            'subdistrict_eng'=>$request->subdistrict_eng,
            'subdistrict_nep'=>$request->subdistrict_nep,
            'district_id'=>$request->district_id,

        ]);
        $notification=array(
            'message'=> 'SubDistrictCategory Added successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('subdistricts')->with($notification);
    }

    public function EditSubDistrict($id){

        $districts=District::all();
        $subdistrict=SubDistrict::find($id);
        return view('backend.subdistrict.edit',['subdistrict'=>$subdistrict,'districts'=>$districts]);
    }

    public function UpdateSubDistrict(Request $request,$id){
        SubDistrict::find($id)->update([
            'subdistrict_eng'=>$request->subdistrict_eng,
            'subdistrict_nep'=>$request->subdistrict_nep,
            'district_id'=>$request->district_id,
        ]);
        $notification=array(
            'message'=> 'SubDistrict Updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('subdistricts')->with($notification);;

    }
    public function DeleteSubDistrict($id){
        SubDistrict::find($id)->delete();
        $notification=array(
            'message'=> 'SubDistrict Deleted Successfully',
            'alert-type'=>'warning'
        );
        return redirect()->route('subdistricts')->with($notification);;

    

    }
}
