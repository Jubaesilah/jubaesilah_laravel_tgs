<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller{
    public function admin(){
        return view('admin.dashboard');
     }

     public function dosen(){
        return view('dosen.dashboard');
     }

}

  
