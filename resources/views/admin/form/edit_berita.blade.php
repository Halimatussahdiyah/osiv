@extends('admin.layout_admin.main')

@section('container')
<div class="card">
    <div class="card-header">
        Berita Desa
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
            <h1 class="h2">Edit Data Berita</h1>
        </div>
        <div class="container">

        <form action="/admin/edit_berita/{{$beritas->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-floating">
                <label for="floatingInput">Nama Desa</label>
            <input type="text" value="{{$beritas->nama_desa}}" name="nama_desa"  class="form-control mb-3" id="nama_desa" placeholder="Nama Desa" autofocus required>
            </div>
            <div class="form-floating">
                <label for="floatingInput">Judul Berita Desa</label>
            <input type="text" value="{{$beritas->judul_berita_desa}}" name="judul_berita_desa"  class="form-control mb-3" id="nama_desa" placeholder="Judul Berita Desa" autofocus required>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
                <input type="file" class="form-control mb-3" placeholder="Default Input" name="foto_kegiatan">
            </div>
            <br>
            <label for="floatingInput">Tanggal</label>
            <div class="form-floating">
                <input type="date" name="tanggal" value="{{$beritas->tanggal}}"class="form-control mb-3" id="tanggal" placeholder="Tanggal" required>
            </div>
            <label for="floatingInput">Deskripsi</label>
            <div class="form-floating">
                <textarea type="text" name="deskripsi" class="form-control mb-3" id="deskripsi" placeholder="Deskripsi" required>
                {{$beritas->deskripsi}}" 
            </textarea>
            </div>
            <label for="floatingInput">Penulis</label>
            <div class="form-floating">
                <input type="text" name="penulis" value="{{$beritas->penulis}}" class="form-control mb-3" id="Penulis" placeholder="Penulis" required>
            </div>
            

            <button class="w-100 btn btn-lg btn-primary mb-5" type="submit">Edit Data Berita</button>
        </form>
    </div>
</div>


@endsection