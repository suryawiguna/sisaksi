@extends('layouts.app')
<head>
    @include('layouts.base')
    <title>Akun Saya - Sistem Informasi Manajemen Saksi Pemilu</title>
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
            <h3 class="mb-4 text-center"><strong>Akun Saya</strong></h3>
        </div>
        <div class="d-flex flex-column flex-sm-row">
            <div class="d-flex flex-column flex-fill">
                <div class="card card-radius card-margin p-4">
                    <h5 class="card-title font-weight-bold text-center mb-3">INFORMASI AKUN</h5>

                    <small class="text-muted mt-2 mb-1">Tipe Akun</small>
                    <div class="d-flex justify-content-start">
                        <p class="badge badge-pill role1 py-1 px-2 mb-3">{{$user->role->name}}</p>
                    </div>

                    <small class="text-muted mt-2 mb-1">Username</small>
                    <p class="mb-3"><strong>{{$user->username}}</strong></p>
                </div>
            </div>
            <div class="d-flex flex-column flex-fill">
                <div class="card card-radius mb-3 p-4">
                    <h5 class="card-title font-weight-bold text-center mb-4">UBAH PASSWORD</h5>

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