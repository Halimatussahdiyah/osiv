<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use App\Models\TanggapiForum;

class ForumdpmdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forums=Forum::with('tanggapi')->get();
        return view('admindpmd.forumdiskusi',compact('forums'));
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
         if($request->has('foto'))
         {
            $foto_kegiatan = $request->file('foto_kegiatan');
            $new_name = rand().'.'.$foto_kegiatan->getClientOriginalExtension();
            $foto_kegiatan->move(public_path('foto_kegiatan'), $new_name);
            $data = array(
                'pengirim' => $request->pengirim,
                'judul_forum' => $request->judul_forum,
                'deskripsi' => $request->deskripsi,
                'foto' => $new_name
            );
            Forum::create($data);
         }else{
            $data = array(
                'pengirim' => $request->pengirim,
                'judul_forum' => $request->judul_forum,
                'deskripsi' => $request->deskripsi,
            );
            Forum::create($data);
         }
       
 
         return redirect('/admindpmd/forum_diskusi')->with('status', "Forum Diskusi Berhasil Dikirim");
    }

    public function tanggapi($id)
    {
        return view('admindpmd.form_admindpmd.tanggapi_forum', [
            'id' => $id,
        ])->with('i');
    }

    public function posttanggapi( Request $request, $id)
    {
        TanggapiForum::create([
            'id_forums' => $id,
            'pengirim' => 'Admin DPMD', 
            'deskripsi' => $request->deskripsi
        ]);

        return redirect('/admindpmd/forum_diskusi')->with('status', "Forum Diskusi Berhasil Ditanggapi");
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
