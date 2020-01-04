@extends('layouts.app')
<head>
    @include('layouts.base')  
    <title>Edit Pengumuman - Sistem Informasi Manajemen Saksi Pemilu</title>
</head>

@section('content')
<div class="row">
    <div class="col-lg"></div>
    <div class="col-lg-9">
        @if (\Session::has('status'))
            <div class="alert alert-success fade show mb-4 px-3 py-2" role="alert">
                {{ \Session::get('status') }}
                <div class="d-flex justify-content-end mt-2">
                    <a class="btn btn-small btn-light" href="{{route("pengumuman.show",$pengumuman->id)}}">Lihat Pengumuman</a>
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger fade show mb-4 px-3 py-2" role="alert">
                {{ $errors->first() }}
            </div>
        @endif
        <!-- KOORDINATOR SAKSI -->
        <form method="POST" action="{{route('pengumuman.update', $pengumuman->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h3 class="text-center"><strong>Edit Pengumuman</strong></h3>
        
            <div class="form-group">
                <label class="text-muted mt-3" for="judul">Judul Pengumuman</label>
                <input type="text" name="judul" class="form-control" id="judul" value="{{$pengumuman->judul}}" required>
            </div>
        
            <div class="form-group">
                <label class="text-muted mt-3" for="isi">Isi Pengumuman</label>
                <textarea class="form-control" id="isi" name="isi" rows="6" maxlength="500" required>{{$pengumuman->isi}}</textarea>
            </div>
        
            <label class="text-muted mt-3" for="lampiran">Lampiran</label><br>
            <div class="custom-file my-1">
                <input id="lampiran" type="file" class="custom-file-input" name="lampiran" accept="*">
                <label class="custom-file-label" for="lampiran">Pilih file lampiran</label>
            </div>
            @if($pengumuman->lampiran)
            <div class="d-flex flex-sm-row flex-column">
                <a href="{{ asset("storage/pengumuman/lampiran/{$pengumuman->lampiran}") }}" class="btn btn-small btn-secondary m-1" title="{{$pengumuman->lampiran}}">
                    Lihat Lampiran
                </a>
                <a id="hapus-lampiran" href="#" class="btn btn-small btn-danger m-1" title="Hapus Lampiran" data-toggle="modal" data-target="#modal-hapus-lampiran">
                    Hapus Lampiran
                </a>
            </div>
            @else
            <small class="text-muted">Pengumuman ini tidak memiliki lampiran</small>
            @endif

            
            <!-- Modal Hapus Lampiran-->
            <div class="modal fade" id="modal-hapus-lampiran" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog modal-sm" role="document">
                    <div class="modal-content border-0">
                        <div class="modal-body p-4">
                            <h5 class="font-weight-bold m-0">Hapus lampiran di pengumuman ini?</h5>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group mt-5 mb-0">
                <div class="d-flex align-items-center">
                    <small class="m-0 text-muted">Hide</small>
                    <label class="switch my-0 mx-2" title="Aktif/Tidak Aktif">
                        <input type="checkbox" class="active-switch" name="status" {{ ( $pengumuman->status == 1 ) ? 'checked' : '' }}>
                        <span class="slider"></span>
                    </label>
                    <small class="m-0 text-muted">Show</small>
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
    $("#hapus-lampiran").on('click', function () {
        $("form").append('<input name="hapus-lampiran" type="hidden" value="">');
    });
</script>
@endsection