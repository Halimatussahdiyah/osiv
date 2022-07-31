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
                    <h1>Ubah Laporan Desa</h1>

                    <form method="POST" action="{{ route ('pengguna_laporan.submitperubahan', $laporan->id_laporan) }}"
                        enctype="multipart/form-data">
                        @csrf

                        <label>Judul Laporan :</label>
                        <input required type="text" name="judul_laporan"
                            value="{{ $laporan->judul_laporan  }}" /><br><br>

                        <label>File Laporan :</label>
                        <a href="{{ asset($laporan->file_laporan) }}">file sebelumnya</a><br>
                        <input required type="file" name="file_laporan" /><br><br>

                        <input type="submit" value="perbarui laporan" />
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

@endsection