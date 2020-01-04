@extends('layouts.app')
<head>
    @include('layouts.base')
    @include('layouts.datatable-css')
    @include('layouts.datatable-js')
    @include('layouts.datatable-btn-js')
    <title>Pengumuman - Sistem Informasi Manajemen Saksi Pemilu</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col">        
        <h3 class="text-center"><strong>Pengumuman</strong></h3>
    </div>
    <div class="col-md-1"></div>
</div>

<div class="row">
    <div class="col-md-1"></div>
    <div class="col">
        <hr>
        <div class="d-flex flex-column flex-sm-row justify-content-between align-content-center">
            <form id="global-search-form" class="d-flex flex-fill align-items-center p-0 mb-2">
                <i class="mdi mdi-magnify mdi-24px pr-1"></i>
                <input id="globalSearch" class="form-control m-0" type="text" placeholder="Cari" maxlength="100">
            </form>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>

<div class="row">
    <div class="col-md-1"></div>
    <div class="col">
        <div class="table-responsive">
            <table id="tabel-pengumuman" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Tanggal</th>
                        <th>Lampiran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
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
        var table = $('#tabel-pengumuman').DataTable({
            processing: true,
            ajax: '{{route("pengumuman.index")}}',
            columns: [
                { "data": "judul" },
                { "data": "isi" },
                { "data": "created_at" },
                { "data": "lampiran" },
                { "data": "id" },
            ],
            columnDefs: [
                {
                    targets: 0,
                    render: $.fn.dataTable.render.ellipsis(50)
                },
                {
                    targets: 1,
                    render: $.fn.dataTable.render.ellipsis(50)
                },
                {
                    "targets": 2,
                    "data": "created_at",
                    "render": function ( data, type, row, meta ) {
                        var date = new Date(data);
                        var options = { year: 'numeric', month: 'long', day: 'numeric' };
                        return date.toLocaleDateString('id', options);
                    }
                },
                {
                    "targets": 3,
                    "data": "lampiran",
                    "render": function ( data, type, row, meta ) {
                        if(data != null) {
                            return '<i class="mdi mdi-attachment" title="Ada Lampiran"></i>';
                        }
                        else {
                            return data;
                        }
                    }
                },
                {
                    "targets": 4,
                    "data": "id",
                    "render": function ( data, type, row, meta ) {
                        return '<a href="pengumuman/'+data+'" class="btn btn-small btn-secondary" title="Lihat Detail">Detail</a>';
                    }
                },
                
                {  className: "judul font-weight-bold pt-0 pb-2 px-0", targets: 0 },
                {  className: "pt-0 pb-2 px-0", targets: 1 },
                {  className: "date pt-0 pb-2 px-0 text-muted", targets: 2 },
                {  className: "px-0 py-0", targets: 3 },
                {  className: "d-flex flex-grow-1 align-items-end justify-content-end p-0 mt-2", targets: 4 }
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
            pageLength: 8,
            lengthChange: false,
            dom: 'rt<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            createdRow: function ( row, data, index ) {
                $(row).addClass('card card-radius p-3 mb-3 d-flex flex-column')
            },
        });

        // TABLE SEARCH (GLOBAL)
        $('#globalSearch').on( 'keyup', function () {
            table.search( this.value ).draw();
        });
        $( table.table().body() )
            .addClass( 'd-flex flex-column flex-sm-row flex-wrap justify-content-between p-1' );

        $('.dataTables_paginate').appendTo('#tablePage');
        $('.dataTables_info').appendTo('#tableInfo');
        $("#global-search-form").submit(function(e){
            e.preventDefault();
        });
        $(document).on('click', '.btn-delete', function () {
            var url = $(this).attr("data-url");
            $(".delete-form").attr("action", url);
        });
        $('.active-switch').click(function(){
            if (this.checked) {
                alert('aktif');
            }
            else {
                alert('tidak aktif');
            }
        }) 
    });
</script>
@endsection