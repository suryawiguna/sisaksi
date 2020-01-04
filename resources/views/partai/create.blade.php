@extends('layouts.app')
<head>
    @include('layouts.base')  
    <title>Tambah Partai - Sistem Informasi Manajemen Saksi Pemilu</title>
</head>

@section('content')
<div class="row">
    <div class="col-lg col-md"></div>
    <div class="col-lg-7 col-md-8">
        @if (\Session::has('status'))
            <div class="alert alert-success fade show mb-4 px-3 py-2" role="alert">
                {{ \Session::get('status') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger fade show mb-4 px-3 py-2" role="alert">
                {{ $errors->first() }}
            </div>
        @endif
        <!-- KOORDINATOR SAKSI -->
        <form method="POST" action="{{route('partai.store')}}" enctype="multipart/form-data">
            @csrf
            <h3 class="text-center"><strong>Tambah Partai</strong></h3>
        
            <div class="form-group">
                <label class="text-muted mt-3" for="nama">Nama Partai</label>
                <input type="text" name="nama" class="form-control" id="nama" maxlength="20" required autofocus>
            </div>
        
            <div class="form-group">
                <label class="text-muted mt-3" for="deskripsi">Deskripsi/Kepanjangan Nama</label>
                <input type="text" name="deskripsi" class="form-control" id="deskripsi" maxlength="100" required autofocus>                
            </div>

            <div class="row">
                <div class="col"></div>
                <div class="col-lg-4 col-md-4 col-sm-8 mt-3">
                    <button type="submit" class="btn btn-success btn-lg btn-block mt-4 font-weight-bold">SIMPAN</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg col-md"></div>
</div>
@endsection