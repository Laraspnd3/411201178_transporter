@extends('layouts.app')

@section('content')
<div class="container">

    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid ">
            <h1 class="display-5 fw-bold">Halo, {{ Auth::user()->name }} </h1>
            <h4>You are logged in! </h4>
            <p class="col-md-8 fs-4">Selamat datang di aplikasi <i>
                    Transporter!

                </i> Jangan lupa untuk menggunakan fitur dengan bijaksana. Perhatikan bahwa kurir harus menginput data
                dengan benar</p>
        </div>
        
    </div>

    <div class="row">
      <div class="col-md-6">
        <div id="chartContainer"></div>
      </div>
      <div class="col-md-6">
        
        <div id="chartBarang"></div>
      </div>
      <div class="col-md-4 mt-4">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Keseluruhan Pengiriman 3 Bulan Terakhir</h4>
            <p class="card-text">{{$total3Bulan}} Pengiriman</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mt-4">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Lokasi Pengiriman Terbanyak 1 Bulan Terakhir</h4>
            <p class="card-text">{{$lokasiTerbanyak}}, {{$totalLokasi}} Pengiriman</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mt-4">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Banyaknya Barang Yang Dikirimkan Selama 1 Tahun</h4>
            <p class="card-text">{{$total}} Barang</p>
          </div>
        </div>
      </div>
    </div>
      
    {{-- <div id="chartContainer" style="min-width: 400px; height: 400px; margin: 0 auto"></div> --}}

</div>
<script type="text/javascript">
    $(function () {
        Highcharts.chart('chartContainer', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Lokasi dengan Jumlah Barang > 100'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name:'Menguasai',
                colorByPoint: true,
                data: <?= $data ?>
            }]
        });
        Highcharts.chart('chartBarang', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Barang dengan Harga Barang > 1000'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name:'Persentase',
                colorByPoint: true,
                data: <?= $data2 ?>
            }]
        });
    });

</script>


@endsection
