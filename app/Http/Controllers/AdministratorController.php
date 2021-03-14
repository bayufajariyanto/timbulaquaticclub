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

    public function pendaftaran()
    {
        return view('dashboard.pendaftaran');
    }

    public function detail_pendaftaran($id)
    {
        return view('dashboard.detail_pendaftaran', ['id' => $id]);
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
    public function store_laporan(Request $request)
    {
        dd('store laporan');
    }
}
