<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealetController extends Controller
{
    
    public function home(){
        return view('index');
    }


    public function about(){
        return view('aboutSite');
    }

    public function blog(){
        return view('blogSite');
    }

    public function shop(){
        return view('shopSite');
    }

}
