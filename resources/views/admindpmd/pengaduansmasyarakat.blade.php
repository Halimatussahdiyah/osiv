@extends('admin.layout_admin.main')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('container')
<div class="card">
    <div class="card-header">
        Pengaduan Masyarakat
    </div>
    <div class="card-body">
        @if ($pesan = session('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $pesan }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="table-responsive">
            <table id='table' class="table table-bordered table-hover dataTable dtr-inline">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pelapor</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Kontak Telepon</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Foto </th>
                        <th scope="col">Jenis Pengaduan </th>
                        <th scope="col">Jenis Pekejaan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengaduans->where('masyarakat_id','!=',null)->all() as $pengaduan)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $pengaduan->nama_pelapor }}</td>
                        <td>{{ $pengaduan->alamat }}</td>
                        <td>{{ $pengaduan->kontak_telp }}</td>
                        <td>{{ $pengaduan->tanggal }}</td>
                        <td> <img width="100px" class="img-responsive avatar-view"
                                src="{{ URL::to('/') }}/foto_kegiatan/{{ $pengaduan->foto_kegiatan }}" alt="Avatar"
                                title="Change the avatar">
                        </td>
                        <td>{{ $pengaduan->jenis_pengaduan }}</td>
                        <td>{{ $pengaduan->jenis_pekerjaan }}</td>
                        <td>
                            <form action="/dpmd/hapus_pengaduan" method="POST" class="d-flex gap-1">
                                @csrf
                                {{-- komentar admin dpmd --}}
                                <a href="/dpmd/tanggapi_pengaduan/{{$pengaduan->id}}" class="btn btn-warning"
                                    style="text-decoration: none">Tanggapi</i></a>
                                {{-- hapus --}}
                                <input type="hidden" name="id" id="id" value="{{ $pengaduan->id }}">
                                <button type="submit" class="btn btn-danger ml-1">Hapus</i></button>
                                {{-- status admin dpmd --}}<div class="btn-group">
                                    <button type="button" class="btn btn-success ml-1">Status</button>
                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false">
                                        <span class="sr-only"></span>
                                    </button>
                                    <div class="dropdown-menu" role="menu" style="">
                                        <a class="dropdown-item"
                                            href="/admindpmd/belumdiproses/{{$pengaduan->id}}">Belum Di Proses</a>
                                        <a class="dropdown-item"
                                            href="/admindpmd/sedangdiproses/{{$pengaduan->id}}">Sedang Di Proses</a>
                                        <a class="dropdown-item" href="/admindpmd/diproses/{{$pengaduan->id}}">Di
                                            Proses</a>
                                    </div>
                                </div>

                                {{-- <a href="/admindpmd/statuspengaduan/{{$pengaduan->id}}" class="btn btn-info ml-1"
                                    style="text-decoration: none">Status</i></a> --}}
                            </form>


                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection

@section('js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('AdminLTE') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('AdminLTE') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('AdminLTE') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('AdminLTE') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('AdminLTE') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('AdminLTE') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('AdminLTE') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('AdminLTE') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('AdminLTE') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('AdminLTE') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('AdminLTE') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('AdminLTE') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function () {
      $('#table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": false,
      });
    });
</script>
@endsection