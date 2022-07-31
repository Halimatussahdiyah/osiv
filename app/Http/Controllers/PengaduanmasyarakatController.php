<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Session;

class PengaduanmasyarakatController extends Controller
{
    public function form_pengaduan()
    {
        return view('masyarakat.form.pengaduan_tambah');
    }

// Form pengaduan
    public function pengaduan_formedit($id)
    {
        return view('masyarakat.form.pengaduan_edit', [
            'pengaduans' => Pengaduan::findOrFail($id)
        ]);
    }
        // $pengaduans=Pengaduan::find($id);
        // return view('admin.detail',compact('pengaduans'));

    public function pengaduan_tambah(Request $request)
    {
        // return $request->all();
        $new_name = '';
        if($request->file('foto_kegiatan')){
            $foto_kegiatan = $request->file('foto_kegiatan');
            $new_name = rand().'.'.$foto_kegiatan->getClientOriginalExtension();
            $foto_kegiatan->move(public_path('foto_kegiatan'), $new_name);
        }
        $validasipengaduan = array(
            'masyarakat_id' => Session::get('id'),
            'nama_pelapor' => $request->nama_pelapor,
            'alamat' => $request->alamat,
            'kontak_telp' => $request->kontak,
            'tanggal' => $request->tanggal,
            'pengaduan' => $request->pengaduan,
            'jenis_pengaduan' => $request->jenis_pengaduan,
            'jenis_pekerjaan' => $request->jenis_pekerjaan,
            'status'=>"Belum Diproses",
            'pengadu'=>"masyarakat",
            'foto_kegiatan' => $new_name,
        );

        Pengaduan::create($validasipengaduan);

        return redirect('/masyarakat/pengaduan')->with('sukses','Data Pengaduan Berhasil Ditambahkan!!');
    }

    public function pengaduan_edit(Request $request, $id)
    {
        // return $request;
        $validasipengaduan = array(
            'jenis_pengaduan' => $request->jenis_pengaduan,
            'jenis_pekerjaan' => $request->jenis_pekerjaan,
            'pengaduan' => $request->pengaduan,
        );
        Pengaduan::whereid($id)->update($validasipengaduan);
        $foto_kegiatan = $request->file('foto_kegiatan');
        if($request->hasFile('foto_kegiatan'))
        {
            $new_name = rand().'.'.$foto_kegiatan->getClientOriginalExtension();
            $foto_kegiatan->move(public_path('foto_kegiatan'), $new_name);
            $data = array(            
                'foto_kegiatan'=>$new_name,
            );
            Pengaduan::whereid($id)->update($data);
        }

        
        return redirect('/masyarakat/pengaduan');
    }

    public function pengaduan_hapus(Request $request)
    {
        Pengaduan::where('id', $request->id)->delete();

        return redirect('/masyarakat/pengaduan');
    }  

    public function pengaduans_index()
    {
        $pengaduans=Pengaduan::where('masyarakat_id', Session::get('id'))->get();
        return view('masyarakat.pengaduans', compact('pengaduans'))->with('i');
    }
    
    public function pengaduan_detail($id)
    {
        return view('masyarakat.form.pengaduan_detail', [
            'pengaduans' => Pengaduan::all()->where('id',$id)
        ]);
    }

    public function informasi_bantuan(){
        return view('admin.pengaduan_informasi_bantuan', [
            'pengaduans' => Pengaduan::all()->where('jenis_pengaduan',"2")
        ])->with('i');
    }

    public function keluhan_pelayanan(){
        return view('admin.pengaduan_keluhan_pelayanan', [
            'pengaduans' => Pengaduan::all()->where('jenis_pengaduan',"3")
        ])->with('i');
    }
}
