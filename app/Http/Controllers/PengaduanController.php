<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Session;

class PengaduanController extends Controller
{
    public function pengaduan()
    {
        $pengaduans=Pengaduan::where('admin_desa_id', Session::get('id_admin_desa'))->get();
        return view('admin.pengaduan',compact('pengaduans'))->with('i');
    }
    
    public function pengaduan_detail ($id)
    {
        return view('admin.form.detail_pengaduan', [
            'pengaduans' => Pengaduan::all()->where('id',$id)
        ]);
    }
}
