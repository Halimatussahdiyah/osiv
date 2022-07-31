<?php

namespace App\Http\Controllers;

use App\Models\Admindesa;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tags\See;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function dashboard_info()
    {
        return view('admin.layout_admin.main');
    }

    public function berita_desa()
    {
        // return Berita::all();
        $admin_desa=Auth::guard('admindesa')->user();
        //dd($admin_desa->desa);
        $nama_desa=$admin_desa->desa->nama_desa;
        return view('admin.berita_desa', [
            'beritas' => Berita::where('nama_desa',$nama_desa)->get()
        ])->with('i');
    }
//  Form Berita Desa
    public function form_berita()
    {
        return view('admin.form.tambah_berita');
    }

    public function formedit_berita($id)
    {
        $beritas=Berita::find($id);
        return view('admin.form.edit_berita',compact('beritas'));
    }

    public function detail_berita($id)
    {
        $beritas=Berita::find($id);
        return view('admin.form.detail_beritadesa',compact('beritas'));
    } 

    public function tambah_berita(Request $request)
    {
        // return $request;
        $foto_kegiatan = $request->file('foto_kegiatan');
        $new_name = rand().'.'.$foto_kegiatan->getClientOriginalExtension();
        $foto_kegiatan->move(public_path('foto_kegiatan'), $new_name);
        $validasiBerita = array(
            'nama_desa' => $request->nama_desa,
            'judul_berita_desa' => $request->judul_berita_desa,
            'foto_kegiatan' => $new_name,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'penulis' => $request->penulis
        );

        Berita::create($validasiBerita);

        return redirect('/admin/berita_desa')->with('sukses','Berita Desa Berhasil Ditambahkan!!');
    }

    public function edit_berita(Request $request, $id)
    {
        // return $request;
       
        $validasiBerita = array(
            'nama_desa' => $request->nama_desa,
            'judul_berita_desa' => $request->judul_berita_desa,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'penulis' => $request->penulis
        );
        Berita::whereid($id)->update($validasiBerita);
        $foto_kegiatan = $request->file('foto_kegiatan');
        if($request->hasFile('foto_kegiatan'))
        {
            $new_name = rand().'.'.$foto_kegiatan->getClientOriginalExtension();
            $foto_kegiatan->move(public_path('foto_kegiatan'), $new_name);
            $data = array(            
                'foto_kegiatan'=>$new_name,
            );
        Berita::whereid($id)->update($data);
        }


        return redirect('/admin/berita_desa')->with('sukses','Berita Desa Berhasil Diedit!!');
    }

    public function hapus_berita(Request $request)
    {
        Berita::where('id', $request->id)->delete();

        return redirect('/admin/berita_desa')->with('sukses','Berita Desa Berhasil Dihapus!!');
    }

    // Pengaduan
    // public function pengaduan()
    // {
    //     return view('admin.pengaduan', [
    //         'pengaduans' => Pengaduan::all()->where('jenis_pengaduan',"pembangunan desa")
    //     ])->with('i');
    // }
    public function form_pengaduan()
    {
        
        return view('admin.form.tambah_pengaduan');
    }

// Form pengaduan
    public function formedit_pengaduan($id)
    {
        return view('admin.form.edit_pengaduan', [
            'pengaduans' => Pengaduan::findOrFail($id)
        ]);
    }
        // $pengaduans=Pengaduan::find($id);
        // return view('admin.detail',compact('pengaduans'));

    public function tambah_pengaduan(Request $request)
    {

        // return $request->all();
        $new_name = '';
        if($request->file('foto_kegiatan')){
            $foto_kegiatan = $request->file('foto_kegiatan');
            $new_name = rand().'.'.$foto_kegiatan->getClientOriginalExtension();
            $foto_kegiatan->move(public_path('foto_kegiatan'), $new_name);
        }
        $validasipengaduan = array(
            'admin_desa_id' => Session::get('id_admin_desa'),
            'nama_pelapor' => $request->nama_pelapor,
            'alamat' => $request->alamat,
            'kontak_telp' => $request->kontak,
            'tanggal' => $request->tanggal,
            'pengaduan' => $request->pengaduan,
            'jenis_pengaduan' => $request->jenisPengaduan,
            'pengadu' => "admin desa",
            'status' => "Belum Diproses",
            'foto_kegiatan' => $new_name,
        );

        Pengaduan::create($validasipengaduan);

        return redirect('/admin/pengaduan')->with('sukses','Data Pengaduan Berhasil Ditambahkan!!');
    }

    public function edit_pengaduan(Request $request, $id)
    {
        // return $request;

        $validasipengaduan = array(
            'jenis_pengaduan' => $request->jenisPengaduan,
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

        
        return redirect('/admin/pengaduan')->with('sukses','Data Pengaduan Berhasil Diedit!!');
    }

    public function hapus_pengaduan(Request $request)
    {
        Pengaduan::where('id', $request->id)->delete();

        return redirect('/admin/pengaduan')->with('sukses','Data Pengaduan Berhasil Dihapus!!');
    } 
}


