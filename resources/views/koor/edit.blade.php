@extends('layouts.app')
<head>
    @include('layouts.base')  
    <title>Edit Koordinator Saksi - Sistem Informasi Manajemen Saksi Pemilu</title>
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet" />
    <script src="{{asset('js/select2.min.js')}}"></script>
</head>

@section('content')
<div class="row">
    <div class="col-lg"></div>
    <div class="col-lg-9">
        @if (\Session::has('status'))
            <div class="alert alert-success fade show mb-4 px-3 py-2" role="alert">
                {{ \Session::get('status') }}
                <div class="d-flex justify-content-end my-2">
                    <a class="btn btn-small btn-light" href="{{route("koor.show",$koor->id)}}">Lihat Profil</a>
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger fade show mb-4 px-3 py-2" role="alert">
                {{ $errors->first() }}
            </div>
        @endif
        <!-- KOORDINATOR SAKSI -->
        <form method="POST" action="{{route('koor.update', $koor->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h3 class="text-center mb-5"><strong>Edit Koordinator Saksi</strong></h3>
            
            <div class="form-row">
        
                <!-- KABUPATEN/KOTA -->
                <div class="form-group col-md-4">
                    <label class="text-muted">Kabupaten/Kota</label>
                    <h5>{{$koor->kelurahan->kecamatan->kabupaten->nama}}</h5>
                </div>
            
                <!-- KECAMATAN -->
                <div class="form-group col-md-4">
                    <label class="text-muted">Kecamatan</label>
                    <h5>{{$koor->kelurahan->kecamatan->nama}}</h5>
                </div>
        
                <!-- DESA -->
                <div class="form-group col-md-4">
                    <label class="text-muted">Kelurahan/Desa</label>
                    <select class="form-control custom-select" id="kel" name="kel" required>
                        @foreach($user->kelurahan as $kel)
                            <option value="{{$kel->id}}" 
                                @if($koor->kel_id == $kel->id)
                                    selected="selected"
                                @endif>{{$kel->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <hr class="my-4 dashed-line">

            <div class="form-group">
                <label class="text-muted mt-3" for="nama">Nama Koordinator Saksi</label>
                <input type="text" name="nama" class="form-control" id="nama" value="{{$koor->nama}}" required>
            </div>

            <label class="text-muted mt-3">Jenis Kelamin</label>
            <div class="form-inline mb-3 ml-2">
                <div class="custom-control custom-radio mr-5 mt-2">
                    <input type="radio" id="genderL" name="gender" value="L" class="custom-control-input" required {{ ( $koor->gender == 'L' ) ? 'checked' : '' }}>
                    <label class="custom-control-label gender-label" for="genderL">Laki-Laki</label>
                </div>
                <div class="custom-control custom-radio mt-2">
                    <input type="radio" id="genderP" name="gender" value="P" class="custom-control-input" required {{ ( $koor->gender == 'P' ) ? 'checked' : '' }}>
                    <label class="custom-control-label gender-label" for="genderP">Perempuan</label>
                </div>
            </div>
        
            <div class="form-group">
                <label class="text-muted mt-3" for="alamat">Alamat Tempat Tinggal</label>
                <input type="text" name="alamat" class="form-control" id="alamat" value="{{$koor->alamat}}" required>
            </div>
        
            <div class="form-group">
                <label class="text-muted mt-3" for="nohp">Nomor Handphone / WhatsApp</label>
                <input type="tel" class="form-control" name="nohp" id="nohp" maxlength="15" value="{{$koor->no_hp}}" required>
            </div>
        
            <div class="mb-3">
                <label class="text-muted mt-3" for="fotoktp">Foto KTP</label><br>                
                <div id="file-upload" class="file-upload">
                    <div class="image-upload-wrap" style="display:none;">
                        <input name="fotoktp" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*"/>
                        <div class="drag-text">
                            <h3><i class="mdi mdi-plus"></i></h3>
                        </div>
                    </div>
                    <div class="file-upload-content">
                        <a href="{{ asset("storage/koor/foto_ktp/{$koor->foto_ktp}") }}">
                            <img class="file-upload-image mb-1" src="{{ asset("storage/koor/foto_ktp/{$koor->foto_ktp}") }}" alt="Foto KTP" /><br>
                        </a>
                        <small class="image-title">{{$koor->foto_ktp}}</small><br>
                        <button type="button" onclick="removeUpload()" class="btn btn-secondary mt-2">Ubah</button>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="text-muted mt-4" for="fotodiri">Foto Diri</label><br>
                <div id="file-upload2" class="file-upload">
                    <div class="image-upload-wrap" style="display:none;">
                        <input name="fotodiri" class="file-upload-input" type='file' onchange="readURL2(this);" accept="image/*"/>
                        <div class="drag-text">
                            <h3><i class="mdi mdi-plus"></i></h3>
                        </div>
                    </div>
                    <div class="file-upload-content">
                        <a href="{{ asset("storage/koor/foto_diri/{$koor->foto_diri}") }}">
                            <img class="file-upload-image mb-1" src="{{ asset("storage/koor/foto_diri/{$koor->foto_diri}") }}" alt="Foto Diri" /><br>
                        </a>
                        <small class="image-title">{{$koor->foto_diri}}</small><br>
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
<script>
    $('#kel').select2({
        placeholder: 'Pilih...',
    });
</script>
<script src="{{asset('js/image-input.js')}}"></script>
@endsection