@extends('layouts.app')
<head>
    @include('layouts.base')
    <title>Foto C1 Saya - Sistem Informasi Manajemen Saksi Pemilu</title>
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
    </div>
    <div class="col-lg"></div>
</div>
<h3 class="text-center mb-3"><strong>Foto C1 Saya</strong></h3>
    
<div class="d-flex justify-content-center">
    @if($user->saksi->c1)
    <div class="d-flex flex-container flex-column flex-sm-row">
        <div class="flex-fill text-center card align-self-sm-start card-radius m-2 p-4">
            <a href="{{ asset("storage/c1/{$user->saksi->c1->foto_c1}") }}">
                <img src="{{ asset("storage/c1/{$user->saksi->c1->foto_c1}") }}" alt="Foto Diri Saksi" style="max-width:400px;width:100%;">
            </a>
            <div class="d-flex flex-row justify-content-end mt-3">
                <a href="{{route('c1.edit', $user->saksi->c1->id)}}" class="btn flex-fill btn-success align-self-end mr-2">Edit</a>
                <button type="button" class="btn flex-fill btn-danger align-self-end ml-2" title="Hapus" data-toggle="modal" data-target="#modal-hapus">Hapus
                </button>
                <!-- Modal Hapus-->
                <div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog modal-sm" role="document">
                        <div class="modal-content border-0">
                            <div class="modal-body p-4">
                                <h5 class="text-left font-weight-bold m-0">Hapus Foto C1?</h5>
                            </div>
                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Tidak</button>
                                <form action="{{route('c1.destroy', $user->saksi->c1->id)}}" method="POST" class="m-0">
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
        </div>
        <div class="flex-fill align-self-sm-start card card-radius m-2 p-4">
            <small class="text-muted mt-2 mb-1">Kabupaten/Kota</small>
            <p class="mb-3"><strong>{{$user->saksi->koor->kelurahan->kecamatan->kabupaten->nama}}</strong></p>
            <small class="text-muted mb-1">Kecamatan</small>
            <p class="mb-3"><strong>{{$user->saksi->koor->kelurahan->kecamatan->nama}}</strong></p>
            <small class="text-muted mb-1">Kelurahan</small>
            <p class="mb-3"><strong>{{$user->saksi->koor->kelurahan->nama}}</strong></p>
            <h4 class="mb-0"><strong><span class="badge badge-dark rounded-0 p-2">TPS {{$user->saksi->tps}}</span></strong></h4>
        </div>
    </div>
    @else
    <div class="d-flex flex-container justify-content-center">
        <div class="text-center card align-self-center card-radius m-2 p-5">
            <small class="m-0 text-muted">Tidak ada foto formulir C1</small>
            <a href="{{route('c1.create')}}" class="btn btn-success btn-block mt-3 align-self-end"><i class="mdi mdi-upload"></i> Upload Foto C1</a>
        </div>
    </div>
    @endif
</div>
@endsection