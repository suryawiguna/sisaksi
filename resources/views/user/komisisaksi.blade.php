@extends('layouts.app')
<head>
    @include('layouts.base')
    @if(Auth::user()->id == $user->id)
    <title>Akun Saya - Sistem Informasi Manajemen Saksi Pemilu</title>
    @elseif(Auth::user()->role_id == 1)
    <title>Detail Akun - Sistem Informasi Manajemen Saksi Pemilu</title>
    @endif
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
            @if(Auth::user()->id == $user->id)
            <h3 class="mb-4 text-center"><strong>Akun Saya</strong></h3>
            @elseif(Auth::user()->role_id == 1)
            <h3 class="mb-4 text-center"><strong>Detail Akun</strong></h3>
            @endif
        </div>
        <div class="d-flex flex-column flex-sm-row">
            <div class="d-flex flex-column flex-fill">
                <div class="card card-radius card-margin p-4">
                    <h5 class="card-title font-weight-bold text-center mb-3">PROFIL</h5>

                    <small class="text-muted mt-2 mb-1">Kabupaten/Kota</small>
                    <p class="mb-3"><strong>{{$user->komisisaksi->kabupaten->nama}}</strong></p>
    
                    <small class="text-muted mt-2 mb-1">Kecamatan</small>
                    <p class="mb-3"><strong>{{$user->komisisaksi->nama}}</strong></p>

                    <small class="text-muted mt-2 mb-1">Kelurahan</small>
                    <div class="d-flex justify-content-start">
                        <button class="btn btn-secondary btn-small mb-3" type="button" data-toggle="modal" data-target="#modal-kelurahan">
                            Lihat Kelurahan <span class="badge badge-pill badge-light ml-2">{{$user->kelurahan->count()}}</span>
                        </button>
                    </div>

                    <div class="d-flex mt-4">
                        <div class="p-0 flex-fill">
                            <div class="card round mr-2">
                                <div class="card-body px-2">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h5 class="m-0 text-center font-weight-bold">{{$koor->count()}}</h5>
                                        <small class="text-muted text-center">Koordinator</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-0 flex-fill">
                            <div class="card round">
                                <div class="card-body px-2">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h5 class="m-0 text-center font-weight-bold">{{$saksi->count()}}</h5>
                                        <small class="text-muted text-center">Saksi</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- MODAL KELURAHAN --}}
                    <div class="modal fade" id="modal-kelurahan" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog modal" role="document">
                            <div class="modal-content">
                                <div class="modal-header px-4 d-flex align-items-stretch">
                                    <h5 class="card-title m-0">Kelurahan Saya</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                </div>
                                <div class="modal-body py-2">
                                    <table class="table table-borderless table-striped table-hover m-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Kelurahan</th>
                                                <th>Koordinator</th>
                                                <th>Saksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user->komisisaksi->kelurahan as $i=>$kel)
                                            <tr>
                                                <td class="font-weight-bold">{{$i+1}}</td>
                                                <td>{{$kel->nama}}</td>
                                                <td>{{$kel->koor->count()}}</td>
                                                <td>{{$kel->saksi->count()}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column flex-fill">
                <div class="card card-radius mb-3 p-4">
                    <h5 class="card-title font-weight-bold text-center mb-3">INFORMASI AKUN</h5>

                    <small class="text-muted mt-2 mb-1">Tipe Akun</small>
                    <div class="d-flex justify-content-start">
                        <p class="badge badge-pill role2 py-1 px-2 mb-3">{{$user->role->name}}</p>
                    </div>

                    <small class="text-muted mt-2 mb-1">Username</small>
                    <p class="mb-3"><strong>{{$user->username}}</strong></p>

                    <small class="text-muted mt-2 mb-1">Password</small>
                    @if(Auth::user()->id == $user->id)
                    <div class="d-flex justify-content-start">
                        <button class="btn btn-secondary btn-small" type="button" data-toggle="modal" data-target="#modal-password">
                            <i class="mdi mdi-key"></i> Ubah Password
                        </button>
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
                    @elseif(Auth::user()->role_id == 1)
                    <div class="d-flex justify-content-start">
                        <button class="btn btn-secondary btn-small" type="button" data-toggle="modal" data-target="#modal-reset">
                            <i class="mdi mdi-lock-reset"></i> Reset Password
                        </button>
                    </div>
                    {{-- Modal RESET PASSWORD --}}
                    <div class="modal fade" id="modal-reset" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog modal-sm" role="document">
                            <div class="modal-content border-0">
                                <div class="modal-body p-4">
                                    <h5 id="reset-title" class="font-weight-bold m-0">Reset password pengguna ini?</h5>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Tidak</button>
                                    <form id="form-reset" action="{{route('user.update', $user->id)}}" method="POST" class="m-0"  enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input name="reset-password" type="hidden">
                                        <button id="btn-reset" type="submit" class="btn btn-primary">Reset</button>
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