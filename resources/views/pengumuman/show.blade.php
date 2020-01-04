@extends('layouts.app')
<head>
    @include('layouts.base')
    <title>Detail Pengumuman - Sistem Informasi Manajemen Saksi Pemilu</title>
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
            <h3 class="m-0 text-center"><strong>Detail Pengumuman</strong></h3>
        </div>
        <hr>
        @if($pengumuman->user_id === Auth::user()->id)
        <div class="d-flex flex-row justify-content-end mb-3">
            <a class="btn btn-success mr-2" href="{{route('pengumuman.edit', $pengumuman->id)}}" title="Edit">
                <i class="mdi mdi-pencil"></i> Edit
            </a>
            <button type="button" class="btn btn-danger" title="Hapus" data-toggle="modal" data-target="#modalHapus">
                <i class="mdi mdi-delete"></i> Hapus
            </button>
            <!-- Modal Hapus-->
            <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog modal-sm" role="document">
                    <div class="modal-content border-0">
                        <div class="modal-body p-4">
                            <h5 class="font-weight-bold m-0">Hapus Pengumuman ini?</h5>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Tidak</button>
                            <form action="{{route('pengumuman.destroy', $pengumuman->id)}}" method="POST" class="m-0">
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
            <div class="d-flex flex-column flex-fill">
                <div class="card card-radius card-margin p-4 m-0">
                    <h5 class="m-0 font-weight-bold">{{$pengumuman->judul}}</h5>
    
                    <p class="mt-2">{{$pengumuman->isi}}</p>

                    <small class="text-muted">Dibuat pada {{$pengumuman->created_at->format('d F Y')}}</small>
                    <div class="d-flex justify-content-end">
                        @if($pengumuman->lampiran != null)
                        <a href="{{ asset("storage/pengumuman/lampiran/{$pengumuman->lampiran}") }}" class="btn btn-secondary mt-3">
                           <i class="mdi mdi-download"></i> Download Lampiran
                        </a>
                        @else
                        <small class="text-muted">Tidak ada lampiran</small>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection