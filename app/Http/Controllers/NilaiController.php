<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function nilai(){
        $data = Student::where('email', auth()->user()->email)->get();        
        $img = '';
        foreach ($data as $atlit) {
            $img = $atlit->foto;
        }
        // dd($img);
        return view('murid.nilai')->with('img', $img);
    }
}
