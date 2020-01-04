@extends('layouts.app')
<head>
    @include('layouts.base')
    @include('layouts.datatable-css')
    @include('layouts.datatable-js')
    @include('layouts.datatable-btn-js')
    <title>Koordinator Saksi - Sistem Informasi Manajemen Saksi Pemilu</title>
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
        <h3 class="text-center"><strong>Koordinator Saksi</strong></h3>
        <hr>
    </div>
</div>

<div class="d-flex flex-column flex-sm-row justify-content-between align-content-center">
    <form id="global-search-form" class="d-flex align-items-center flex-fill p-0 mb-2">
        <i class="mdi mdi-magnify mdi-24px pr-1"></i>
        <input id="globalSearch" class="form-control m-0" type="text" placeholder="Cari" maxlength="100">
    </form>
    <div id="tableOptionBtn" class="ml-2"></div>
</div>

<div class="row">
    <div class="col">
        <div class="table-responsive">
            <table id="tabelKoor" class="align-self-center table table-hover table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kabupaten/Kota</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Handphone</th>
                        <th>Jumlah Saksi</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>#</th>
                        <th><input type="text" placeholder="Kabupaten/Kota" style="width:100%"/></th>
                        <th><input type="text" placeholder="Kecamatan" style="width:100%"/></th>
                        <th><input type="text" placeholder="Kelurahan" style="width:100%"/></th>
                        <th><input type="text" placeholder="Nama" style="width:100%"/></th>
                        <th>
                            <select id="gender-filter">
                                <option value="">Semua</option>
                                <option value="L">L</option>
                                <option value="P">P</option>
                            </select>
                        </th>
                        <th><input type="text" placeholder="Alamat" style="width:100%"/></th>
                        <th><input type="text" placeholder="Handphone" style="width:100%"/></th>
                        <th><input type="text" placeholder="Jumlah Saksi" style="width:100%"/></th>
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
        var table = $('#tabelKoor').DataTable({
            processing: true,
            ajax: '{{route("koor.index")}}',
            columns: [
                { "data": "id" },
                { "data": "kelurahan.kecamatan.kabupaten.nama" },
                { "data": "kelurahan.kecamatan.nama" },
                { "data": "kelurahan.nama" },
                { "data": "nama" },
                { "data": "gender" },
                { "data": "alamat" },
                { "data": "no_hp" },
                { "data": "saksi_count" },
            ],
            columnDefs: [
                { orderable: false, targets: 0 },
                {
                    "targets": -2,
                    "data": "saksi_count",
                    "render": function ( data, type, row, meta ) {
                        if(data == null) {return '0';}
                        else {return data;}
                    }
                },
                {
                    "targets": 0,
                    "data": "id",
                    "render": function ( data, type, row, meta ) {
                        return '<a href="koor/'+data+'" class="btn btn-small btn-secondary" title="Lihat Detail">Detail</a>';
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
                    extend: 'collection',
                    text: "<i class='mdi mdi-printer'></i> Cetak",
                    buttons: [
                        {
                            text: "PDF",
                            title: "Koordinator Saksi",
                            extend: 'print',
                            exportOptions: {
                                columns: ':visible'
                            },
                            customize: function(win) {
                                $(win.document.body).find( 'tr' ).each( function(index) {
                                    $(this).find('td:first').html(index);
                                });
                                $(win.document.body).find('h1')
                                                    .css('text-align', 'center')
                                                    .css('margin-bottom', '15px')
                                                    .css('font-size', '20px')
                                                    .css('font-weight', 'bold');
                                $(win.document.body).find( 'table' )
                                .addClass('table-sm')
                                .removeClass('table')
                                .css('width', '100%')
                                .css( 'font-size', '12px' );
                            }
                            
                        },
                        {
                            extend : 'excel',
                            exportOptions: {
                                columns: 'th:not(:first-child)'
                            },
                            filename: 'Data Koordinator Saksi'
                        }
                    ]
                },
                {
                    text: "<i class='mdi mdi-eye'></i> Kolom",
                    extend: 'colvis',
                },
            ],
        });

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
        $('#gender-filter').on('change', function(){
            table.column(5).search(this.value).draw();
        });

        table.buttons().container()
        .appendTo( '#tableOptionBtn' );
        $('.dataTables_paginate').appendTo('#tablePage');
        $('.dataTables_info').appendTo('#tableInfo');

        $("#global-search-form").submit(function(e){
            e.preventDefault();
        });
    });
</script>
@endsection