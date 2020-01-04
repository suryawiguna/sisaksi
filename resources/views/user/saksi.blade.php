@extends('layouts.app')
<head>
    @include('layouts.base')
    <title>
        {{ Auth::id() == $user->id ? "Akun Saya" : "Detail Akun"}}
        - Sistem Informasi Manajemen Saksi Pemilu
    </title>
</head>

@section('content')
<div class="d-flex justify-content-center">
    <div class="d-flex flex-container flex-column">
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
        <div class="d-flex justify-content-center">
            <h3 class="mb-4 text-center"><strong>
                {{ Auth::id() == $user->id ? "Akun Saya" : "Detail Akun"}}    
            </strong></h3>
        </div>
        <div class="d-flex flex-column flex-sm-row">
            <div class="d-flex flex-column flex-grow-1">
                <div class="card card-radius card-margin mb-3 p-4">
                    <h5 class="card-title font-weight-bold text-center mb-3">PROFIL</h5>

                    <a href="{{ asset("storage/saksi/foto_diri/{$user->saksi->foto_diri}") }}" class="mt-2 mb-3">
                        <img class="foto" src="{{ asset("storage/saksi/foto_diri/{$user->saksi->foto_diri}") }}" alt="Foto Diri Saksi">
                    </a>
                    <small class="text-muted mt-2 mb-1">Nama</small>
                    <p class="mb-3"><strong>{{$user->saksi->nama}}</strong></p>
    
                    @if(Auth::user()->id == $user->id)
                    <small class="text-muted mb-1">Jenis Kelamin</small>
                    <p class="mb-3"><strong>
                        {{$user->saksi->gender === "L" ? "Laki-Laki" : "Perempuan"}}
                    </strong></p>
                    @endif
    
                    <small class="text-muted mb-1">Alamat Tempat Tinggal</small>
                    <p class="mb-3"><strong>{{$user->saksi->alamat}}</strong></p>
    
                    <small class="text-muted mb-1">Nomor Handphone</small>
                    <p class="mb-3"><strong>{{$user->saksi->no_hp}}</strong></p>

                    @if(Auth::user()->id == $user->id)
                    <small class="text-muted mb-1">Partai</small>
                    <p class="mb-3"><strong>{{$user->saksi->partai->nama}}</strong></p>
    
                    <small class="text-muted mb-1">Foto KTP</small>
                    <a href="{{ asset("storage/saksi/foto_ktp/{$user->saksi->foto_ktp}") }}">
                        <img src="{{ asset("storage/saksi/foto_ktp/{$user->saksi->foto_ktp}") }}" alt="Foto Diri Saksi" width="150px">
                    </a>
                    <a href="{{route('editprofil')}}" class="btn btn-success mt-3 align-self-end">Edit Profil</a>
                    @else
                    <a href="{{route('saksi.show', $user->saksi->id)}}" class="btn btn-secondary mt-2 align-self-end">Detail</a>
                    @endif

                </div>
            </div>
            <div class="d-flex flex-column">
                <div class="card card-radius mb-3 p-4">
                    <h5 class="card-title font-weight-bold mb-3 text-center">DAERAH</h5>
                    <small class="text-muted mt-2 mb-1">Kabupaten/Kota</small>
                    <p class="mb-3"><strong>{{$user->saksi->koor->kelurahan->kecamatan->kabupaten->nama}}</strong></p>
                    <small class="text-muted mb-1">Kecamatan</small>
                    <p class="mb-3"><strong>{{$user->saksi->koor->kelurahan->kecamatan->nama}}</strong></p>
                    <small class="text-muted mb-1">Kelurahan</small>
                    <p class="mb-3"><strong>{{$user->saksi->koor->kelurahan->nama}}</strong></p>
                    <h4 class="mb-0"><strong><span class="badge badge-dark rounded-0 p-2">TPS {{$user->saksi->tps}}</span></strong></h4>
                </div>
                @if(Auth::user()->id == $user->id)
                <div class="card card-radius mb-3 p-4">
                    <h5 class="card-title font-weight-bold mb-3 text-center">KOORDINATOR</h5>
                    <a href="{{ asset("storage/koor/foto_diri/{$user->saksi->koor->foto_diri}") }}" class="mt-1 mb-2">
                        <img style="height:100px;" src="{{ asset("storage/koor/foto_diri/{$user->saksi->koor->foto_diri}") }}" alt="Foto Diri Saksi">
                    </a>
                    <small class="text-muted mt-2 mb-1">Nama</small>
                    <p class="mb-3"><strong>{{$user->saksi->koor->nama}}</strong></p>

                    <small class="text-muted mb-1">Nomor Handphone</small>
                    <p class="mb-3"><strong>{{$user->saksi->koor->no_hp}}</strong></p>
                </div>
                @endif
                <div class="card card-radius mb-3 p-4">
                    <h5 class="card-title font-weight-bold text-center mb-3">INFORMASI AKUN</h5>

                    <small class="text-muted mt-2 mb-1">Tipe Akun</small>
                    <div class="d-flex justify-content-start">
                        <p class="badge badge-pill role4 py-1 px-2 mb-3">{{$user->role->name}}</p>
                    </div>

                    <small class="text-muted mt-2 mb-1">Username</small>
                    <p class="mb-1"><strong>{{$user->username}}</strong></p>
                    @if(Auth::id() == $user->id)
                    <div class="d-flex justify-content-start mb-3">
                        <button class="btn btn-secondary btn-small" type="button" data-toggle="modal" data-target="#modal-username">
                            <i class="mdi mdi-account"></i> Ubah Username
                        </button>
                    </div>

                    <small class="text-muted mt-2 mb-1">Password</small>
                    <div class="d-flex justify-content-start">
                        <button class="btn btn-secondary btn-small" type="button" data-toggle="modal" data-target="#modal-password">
                            <i class="mdi mdi-key"></i> Ubah Password
                        </button>
                    </div>

                    {{-- MODAL USERNAME --}}
                    <div class="modal fade" id="modal-username" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog modal-sm" role="document">
                            <div class="modal-content border-0">
                                <div class="modal-header px-4 d-flex align-items-stretch">
                                    <h5 class="card-title m-0">Ubah Username Saya</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                </div>
                                <div class="modal-body p-4">
                                    <form action="{{route('user.update', $user->id)}}" method="POST" class="m-0" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        
                                        <div class="form-group m-0">
                                            <label class="text-muted" for="alamat">Username Baru</label>
                                            <input type="text" name="username" class="form-control" id="username" required>
                                        </div>

                                        <div class="form-group mt-4 mb-0">
                                            <button id="btn-ubah-username" type="submit" class="btn btn-block btn-lg btn-success">Ubah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- MODAL PASSWORD --}}
                    <div class="modal fade" id="modal-password" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog modal-sm" role="document">
                            <div class="modal-content border-0">
                                <div class="modal-header px-4 d-flex align-items-stretch">
                                    <h5 class="card-title m-0">Ubah Password Saya</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                </div>
                                <div class="modal-body p-4">
                                    <form action="{{route('user.update', $user->id)}}" method="POST" class="m-0" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        
                                        <div class="form-group m-0">
                                            <label class="text-muted" for="alamat">Password Lama</label>
                                            <input type="password" name="password-lama" class="form-control" id="password-lama" required>
                                            <small id="alert-password" class="text-danger">Password lama tidak benar</small>
                                        </div>

                                        <div class="form-group m-0">
                                            <label class="text-muted mt-4" for="alamat">Password Baru</label>
                                            <input type="password" name="password" class="form-control" id="password" required>
                                            <small id="alert-password2" class="text-danger">Password minimal 8 karakter</small>
                                        </div>

                                        <div class="form-group m-0">
                                            <label class="text-muted mt-4" for="alamat">Ulangi Password Baru</label>
                                            <input type="password" name="password-baru" class="form-control" id="password-baru" required>
                                            <small id="alert-password3" class="text-danger">Password tidak sama</small>
                                        </div>

                                        <div class="form-group mt-4 mb-0">
                                            <button id="btn-ubah" type="submit" class="btn btn-block btn-lg btn-success">Ubah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    
    $(document).on('keydown', ['password'], function(e) {
        if (e.keyCode == 32) return false;
    });
    $(document).ready(function() {
        (function($) {
        $.fn.donetyping = function(callback){
            var _this = $(this);
            var x_timer;    
            _this.keyup(function (){
                clearTimeout(x_timer);
                x_timer = setTimeout(clear_timer, 1000);
            }); 

            function clear_timer(){
                clearTimeout(x_timer);
                callback.call(_this);
            }
        }
        })(jQuery);
        $("#alert-password, #alert-password3, #alert-password2").hide();
        $('#btn-ubah, #password, #password-baru').prop('disabled', true);
        $("#password-lama").donetyping(function(callback) {
            var oldPassword = $(this).val();

            if(oldPassword.length > 0) {
                $.ajax({
                    type: "GET",
                    url: '/checkpassword/'+oldPassword,
                    dataType: "json",
                    success: function(response) {
                        if(response === true) {
                            $("#alert-password").hide();
                            $("#password").prop('disabled', false);
                        }
                        else {
                            $("#alert-password").show();
                            $("#password").prop('disabled', true);
                        }
                    }
                });
            }
        });
        $("#password").donetyping(function(callback) {
            var value = $(this).val();
            if(value.length < 8) {
                $("#alert-password2").show();
                $("#password-baru").prop('disabled', true);
            }
            else {
                $("#alert-password2").hide();
                $("#password-baru").prop('disabled', false);
            }
        });
        $("#password-baru").donetyping(function(callback) {
            if ($(this).val() != $("#password").val()) {
                $("#alert-password3").show();
                $('#btn-ubah').prop('disabled', true);
            }
            else if ($(this).val() == $("#password").val()) {
                $("#alert-password3").hide();
                $('#btn-ubah').prop('disabled', false);
            }
        });
    });
</script>
@endsection