@extends('layouts.app')
<head>
    @include('layouts.base')
    @if($koor->saksi->count() > 0)
    @include('layouts.datatable-css')
    @include('layouts.datatable-js')
    @include('layouts.datatable-btn-js')
    @endif
    <title>Detail Koordinator Saksi - Sistem Informasi Manajemen Saksi Pemilu</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

@section('content')
<div class="d-flex justify-content-center">
    <div class="d-flex flex-container flex-column">
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
        <div class="d-flex justify-content-center">
            <h3 class="m-0 text-center"><strong>Detail Koordinator Saksi</strong></h3>
        </div>
        <hr>
        @if($koor->kelurahan->kecamatan->user->id === Auth::user()->id)
        <div class="d-flex flex-row justify-content-end mb-3">
            <a class="btn btn-success mr-2" href="{{route('koor.edit', $koor->id)}}" title="Edit">
                <i class="mdi mdi-pencil"></i> Edit
            </a>
            <button type="button" class="btn btn-danger" title="Hapus" data-toggle="modal" data-target="#modalHapusKoor">
                <i class="mdi mdi-delete"></i> Hapus
            </button>
            <!-- Modal Hapus-->
            <div class="modal fade" id="modalHapusKoor" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog modal-sm" role="document">
                    <div class="modal-content border-0">
                        <div class="modal-body p-4">
                            <h5 class="font-weight-bold m-0">Hapus koordinator saksi ini?</h5>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Tidak</button>
                            <form action="{{route('koor.destroy', $koor->id)}}" method="POST" class="m-0">
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
        @endif
        <div class="d-flex flex-column flex-sm-row justify-content-between">
            <div class="d-flex flex-column flex-grow-1">
                <div class="card card-radius card-margin p-4">
                    <h5 class="card-title font-weight-bold text-center mb-3">PROFIL KOORDINATOR</h5>
                    <a href="{{ asset("storage/koor/foto_diri/{$koor->foto_diri}") }}" class="mt-2 mb-3">
                        <img class="foto" src="{{ asset("storage/koor/foto_diri/{$koor->foto_diri}") }}" alt="Foto Diri Koordinator">
                    </a>
                    <small class="text-muted mt-2 mb-1">Nama</small>
                    <p class="mb-3"><strong>{{$koor->nama}}</strong></p>
    
                    <small class="text-muted mb-1">Jenis Kelamin</small>
                    <p class="mb-3"><strong>
                        {{$koor->gender === "L" ? "Laki-Laki" : "Perempuan"}}
                    </strong></p>
                    
                    <small class="text-muted mb-1">Alamat Tempat Tinggal</small>
                    <p class="mb-3"><strong>{{$koor->alamat}}</strong></p>
    
                    <small class="text-muted mb-1">Nomor Handphone</small>
                    <p class="mb-3"><strong>{{$koor->no_hp}}</strong></p>
    
                    <small class="text-muted mb-1">Foto KTP</small>
                    <a href="{{ asset("storage/koor/foto_ktp/{$koor->foto_ktp}") }}">
                        <img src="{{ asset("storage/koor/foto_ktp/{$koor->foto_ktp}") }}" alt="Foto Diri Koordinator" width="150px">
                    </a>
                </div>
            </div>
            <div class="d-flex flex-column">
                <div class="card card-radius mb-4 p-4">
                    <h5 class="card-title font-weight-bold text-center mb-3">DAERAH</h5>
                    <small class="text-muted mt-2 mb-1">Kabupaten/Kota</small>
                    <p class="mb-3"><strong>{{$koor->kelurahan->kecamatan->kabupaten->nama}}</strong></p>
                    <small class="text-muted mb-1">Kecamatan</small>
                    <p class="mb-3"><strong>{{$koor->kelurahan->kecamatan->nama}}</strong></p>
                    <small class="text-muted mb-1">Kelurahan</small>
                    <p class="mb-0"><strong>{{$koor->kelurahan->nama}}</strong></p>
                </div>
                @if($koor->kelurahan->kecamatan->user->id === Auth::user()->id)
                <div class="card card-radius mb-4 p-4">
                    <h5 class="card-title font-weight-bold text-center mb-4">AKUN KOORDINATOR</h5>
                    <small class="text-muted mt-2 mb-1">Username</small>
                    <div class="d-flex justify-content-start">
                        <button id="btn-reset-username" class="btn btn-secondary btn-small mb-3" type="button" data-toggle="modal" data-target="#modal-reset">
                            <i class="mdi mdi-account-convert"></i> Reset Username
                        </button>
                    </div>
                    <small class="text-muted mt-2 mb-1">Password</small>
                    <div class="d-flex justify-content-start">
                        <button id="btn-reset-password" class="btn btn-secondary btn-small" type="button" data-toggle="modal" data-target="#modal-reset">
                            <i class="mdi mdi-lock-reset"></i> Reset Password
                        </button>
                    </div>

                    {{-- Modal RESET --}}
                    <div class="modal fade" id="modal-reset" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog modal-sm" role="document">
                            <div class="modal-content border-0">
                                <div class="modal-body p-4">
                                    <h5 id="reset-title" class="font-weight-bold m-0"></h5>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Tidak</button>
                                    <form id="form-reset" action="{{route('user.update', $koor->user->id)}}" method="POST" class="m-0"  enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        
                                        <button id="btn-reset" type="submit" class="btn btn-primary">Reset</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row mt-5">
    <div class="col">
        <h4 class="mt-4"><strong>Daftar Saksinya</strong></h4>
        <hr>
    </div>
</div>
@if($koor->saksi->count() == 0)
<p>Koordinator ini belum memiliki Saksi</p>
@elseif($koor->saksi->count() > 0)
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
            <table id="tabelSaksi" class="align-self-center table table-hover table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Saksi</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Handphone</th>
                        <th>Nomor TPS</th>
                        <th>Partai</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($koor->saksi as $i=>$saksi)
                    <tr>
                        <td>
                            @if($saksi->koor->kelurahan->kecamatan->user->id === Auth::user()->id)
                                <div class="dropdown">
                                    <button class="btn btn-small btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-settings"></i> Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item py-2 text-btn" href="{{route('saksi.show', $saksi->id)}}" title="Lihat Detail">Lihat Detail</a>
                                        <a class="dropdown-item py-2 text-btn" href="{{route('saksi.edit', $saksi->id)}}" title="Edit">Edit</a>
                                        <a href="#" data-url="{{route('saksi.destroy', $saksi->id)}}" class="dropdown-item text-danger text-btn py-2 btn-delete" title="Hapus" data-toggle="modal" data-target="#modalHapusSaksi">
                                            Hapus
                                        </a>
                                    </div>
                                </div>
                            @else
                                <a class="btn btn-secondary btn-small" href="{{route('saksi.show', $saksi->id)}}" title="Lihat Detail">Detail</a>
                            @endif
                        </td>
                        <td>{{$saksi->nama}}</td>
                        <td>{{$saksi->gender}}</td>
                        <td>{{$saksi->alamat}}</td>
                        <td>{{$saksi->no_hp}}</td>
                        <td>{{$saksi->tps}}</td>
                        <td>{{$saksi->partai->nama}}</td>
                        <td>
                            <a href="{{ asset("storage/saksi/foto_diri/{$saksi->foto_diri}") }}" class="mt-2 mb-3">
                                <img style="width:50px;" src="{{ asset("storage/saksi/foto_diri/{$saksi->foto_diri}") }}" alt="Foto Diri Koordinator">
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th><input type="text" placeholder="Nama Saksi" style="width:100%"/></th>
                        <th>
                            <select id="gender-filter">
                                <option value="">Semua</option>
                                <option value="L">L</option>
                                <option value="P">P</option>
                            </select>
                        </th>
                        <th><input type="text" placeholder="Alamat" style="width:100%"/></th>
                        <th><input type="text" placeholder="Handphone" style="width:100%"/></th>
                        <th><input type="text" placeholder="Nomor TPS" style="width:100%"/></th>
                        <th><input type="text" placeholder="Partai" style="width:100%"/></th>
                        <th>Foto</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- Modal Hapus-->
        <div class="modal fade" id="modalHapusSaksi" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog modal-sm" role="document">
                <div class="modal-content border-0">
                    <div class="modal-body p-4">
                        <h5 class="font-weight-bold m-0">Hapus saksi ini?</h5>
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
</div>
<div class="d-flex flex-column">
    <div id="tableInfo" class="d-flex justify-content-center my-2"></div>
    <div id="tablePage" class="d-flex justify-content-center"></div>
</div>
    
<script>
    $(document).ready(function() {
        $('.btn-delete').click(function() {
            var url = $(this).attr('data-url');
            $(".delete-form").attr("action", url);
        });

        $.fn.DataTable.ext.pager.numbers_length = 5;
        var table = $('#tabelSaksi').DataTable({
            deferRender: true,            
            columnDefs: [
                { orderable: false, targets: -1 },
                { orderable: false, targets: -2 },
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
                            title: "Saksi",
                            extend: 'print',
                            exportOptions: {
                                columns: [0,1,2,3,4,5,6]
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
                                columns: [1,2,3,4,5,6]
                            },
                            filename: 'Data Saksi'
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
            table.column(2).search(this.value).draw();
        });

        table.buttons().container()
        .appendTo( '#tableOptionBtn' );
        $('.dataTables_paginate').appendTo('#tablePage');
        $('.dataTables_info').appendTo('#tableInfo');

    });
</script>
@endif
@if($koor->kelurahan->kecamatan->user->id === Auth::user()->id)
<script>
    $(document).ready(function() {
        $("#btn-reset-username").click(function() {
            $("#reset-title").html("Reset username koordinator saksi ini?");
            $('<input name="reset-username" type="hidden">').insertBefore("#btn-reset");
        });
        $("#btn-reset-password").click(function() {
            $("#reset-title").html("Reset password koordinator saksi ini?");
            $('<input name="reset-password" type="hidden">').insertBefore("#btn-reset");
        });
    });
</script>
@endif
@endsection