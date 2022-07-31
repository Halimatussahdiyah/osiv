@extends('admin.layout_admin.main')

@section('container')
<div class="card">
    <div class="card-header">
       Pengguna
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
            <h1 class="h2">Edit Pengguna</h1>
        </div>
        <div class="container">

        <form action="/admindpmd/edit_pengguna{{$penggunas->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-floating">
                <label for="floatingInput">Nama Desa</label>
            <input type="text" value="{{$penggunas->nama_desa}}" name="nama_desa"  class="form-control mb-3" id="nama_desa" placeholder="Nama Desa" autofocus required>
            </div>
            <div class="form-floating">
                <label for="floatingInput">No Telepon</label>
            <input type="text" value="{{$penggunas->judul_berita_desa}}" name="no_telepon"  class="form-control mb-3" id="nama_pegawai" placeholder="No Telepon" autofocus required>
            </div>
            <label for="floatingInput">Jabatan Pegawai</label>
            <div class="form-floating">
                <textarea type="text" name="jabatan_pegawai" class="form-control mb-3" id="jabatan_pegawai" placeholder="Jabatan Pegawai" required>
                {{$beritas->deskripsi}}" 
            </textarea>
            </div>

            <button class="w-100 btn btn-lg btn-primary mb-5" type="submit">Edit Data Pengguna</button>
        </form>
    </div>
</div>


@endsection