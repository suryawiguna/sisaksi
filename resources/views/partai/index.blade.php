@extends('layouts.app')
<head>
    @include('layouts.base')
    @include('layouts.datatable-css')
    @include('layouts.datatable-js')
    @include('layouts.datatable-btn-js')
    <title>Partai - Sistem Informasi Manajemen Saksi Pemilu</title>
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
        <h3 class="text-center"><strong>Partai</strong></h3>
    </div>
    <div class="col-md-1"></div>
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
        </div>
    </div>
    <div class="col-md-1"></div>
</div>

<div class="row">
    <div class="col-md-1"></div>
    <div class="col">
        <div class="table-responsive">
            <table id="tabel-partai" class="align-self-center table table-hover table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Partai</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nama Partai</th>
                        <th>Deskripsi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- Modal Hapus-->
        <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog modal-sm" role="document">
                <div class="modal-content border-0">
                    <div class="modal-body p-4">
                        <h5 class="font-weight-bold m-0">Hapus partai ini?</h5>
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
        var table = $('#tabel-partai').DataTable({
            processing: true,
            ajax: '{{route("partai.index")}}',
            columns: [
                { "data": "id" },
                { "data": "nama" },
                { "data": "deskripsi" },
            ],
            columnDefs: [
                { orderable: false, targets: 0 },
                {
                    "targets": 0,
                    "data": "id",
                    "render": function ( data, type, row, meta ) {
                        return '<div class="dropdown">'+
                                '<button class="btn btn-small btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                                    '<i class="mdi mdi-settings"></i> Action'+
                                '</button>'+
                                '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">'+
                                    '<a class="dropdown-item py-2 text-btn" href="partai/'+data+'/edit" title="Edit">Edit</a>'+
                                    '<a href="#" data-url="partai/'+data+'" class="dropdown-item text-danger text-btn py-2 btn-delete" title="Hapus" data-toggle="modal" data-target="#modalHapus">'+
                                        'Hapus'+
                                    '</a>'+
                                '</div>'+
                            '</div>';
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

        $("#global-search-form").submit(function(e){
            e.preventDefault();
        });
        $(document).on('click', '.btn-delete', function () {
            var url = $(this).attr("data-url");
            $(".delete-form").attr("action", url);
        });

    });
</script>
@endsection