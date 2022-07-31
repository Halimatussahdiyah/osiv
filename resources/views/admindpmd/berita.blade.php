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
        Berita Desa
    </div>
    @if ($pesan = session('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $pesan }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <table id='table' class="table table-bordered table-hover dataTable dtr-inline">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Desa</th>
                <th scope="col">Judul Berita Desa</th>
                <th scope="col">Foto Kegiatan</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Penulis</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($beritas as $berita)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $berita->nama_desa }}</td>
                        <td>{{ $berita->judul_berita_desa }}</td>
                        <td> <img width="100px" class="img-responsive avatar-view" src="{{URL::to('/')}}/foto_kegiatan/{{$berita->foto_kegiatan}}" alt="Avatar" title="Change the avatar"></td>
                        <td>{{ $berita->tanggal }}</td>
                        <td>{{ $berita->penulis }}</td>
                        <td>
                            
                            <form action="/admin/admindpmd/hapus_berita" method="POST" class="d-flex gap-1">
                                @csrf
                                {{-- komentar admin dpmd --}}
                                <a href="/admin/admindpmd/komenberita/{{$berita->id}}" class="btn btn-warning" style="text-decoration: none">Tanggapi</i></a> 
                                {{-- hapus  --}}
                                <input type="hidden" name="id" id="id" value="{{ $berita->id }}">
                                <button type="submit" class="btn btn-danger ml-1">Hapus</i></button>
                                {{-- status admin dpmd --}}
                                <a href="/admin/admindpmd/statusberita/{{$berita->id}}" class="btn btn-info ml-1" style="text-decoration: none">Status</i></a>
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