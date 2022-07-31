<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class AdmindpmdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admindpmd.berita', [
            'beritas' => Berita::all()
        ])->with('i');
    }

    public function komenberita($id)
    {
        return view('admindpmd.form_admindpmd.komenberita', [
            'id' => $id,
            'berita' => Berita::find($id)
        ])->with('i');
    }

    public function komenberitapost(Request $request, $id)
    {
        Berita::whereid($id)->update([
            'komentar'=>$request->komentar
        ]);

        return redirect('/admin/admindpmd')->with('sukses','Tanggapi Berita Berhasil Ditambahkan!!');
    }

    public function hapus_berita(Request $request)
    {
        Berita::where('id', $request->id)->delete();

        return redirect('/admin/admindpmd')->with('sukses','Data Berhasil Dihapus!!');
    }

    public function statusberita($id)
    {
        Berita::whereid($id)->update([
            'status'=>'dipost'
        ]);

        return redirect('/admin/admindpmd')->with('sukses','Status Berhasil Dipost!!');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
