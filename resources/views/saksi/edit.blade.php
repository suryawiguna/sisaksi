@extends('layouts.app')
<head>
    @include('layouts.base')  
    <title>Edit Saksi - Sistem Informasi Manajemen Saksi Pemilu</title>
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
                    <a class="btn btn-small btn-light" href="{{route('saksi.show', $saksi->id)}}">Lihat Profil</a>
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger fade show mb-4 px-3 py-2" role="alert">
                {{ $errors->first() }}
            </div>
        @endif
        <!-- KOORDINATOR SAKSI -->
        <form method="POST" action="{{route('saksi.update', $saksi->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h3 class="text-center mb-5"><strong>Edit Saksi</strong></h3>
            <div class="form-row">
            
                <!-- KABUPATEN/KOTA -->
                <div class="form-group col-md-4">
                    <label class="text-muted">Kabupaten/Kota</label>
                    <h5>{{$user->komisisaksi->kabupaten->nama}}</h5>
                </div>
            
                <!-- KECAMATAN -->
                <div class="form-group col-md-4">
                    <label class="text-muted">Kecamatan</label>
                    <h5>{{$user->komisisaksi->nama}}</h5>
                </div>
        
                <!-- DESA -->
                <div class="form-group col-md-4">
                    <label class="text-muted">Kelurahan/Desa</label>
                    <select class="form-control custom-select" id="kel" required>
                        @foreach($user->kelurahan as $kel)
                            <option value="{{$kel->id}}"
                                @if($saksi->koor->kel_id == $kel->id)
                                    selected="selected"
                                @endif>{{$kel->nama}} ({{$kel->koor->count()}})</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="koor" class="text-muted mt-3">Koordinator</label>
                    <select class="form-control custom-select" id="koor" name="koor" required>
                        <option value="" disabled selected>Pilih...</option>
                        @foreach($saksi->koor->kelurahan->koor as $koor)
                            <option value="{{$koor->id}}"
                                @if($saksi->koor_id == $koor->id)
                                    selected="selected"
                                @endif>{{$koor->nama}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-12">
                    <label for="partai" class="text-muted mt-3">Partai</label>
                    <select class="form-control custom-select" id="partai" name="partai" required>
                        <option value="" disabled selected>Pilih...</option>
                        @foreach($partai as $partai)
                            <option value="{{$partai->id}}"
                                @if($saksi->partai_id == $partai->id)
                                    selected="selected"
                                @endif>{{$partai->nama}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-12">
                    <label for="notps" class="text-muted mt-3">Nomor TPS</label>
                    <select class="form-control custom-select" id="notps" name="notps" required>
                        <option value="" disabled selected>Pilih...</option>
                        @for ($i = 1; $i <= 50; $i++)
                            <option value="{{ $i }}"
                            @if($saksi->tps == $i)
                                selected="selected"
                            @endif>TPS {{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
        
            <hr class="my-4 dashed-line">

            <div class="form-group">
                <label class="text-muted mt-3" for="nama">Nama Saksi</label>
                <input type="text" name="nama" class="form-control" id="nama" value="{{$saksi->nama}}" required>
            </div>

            <label class="text-muted mt-3">Jenis Kelamin</label>
            <div class="form-inline mb-3 ml-2">
                <div class="custom-control custom-radio mr-5 mt-2">
                    <input type="radio" id="genderL" name="gender" value="L" class="custom-control-input" {{ ( $saksi->gender == 'L' ) ? 'checked' : '' }}>
                    <label class="custom-control-label gender-label" for="genderL">Laki-Laki</label>
                </div>
                <div class="custom-control custom-radio mt-2">
                    <input type="radio" id="genderP" name="gender" value="P" class="custom-control-input" {{ ( $saksi->gender == 'P' ) ? 'checked' : '' }}>
                    <label class="custom-control-label gender-label" for="genderP">Perempuan</label>
                </div>
            </div>
        
            <div class="form-group">
                <label class="text-muted mt-3" for="alamat">Alamat Tempat Tinggal</label>
                <input type="text" name="alamat" class="form-control" id="alamat" value="{{$saksi->alamat}}" required>
            </div>
        
            <div class="form-group">
                <label class="text-muted mt-3" for="nohp">Nomor Handphone / WhatsApp</label>
                <input type="tel" class="form-control" name="nohp" id="nohp" maxlength="15" value="{{$saksi->no_hp}}" required>
            </div>
        
            <div class="col-12 p-0 mb-3">
                <label class="text-muted mt-3" for="fotoktp">Foto KTP</label><br>
                <div id="file-upload" class="file-upload">
                    <div class="image-upload-wrap" style="display:none;">
                        <input name="fotoktp" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*"/>
                        <div class="drag-text">
                            <h3><i class="mdi mdi-plus"></i></h3>
                        </div>
                    </div>
                    <div class="file-upload-content">
                        <a href="{{ asset("storage/saksi/foto_ktp/{$saksi->foto_ktp}") }}">
                            <img class="file-upload-image mb-1" src="{{ asset("storage/saksi/foto_ktp/{$saksi->foto_ktp}") }}" alt="Foto KTP" /><br>
                        </a>
                        <small class="image-title">{{$saksi->foto_ktp}}</small><br>
                        <button type="button" onclick="removeUpload()" class="btn btn-secondary mt-2">Ubah</button>
                    </div>
                </div>
            </div>
            <div class="col-12 p-0 ">
                <label class="text-muted mt-4" for="fotodiri">Foto Diri</label><br>
                <div id="file-upload2" class="file-upload">
                    <div class="image-upload-wrap" style="display:none;">
                        <input name="fotodiri" class="file-upload-input" type='file' onchange="readURL2(this);" accept="image/*"/>
                        <div class="drag-text">
                            <h3><i class="mdi mdi-plus"></i></h3>
                        </div>
                    </div>
                    <div class="file-upload-content">
                        <a href="{{ asset("storage/saksi/foto_diri/{$saksi->foto_diri}") }}">
                            <img class="file-upload-image mb-1" src="{{ asset("storage/saksi/foto_diri/{$saksi->foto_diri}") }}" alt="Foto Diri" /><br>
                        </a>
                        <small class="image-title">{{$saksi->foto_diri}}</small><br>
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
    $('#kel, #koor, #partai, #notps').select2({
        placeholder: 'Pilih...',
        "language": {
            "noResults": function(){
                return "Tidak ada hasil";
            }
        },
    });

    $('#kel').on('change', function(){
        var kelID = $(this).val();
        console.log(kelID);
        if(kelID) {
            $.ajax({
                url: '/kel/'+kelID,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('#koor').empty();
                    $.each(data, function(key, value){
                        var newOption = new Option(value, key, false, false);
                        $('#koor').append('<option value="" disabled selected>Pilih...</option>',
                        newOption);
                    });
                },
            });
        } else {
            $('#koor').empty();
        }

    });
</script>
<script src="{{asset('js/image-input.js')}}"></script>
@endsection