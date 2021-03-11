<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AkunController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next) {
            if (Gate::allows('manage-users')) return $next($request);
            abort(403,'Anda tidak memiliki cukup hak akses');
        });
    }

    public function show()
    {
        $data = User::where(function($query) {
            return $query->where('roles', 'Super Admin')->orWhere('roles', 'Admin');
        })
            ->orderByDesc('id')
            ->get();
        return view('akuns.show', ['user' => $data]);
    }

    public function add()
    {
        return view('akuns.add');
    }

    public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'email' => 'required|string',
            'name' => 'required|string',
            'password' => 'required|string',
            'repassword' => 'required|string',
            'roles' => 'required|string',
        ]);

        if ($validators->fails()) {
            return response(['error' => $validators->errors(), 'Validation Error']);
        }

        $data = $request->all();        

        if ($data['password'] != $data['repassword']) return redirect()->route('akun.tambah')->with('message', 'Password tidak cocok');

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->roles = $data['roles'];
        $user->save();

        return redirect()->route('akun.list')->with('message', 'Berhasil menambahkan data akun');
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('akuns.edit', ['user' => $data]);
    }

    public function update(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'email' => 'required|string',
            'name' => 'required|string',
            'password' => 'required|string',
            'repassword' => 'required|string',
            'roles' => 'required|string',
        ]);

        if ($validators->fails()) {
            return response(['error' => $validators->errors(), 'Validation Error']);
        }

        $data = $request->all();        

        if ($data['password'] != $data['repassword']) return redirect()->route('akun.tambah')->with('message', 'Password tidak cocok');

        $user = User::find($data['id']);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->roles = $data['roles'];
        $user->save();

        return redirect()->route('akun.list')->with('message', 'Berhasil mengubah data akun');
    }
    
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        
        return redirect()->route('akun.list')->with('message', 'Berhasil menghapus data akun');        
    }
}
