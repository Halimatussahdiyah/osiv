@extends('admin.layout_admin.main')

@section('container')
<div class="card">
    <div class="card-header">
        Tanggapi
    </div>
    <div class="card-body">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
            <h1 class="h2">Tambah Tanggapi</h1>
        </div>
        <div class="container">

            <form action="/admindpmd/tanggapi/{{$id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-floating">
                    <label for="floatingInput">Tambah Tanggapi</label>
                    <textarea type="text" name="deskripsi" class="form-control mb-3" id="deskripsi"
                        placeholder="deskripsi" required></textarea>
                </div>
                <button class="w-100 btn btn-lg btn-primary mb-5" type="submit">Tambah Tanggapi</button>
            </form>
        </div>
    </div>


    @endsection