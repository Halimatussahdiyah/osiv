<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;
use App\Models\Forum;
use App\Models\TanggapiForum;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class ForumDiskusiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forums=Forum::all();
        return view('admin.forum_diskusi',compact('forums'));
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
        // return $request;
        if($request->hasFile('foto_kegiatan'))
        {
            $foto_kegiatan = $request->file('foto_kegiatan');
            $new_name = rand().'.'.$foto_kegiatan->getClientOriginalExtension();
            $foto_kegiatan->move(public_path('foto_kegiatan'), $new_name);
        }else{
            $new_name=Null;
        }
        
        $data = array(
            'pengirim' => $request->pengirim,
            'judul_forum' => $request->judul_forum,
            'deskripsi' => $request->deskripsi,
            'foto' => $new_name
        );
        Forum::create($data);

        return redirect('/admin/forumdiskusi')->with('status', "Forum Diskusi Berhasil Dikirim");
    }

    public function tanggapi_forum($id)
    {
        return view('admin.form.tanggapiforum', [
            'id' => $id,
        ])->with('i');
    }

    public function posttanggapi_forum( Request $request, $id)
    {
        TanggapiForum::create([
            'id_forums' => $id,
            'pengirim' => Desa::where('id', Auth::user()->id_desa)->first()->nama_desa, 
            'deskripsi' => $request->deskripsi
        ]);

        return redirect('/admin/forumdiskusi')->with('status', "Forum Diskusi Berhasil Ditanggapi");
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
