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
        <h3>{{ App\Models\Pengaduan::where('masyarakat_id', Session::get('id'))->count() }}</h3>

        <p>Pengaduan</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="/masyarakat/pengaduan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  </tbody>
  </table>
</div>
</div>

@endsection