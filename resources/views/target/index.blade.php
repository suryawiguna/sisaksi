@extends('layouts.app')
<head>
  <title>Target - Sistem Informasi Manajemen Saksi Pemilu</title>
  @include('layouts.base')
  @include('layouts.datatable-css')
  @include('layouts.datatable-js')
  @include('layouts.datatable-fixedcolumn')
  <script src="{{ asset('js/Chart.bundle.min.js') }}"></script>
</head>

@section('content')
    <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center mb-4">
        <div class="card card-percentage card-percent-koor">
            <div class="card-header text-center p-0">
                Koordinator
            </div>
            <div class="card-body text-center p-0">
                {{$target[0]['persenKoor']}}%
            </div>
            <div class="card-footer text-center p-0">
                {{$target[0]['jumKoor']}} / {{$target[0]['targetKoor']}}
            </div>
        </div>
        <div class="card card-percentage card-percent-saksi">
            <div class="card-header text-center p-0">
                Saksi
            </div>
            <div class="card-body text-center p-0">
                {{$target[0]['persenSaksi']}}%
            </div>
            <div class="card-footer text-center p-0">
                {{$target[0]['jumSaksi']}} / {{$target[0]['targetSaksi']}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg"></div>
        <div class="col-lg-9 mb-4">
        <canvas id="myChart"></canvas>
        </div>
        <div class="col-lg"></div>
    </div>

    <div class="row">
        <div class="col-lg"></div>
        <div class="col-lg-10 mt-4">
            <table id="tabelTarget" class="align-self-center table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                    @if(Auth::user()->is(1))
                    <th rowspan="2">#</th>
                    @endif
                    <th rowspan="2">Kab/Kota</th>
                    <th colspan="3">Koordinator</th>
                    <th colspan="3">Saksi</th>
                    
                    </tr>
                    <tr>
                    <th>Jumlah</th>
                    <th>Target</th>
                    <th>Persen</th>
                    <th>Jumlah</th>
                    <th>Target</th>
                    <th>Persen</th>               
                    </tr>
                </thead>
                <tbody>
                    @foreach($target as $key => $data)
                    @if($key>0)
                    <tr>
                        @if(Auth::user()->role_id === 1)
                        <td><a class="btn btn-success btn-small" href="{{route('target.edit', $key)}}" title="Edit">Edit</a></td>
                        @endif
                        <td><strong>{{$data['nama']}}</strong></td>
                        <td>{{$data['jumKoor']}}</td>
                        <td class="text-secondary">{{$data['targetKoor']}}</td>
                        <td><strong>{{number_format($data['persenKoor'],1,',','')}}%</strong></td>
                        <td>{{$data['jumSaksi']}}</td>
                        <td class="text-secondary">{{$data['targetSaksi']}}</td>
                        <td><strong>{{number_format($data['persenSaksi'],1,',','')}}%</strong></td>
                        
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="col-lg"></div>        
    </div>
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/js/sw.js')
                .then((registration) => {
                    console.log("Service Worker registration successful")
                }, (err) => {
                    console.log("Registration failed")
                })
            })
        }
    </script>
  
    <script>
      $(document).ready(function() {
        
        var table = $('#tabelTarget').DataTable({
          "autoWidth": true,
          "language": {
            "info": "Menampilkan _START_-_END_ dari _TOTAL_ data",
            "infoEmpty":  "Tidak Ada Data",
            "emptyTable": "Tidak ada data yang tersedia",
            "lengthMenu": "Tampilkan _MENU_ data",
            "processing": "Memproses...",
            "search":     "Cari:",
            "zeroRecords":"Tidak ada data yang cocok",
            "infoFiltered":   "(disaring dari _MAX_ total data)",
            "paginate": {
              "first":      "<<",
              "last":       ">>",
              "next":       ">",
              "previous":   "<"
            }
          },
          info: false,
          pageLength: 10,
          lengthChange: false,
          dom: 'lrtip',
        scrollX:        true,
        paging: false,
        fixedColumns:   true,

        });
      });
      
    </script>
  <script>
    var ctx = document.getElementById("myChart").getContext("2d");
    ctx.canvas.width = 200;
    ctx.canvas.height = 110;
    var width = window.innerWidth;
    var height = window.innerHeight;
    if(width <= 400) { 
      ctx.canvas.height = 200;
    }
    var nama = [
      @foreach($target as $key => $data)
        @if($key>0)
          {!! json_encode($data['nama']) !!},
        @endif
      @endforeach
    ];
    var persenSaksi = [
      @foreach($target as $key => $data)
        @if($key>0)
          {!! json_encode($data['persenSaksi']) !!},
        @endif
      @endforeach
    ];
    var persenKoor = [
      @foreach($target as $key => $data)
        @if($key>0)
          {!! json_encode($data['persenKoor']) !!},
        @endif
      @endforeach
    ];
    var colorKoor = new Array();
    var colorSaksi = new Array();
    for (i=0; i<9; i++) {
      colorKoor[i] = '#B71C1C';
      colorSaksi[i] = '#009688';
    }
    var myChart = new Chart(ctx, {
      type: 'horizontalBar',
      data: {
        labels: nama,
        datasets: [{
          label: '% Koordinator',
          data: persenKoor,
          backgroundColor: colorKoor
        },
        {
          label: '% Saksi',
          data: persenSaksi,
          backgroundColor: colorSaksi
        }],
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true,
              responsive: true,
              maintainAspectRatio: false,
            }
          }],
          xAxes: [{
            ticks: {
              min: 0,
              max: 100,
              stepSize: 20,
            }
          }]
        }
      }
    });
  </script>
@endsection