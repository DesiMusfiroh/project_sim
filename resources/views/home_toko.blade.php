<!-- FUNGSI EXTENDS DIGUNAKAN UNTUK ME-LOAD MASTER LAYOUTS YANG ADA, KARENA INI ADALAH HALAMAN HOME MAKA iniakan ME-LOAD LAYOUTS ADMIN.BLADE.PHP -->
@extends('layouts.admin')

<!-- TAG YANG DIAPIT OLEH SECTION('TITLE') AKAN ME-REPLACE @YIELD('TITLE') PADA MASTER LAYOUTS -->
@section('title')
    <title>Dashboard</title>
@endsection

<!-- TAG YANG DIAPIT OLEH SECTION('CONTENT') AKAN ME-REPLACE @YIELD('CONTENT') PADA MASTER LAYOUTS -->
@section('content')
<main class="main">
    <ol class="breadcrumb bg-dark">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="border-radius:20px;  box-shadow: 10px 10px 10px grey;">
                        <div class="card-header pt-3 pb-2 bg-primary text-center" style="border-radius: 0px 20px 0px 0px">
                            <h4 class="card-title">Aktivitas Toko</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="callout callout-info">
                                        <div class="row">
                                            <div class="col-md-2" style="font-size:40px;"><span class="fa fa-money"></span></div>
                                            <div class="col-md-10">
                                                <small class="text-muted" style="font-size:14px;">Total Pendapatan</small>
                                                <br>
                                                <strong class="h4"  style="font-size:26px;">Rp. {{number_format($pendapatan)}} </strong>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- <div class="col-md-3">
                                    <div class="callout callout-danger">
                                        <small class="text-muted">Pelanggan Baru (H-7)</small>
                                        <br>
                                        <strong class="h4">0</strong>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="callout callout-primary">
                                        <small class="text-muted">Perlu Dikirim</small>
                                        <br>
                                        <strong class="h4">0</strong>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="callout callout-success">
                                        <small class="text-muted">Total Produk</small>
                                        <br>
                                        <strong class="h4">0</strong>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7">
                    <div class="card"  style="border-radius:20px;  box-shadow: 10px 10px 5px grey;">
                        <div class="card-header text-center bg-primary"  style="border-radius: 20px 20px 0px 0px">
                            Grafik Pendapatan Per Hari
                        </div>
                        <div class="card-body">
                            <div id="chart_pendapatan" style="height: 230px;"></div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-5">
                    <div class="card"  style="border-radius:20px;  box-shadow: 10px 10px 5px grey;">
                        <div class="card-header text-center bg-primary"  style="border-radius: 20px 20px 0px 0px">
                            Grafik Jumlah Produk Terjual
                        </div>
                        <div class="card-body">
                            <div id="produk_terjual" style=" height: 230px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card" style="border-radius:20px;  box-shadow: 10px 10px 10px grey;">
                        <div class="card-header text-center bg-primary" style="border-radius: 20px 20px 0px 0px">
                            Tabel Laporan
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <table class="table table-striped table-hover table-sm text-center"  style=" box-shadow: 3px 2px 5px grey;">
                                        <thead class="thead thead-dark">
                                            <tr>
                                                <th>Nama Produk</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($produk_terjual as $product)
                                            <tr>
                                                <td>{{$product->product}}</td>
                                                <td>{{$product->jumlah_terjual}}</td>
                                            </tr>
                                            
                                        @endforeach
                                        </tbody>
                                    
                                    </table>
                                </div>
                                <div class="col-md-7">
                                    <table class="table table-striped table-hover table-sm text-center"  style=" box-shadow: 3px 2px 5px grey;">
                                        <thead class="thead thead-dark">
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Pendapatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($pendapatan_harian as $ph)
                                            <tr>
                                                <td>{{$ph->tanggal}}</td>
                                                <td>Rp. {{number_format($ph->pendapatan)}}</td>
                                            </tr>
                                            
                                        @endforeach
                                        </tbody>
                                    
                                    </table>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection


@section('chart')

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">

      var chart_produk = <?php echo $chart_produk; ?>;
      //google.charts.load('current', {'packages':['bar']});
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.arrayToDataTable(chart_produk);        
      var options = {
          title: '',
          pieHole: 0.4,
          is3D: true,
        };

      //var chart = new google.charts.Bar(document.getElementById('produk_terjual'));
      var chart = new google.visualization.PieChart(document.getElementById('produk_terjual'));

      //chart.draw(data, google.charts.Bar.convertOptions(options));
      chart.draw(data, options);

    }

</script>


<script type="text/javascript">

      var analytics = <?php echo $chart_pendapatan; ?>;
      //google.charts.load('current', {'packages':['bar']});
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.arrayToDataTable(analytics);    
    //   var options = {
    //       chart: {
    //         title: '',      
    //       }
    //     };
        var options = {
          title: '',
          curveType: 'function',
          legend: { position: 'bottom' }
        };
      //var chart = new google.charts.Bar(document.getElementById('chart_pendapatan'));
      var chart = new google.visualization.LineChart(document.getElementById('chart_pendapatan'));
      //chart.draw(data, google.charts.Bar.convertOptions(options));
      chart.draw(data, options);
    }

</script>

@endsection
