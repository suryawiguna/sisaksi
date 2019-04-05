@extends('layouts.app')
<head>
@include('layouts.base')
<title>Sistem Informasi Manajemen Saksi Pemilu</title>
</head>
@section('content')
<div class="alert alert-info fade show mb-4 px-3 py-2" role="alert">
    {{ $exception->getMessage() }}
</div>
@endsection