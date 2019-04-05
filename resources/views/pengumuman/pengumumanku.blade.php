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
            <div id="status-filter-div" class="ml-2">
                <select id="status-filter" class="p-2">
                    <option value="">Semua</option>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
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
        <!-- Modal Hapus-->
        <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog modal-sm" role="document">
                <div class="modal-content border-0">
                    <div class="modal-body p-4">
                        <h5 class="font-weight-bold m-0">Hapus pengumuman ini?</h5>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Tidak</button>
                        <form action="" method="POST" class="m-0 delete-form">
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
            ajax: '{{route("pengumumanku")}}',
            columns: [
                { "data": "judul" },
                { "data": "isi" },
                { "data": "created_at" },
                { "data": "lampiran" },
                { "data": null },
            ],
            columnDefs: [
                {
                    targets: 0,
                    render: $.fn.dataTable.render.ellipsis(50)
                },
                {
                    "targets": 1,
                    "data": "status",
                    "render": $.fn.dataTable.render.ellipsis(50)
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
                    "data": null,
                    "render": function ( data, type, row, meta ) {
                        if ( type === 'display') {
                            var checked = (data.status == 1) ? 'checked' : '';
                            return '<label class="switch" title="Aktif/Tidak Aktif">'+
                                        '<input type="checkbox" data-url="'+data.id+'" class="active-switch"'+checked+'>'+
                                        '<span class="slider"></span>'+
                                    '</label>'+
                                    '<div class="dropdown">'+
                                        '<button class="btn btn-small btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                                            '<i class="mdi mdi-settings"></i> Action'+
                                        '</button>'+
                                        '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">'+
                                            '<a class="dropdown-item py-2 text-btn" href="pengumuman/'+data.id+'" title="Lihat Detail">Lihat Detail</a>'+
                                            '<a class="dropdown-item py-2 text-btn" href="pengumuman/'+data.id+'/edit" title="Edit">Edit</a>'+
                                            '<a href="#" data-url="pengumuman/'+data.id+'" class="dropdown-item text-danger text-btn py-2 btn-delete" title="Hapus" data-toggle="modal" data-target="#modalHapus">'+
                                                'Hapus'+
                                            '</a>'+
                                        '</div>'+
                                    '</div>';
                        }
                        return data.status;
                    },
                },
                
                {  className: "judul font-weight-bold pt-0 pb-2 px-0", targets: 0 },
                {  className: "pt-0 pb-2 px-0", targets: 1 },
                {  className: "date pt-0 pb-2 px-0 text-muted", targets: 2 },
                {  className: "px-0 py-0", targets: 3 },
                {  className: "d-flex flex-grow-1 align-items-end justify-content-between p-0 mt-2", targets: 4 }
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
        $('#status-filter').on('change', function(){
            table.column(4).search(this.value, true, false).draw();
            table.ajax.reload();
        });
        $(document).on('click', '.btn-delete', function () {
            var url = $(this).attr("data-url");
            $(".delete-form").attr("action", url);
        });
        $(document).on('click', '.active-switch', function () {
            var id = $(this).attr('data-url');
            if (this.checked) {
                var boolean = 1;
                $.ajax({
                    type: "GET",
                    url: '/statuspengumuman/'+id+'/'+boolean,
                    dataType: "json"
                });
            }
            else {
                var boolean = 0;
                $.ajax({
                    type: "GET",
                    url: '/statuspengumuman/'+id+'/'+boolean,
                    dataType: "json"
                });
            }
        }) 
    });
</script>
@endsection