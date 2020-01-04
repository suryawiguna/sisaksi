@extends('layouts.app')
<head>
    @include('layouts.base')
    @include('layouts.datatable-css')
    @include('layouts.datatable-js')
    @include('layouts.datatable-btn-js')
    <title>Pengguna - Sistem Informasi Manajemen Saksi Pemilu</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

@section('content')
<div class="row">
    <div class="col-12">
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
        <h3 class="text-center"><strong>Pengguna</strong></h3>
    </div>
</div>

<div class="row">
    <div class="col-md-1"></div>
    <div class="col">
        <hr>
        <div class="d-flex flex-column flex-sm-row justify-content-between align-content-center">
            <form id="global-search-form" class="d-flex align-items-center flex-fill p-0 mb-2">
                <i class="mdi mdi-magnify mdi-24px pr-1"></i>
                <input id="globalSearch" class="form-control m-0" type="text" placeholder="Cari" maxlength="100">
            </form>
            <div id="role-filter-div" class="ml-2">
                <select id="role-filter" class="p-2">
                    <option value="">Semua</option>
                    <option value="Pimpinan">Pimpinan</option>
                    <option value="Komisi Saksi">Komisi Saksi</option>
                    <option value="Koordinator Saksi">Koordinator Saksi</option>
                    <option value="Saksi">Saksi</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>

<div class="row">
    <div class="col-md-1"></div>
    <div class="col">
        <div class="table-responsive">
            <table id="tabel-user" class="align-self-center table table-hover table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Role</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>
<div class="d-flex flex-column">
    <div id="tableInfo" class="d-flex justify-content-center my-2"></div>
    <div id="tablePage" class="d-flex justify-content-center"></div>
</div>


<script>
    $(document).ready(function() {
        $.fn.DataTable.ext.pager.numbers_length = 5;
        var table = $('#tabel-user').DataTable({
            processing: true,
            ajax: '{{route("user.index")}}',
            columns: [
                { "data": "id" },
                { "data": "username" },
                { "data": "role" },
            ],
            columnDefs: [
                { orderable: false, targets: 0 },
                {
                    "targets": -1,
                    "data": "role",
                    "render": function ( data, type, row, meta ) {
                        return '<small class="badge badge-pill py-1 px-2 role'+data.id+'">'+data.name+'</small>';
                    }
                },
                {
                    "targets": 0,
                    "data": "id",
                    "render": function ( data, type, row, meta ) {
                        return '<a href="user/'+data+'" class="btn btn-small btn-secondary" title="Lihat Detail">Detail</a>';
                    }
                },
            ],
            order: [],
            autoWidth: true,
            language: {
                "info": "_START_-_END_ dari _TOTAL_ data",
                "infoEmpty":  "Tidak Ada Data",
                "emptyTable": "Tidak ada data yang tersedia",
                "lengthMenu": "Tampilkan _MENU_ data",
                "thousands":      ".",
                'loadingRecords': '&nbsp;',
                "processing": "<div class='spinner'></div>",
                "search":     "Cari:",
                "zeroRecords":"Tidak ada data",
                "infoFiltered":   "(disaring dari total _MAX_ data)",
                "paginate": {
                    "next":       "<i class='mdi mdi-chevron-right'></i>",
                    "previous":   "<i class='mdi mdi-chevron-left'></i>"
                },
            },
            pagingType: "simple_numbers",
            pageLength: 10,
            lengthChange: false,
            dom: 'rt<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        });

        // TABLE SEARCH (GLOBAL)
        $('#globalSearch').on( 'keyup', function () {
            table.search( this.value ).draw();
        });

        $('.dataTables_paginate').appendTo('#tablePage');
        $('.dataTables_info').appendTo('#tableInfo');

        $('#role-filter').on('change', function(){
            table.column(2).search(this.value && `^${this.value}$`, true, false).draw();
            table.ajax.reload();
        });
        $("#global-search-form").submit(function(e){
            e.preventDefault();
        });

    });
</script>
@endsection