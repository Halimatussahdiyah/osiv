<?php

namespace App\Http\Controllers;

use App\Models\Admindesa;
use App\Models\Desa;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function register(){

        $data['desas'] = Desa::get();
        return view('admin.register', $data);
    }

    public function registerMs(){
        $data['desas'] = Desa::get();
        $data['masyarakat'] = Masyarakat::get();
        return view('admin.register_masyarakat', $data);
    }

    public function registeruser(Request $request){

        // dd($request->all());
         // dd($request->all());
        $file = $request->file('picture');
        $fileName = $request->name . '-' . time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/picture', $fileName);     

        Admindesa::create([
            'username' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'jabatan' => $request->jabatan_desa,
            'id_desa' => $request->id_desa,
            'picture' => $fileName,
            'remember_token' => Str::random(60),
        ]);

        return redirect('/login');
    }

    public function registerusers(Request $request){

        // dd($request->all());
        Masyarakat::create([
            'username' => $request->username_email,
            'password' => bcrypt($request->password),
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'id_desa' => $request->id_desa,
            'no_hp' => $request->nomor_hp,
        ]);

        return redirect('/login');
    }

}
