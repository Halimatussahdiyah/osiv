@extends('admin.layout_admin.main')

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Laporan Desa Semesteran</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                   <h1>Konfirmasi Hapus Laporan Desa</h1>

                   <form
                       method="POST"
                       action="{{ route ('pengguna.laporan.submit_hapus', $laporan->id_laporan) }}"
                       enctype="multipart/form-data"
                   >
                       @csrf
                   
                       <label>Judul Laporan :</label>
                       <input
                            type="text"
                            name="judul_laporan"
                            value="{{ $laporan->judul_laporan  }}"
                            readonly
                       /><br><br>
                   
                       <label>File Laporan :</label>
                       <a href="{{ asset($laporan->file_laporan) }}">file sebelumnya</a>
                        <br>
                       <button class="btn btn-danger" type="submit">Hapus laporan</button>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection
