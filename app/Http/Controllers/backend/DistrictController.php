<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;

class DistrictController extends Controller
{
    public function Index(){
        $districts=District::orderBy('id','desc')->paginate(5);
        return view('backend.district.index',['districts'=>$districts]);

    }

    public function AddDistrict(){
        return view('backend.district.create');

    }

    public function StoreDistrict(Request $request){
        $validated = $request->validate([
            'district_eng' => 'required|unique:districts|max:255',
            'district_nep' => 'required|unique:districts|max:255',
        ]);
        District::insert([
            'district_eng'=>$request->district_eng,
            'district_nep'=>$request->district_nep,
        ]);
        $notification=array(
            'message'=> 'District Added successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('districts')->with($notification);

    }

    public function EditDistrict($id){
        $district=District::find($id);
        return view('backend.district.edit',['district'=>$district]);
    }

    public function UpdateDistrict(Request $request,$id){
        District::find($id)->update([
            'district_eng'=>$request->district_eng,
            'district_nep'=>$request->district_nep,
        ]);
        $notification=array(
            'message'=> 'District Updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('districts')->with($notification);;
    }

    public function DeleteDistrict($id){
        District::find($id)->delete();
        $notification=array(
            'message'=> 'District Deleted Successfully',
            'alert-type'=>'warning'
        );
        return redirect()->route('districts')->with($notification);;

    }

}
