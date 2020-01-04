@extends('layouts.app')
<head>
    @include('layouts.base')  
    <title>Tambah Pengumuman - Sistem Informasi Manajemen Saksi Pemilu</title>
</head>

@section('content')
<div class="row">
    <div class="col-lg"></div>
    <div class="col-lg-9">
        @if (\Session::has('status'))
            <div class="alert alert-success fade show mb-4 px-3 py-2" role="alert">
                {{ \Session::get('status') }}
                <div class="d-flex justify-content-end mt-2">
                    <a class="btn btn-small btn-light" href="{{route("pengumuman.show",\Session::get('id'))}}">Lihat Pengumuman</a>
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger fade show mb-4 px-3 py-2" role="alert">
                {{ $errors->first() }}
            </div>
        @endif
        
        <form method="POST" action="{{route('pengumuman.store')}}" enctype="multipart/form-data">
            @csrf
            <h3 class="text-center"><strong>Tambah Pengumuman</strong></h3>
        
            <div class="form-group">
                <label class="text-muted mt-3" for="judul">Judul Pengumuman</label>
                <input type="text" name="judul" class="form-control" id="judul" maxlength="100" required autofocus>
            </div>
        
            <div class="form-group">
                <label class="text-muted mt-3" for="isi">Isi Pengumuman</label>
                <textarea class="form-control" id="isi" name="isi" rows="6" maxlength="500" required></textarea>
            </div>
        
            <label class="text-muted mt-3" for="lampiran">Lampiran</label>
            <div class="custom-file my-1">
                <input id="lampiran" type="file" class="custom-file-input" name="lampiran" accept="*">
                <label class="custom-file-label" for="lampiran">Tidak ada file yang dipilih</label>
            </div>

            <div class="form-group mt-5 mb-0">
                <div class="d-flex align-items-center">
                    <small class="m-0 text-muted">Hide</small>
                    <label class="switch my-0 mx-2" title="Aktif/Tidak Aktif">
                        <input type="checkbox" class="active-switch" name="status" checked>
                        <span class="slider"></span>
                    </label>
                    <small class="m-0 text-muted">Show</small>
                </div>
            </div>

            <div class="row">
                <div class="col"></div>
                <div class="col-lg-4 col-md-4 col-sm-8 mt-3">
                    <button type="submit" class="btn btn-success btn-lg btn-block mt-4 font-weight-bold">SIMPAN</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg"></div>
</div>
@endsection