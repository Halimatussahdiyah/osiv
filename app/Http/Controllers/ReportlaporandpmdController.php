<?php

namespace App\Http\Controllers;

use App\Models\Admindesa;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReportlaporandpmdController extends Controller
{
    // Laporan dpmd semesteran
       public function index(Request $request) {
        $daftar_laporan = Laporan::where('tipe','semesteran')->get();

       return view('admindpmd.laporansemesteran', [
           "daftar_laporan"=> $daftar_laporan

       ]);
    }

    // Laporan dpmd triwulan
      public function indextriwulan(Request $request) {
       $daftar_laporan = Laporan::where('tipe', 'triwulan')->get();

       return view('admindpmd.laporantriwulan', [
           "daftar_laporan"=> $daftar_laporan

       ]);
    }

    // Laporan dpmd pengajuan Proporsal
      public function indexproporsal(Request $request) {
       $daftar_laporan = Laporan::where('tipe', 'proposal')->get();

       return view('admindpmd.laporanproporsal', [
           "daftar_laporan"=> $daftar_laporan

       ]);
    }
     
}
