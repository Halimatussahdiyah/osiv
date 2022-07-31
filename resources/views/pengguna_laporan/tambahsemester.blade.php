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
                    <h1>Tambah Laporan Desa</h1>

                    <form action="{{ route('pengguna.daftar.indexsemesteran') }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf

                        <label>Judul Laporan :</label>
                        <input required type="text" name="judul_laporan" /><br><br>
                        <label>File Laporan :</label>
                        <input type="file" name="file_laporan" /><br><br>
                        <div class="form-group">
                            <label for="jenisLaporan">Jenis Laporan Semesteran</label>
                            <select class="form-control" id="jenisLaporan" name="jenis_laporan" required>
                                <option value="" selected disabled>Jenis Laporan Semesteran</option>
                                <option value="semesteran_I">Semesteran I</option>
                                <option value="semesteran_II">Semesteran II</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" value="" class="form-control mb-3" id="tanggal"
                                placeholder="Tanggal" required>
                        </div>
                        <button class="btn btn-primary" type="submit">Kirim Laporan</button>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

@endsection