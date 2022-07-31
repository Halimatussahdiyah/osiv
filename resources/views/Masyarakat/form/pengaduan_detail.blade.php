@extends('admin.layout_admin.main')

@section('container')
<h1>Detail</h1>
@foreach ($pengaduans as $pengaduan )

<div class="form-group">
  <label for="exampleInputEmail1">Nama Pelapor</label>
  <input type="text" name="nama_pelapor" class="form-control" id="nama pelapor" placeholder="nama pelapor"
    value="{{ $pengaduan->nama_pelapor }}" readonly>
</div>
<div class="form-group">
  <label for="exampleInputEmail1">Alamat</label>
  <input type="text" name="nama_pelapor" class="form-control" id="nama pelapor" placeholder="nama pelapor"
    value="{{ $pengaduan->alamat }}" readonly>
</div>
<div class="form-group">
  <label for="exampleInputEmail1">Kontak</label>
  <input type="text" name="nama_pelapor" class="form-control" id="nama pelapor" placeholder="nama pelapor"
    value="{{ $pengaduan->kontak_telp }}" readonly>
</div>
<div class="form-group">
  <label for="exampleInputEmail1">Tanggal</label>
  <input type="text" name="nama_pelapor" class="form-control" id="nama pelapor" placeholder="nama pelapor"
    value="{{ $pengaduan->tanggal }}" readonly>
</div>
<div class="form-group">
  <label for="exampleInputEmail1">Pengaduan</label>
  <textarea name="nama_pelapor" class="form-control" id="nama pelapor" placeholder="nama pelapor" value=""
    readonly>{{ $pengaduan->pengaduan }}</textarea>
</div>
<div class="form-group">
  <label for="exampleInputEmail1">Foto</label>
  <br>
  <img src="{{URL::to('/')}}/foto_kegiatan/{{$pengaduan->foto_kegiatan}}" class="img-fluid w-25" alt="...">
</div>
<div class="form-group">
  <label for="exampleInputEmail1">Tanggapan</label>
  <textarea name="nama_pelapor" class="form-control" id="nama pelapor" placeholder="belum di tanggapi oleh admin"
    value="" readonly>{{ $pengaduan->komentar }}</textarea>
</div>


@endforeach

@endsection