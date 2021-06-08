<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
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
}
