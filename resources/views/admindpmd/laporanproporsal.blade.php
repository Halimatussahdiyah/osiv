@extends('admin.layout_admin.main')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if(Session::get('status'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <h5><i class="icon fas fa-check"></i> Data Laporan Desa Terhapus</h5>
                {{ Session::get('status') }}
            </div>
            @endif
            @if ($pesan = session('sukses'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $pesan }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Laporan Desa Pengajuan Proporsal</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id='table' class="table table-bordered table-hover dataTable dtr-inline">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Laporan</th>
                                <th>File</th>
                                <th>Tanggal</th>
                                <th>Admin Desa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($daftar_laporan as $laporan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $laporan->judul_laporan }}</td>
                                <td>
                                    <a class="btn btn-sm btn-success mb-3"
                                        href="{{ asset($laporan->file_laporan) }}">Download</a>
                                </td>
                                <td>{{ $laporan->tanggal }}</td>
                                <td>
                                    @if (isset($laporan->id_admin_desa))
                                    Email : {{ $laporan->admin_desa->email }}<br>
                                    Desa : {{ $laporan->admin_desa->desa->nama_desa }}<br>
                                    Jabatan : {{ $laporan->admin_desa->jabatan }}
                                    @else
                                    <!-- (Belum Ditentukan) -->
                                    @endif
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card -->
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
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
</script>
@endsection