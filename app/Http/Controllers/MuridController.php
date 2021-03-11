<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MuridController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('manage-student')) return $next($request);
            abort(403, 'Anda tidak memiliki akses');
        });
    }

    public function list(){
        return view('murid.list');
    }    

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
