<?php

namespace App\Http\Controllers;

use App\Mail\NotifValidasiEmail;
use App\Models\Admindesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ValidasiadmindesaController extends Controller
{
    public function index()
    {
        $pengguna=Admindesa::All(); 
        
        return view('admindpmd.admindesa', compact('pengguna'))->with('i');
    }

    public function edit_validasi(Request $request, $id, $type)
    {
        // FUNGSI TRY CATCH
        try {
            
            if($type==1){ 
                Mail::to(Admindesa::find($id)->email)->send(new NotifValidasiEmail());
            }

            // return $request;
            Admindesa::find($id)->update([
                'status'=>$type
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Kirim Email Gagal!, Harap perhatikan koneksi internet dan nama email');
        }
       
       
        return redirect()->back()->with('sukses', 'Kirim Email Berhasil !');;
    }

    public function hapus_validasi($id)
    {
        Admindesa::where('id_admin_desa', $id)->delete();

        return redirect('/dpmd/pengguna');
    }

}
