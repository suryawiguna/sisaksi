@extends('layouts.app')
<head>
    @include('layouts.base')  
    <title>Edit Profil Saya - Sistem Informasi Manajemen Saksi Pemilu</title>
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
        <!-- KOORDINATOR SAKSI -->
        <form method="POST" action="{{route('saksi.update', $user->saksi->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h3 class="text-center mb-4"><strong>Edit Profil Saya</strong></h3>

            <div class="form-group">
                <label class="text-muted mt-3" for="nama">Nama Saya</label>
                <input type="text" name="nama" class="form-control" id="nama" value="{{$user->saksi->nama}}" required>
            </div>

            <label class="text-muted mt-3">Jenis Kelamin</label>
            <div class="form-inline mb-3 ml-2">
                <div class="custom-control custom-radio mr-5 mt-2">
                    <input type="radio" id="genderL" name="gender" value="L" class="custom-control-input" {{ ( $user->saksi->gender == 'L' ) ? 'checked' : '' }}>
                    <label class="custom-control-label gender-label" for="genderL">Laki-Laki</label>
                </div>
                <div class="custom-control custom-radio mt-2">
                    <input type="radio" id="genderP" name="gender" value="P" class="custom-control-input" {{ ( $user->saksi->gender == 'P' ) ? 'checked' : '' }}>
                    <label class="custom-control-label gender-label" for="genderP">Perempuan</label>
                </div>
            </div>
        
            <div class="form-group">
                <label class="text-muted mt-3" for="alamat">Alamat Tempat Tinggal</label>
                <input type="text" name="alamat" class="form-control" id="alamat" value="{{$user->saksi->alamat}}" required>
            </div>
        
            <div class="form-group">
                <label class="text-muted mt-3" for="nohp">Nomor Handphone / WhatsApp</label>
                <input type="tel" class="form-control" name="nohp" id="nohp" maxlength="15" value="{{$user->saksi->no_hp}}" required>
            </div>
        
            <div class="col-12 p-0 mb-3">
                <label class="text-muted mt-3" for="fotoktp">Foto KTP</label><br>
                {{-- <a href="{{ asset("storage/saksi/foto_ktp/{$user->saksi->foto_ktp}") }}">
                    <img src="{{ asset("storage/saksi/foto_ktp/{$user->saksi->foto_ktp}") }}" id="fotoKtpPreview" alt="fotoktp"/>
                </a>
                <div class="custom-file my-2">
                    <input id="fotoktp" type="file" class="custom-file-input" id="customFile" name="fotoktp" accept="image/*">
                    <label class="custom-file-label" for="customFile">Tidak ada foto yang dipilih</label>
                </div> --}}
                <div id="file-upload" class="file-upload">
                    <div class="image-upload-wrap" style="display:none;">
                        <input name="fotoktp" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*"/>
                        <div class="drag-text">
                            <h3><i class="mdi mdi-plus"></i></h3>
                        </div>
                    </div>
                    <div class="file-upload-content">
                        <a href="{{ asset("storage/saksi/foto_ktp/{$user->saksi->foto_ktp}") }}">
                            <img class="file-upload-image mb-1" src="{{ asset("storage/saksi/foto_ktp/{$user->saksi->foto_ktp}") }}" alt="Foto KTP" /><br>
                        </a>
                        <small class="image-title">{{$user->saksi->foto_ktp}}</small><br>
                        <button type="button" onclick="removeUpload()" class="btn btn-secondary mt-2">Ubah</button>
                    </div>
                </div>
            </div>
            <div class="col-12 p-0 ">
                <label class="text-muted mt-3" for="fotodiri">Foto Diri</label><br>
                {{-- <a href="{{ asset("storage/saksi/foto_diri/{$user->saksi->foto_diri}") }}">
                    <img src="{{ asset("storage/saksi/foto_diri/{$user->saksi->foto_diri}") }}" id="fotoDiriPreview" alt="fotodiri"/>
                </a>
                <div class="custom-file my-2">
                    <input id="fotodiri" type="file" class="custom-file-input" id="customFile" name="fotodiri" accept="image/*">
                    <label class="custom-file-label" for="customFile">Tidak ada foto yang dipilih</label>
                </div> --}}
                <div id="file-upload2" class="file-upload">
                    <div class="image-upload-wrap" style="display:none;">
                        <input name="fotodiri" class="file-upload-input" type='file' onchange="readURL2(this);" accept="image/*"/>
                        <div class="drag-text">
                            <h3><i class="mdi mdi-plus"></i></h3>
                        </div>
                    </div>
                    <div class="file-upload-content">
                        <a href="{{ asset("storage/saksi/foto_diri/{$user->saksi->foto_diri}") }}">
                            <img class="file-upload-image mb-1" src="{{ asset("storage/saksi/foto_diri/{$user->saksi->foto_diri}") }}" alt="Foto Diri" /><br>
                        </a>
                        <small class="image-title">{{$user->saksi->foto_diri}}</small><br>
                        <button type="button" onclick="removeUpload2()" class="btn btn-secondary mt-2">Ubah</button>
                    </div>
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