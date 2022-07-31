<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DPMD INDRAMAYU</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE/')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE/')}}/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="{{asset('AdminLTE/')}}/dist/css/style.css">
  @yield('css')
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    @include('admin.layout_admin.navbar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1></h1>
            </div>
            <div class="col-sm-6">
              {{-- <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"></a></li>
                <li class="breadcrumb-item active"></li>
              </ol> --}}
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        @yield('container')

      </section>
      <!-- /.content -->
    </div>

    <!-- Control Sidebar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../../index3.html" class="brand-link">
        {{-- <img src="{{asset('AdminLTE/')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        <span class="brand-text font-weight-light">OSIV DPMD INDRAMAYU</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset('AdminLTE/')}}/dist/img/index.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">
              @if (Auth::guard('admindesa')->check())
              {{ Session::get('desa') }}
              @elseif(Auth::guard('admindpmd')->check())
              Admin DPMD
              @elseif(Auth::guard('masyarakat')->check())
              {{ Auth()->user()->nama }}
              @endif
            </a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            {{-- Admin DPMD --}}
            @if (Auth::guard('admindpmd')->check())
            <li class="nav-item">
              <a href="/admindpmd/dashboard_info" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <span class="right badge badge-danger"></span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admindpmd/forum_diskusi" class="nav-link">
                <i class="nav-icon far fa-comments"></i>
                <p>
                  Forum Diskusi
                  <span class="right badge badge-danger"></span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Kelola
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right"></span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/admin/admindpmd" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Berita Desa</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/admindpmd/pengaduan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pengaduan Desa</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dpmd/pengguna_laporan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Laporan Desa Semesteran</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dpmd/pengguna_laporantriwulan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Laporan Desa Triwulan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dpmd/pengguna_laporanproporsal" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pengajuan Proporsal</p>
                  </a>
                </li>
              </ul>
            </li>
            {{-- <li class="nav-item">
              <a href="/admindpmd/pengguna" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Pengguna
                  <span class="right badge badge-danger"></span>
                </p>
              </a>
            </li> --}}
            <li class="nav-item">
              <a href="/dpmd/pengguna" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Validasi Admin Desa
                  <span class="right badge badge-danger"></span>
                </p>
              </a>
            </li>
            @endif

            {{-- Admin Desa --}}
            @if (Auth::guard('admindesa')->check())
            <li class="nav-item">
              <a href="/admin/dashboard_info" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/berita_desa" class="nav-link">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>
                  Berita Desa
                  <span class="right badge badge-danger"></span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/pengaduan" class="nav-link">
                <i class="nav-icon fas fa-bullhorn"></i>
                <p>
                  Pengaduan
                  <span class="right badge badge-danger"></span>
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/admin/forumdiskusi" class="nav-link">
                <i class="nav-icon fas fa-comments"></i>
                <p>
                  Forum Diskusi
                  <span class="right badge badge-danger"></span>
                </p>
              </a>
            </li>


            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Laporan Desa
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right"></span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('pengguna.laporan.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Triwulan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/admin/penggunalaporan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Semesteran</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/admindesa/laporanproporsal" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pengajuan Proporsal</p>
                  </a>
                </li>
              </ul>

            <li class="nav-item">
              <a href="/dpmd/pengaduan" class="nav-link">
                <i class="nav-icon fas fa-bullhorn"></i>
                <p>
                  <span style="font-size: 15px">Kelola Pengaduan Masyarakat</span>
                  <span class="right badge badge-danger"></span>
                </p>
              </a>
            </li>
            @endif

            {{-- Masyarakat --}}
            @if (Auth::guard('masyarakat')->check())
            <li class="nav-item">
              <a href="/masyarakat/dashboard_infomasyarakat" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/masyarakat/pengaduan" class="nav-link">
                <i class="nav-icon fas fa-bullhorn"></i>
                <p>
                  Pengaduan
                  <span class="right badge badge-danger"></span>
                </p>
              </a>
            </li>
            @endif




        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{asset('AdminLTE/')}}/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('AdminLTE/')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('AdminLTE/')}}/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('AdminLTE/')}}/dist/js/demo.js"></script>
  @yield('js')
</body>

</html>