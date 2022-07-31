@extends('admin.layout_admin.main')

@section('container')
<div class="card">
  <div class="card-header">
    Forum Diskusi
  </div>
  <div class="card-body">
    @if(Session::get('status'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
      {{ Session::get('status') }}
    </div>
    @endif
    <!-- Button trigger modal -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Kirim Pesan
    </button>
    @foreach ( $forums as $f)

    <div class="container">

      @if($f->pengirim == 'Admin Desa')
      {{-- Ini buat admin desa --}}
      <p style="text-align: right">{{ $f->deskripsi }}</p>
      <img src="{{ asset('foto_kegiatan/'.$f->foto) }}" alt="" data-toggle="modal"
        data-target="#exampleModal{{ $f->id_forum }}">
      <span class="right">{{ $f->judul_forum }}({{ $f->pengirim }})</span> <a
        href="/admindesa/tanggapi/{{ $f->id_forum}}">Tanggapi</a>
      @else
      {{-- ini buat admin dpmd --}}
      <p>{{ $f->deskripsi }}</p>
      <img src="{{ asset('foto_kegiatan/'.$f->foto) }}" alt="" data-toggle="modal"
        data-target="#exampleModal{{ $f->id_forum }}">
      <span class="left">{{ $f->judul_forum }}({{ $f->pengirim }})</span>
      <a href="/admindesa/tanggapi/{{ $f->id_forum}}">Tanggapi</a>
      @endif
    </div>

    {{-- Tanggapi --}}
    @foreach ( $f->tanggapi as $tanggapi )
    <div class="row justify-content-end">
      <div class="col-12">
        <div class="container">
          <p style="text-align: right">{{ $tanggapi->deskripsi }}</p>
          <span class="right">{{ $f->judul_forum }}({{ $tanggapi->pengirim }}) <a
              href="/admindesa/tanggapi/{{ $f->id_forum}}">Tanggapi</a></span>
        </div>
      </div>
    </div>
    @endforeach

    {{-- Bagian Image Foto --}}
    <div class="modal fade bd-example-modal-lg" id="exampleModal{{ $f->id_forum }}" tabindex="-1"
      aria-labelledby="exampleModalLabel{{ $f->id_forum}}" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel{{ $f->id_forum }}">Detail Foto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="modal-body">
              <img src="{{ asset('foto_kegiatan/'.$f->foto) }}" alt="" width="400" class="img-fluid">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

{{-- Bagian Form Forum Diskusi --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kirim Pesan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-body">
          <form action="{{route('forumdiskusi.store')}}" class="form-horizontal tasi-form" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Pengirim:</label>
              <input type="text" class="form-control" id="recipient-name" name="pengirim"
                value="{{ App\Models\Desa::where('id', Auth::user()->id_desa)->first()->nama_desa }}" readonly>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Subject:</label>
              <input type="text" class="form-control" name="judul_forum" id="recipient-name" required>
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Deskripsi:</label>
              <textarea class="form-control" name="deskripsi" id="message-text" required></textarea>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Foto:</label>
              <input type="file" name="foto_kegiatan" class="form-control" id="recipient-name">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="Submit" class="btn btn-primary">Kirim Pesan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection