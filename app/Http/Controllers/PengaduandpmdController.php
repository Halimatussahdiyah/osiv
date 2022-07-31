<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduandpmdController extends Controller
{
    public function index()
    {
        return view('/admindpmd/pengaduan', [
            'pengaduans' => Pengaduan::all()
        ])->with('i');
    }

    public function komenPengaduan($id)
    {
        return view('admindpmd.form_admindpmd.komenpengaduan', [
            'id' => $id,
            'pengaduan' => Pengaduan::find($id)
        ])->with('i');
    }

    public function komenPengaduanpost(Request $request, $id)
    {
        Pengaduan::whereid($id)->update([
            'komentar'=>$request->komentar
        ]);

        return redirect('/admindpmd/pengaduan')->with('sukses','Komentar Berhasil Ditambahkan!!');
    }

    public function hapus_pengaduan(Request $request)
    {
        Pengaduan::where('id', $request->id)->delete();

        return redirect('/admindpmd/pengaduan')->with('sukses','Data Berhasil Dihapus!!');
    }

    public function status_pengaduan($id)
    {
        Pengaduan::whereid($id)->update([
            'status'=>'dipost'
        ]);

        return redirect('/admindpmd/pengaduan')->with('sukses','Status Berhasil Diubah!!');
    }

    public function sedang_diproses($id)
    {
        Pengaduan::whereid($id)->update([
            'status'=>'Sedang Diproses'
        ]);

        return redirect()->back()->with('sukses','Status Sedang Diproses!!');
    }

    public function belum_diproses($id)
    {
        Pengaduan::whereid($id)->update([
            'status'=>'Belum Diproses'
        ]);

        return redirect()->back()->with('sukses','Status Belum Diproses !!');
    }

    public function diproses($id)
    {
        Pengaduan::whereid($id)->update([
            'status'=>'Diproses'
        ]);

        return redirect()->back()->with('sukses','Status Diproses!!');
    }
}
