<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MuridController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list(){
        return view('murid.list');
    }

    public function nilai(){
        return view('murid.nilai');
    }
    
    // public function nilaibyid(){
    //     $id = Auth::user()->id;
    //     return view('murid.nilai', ['id' => $id]);        
    // }

    public function add(){
        return view('murid.tambah');
    }

    public function store(){

    }

    public function edit(){

    }

    public function update(){

    }

    public function destroy(){

    }
}
