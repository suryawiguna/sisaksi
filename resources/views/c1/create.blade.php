@extends('layouts.app')
<head>
    @include('layouts.base')  
    <title>Tambah Foto Formulir C1 - Sistem Informasi Manajemen Saksi Pemilu</title>
</head>

@section('content')
<div class="row">
    <div class="col-lg"></div>
    <div class="col-lg-9">
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

        <form method="POST" action="{{route('c1.store')}}" enctype="multipart/form-data">
            @csrf
            <h3 class="text-center"><strong>Tambah Foto Formulir C1</strong></h3>
        
            <label class="text-muted my-3" for="foto_c1">Foto Formulir C1</label>
            <div id="file-upload" class="file-upload">
                <div class="image-upload-wrap">
                    <input name="foto_c1" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" required/>
                    <div class="drag-text">
                        <h3><i class="mdi mdi-plus"></i></h3>
                    </div>
                </div>
                <div class="file-upload-content" style="display:none;">
                    <img class="file-upload-image mb-1" src="#" alt="your image" /><br>
                    <small class="image-title"></small><br>
                    <button type="button" onclick="removeUpload()" class="btn btn-secondary mt-2">Ubah</button>
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
<script src="{{asset('js/image-input.js')}}"></script>
@endsection