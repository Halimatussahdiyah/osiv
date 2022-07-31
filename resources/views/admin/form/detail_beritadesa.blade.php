@extends('admin.layout_admin.main')

@section('container')
<div class="card">
  <div class="card-header">
    <div> Detail Berita Desa</div>
    {{ $beritas->nama_desa }}
  </div>
  <div class="card-body">
    <div
      class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
      <h1 class="h2">{{ $beritas->judul_berita_desa }}</h1>
    </div>
    <div class="container ">
      <img src="{{URL::to('/')}}/foto_kegiatan/{{$beritas->foto_kegiatan}}" class="img-fluid w-50" alt="...">
      <p class="mt-2">{{ $beritas->deskripsi }}</p>
      <div class="pt-3 pb-2 mb-4 border-top">
        <h6>Penulis</h6>
        {{ $beritas->penulis }}
      </div>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Tanggapan</label>
      <textarea type="text" name="tanggapan" class="form-control" id="tanggapan"
        placeholder="belum di tanggapi oleh admin" value="" readonly>{{ $beritas->komentar }}</textarea>
    </div>
  </div>
</div>
@endsection