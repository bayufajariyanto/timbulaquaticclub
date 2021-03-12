<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdministratorController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next) {
            if (Gate::allows('manage-administration')) return $next($request);
            abort(403,'Anda tidak memiliki cukup hak akses');
        });
    }

    public function pertanyaan()
    {
        return view('dashboard.pertanyaan');
    }

    public function laporan()
    {
        return view('dashboard.laporan');
    }
    public function detail_laporan()
    {
        return view('dashboard.detail_laporan');
    }
}
