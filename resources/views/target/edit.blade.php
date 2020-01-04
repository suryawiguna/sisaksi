@extends('layouts.app')
<head>
    @include('layouts.base')  
    <title>Edit Target - Sistem Informasi Manajemen Saksi Pemilu</title>
</head>

@section('content')
<div class="row">
    <div class="col-lg col-md"></div>
    <div class="col-lg-7 col-md-8">
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
        <form method="POST" action="{{route('target.update', $target->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h3 class="text-center"><strong>Edit Target</strong></h3>
        
            <div class="form-group">
                <label class="text-muted mt-3">Nama Kabupaten</label>
                <h5>{{$target->kabupaten->nama}}</h5>
            </div>
        
            <div class="form-group">
                <label class="text-muted mt-3" for="target_koor">Target Koordinator Saksi</label>
                <input type="number" name="target_koor" class="form-control" id="target_koor" value="{{$target->target_koor}}" max="9999" required>                
            </div>

            <div class="form-group">
                <label class="text-muted mt-3" for="target_saksi">Target Saksi</label>
                <input type="number" name="target_saksi" class="form-control" id="target_saksi" value="{{$target->target_saksi}}" max="9999" required>                
            </div>

            <div class="row">
                <div class="col"></div>
                <div class="col-lg-4 col-md-4 col-sm-8 mt-3">
                    <button type="submit" class="btn btn-success btn-lg btn-block mt-4 font-weight-bold">SIMPAN</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg col-md"></div>
</div>
@endsection