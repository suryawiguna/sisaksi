@extends('layouts.app')
<head>
    @include('layouts.base')
    @if(Auth::id() === $user->id && $user->koor->saksi->count() > 0)
    @include('layouts.datatable-css')
    @include('layouts.datatable-js')
    @include('layouts.datatable-btn-js')
    @endif
    <title>
        {{ Auth::id() == $user->id ? "Akun Saya" : "Detail Akun"}} 
         - Sistem Informasi Manajemen Saksi Pemilu
    </title>
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
            <h3 class="mb-4 text-center"><strong>
                {{ Auth::id() == $user->id ? "Akun Saya" : "Detail Akun"}}
            </strong></h3>
        </div>
        <div class="d-flex flex-column flex-sm-row">
            <div class="d-flex flex-column flex-fill">
                <div class="card card-radius card-margin p-4">
                    <h5 class="card-title font-weight-bold text-center mb-3">PROFIL</h5>

                    <a href="{{ asset("storage/koor/foto_diri/{$user->koor->foto_diri}") }}" class="mt-2 mb-3">
                        <img class="foto" src="{{ asset("storage/koor/foto_diri/{$user->koor->foto_diri}") }}" alt="Foto Diri Koordinator">
                    </a>

                    <small class="text-muted mt-2 mb-1">Nama</small>
                    <p class="mb-3"><strong>{{$user->koor->nama}}</strong></p>

                    @if(Auth::user()->id == $user->id)
                    <small class="text-muted mt-2 mb-1">Jenis Kelamin</small>
                    <p class="mb-3"><strong>
                        {{$user->koor->gender === "L" ? "Laki-Laki" : "Perempuan"}}
                    </strong></p>
                    @endif

                    <small class="text-muted mt-2 mb-1">Alamat Tempat Tinggal</small>
                    <p class="mb-3"><strong>{{$user->koor->alamat}}</strong></p>

                    <small class="text-muted mt-2 mb-1">Nomor Handphone</small>
                    <p class="mb-3"><strong>{{$user->koor->no_hp}}</strong></p>

                    @if(Auth::user()->id == $user->id)
                    <small class="text-muted mb-1">Foto KTP</small>
                    <a href="{{ asset("storage/koor/foto_ktp/{$user->koor->foto_ktp}") }}">
                        <img src="{{ asset("storage/koor/foto_ktp/{$user->koor->foto_ktp}") }}" alt="Foto Diri Koordinator" width="150px">
                    </a>
                    
                    <a href="{{route('editprofil')}}" class="btn btn-success mt-3 align-self-end">Edit Profil</a>
                    @else
                    <a href="{{route('koor.show', $user->koor->id)}}" class="btn btn-secondary mt-2 align-self-end">Detail</a>
                    @endif

                </div>
            </div>
            <div class="d-flex flex-column flex-fill">
                <div class="card card-radius mb-4 p-4">
                    <h5 class="card-title font-weight-bold text-center mb-3">DAERAH</h5>
                    <small class="text-muted mt-2 mb-1">Kabupaten/Kota</small>
                    <p class="mb-3"><strong>{{$user->koor->kelurahan->kecamatan->kabupaten->nama}}</strong></p>
                    <small class="text-muted mb-1">Kecamatan</small>
                    <p class="mb-3"><strong>{{$user->koor->kelurahan->kecamatan->nama}}</strong></p>
                    <small class="text-muted mb-1">Kelurahan</small>
                    <p class="mb-0"><strong>{{$user->koor->kelurahan->nama}}</strong></p>
                </div>
                <div class="card card-radius mb-3 p-4">
                    <h5 class="card-title font-weight-bold text-center mb-3">INFORMASI AKUN</h5>

                    <small class="text-muted mt-2 mb-1">Tipe Akun</small>
                    <div class="d-flex justify-content-start">
                        <p class="badge badge-pill role3 py-1 px-2 mb-3">{{$user->role->name}}</p>
                    </div>

                    <small class="text-muted mt-2 mb-1">Username</small>
                    <p class="mb-1"><strong>{{$user->username}}</strong></p>
                    @if(Auth::id() == $user->id)
                    <div class="d-flex justify-content-start mb-3">
                        <button class="btn btn-secondary btn-small" type="button" data-toggle="modal" data-target="#modal-username">
                            <i class="mdi mdi-account"></i> Ubah Username
                        </button>
                    </div>

                    <small class="text-muted mt-2 mb-1">Password</small>
                    <div class="d-flex justify-content-start">
                        <button class="btn btn-secondary btn-small" type="button" data-toggle="modal" data-target="#modal-password">
                            <i class="mdi mdi-key"></i> Ubah Password
                        </button>
                    </div>

                    {{-- MODAL USERNAME --}}
                    <div class="modal fade" id="modal-username" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog modal-sm" role="document">
                            <div class="modal-content border-0">
                                <div class="modal-header px-4 d-flex align-items-stretch">
                                    <h5 class="card-title m-0">Ubah Username Saya</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                </div>
                                <div class="modal-body p-4">
                                    <form action="{{route('user.update', $user->id)}}" method="POST" class="m-0" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        
                                        <div class="form-group m-0">
                                            <label class="text-muted" for="alamat">Username Baru</label>
                                            <input type="text" name="username" class="form-control" id="username" required>
                                        </div>

                                        <div class="form-group mt-4 mb-0">
                                            <button id="btn-ubah-username" type="submit" class="btn btn-block btn-lg btn-success">Ubah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- MODAL PASSWORD --}}
                    <div class="modal fade" id="modal-password" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog modal-sm" role="document">
                            <div class="modal-content border-0">
                                <div class="modal-header px-4 d-flex align-items-stretch">
                                    <h5 class="card-title m-0">Ubah Password Saya</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                </div>
                                <div class="modal-body p-4">
                                    <form action="{{route('user.update', $user->id)}}" method="POST" class="m-0" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        
                                        <div class="form-group m-0">
                                            <label class="text-muted" for="alamat">Password Lama</label>
                                            <input type="password" name="password-lama" class="form-control" id="password-lama" required>
                                            <small id="alert-password" class="text-danger">Password lama tidak benar</small>
                                        </div>

                                        <div class="form-group m-0">
                                            <label class="text-muted mt-4" for="alamat">Password Baru</label>
                                            <input type="password" name="password" class="form-control" id="password" required>
                                            <small id="alert-password2" class="text-danger">Password minimal 8 karakter</small>
                                        </div>

                                        <div class="form-group m-0">
                                            <label class="text-muted mt-4" for="alamat">Ulangi Password Baru</label>
                                            <input type="password" name="password-baru" class="form-control" id="password-baru" required>
                                            <small id="alert-password3" class="text-danger">Password tidak sama</small>
                                        </div>

                                        <div class="form-group mt-4 mb-0">
                                            <button id="btn-ubah" type="submit" class="btn btn-block btn-lg btn-success">Ubah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@if(Auth::id() === $user->id)
    <div class="row mt-5">
        <div class="col">
            <h4 class="mt-4"><strong>Daftar Saksi Saya</strong></h4>
            <hr>
        </div>
    </div>
    @if($user->koor->saksi->count() == 0)
    <p>Koordinator ini belum memiliki Saksi</p>
    @elseif($user->koor->saksi->count() > 0)
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
                            <th>Foto Diri</th>
                            <th>Foto KTP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user->koor->saksi as $i=>$saksi)
                        <tr>
                            <td>{{$i+1}}</td>
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
                            <td>
                                <a href="{{ asset("storage/saksi/foto_ktp/{$saksi->foto_ktp}") }}" class="mt-2 mb-3">
                                    <img style="width:50px;" src="{{ asset("storage/saksi/foto_ktp/{$saksi->foto_ktp}") }}" alt="Foto Diri Koordinator">
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
                            <th>Foto Diri</th>
                            <th>Foto KTP</th>
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
            var table = $('#tabelSaksi').DataTable({
                processing: true,
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
@endif

<script type="text/javascript">
    
    $(document).on('keydown', ['password'], function(e) {
        if (e.keyCode == 32) return false;
    });
    $(document).ready(function() {
        (function($) {
        $.fn.donetyping = function(callback){
            var _this = $(this);
            var x_timer;    
            _this.keyup(function (){
                clearTimeout(x_timer);
                x_timer = setTimeout(clear_timer, 1000);
            }); 

            function clear_timer(){
                clearTimeout(x_timer);
                callback.call(_this);
            }
        }
        })(jQuery);
        $("#alert-password, #alert-password3, #alert-password2").hide();
        $('#btn-ubah, #password, #password-baru').prop('disabled', true);
        $("#password-lama").donetyping(function(callback) {
            var oldPassword = $(this).val();

            if(oldPassword.length > 0) {
                $.ajax({
                    type: "GET",
                    url: '/checkpassword/'+oldPassword,
                    dataType: "json",
                    success: function(response) {
                        if(response === true) {
                            $("#alert-password").hide();
                            $("#password").prop('disabled', false);
                        }
                        else {
                            $("#alert-password").show();
                            $("#password").prop('disabled', true);
                        }
                    }
                });
            }
        });
        $("#password").donetyping(function(callback) {
            var value = $(this).val();
            if(value.length < 8) {
                $("#alert-password2").show();
                $("#password-baru").prop('disabled', true);
            }
            else {
                $("#alert-password2").hide();
                $("#password-baru").prop('disabled', false);
            }
        });
        $("#password-baru").donetyping(function(callback) {
            if ($(this).val() != $("#password").val()) {
                $("#alert-password3").show();
                $('#btn-ubah').prop('disabled', true);
            }
            else if ($(this).val() == $("#password").val()) {
                $("#alert-password3").hide();
                $('#btn-ubah').prop('disabled', false);
            }
        });
    });
</script>
@endsection