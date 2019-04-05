@extends('layouts.app')
<head>
    @include('layouts.base')
    @include('layouts.datatable-css')
    @include('layouts.datatable-js')
    @include('layouts.datatable-btn-js')
    <title>Foto Formulir C1 - Sistem Informasi Manajemen Saksi Pemilu</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .dt-buttons.btn-group > button:first-child {
            border-top-right-radius: 25px !important;
            border-bottom-right-radius: 25px !important;
        }
    </style>
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
        <h3 class="text-center"><strong>Foto Formulir C1</strong></h3>
        <hr>
    </div>
</div>

<div class="d-flex flex-column flex-md-row justify-content-between align-content-center">
    <form id="global-search-form" class="d-flex align-items-center flex-fill p-0 mb-2">
        <i class="mdi mdi-magnify mdi-24px pr-1"></i>
        <input id="globalSearch" class="form-control m-0" type="text" placeholder="Cari..." maxlength="100">
    </form>
    <div id="tableOptionBtn" class="ml-2"></div>
</div>
    
<div class="row">
    <div class="col">
        <div class="table-responsive">
            <table id="tabelC1" class="align-self-center table table-hover table-responsive table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kabupaten/Kota</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nomor TPS</th>
                        <th>Nama Saksi</th>
                        <th>Foto C1</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th><input type="text" placeholder="Kabupaten/Kota" style="width:100%"/></th>
                        <th><input type="text" placeholder="Kecamatan" style="width:100%"/></th>
                        <th><input type="text" placeholder="Kelurahan" style="width:100%"/></th>
                        <th><input type="text" placeholder="Nomor TPS" style="width:100%"/></th>
                        <th><input type="text" placeholder="Nama Saksi" style="width:100%"/></th>
                        <th>Foto C1</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<div class="d-flex flex-column">
    <div id="tableInfo" class="d-flex justify-content-center my-2"></div>
    <div id="tablePage" class="d-flex justify-content-center"></div>
</div>


<script>
    $(document).ready(function() {
        $.fn.DataTable.ext.pager.numbers_length = 5;
        var table = $('#tabelC1').DataTable({
            processing: true,
            ajax: '{{route("c1.index")}}',
            columns: [
                { "data": null },
                { "data": "saksi.koor.kelurahan.kecamatan.kabupaten.nama" },
                { "data": "saksi.koor.kelurahan.kecamatan.nama" },
                { "data": "saksi.koor.kelurahan.nama" },
                { "data": "saksi.tps" },
                { "data": "saksi" },
                { "data": "foto_c1" },
            ],
            columnDefs: [
                { orderable: false, targets: [0,-1] },
                {
                    "targets": -2,
                    "data": "saksi",
                    "render": function ( data, type, row, meta ) {
                    return '<a href="saksi/'+data.id+'" class="table-link">'+data.nama+'</a>';
                    }
                },
                {
                    "targets": -1,
                    "data": "foto_c1",
                    "render": function ( data, type, row, meta ) {
                    return '<a href="storage/c1/'+data+'">'+
                                '<img src="storage/c1/'+data+'" alt="Foto C1" height="100px">'+
                            '</a>';
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
            dom: 'Brt<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            buttons: [ 
                {
                    text: "<i class='mdi mdi-eye'></i> Kolom",
                    extend: 'colvis',
                },
            ],
        });

        table.on( 'order.dt search.dt', function () {
            table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();

        // TABLE SEARCH (GLOBAL)
        $('#globalSearch').on( 'keyup', function () {
            table.search( this.value ).draw();
        });

        // COLUMN SEARCH
        table.columns().every( function () {
            var that = this;
            $( 'input', this.footer() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that.search( this.value ).draw();
                }
            });
        });

        table.buttons().container()
        .appendTo( '#tableOptionBtn' );
        $('.dataTables_paginate').appendTo('#tablePage');
        $('.dataTables_info').appendTo('#tableInfo');
    });
</script>
@endsection