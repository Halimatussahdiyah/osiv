<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\Admindesa;
use App\Models\Admindpmd;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
	function index() {
		$user = Admindesa::where('id_admin_desa', Auth::user()->id)->with('desa')->first();
		return view('admin.layout_admin.main');
	}

    function masuk(Request $kiriman)
    {
        $data1=Admindesa::with('desa')->where('email',$kiriman->username)->first();
        $data2=Admindpmd::where('username',$kiriman->username)->first();
        $data3=Masyarakat::where('username',$kiriman->username)->first();


        if ($data1) {
			// dd($data1, Hash::check($kiriman->password, $data1->password), $kiriman);
			if(Hash::check($kiriman->password, $data1->password)){
				if ($data1->status){
					Auth::guard('admindesa')->LoginUsingId($data1['id_admin_desa']);
					session([
						'id_admin_desa'		=> $data1->id_admin_desa,
						'username'	=> $data1->username,
						'id_desa'	=> $data1->id_desa,
						'jabatan'	=> $data1->jabatan,
						'desa'	=> $data1->desa->nama_desa,
						'kecamatan'	=> $data1->desa->kecamatan,
					]);

					return redirect('/admin-desa');
				}else{
					return redirect('/login')->with('gagal','Akun Anda Belum Di Validasi!');
				}
				
			}
			return redirect('/login')->with('gagal','Login Anda Salah!');
    	}
    	else if ($data2) {
			if(Hash::check($kiriman->password, $data2->password)){
				Auth::guard('admindpmd')->LoginUsingId($data2['id_admin_dpmd']);
				session([
					'id_admin_dpmd'		=> $data2->id_admin_dpmd,
				]);
				return redirect('/admin-dashboard');
			}
			return redirect('/login')->with('gagal','Login Anda Salah!');
    	}
    	else if ($data3) {
			if(Hash::check($kiriman->password, $data3->password)){
				Auth::guard('masyarakat')->LoginUsingId($data3['id']);
				session([
					'id'		=> $data3->id,
					'username'	=> $data3->id,
					'pasword'	=> $data3->id,
					'nama'	=> $data3->id,
					'jenis_kelamin'	=> $data3->id,
					'alamat'	=> $data3->id,
					'no_hp'	=> $data3->id,
				]);
				return redirect('/masyarakat/dashboard_infomasyarakat');
			}
			return redirect('/login')->with('gagal','Login Anda Salah!');
    	}
    	else{
    		return redirect('/login')->with('gagal','Login Anda Salah!');
    	}
	}
	public function logout(Request $request) 
	{
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect('/');
	}
}
