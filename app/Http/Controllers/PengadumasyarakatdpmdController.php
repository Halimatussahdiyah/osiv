<?php

namespace App\Http\Controllers;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PengadumasyarakatdpmdController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::whereHas('masyarakat', function($q) {
                $q->where('id_desa', Session::get('id_desa'));
            })->get();
        return view('admindpmd.pengaduansmasyarakat', [
            'pengaduans' => $pengaduan
        ])->with('i');
    }

    public function tanggapi_Pengaduan($id)
    {
        return view('admindpmd.form_admindpmd.tanggapipengaduan', [
            'id' => $id,
            'pengaduan' => Pengaduan::find($id)
        ])->with('i');
    }

    public function tanggapi_Pengaduanpost(Request $request, $id)
    {
        Pengaduan::whereid($id)->update([
            'komentar'=>$request->komentar
        ]);

        return redirect('/dpmd/pengaduan')->with('sukses','Komentar Berhasil Ditambahkan!!');
    }

    public function hapuspengaduan(Request $request)
    {
        Pengaduan::where('id', $request->id)->delete();

        return redirect('/dpmd/pengaduan')->with('sukses','Data Berhasil Dihapus!!');
    }

    public function statuspengaduan($id)
    {
        Pengaduan::whereid($id)->update([
            'status'=>'dipost'
        ]);

        return redirect('/admindpmd/statuspengaduan')->with('sukses','Status Berhasil Diubah!!');
    }

    public function sedangdiproses($id)
    {
        Pengaduan::whereid($id)->update([
            'status'=>'Sedang Diproses'
        ]);

        return redirect()->back()->with('sukses','Status Sedang Diproses!!');
    }

    public function belumdiproses($id)
    {
        Pengaduan::whereid($id)->update([
            'status'=>'Belum Diproses'
        ]);

        return redirect()->back()->with('sukses','Status Belum Diproses !!');
    }

    public function di_proses($id)
    {
        Pengaduan::whereid($id)->update([
            'status'=>'Diproses'
        ]);

        return redirect()->back()->with('sukses','Status Diproses!!');
    }
}
