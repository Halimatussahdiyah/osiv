<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Admindesa;
use Illuminate\Support\Facades\Session;

class LaporanController extends Controller
{
    public function index(Request $request) {
        $admin_desa = Admindesa::with(['laporan'])->find(Session::get('id_admin_desa'));
        $daftar_laporan = $admin_desa->laporan;

       return view ('pengguna_laporan.index', [
           "daftar_laporan"=> $daftar_laporan

       ]);
    }

    public function create() {

        return view('pengguna_laporan.create');

    }

    public function store(Request $request) {
        $judul_laporan = $request->judul_laporan; 

        if ($request->hasFile('file_laporan')) {

            $lokasi_file = $request->file_laporan->store('public');

        }

        $admin_desa = auth()->user();
        // dd(Session::get('id'));

        $laporan = Laporan::create([
            "id_admin_desa" => Session::get('id_admin_desa'),
            "judul_laporan" => $judul_laporan,
            "file_laporan" => $lokasi_file ?? null,
            "tipe" => 'triwulan',
            "jenis_laporan" => $request->jenis_laporan,
            "tanggal" => $request->tanggal
        ]);

        return redirect()->route('pengguna.laporan.index')->with('sukses','Data laporan Desa Berhasil Ditambahkan!!');
    }

    public function form_ubah(Laporan $laporan) {
        return view('pengguna_laporan.ubah', [
            "laporan" => $laporan
        ]);

    }

    public function form_hapus(Laporan $laporan) {
        return view('pengguna_laporan.hapus', [
            "laporan" => $laporan
        ]);

    }

    public function submit_hapuslaporan(laporan $laporan){
        $laporan-> delete();
        return redirect('/admin/pengguna_laporan')->with('status', "Data laporan Desa Berhasil Dihapus!!");
    }

    public function submit_perubahan(laporan $laporan, Request $request) {
        $judul_laporan = $request->judul_laporan; 

        if ($request->hasFile('file_laporan')) {

            $lokasi_file = $request->file_laporan->store('public');
        }

        $admin_desa = auth()->user();

        $laporan->update([
            "judul_laporan" => $judul_laporan,
            "file_laporan" => $lokasi_file,
            "tipe" => 'triwulan'
        ]);

        $laporan->save();

        return redirect()->route('pengguna.laporan.index')->with('status', "Data laporan Desa Berhasil Diubah!!");
    }
    
}
