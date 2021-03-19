<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.index');
    }

    public function edit_password()
    {
        return view('akuns.edit_password');
    }

    public function update_password(Request $request)
    {
        $user = User::find(Auth::id());
        $data = $request->all();        
        if (!Hash::check($data['passwordlama'], $user->password)) {
            return redirect()->route('akun.editpassword')->with('message', 'Password lama tidak sama');            
        }
        if ($data['password'] != $data['repassword']) {            
            return redirect()->route('akun.editpassword')->with('message', 'Password baru tidak sama dengan konfirmasi password');
        }
        $user->password = Hash::make($data['password']);
        $user->save();
        
        return redirect()->route('akun.editpassword')->with('message', 'Berhasil mengubah password');
    }
}
