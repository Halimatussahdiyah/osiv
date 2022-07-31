<?php

namespace App\Http\Controllers\pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\laporansemesteran;
use App\Models\Admindesa;
use Illuminate\Support\Facades\Session;

class LaporanController2 extends Controller
{
    public function index(Request $request) {
        $admin_desa = Admindesa::with(['laporan'])->find(Session::get('id_admin_desa'));
        $daftar_laporan = $admin_desa->laporan;

       return view ('pengguna_laporan.indexsemesteran', [
           "daftar_laporan"=> $daftar_laporan

       ]);
    }

    public function create() {
        return view('pengguna_laporan.tambahsemester');

    }

    public function store(Request $request) {
        $judul_laporan = $request->judul_laporan; 

        if ($request->hasFile('file_laporan')) {

            $lokasi_file = $request->file_laporan->store('public');

        }

        $admin_desa = auth()->user();
        // dd(Session::get('id'));

        $laporan = laporansemesteran::create([
            "id_admin_desa" => Session::get('id_admin_desa'),
            "judul_laporan" => $judul_laporan,
            "file_laporan" => $lokasi_file ?? null,
            "tipe" => 'semesteran',
            "jenis_laporan" => $request->jenis_laporan,
            "tanggal" => $request->tanggal
        ]);

        return redirect()->route('pengguna_laporan.indexsemesteran')->with('sukses','Data laporan Desa Berhasil Ditambahkan!!');
    }

    public function form_ubah(laporansemesteran $laporan) {
        return view('pengguna_laporan.ubahsemester', [
            "laporan" => $laporan
        ]);

    }

    public function form_hapus(laporansemesteran $laporan) {
        return view('pengguna_laporan.hapussemester', [
            "laporan" => $laporan
        ]);

    }

    public function submit_hapuslaporan(laporansemesteran $laporan){
        $laporan-> delete();
        return redirect()->route('pengguna_laporan.indexsemesteran')->with('status', "Data laporan Desa Berhasil Dihapus");
    }

    public function submit_perubahan(laporansemesteran $laporan, Request $request) {
        $judul_laporan = $request->judul_laporan; 

        if ($request->hasFile('file_laporan')) {

            $lokasi_file = $request->file_laporan->store('public');
        }

        $admin_desa = auth()->user();

        $laporan->update([
            "judul_laporan" => $judul_laporan,
            "file_laporan" => $lokasi_file,
            "tipe" => 'semesteran'
        ]);

        $laporan->save();

        return redirect()->route('pengguna_laporan.indexsemesteran')->with('status', "Data laporan Desa Berhasil Diubah");
    }

}
