<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        return view('landing_page/index');
    }

    public function about(){
        // return view('about', ["nama" => "Bayu Fajariyanto"]);
    }
}
