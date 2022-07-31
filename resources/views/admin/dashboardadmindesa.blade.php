@extends('admin.layout_admin.main')

@section('container')

<div class="card">
  <div class="card-header">
    Dashboard Info
  </div>
</div>
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{ App\Models\Berita::where('nama_desa',Auth::guard('admindesa')->user()->desa->nama_desa)->count() }}</h3>

        <p>Berita Desa</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="{{ url('/admin/berita_desa') }}" class="small-box-footer">More info <i
          class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ App\Models\Pengaduan::where('admin_desa_id', Session::get('id_admin_desa'))->count()
          }}<sup style="font-size: 20px"></sup></h3>

        <p>Pengaduan</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="{{ url('/admin/pengaduan') }}" class="small-box-footer">More info <i
          class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{ App\Models\Forum::all()->count() }}</h3>

        <p>Forum Diskusi</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="{{ url('/admin/forumdiskusi') }}" class="small-box-footer">More info <i
          class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>{{ App\Models\laporan::where('tipe',
          'triwulan')->where('id_admin_desa',Session::get('id_admin_desa'))->count() }}</h3>

        <p>Laporan Desa Triwulan</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="{{ url('/admin/pengguna_laporan') }}" class="small-box-footer">More info <i
          class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-secondary">
      <div class="inner">
        <h3>{{ App\Models\laporan::where('tipe',
          'semesteran')->where('id_admin_desa',Session::get('id_admin_desa'))->count() }}</h3>

        <p>Laporan Desa Semesteran</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="{{ url('/admin/penggunalaporan') }}" class="small-box-footer">More info <i
          class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ App\Models\laporan::where('tipe',
          'proposal')->where('id_admin_desa',Session::get('id_admin_desa'))->count() }}</h3>

        <p>Laporan Pengajuan Proporsal</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="{{ url('/admindesa/laporanproporsal') }}" class="small-box-footer">More info <i
          class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>

</tbody>
</table>
</div>
</div>

@endsection