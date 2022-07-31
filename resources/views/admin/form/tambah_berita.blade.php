@extends('admin.layout_admin.main')

@section('container')
<div class="card">
    <div class="card-header">
        Berita Desa
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
            <h1 class="h2">Tambah Data Berita</h1>
        </div>
        <div class="container">

        <form action="/admin/tambah_berita" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-floating">
                <label for="floatingInput">Nama Desa</label>
            <input type="text" name="nama_desa" value="{{ App\Models\Desa::where('id', Auth::user()->id_desa)->first()->nama_desa }}" class="form-control mb-3" id="nama_desa" placeholder="Nama Desa" autofocus readonly>
            </div>
            <div class="form-floating">
                <label for="floatingInput">Judul Berita Desa</label>
            <input type="text" name="judul_berita_desa" value="" class="form-control mb-3" id="judul_berita_desa" placeholder="Judul Berita Desa" autofocus required>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
                <input type="file" class="form-control mb-3" placeholder="Default Input" name="foto_kegiatan">
            </div>
            <br>
            <div class="form-floating">
                <label for="floatingInput">Tanggal</label>
                <input type="date" name="tanggal" value="" class="form-control mb-3" id="tanggal" placeholder="Tanggal" required>
            </div>
            <div class="form-floating">
                <label for="floatingInput">Deskripsi</label>
                <textarea type="text" name="deskripsi" value="" class="form-control mb-3" id="deskripsi" placeholder="Deskripsi" required>
                </textarea>
            </div>
            <div class="form-floating">
                <label for="floatingInput">Penulis</label>
                <input type="text" name="penulis" value="" class="form-control mb-3" id="Penulis" placeholder="Penulis" required>
            </div>
            

            <button class="w-100 btn btn-lg btn-primary mb-5" type="submit">Tambah Data Berita</button>
        </form>
        </div>
    </div>


@endsection