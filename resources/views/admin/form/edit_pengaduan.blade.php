@extends('admin.layout_admin.main')

@section('container')
<div class="card">
  <div class="card-header">
    Edit Pengaduan
  </div>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <h1 class="h2">Edit Data Pengaduan</h1>
  </div>
  <div class="container">

    <form action="/admin/edit_pengaduan/{{$pengaduans->id}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Pelapor</label>
        <input type="text" name="nama_pelapor" class="form-control" id="nama pelapor" placeholder="nama pelapor"
          value="{{ $pengaduans->nama_pelapor }}">
      </div>
      <div class="form-floating">
        <!-- <input type="text" name="pengaduan" value="" class="form-control mb-3 py-3" id="pengaduan" placeholder="Pengaduan" autofocus required> -->
        <label for="floatingInput">Alamat</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
          name="alamat">{{ $pengaduans->alamat }}"</textarea>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label>Kontak Telepon/HP</label>
            <input type="text" name="kontak" class="form-control" placeholder="Kontak Telepon/HP"
              value="{{ $pengaduans->kontak_telp }}">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control mb-3" id="tanggal" placeholder="Tanggal" required
              value="{{ $pengaduans->tanggal }}">
          </div>
        </div>
      </div>
      <div class="form-floating">
        <label for="floatingInput">Pengaduan</label>
        <!-- <input type="text" value="{{$pengaduans->pengaduan}}" name="pengaduan"  class="form-control mb-3" id="pengaduan" placeholder="Pengaduan" autofocus required> -->
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
          name="pengaduan">{{$pengaduans->pengaduan}}</textarea>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
        <input type="file" class="form-control mb-3" placeholder="Default Input" name="foto_kegiatan"
          value="{{ $pengaduans->foto }}">
      </div>
      <br>
  </div>
  <div class="form-group">
    <label for="jenisPengaduan">Jenis Pengaduan</label>
    <select class="form-control" id="jenisPengaduan" name="jenisPengaduan">
      <option selected disabled>Jenis Pengaduan</option>
      <option value="Pembangunan Desa">Pembangunan Desa</option>
      <option value="Informasi Bantuan">Informasi Bantuan</option>
      <option value="Keluhan Masyarakat">Keluhan Masyarakat</option>
    </select>
  </div>
  <button class="w-100 btn btn-lg btn-primary mb-5" type="submit">Edit Data Pengaduan</button>
  </form>



  @endsection