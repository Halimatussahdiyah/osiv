<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdmindpmdController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboarddpmdController;
use App\Http\Controllers\DashboardmasyarakatController;
use App\Http\Controllers\forumdiskusi;
use App\Http\Controllers\ForumDiskusiController;
use App\Http\Controllers\ForumdpmdController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LaporansdpmdController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengaduandpmdController;
use App\Http\Controllers\PengaduanmasyarakatController;
use App\Http\Controllers\PengadumasyarakatdpmdController;
use App\Http\Controllers\pengguna\AuthController;
use App\Http\Controllers\Pengguna\LaporanController;
use App\Http\Controllers\pengguna\LaporanController2;
use App\Http\Controllers\pengguna\LaporanController3;
use App\Http\Controllers\PenggunaadminController;
use App\Http\Controllers\ReportlaporandpmdController;
use App\Http\Controllers\ValidasiadmindesaController;
use Faker\Provider\ar_JO\Person;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LandingController::class, 'index']);
Route::get('/berita/{id}', [LandingController::class, 'berita']);


Route::get('/admin', function () {
    return view('admin.layout_admin.main');
});

// Login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginuser', [AuthController::class, 'masuk'])->name('loginuser');

// Loguot
Route::post('/proses_login', [AuthController::class, 'proses_login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// Register Masyarakat
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');
Route::get('/register-masyarakat', [LoginController::class, 'registerMs'])->name('register.ms');
Route::post ('/registeruser-ms', [LoginController::class, 'registerusers'])->name('registeruser.ms');

// login Admin desa
Route::resource('admin-desa',AuthController::class)->middleware('auth:admindesa');

// login Admin dpmd
Route::resource('admin-dashboard',AuthController::class)->middleware('auth:admindpmd');

// login Masyarakat
//Route::resource('masyarakat-profile',AuthController::class)->middleware('auth:masyarakat');
// Route::resource('masyarakat/berita', MasyarakatBeritaController::class)->middleware('auth:masyarakat');


// Dashboard Admin desa
Route::get('/admin/dashboard_info', [DashboardController::class, 'index'])->middleware('auth:admindesa');

// Berita Admin Desa
Route::get('/admin/berita_desa', [AdminController::class, 'berita_desa'])->middleware('auth:admindesa');
Route::get('/admin/tambah_berita', [AdminController::class, 'form_berita'])->middleware('auth:admindesa');
Route::post('/admin/tambah_berita', [AdminController::class, 'tambah_berita'])->middleware('auth:admindesa');
Route::post('/admin/edit_berita/{id}', [AdminController::class, 'edit_berita'])->middleware('auth:admindesa');
Route::get('/admin/edit_berita/{id}', [AdminController::class, 'formedit_berita'])->middleware('auth:admindesa');
Route::post('/admin/hapus_berita', [AdminController::class, 'hapus_berita'])->middleware('auth:admindesa');
Route::get('/admin/detail_berita/{id}', [AdminController::class, 'detail_berita'])->middleware('auth:admindesa');

// Dashboard Masyarakat
Route::get('/masyarakat/dashboard_infomasyarakat', [DashboardmasyarakatController::class, 'index'])->middleware('auth:masyarakat');


// Dashboard Admin DPMD
Route::get('/admindpmd/dashboard_info', [DashboarddpmdController::class, 'indexdashboard'])->middleware('auth:admindpmd');

// BERITA ADMIN DPMD
Route::get('/admin/admindpmd', [AdmindpmdController::class, "index"])->middleware('auth:admindpmd');
Route::get('/admin/admindpmd/komenberita/{id}', [AdmindpmdController::class, 'komenberita'])->middleware('auth:admindpmd');
Route::post('/admin/admindpmd/komenberita/{id}', [AdmindpmdController::class, 'komenberitapost'])->middleware('auth:admindpmd');
Route::post('/admin/admindpmd/hapus_berita', [AdmindpmdController::class, 'hapus_berita'])->middleware('auth:admindpmd');
Route::get('/admin/admindpmd/statusberita/{id}', [AdmindpmdController::class, 'statusberita'])->middleware('auth:admindpmd');

// Pengaduan Admin desa
Route::get('/admin/pengaduan', [PengaduanController::class, 'pengaduan'])->middleware('auth:admindesa');
Route::get('/admin/pengaduan/{id}', [PengaduanController::class, 'detailPengaduan'])->name('detail_pengaduan')->middleware('auth:admindesa');
Route::get('/admin/pengaduan_informasi_bantuan', [PengaduanController::class, 'informasi_bantuan'])->middleware('auth:admindesa');
Route::get('/admin/pengaduan_keluhan_pelayanan', [PengaduanController::class, 'keluhan_pelayanan'])->middleware('auth:admindesa');
Route::get('/admin/tambah_pengaduan', [AdminController::class, 'form_pengaduan'])->middleware('auth:admindesa');
Route::post('/admin/tambah_pengaduan', [AdminController::class, 'tambah_pengaduan'])->middleware('auth:admindesa');
Route::post('/admin/edit_pengaduan/{id}', [AdminController::class, 'edit_pengaduan'])->middleware('auth:admindesa');
Route::get('/admin/edit_pengaduan/{id}', [AdminController::class, 'formedit_pengaduan'])->middleware('auth:admindesa');
Route::post('/admin/hapus_pengaduan', [AdminController::class, 'hapus_pengaduan'])->middleware('auth:admindesa');
Route::get('/admin/detail_pengaduan/{id}', [PengaduanController::class, 'pengaduan_detail'])->middleware('auth:admindesa');

// Pengaduan (Admin desa) DPMD 
Route::get('/admindpmd/pengaduan', [PengaduandpmdController::class, 'index'])->middleware('auth:admindpmd');
Route::get('/admindpmd/komenpengaduan/{id}', [PengaduandpmdController::class, 'komenPengaduan'])->middleware('auth:admindpmd');
Route::post('/admindpmd/komenpengaduan/{id}', [PengaduandpmdController::class, 'komenPengaduanpost'])->middleware('auth:admindpmd');
Route::post('/admindpmd/hapus_pengaduan', [PengaduandpmdController::class, 'hapus_pengaduan'])->middleware('auth:admindpmd');
Route::get('/admindpmd/statuspengaduan/{id}', [PengaduandpmdController::class, 'status_pengaduan'])->middleware('auth:admindpmd');

// Pengaduan (Masyarakat) kelola admin desa
Route::get('/dpmd/pengaduan', [PengadumasyarakatdpmdController::class, 'index'])->middleware('auth:admindesa');
Route::get('/dpmd/tanggapi_pengaduan/{id}', [PengadumasyarakatdpmdController::class, 'tanggapi_Pengaduan'])->middleware('auth:admindesa');
Route::post('/dpmd/tanggapi_pengaduan/{id}', [PengadumasyarakatdpmdController::class, 'tanggapi_Pengaduanpost'])->middleware('auth:admindesa');
Route::post('/dpmd/hapus_pengaduan', [PengadumasyarakatdpmdController::class, 'hapuspengaduan'])->middleware('auth:admindesa');
Route::get('/admindpmd/statuspengaduan/{id}', [PengadumasyarakatdpmdController::class, 'pengaduan_status'])->middleware('auth:admindesa');
Route::get('/admindpmd/belumdiproses/{id}', [PengadumasyarakatdpmdController::class, 'belumdiproses']);
Route::get('/admindpmd/sedangdiproses/{id}', [PengadumasyarakatdpmdController::class, 'sedangdiproses']);
Route::get('/admindpmd/diproses/{id}', [PengadumasyarakatdpmdController::class, 'di_proses']);

//Pengaduan (Admin DPMD) DPMD
Route::get('/admindpmd/belum_diproses/{id}', [PengaduandpmdController::class, 'belum_diproses']);
Route::get('/admindpmd/sedang_diproses/{id}', [PengaduandpmdController::class, 'sedang_diproses']);
Route::get('/admindpmd/di_proses/{id}', [PengaduandpmdController::class, 'diproses']);

// Pengadun Masyarakat untuk masyarakat
Route::get('/masyarakat/pengaduan', [PengaduanmasyarakatController::class, 'pengaduans_index'])->middleware('auth:masyarakat');
Route::get('/masyarakat/pengaduans/{id}', [PengaduanmasyarakatController::class, 'detailPengaduans'])->name('detail_pengaduan')->middleware('auth:masyarakat');
Route::get('/masyarakat/pengaduan_informasi_bantuan', [PengaduanmasyarakatController::class, 'informasi_bantuan'])->middleware('auth:masyarakat');
Route::get('/masyarakat/pengaduan_keluhan_pelayanan', [PengaduanmasyarakatController::class, 'keluhan_pelayanan'])->middleware('auth:masyarakat');
Route::get('/masyarakat/pengaduan_tambah', [PengaduanmasyarakatController::class, 'form_pengaduan'])->middleware('auth:masyarakat');
Route::post('/masyarakat/pengaduan_tambah', [PengaduanmasyarakatController::class, 'pengaduan_tambah'])->middleware('auth:masyarakat');
Route::post('/masyarakat/pengaduan_edit/{id}', [PengaduanmasyarakatController::class, 'pengaduan_edit'])->middleware('auth:masyarakat');
Route::get('/masyarakat/pengaduan_edit/{id}', [PengaduanmasyarakatController::class, 'pengaduan_formedit'])->middleware('auth:masyarakat');
Route::post('/masyarakat/pengaduan_hapus', [PengaduanmasyarakatController::class, 'pengaduan_hapus'])->middleware('auth:masyarakat');
Route::get('/masyarakat/pengaduan_detail/{id}', [PengaduanmasyarakatController::class, 'pengaduan_detail'])->middleware('auth:masyarakat');

// Forum Diskusi ADMIN DESA
//Route::get('/admin/forum_diskusi', [AdminController::class, 'forum_diskusi']);
Route::resource('/admin/forumdiskusi',ForumDiskusiController::class)->middleware('auth:admindesa');
Route::get('/admindesa/tanggapi/{id}',[ForumDiskusiController::class, "tanggapi_forum"])->middleware('auth:admindesa');
Route::post('/admindesa/tanggapi/{id}', [ForumDiskusiController::class, "posttanggapi_forum"])->middleware('auth:admindesa');

// Forum Diskusi DPMD
Route::resource('/admindpmd/forum_diskusi',ForumdpmdController::class)->middleware('auth:admindpmd');
Route::get('/admindpmd/tanggapi/{id}',[ForumdpmdController::class, "tanggapi"])->middleware('auth:admindpmd');
Route::post('/admindpmd/tanggapi/{id}', [ForumdpmdController::class, "posttanggapi"])->middleware('auth:admindpmd');


// Laporan Desa Triwulan
Route::post('/pengguna/register', [LaporanController::class, "store"])->name('pengguna.daftar.index');
Route::get('/admin/pengguna_laporan', [LaporanController::class, "index"])->name('pengguna.laporan.index');
Route::get('/pengguna/laporan/buat', [LaporanController::class, "create"])->name('pengguna.laporan.halaman.buat');
Route::get('/pengguna/laporan/{laporan}/ubah', [LaporanController::class, "form_ubah"])->name('pengguna.laporan.form_ubah');
Route::post('/pengguna/laporan/{laporan}/ubah/post', [LaporanController::class, "submit_perubahan"])->name('pengguna.laporan.submit_perubahan');
Route::get('/pengguna/laporan/{laporan}/hapus', [LaporanController::class, "form_hapus"])->name('pengguna.laporan.form_hapus');
Route::post('/pengguna/laporan/{laporan}/hapus/post', [LaporanController::class, "submit_hapuslaporan"])->name('pengguna.laporantriwulan.submit_hapus');

// Laporan Desa Semesteran
Route::post('/penggunaadmin/register', [LaporanController2::class, "store"])->name('pengguna.daftar.indexsemesteran');
Route::get('/admin/penggunalaporan', [LaporanController2::class, "index"])->name('pengguna_laporan.indexsemesteran');
Route::get('/penggunaadmin/laporan/buat', [LaporanController2::class, "create"])->name('pengguna_laporan.tambahsemester');
Route::get('/penggunaadmin/laporan/{laporan}', [LaporanController2::class, "form_ubah"])->name('pengguna_laporan.ubahsemester');
Route::post('/penggunaadmin/laporan/{laporan}/post', [LaporanController2::class, "submit_perubahan"])->name('pengguna_laporan.submitperubahan');
Route::get('/penggunaadmin/laporan/{laporan}/hapus', [LaporanController2::class, "form_hapus"])->name('pengguna_laporan.hapussemester');
Route::post('/penggunaadmin/laporan/{laporan}/hapus-post', [LaporanController2::class, "submit_hapuslaporan"])->name('pengguna.laporan.submit_hapus');

// Laporan Desa Pengajuan Proposal
Route::post('/admindesa/register', [LaporanController3::class, "store"])->name('admindesa.daftar.indexpengajuan');
Route::get('/admindesa/laporanproporsal', [LaporanController3::class, "index"])->name('admindesa_laporan.indexpengajuan');
Route::get('/admindesa/laporanproporsal/buat', [LaporanController3::class, "create"])->name('admindesa_laporan.tambahpengajuan');
Route::get('/admindesa/proporsal/{laporan}', [LaporanController3::class, "formubah"])->name('admindesa_laporan.ubahpengajuan');
Route::post('/admindesa/proporsal/{laporan}/post', [LaporanController3::class, "submitperubahan"])->name('admindesa_laporan.submit_perubahan');
Route::get('/admindesa/proporsal/{laporan}/hapus', [LaporanController3::class, "formhapus"])->name('admindesa_laporan.hapuspengajuan');
Route::post('/admindesa/proporsal/{laporan}/hapus-post', [LaporanController3::class, "submithapus_laporan"])->name('admindesa.laporan.submithapus');

// // Laporans DPMD
// Route::get('/dpmd/pengguna_laporan', [LaporansdpmdController::class, "index"])->name('admindpmd.index');
// Route::get('/dpmd/laporan_ubah', [LaporansdpmdController::class, "formubah"])->name('admindpmd.form_ubah');
// Route::post('/dpmd/laporan_ubahpost', [LaporansdpmdController::class, "submitperubahan"])->name('admindpmd.submit_perubahan');
// Route::get('/dpmd/laporan_hapus', [LaporansdpmdController::class, "formhapus"])->name('admindpmd.form_hapus');
// Route::post('/dpmd/laporan_hapuspost', [LaporansdpmdController::class, "submit_hapuslaporan"])->name('admindpmd.submit_hapus');

// Pengguna
// Route::get('/admindpmd/pengguna', [PenggunaadminController::class, 'index'])->middleware('auth:admindpmd');
// Route::get('/admindpmd/tambah_pengguna', [PenggunaadminController::class, 'form_pengguna'])->middleware('auth:admindpmd');
// Route::post('/admindpmd/tambah_pengguna', [PenggunaadminController::class, 'tambah_pengguna'])->middleware('auth:admindpmd');
// Route::post('/admindpmd/edit_pengguna/{id}', [PenggunaadminController::class, 'edit_pengguna'])->middleware('auth:admindpmd');
// Route::get('/admindpmd/edit_pengguna/{id}', [PenggunaadminController::class, 'formedit_pengguna'])->middleware('auth:admindpmd');
// Route::post('/admindpmd/hapus_pengguna', [PenggunaadminController::class, 'hapus_pengguna'])->middleware('auth:admindpmd');

// Validasi Laporan Desa (DPMD)
Route::get('/dpmd/pengguna', [ValidasiadmindesaController::class, 'index'])->middleware('auth:admindpmd');
Route::get('/dpmd/edit_validasi/{id}/{type}', [ValidasiadmindesaController::class, 'edit_validasi'])->middleware('auth:admindpmd');
Route::post('/dpmd/hapus_validasi/{id}', [ValidasiadmindesaController::class, 'hapus_validasi'])->middleware('auth:admindpmd');

// Report Laporan Admin DPMD
Route::get('/dpmd/pengguna_laporan', [ReportlaporandpmdController::class, "index"])->name('admindpmd.index');
Route::get('/dpmd/pengguna_laporantriwulan', [ReportlaporandpmdController::class, "indextriwulan"])->name('admindpmd.triwulan');
Route::get('/dpmd/pengguna_laporanproporsal', [ReportlaporandpmdController::class, "indexproporsal"])->name('admindpmd.proporsak');
