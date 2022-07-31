<?php

namespace App\Http\Controllers\pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\laporanproporsal;
use App\Models\Admindesa;
use Illuminate\Support\Facades\Session;

class LaporanController3 extends Controller
{
    public function index(Request $request) {
        $admin_desa = Admindesa::with(['laporan'])->find(Session::get('id_admin_desa'));
        $daftar_laporan = $admin_desa->laporan;

       return view ('pengguna_laporan.indexproporsal', [
           "daftar_laporan"=> $daftar_laporan

       ]);
    }

    public function create() {
        return view('pengguna_laporan.tambahproporsal');

    }

    public function store(Request $request) {
        $judul_laporan = $request->judul_laporan; 

        if ($request->hasFile('file_laporan')) {

            $lokasi_file = $request->file_laporan->store('public');

        }

        $admin_desa = auth()->user();
        // dd(Session::get('id'));

        $laporan = laporanproporsal::create([
            "id_admin_desa" => Session::get('id_admin_desa'),
            "judul_laporan" => $judul_laporan,
            "file_laporan" => $lokasi_file ?? null,
            "tipe" => 'proposal',
            "tanggal" => $request->tanggal
        ]);

        return redirect()->route('admindesa_laporan.indexpengajuan')->with('sukses','Data laporan Desa Berhasil Ditambahkan!!');
    }

    public function formubah(laporanproporsal $laporan) {
        return view('pengguna_laporan.ubahproporsal', [
            "laporan" => $laporan
        ]);

    }

    public function formhapus(laporanproporsal $laporan) {
        return view('pengguna_laporan.hapusproporsal', [
            "laporan" => $laporan
        ]);

    }

    public function submithapus_laporan(laporanproporsal $laporan){
        $laporan-> delete();
        return redirect()->route('admindesa_laporan.indexpengajuan')->with('status', "Data laporan Desa Berhasil Dihapus");
    }

    public function submitperubahan(laporanproporsal $laporan, Request $request) {
        $judul_laporan = $request->judul_laporan; 

        if ($request->hasFile('file_laporan')) {

            $lokasi_file = $request->file_laporan->store('public');
        }

        $admin_desa = auth()->user();

        $laporan->update([
            "judul_laporan" => $judul_laporan,
            "file_laporan" => $lokasi_file,
            "tipe" => 'proposal'
        ]);

        $laporan->save();

        return redirect()->route('admindesa_laporan.indexpengajuan')->with('status', "Data laporan Desa Berhasil Diubah!!");
    }
}
