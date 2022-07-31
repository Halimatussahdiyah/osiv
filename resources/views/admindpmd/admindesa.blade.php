@extends('admin.layout_admin.main')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('container')
<div class="card">
    <div class="card-header">
        Validasi Admin Desa
    </div>
    @if ($pesan = session('sukses'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $pesan }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if ($pesan = session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ $pesan }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="card-body">

        <table id='table' class="table table-bordered table-hover dataTable dtr-inline">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Surat</th>
                    <th scope="col">Email</th>
                    <th scope="col">Desa</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengguna as $penggunas)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td><img src="{{ ($penggunas->picture) ? asset('storage/picture/' . $penggunas->picture) : 'cc.png' }}"
                            border="0" width="40" class="img-rounded" align="center" data-toggle="modal"
                            data-target="#exampleModal{{ $penggunas->id_admin_desa }}" />
                        <div class="modal fade bd-example-modal-lg" id="exampleModal{{ $penggunas->id_admin_desa }}"
                            tabindex="-1" aria-labelledby="exampleModalLabel{{ $penggunas->id_admin_desa}}"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel{{ $penggunas->id_admin_desa }}">
                                            Detail Foto
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="modal-body">
                                            <img src="{{ ($penggunas->picture) ? asset('storage/picture/' . $penggunas->picture) : 'cc.png' }}"
                                                alt="" width="400" class="img-fluid">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>{{ $penggunas->email }}</td>
                    <td>{{ $penggunas->desa->nama_desa }}</td>
                    <td>{{ $penggunas->jabatan}}</td>
                    <td>{{ $penggunas->status ? 'Valid' : "Belum validasi"}}</td>
                    <td>

                        <form action="/dpmd/hapus_validasi/{{ $penggunas->id_admin_desa }}" method="POST"
                            class="d-flex gap-1">
                            @csrf
                            <a href="/dpmd/edit_validasi/{{$penggunas->id_admin_desa}}/1" class="btn btn-success"
                                style="text-decoration: none">Valid</a>
                            <a href="/dpmd/edit_validasi/{{$penggunas->id_admin_desa}}/0" class="btn btn-warning ml-1"
                                style="text-decoration: none">Tidak Valid</a>
                            <input type="hidden" name="id" id="id" value="{{ $penggunas->id }}">
                            <button type="submit" class="btn btn-danger ml-1">Hapus</button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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