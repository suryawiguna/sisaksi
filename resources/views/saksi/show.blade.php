@extends('layouts.app')
<head>
    @include('layouts.base')
    <title>Detail Saksi - Sistem Informasi Manajemen Saksi Pemilu</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
            <h3 class="m-0 text-center"><strong>Detail Saksi</strong></h3>
        </div>
        <hr>
        @if($saksi->koor->kelurahan->kecamatan->user->id === Auth::user()->id)
        <div class="d-flex flex-row justify-content-end mb-3">
            <a class="btn btn-success mr-2" href="{{route('saksi.edit', $saksi->id)}}" title="Edit">
                <i class="mdi mdi-pencil"></i> Edit
            </a>
            <button type="button" class="btn btn-danger" title="Hapus" data-toggle="modal" data-target="#modalHapusSaksi">
                <i class="mdi mdi-delete"></i> Hapus
            </button>
            <!-- Modal Hapus-->
            <div class="modal fade" id="modalHapusSaksi" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog modal-sm" role="document">
                    <div class="modal-content border-0">
                        <div class="modal-body p-4">
                            <h5 class="font-weight-bold m-0">Hapus saksi ini?</h5>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Tidak</button>
                            <form action="{{route('saksi.destroy', $saksi->id)}}" method="POST" class="m-0">
                                @csrf
                                @method('DELETE')
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="d-flex flex-column flex-sm-row justify-content-between">
            <div class="d-flex flex-column flex-grow-1">
                <div class="card card-radius card-margin p-4">
                    <h5 class="card-title font-weight-bold mb-3 text-center">PROFIL SAKSI</h5>
                    <a href="{{ asset("storage/saksi/foto_diri/{$saksi->foto_diri}") }}" class="mt-2 mb-3">
                        <img class="foto" src="{{ asset("storage/saksi/foto_diri/{$saksi->foto_diri}") }}" alt="Foto Diri Saksi">
                    </a>
                    <small class="text-muted mt-2 mb-1">Nama</small>
                    <p class="mb-3"><strong>{{$saksi->nama}}</strong></p>
    
                    <small class="text-muted mb-1">Jenis Kelamin</small>
                    <p class="mb-3"><strong>
                        {{$saksi->gender === "L" ? "Laki-Laki" : "Perempuan"}}
                    </strong></p>
    
                    <small class="text-muted mb-1">Alamat Tempat Tinggal</small>
                    <p class="mb-3"><strong>{{$saksi->alamat}}</strong></p>
    
                    <small class="text-muted mb-1">Nomor Handphone</small>
                    <p class="mb-3"><strong>{{$saksi->no_hp}}</strong></p>

                    <small class="text-muted mb-1">Partai</small>
                    <p class="mb-3"><strong>{{$saksi->partai->nama}}</strong></p>
    
                    <small class="text-muted mb-1">Foto KTP</small>
                    <a href="{{ asset("storage/saksi/foto_ktp/{$saksi->foto_ktp}") }}">
                        <img src="{{ asset("storage/saksi/foto_ktp/{$saksi->foto_ktp}") }}" alt="Foto Diri Saksi" width="150px">
                    </a>
                </div>
            </div>
            <div class="d-flex flex-column">
                <div class="card card-radius mb-3 p-4">
                    <h5 class="card-title font-weight-bold mb-3 text-center">DAERAH</h5>
                    <small class="text-muted mt-2 mb-1">Kabupaten/Kota</small>
                    <p class="mb-3"><strong>{{$saksi->koor->kelurahan->kecamatan->kabupaten->nama}}</strong></p>
                    <small class="text-muted mb-1">Kecamatan</small>
                    <p class="mb-3"><strong>{{$saksi->koor->kelurahan->kecamatan->nama}}</strong></p>
                    <small class="text-muted mb-1">Kelurahan</small>
                    <p class="mb-3"><strong>{{$saksi->koor->kelurahan->nama}}</strong></p>
                    <h4 class="mb-0"><strong><span class="badge badge-dark rounded-0 p-2">TPS {{$saksi->tps}}</span></strong></h4>
                </div>
                <div class="card card-radius mb-3 p-4">
                    <h5 class="card-title font-weight-bold mb-3 text-center">KOORDINATOR</h5>
                    <a href="{{ asset("storage/koor/foto_diri/{$saksi->koor->foto_diri}") }}" class="mt-1 mb-2">
                        <img style="height:100px;" src="{{ asset("storage/koor/foto_diri/{$saksi->koor->foto_diri}") }}" alt="Foto Diri Saksi">
                    </a>
                    <small class="text-muted mt-2 mb-1">Nama</small>
                    <p class="mb-3"><strong>{{$saksi->koor->nama}}</strong></p>

                    <small class="text-muted mb-1">Nomor Handphone</small>
                    <p class="mb-3"><strong>{{$saksi->koor->no_hp}}</strong></p>
        
                    <a href="{{route('koor.show', $saksi->koor->id)}}" class="btn btn-secondary mt-2 align-self-end">Detail</a>
                </div>
                @if($saksi->koor->kelurahan->kecamatan->user->id === Auth::user()->id)
                <div class="card card-radius mb-3 p-4">
                    <h5 class="card-title font-weight-bold text-center mb-3">AKUN SAKSI</h5>
                    <small class="text-muted mt-2 mb-1">Username</small>
                    <div class="d-flex justify-content-start">
                        <button id="btn-reset-username" class="btn btn-secondary btn-small mb-3" type="button" data-toggle="modal" data-target="#modal-reset">
                            <i class="mdi mdi-account-convert"></i> Reset Username
                        </button>
                    </div>
                    <small class="text-muted mt-2 mb-1">Password</small>
                    <div class="d-flex justify-content-start">
                        <button id="btn-reset-password" class="btn btn-secondary btn-small" type="button" data-toggle="modal" data-target="#modal-reset">
                            <i class="mdi mdi-lock-reset"></i> Reset Password
                        </button>
                    </div>

                    {{-- Modal RESET --}}
                    <div class="modal fade" id="modal-reset" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog modal-sm" role="document">
                            <div class="modal-content border-0">
                                <div class="modal-body p-4">
                                    <h5 id="reset-title" class="font-weight-bold m-0"></h5>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Tidak</button>
                                    <form id="form-reset" action="{{route('user.update', $saksi->user->id)}}" method="POST" class="m-0"  enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        
                                        <button id="btn-reset" type="submit" class="btn btn-primary">Reset</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@if($saksi->koor->kelurahan->kecamatan->user->id === Auth::user()->id)
<script>
    $(document).ready(function() {
        $("#btn-reset-username").click(function() {
            $("#reset-title").html("Reset username saksi ini?");
            $('<input name="reset-username" type="hidden">').insertBefore("#btn-reset");
        });
        $("#btn-reset-password").click(function() {
            $("#reset-title").html("Reset password saksi ini?");
            $('<input name="reset-password" type="hidden">').insertBefore("#btn-reset");
        });
    });
</script>
@endif
@endsection