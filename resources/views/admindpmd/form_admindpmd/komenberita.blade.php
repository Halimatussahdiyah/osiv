@extends('admin.layout_admin.main')

@section('container')
<div class="card">
    <div class="card-header">
        Berita Desa
    </div>
    <div class="card-body">
        <div> Detail Berita Desa</div>
        {{ $berita->nama_desa }}
    </div>
    <div class="card-body">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
            <h1 class="h2">{{ $berita->judul_berita_desa }}</h1>
        </div>
        <div class="container ">
            <img src="{{URL::to('/')}}/foto_kegiatan/{{$berita->foto_kegiatan}}" class="img-fluid w-50" alt="...">
            <p class="mt-2">{{ $berita->deskripsi }}</p>
            <div class="pt-3 pb-2 mb-4 border-top">
                <h6>Penulis</h6>
                {{ $berita->penulis }}
            </div>
        </div>

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
            <h1 class="h2">Edit Tanggapi</h1>
        </div>
        <div class="container">

            <form action="/admin/admindpmd/komenberita/{{$id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-floating">
                    <label for="floatingInput">Edit Tanggapi</label>
                    <textarea type="text" name="komentar" class="form-control mb-3" id="komentar" placeholder="Tanggapi"
                        required>{{ $berita->komentar }}</textarea>
                </div>
                <button class="w-100 btn btn-lg btn-primary mb-5" type="submit">Edit Tanggapi</button>
            </form>
        </div>
    </div>
</div>


@endsection