@extends('admin.layout_admin.main')

@section('container')
<div class="card">
    <div class="card-header">
        Pengaduan Masyarakat
    </div>
    <div class="card-body">
        <form action="/dpmd/tanggapi_pengaduan/{{$id}}" method="POST" enctype="multipart/form-data">
            @csrf
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
                <img src="{{URL::to('/')}}/foto_kegiatan/{{$pengaduan->foto_kegiatan}}" class="img-fluid w-25"
                    alt="...">
            </div>
            <div class="form-floating">
                <label for="floatingInput">Tanggapi</label>
                <textarea type="text" name="komentar" class="form-control mb-3" id="komentar" placeholder="Tanggapi"
                    required></textarea>
            </div>
            <button class="w-100 btn btn-lg btn-primary mb-5" type="submit">Submit</button>
        </form>
    </div>
</div>



@endsection