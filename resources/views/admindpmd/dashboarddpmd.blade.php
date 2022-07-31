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
        <h3>{{ App\Models\Berita::all()->count() }}</h3>

        <p>Berita Desa</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="{{ url('/admin/admindpmd') }}" class="small-box-footer">More info <i
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

        <p>Pengaduan desa</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="{{ url('/admindpmd/pengaduan') }}" class="small-box-footer">More info <i
          class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ App\Models\Pengaduan::where('masyarakat_id', Session::get('id'))->count() }}<sup
            style="font-size: 20px"></sup></h3>

        <p>Pengaduan Masyarakat</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="{{ url('/dpmd/pengaduan') }}" class="small-box-footer">More info <i
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
      <a href="{{ url('/admindpmd/forum_diskusi') }}" class="small-box-footer">More info <i
          class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>{{ App\Models\laporan::where('tipe', 'triwulan')->count() }}</h3>

        <p>Laporan Desa Triwulan</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="{{ url('/dpmd/pengguna_laporantriwulan') }}" class="small-box-footer">More info <i
          class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-secondary">
      <div class="inner">
        <h3>{{ App\Models\laporansemesteran::where('tipe', 'semesteran')->count() }}</h3>

        <p>Laporan Desa Semesteran</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="{{ url('/dpmd/pengguna_laporan') }}" class="small-box-footer">More info <i
          class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-dark">
      <div class="inner">
        <h3>{{ App\Models\laporansemesteran::where('tipe', 'proposal')->count() }}</h3>

        <p>Laporan pengajuan Proposal</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="{{ url('/dpmd/pengguna_laporanproporsal') }}" class="small-box-footer">More info <i
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