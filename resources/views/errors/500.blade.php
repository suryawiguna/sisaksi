@extends('layouts.app')
<head>
  @include('layouts.base')
  <title>Sistem Informasi Manajemen Saksi Pemilu</title>
</head>
@section('content')
<div class="alert alert-info fade show mb-4 px-3 py-2" role="alert">
    Ups, ada kesalahan.
</div>
<script>setTimeout(function() {window.history.back();}, 3000);</script>
@endsection