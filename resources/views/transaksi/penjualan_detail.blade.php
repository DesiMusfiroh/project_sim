<!-- FUNGSI EXTENDS DIGUNAKAN UNTUK ME-LOAD MASTER LAYOUTS YANG ADA, KARENA INI ADALAH HALAMAN HOME MAKA iniakan ME-LOAD LAYOUTS ADMIN.BLADE.PHP -->
@extends('layouts.admin')

<!-- TAG YANG DIAPIT OLEH SECTION('TITLE') AKAN ME-REPLACE @YIELD('TITLE') PADA MASTER LAYOUTS -->
@section('title')
    <title>Dashboard</title>
@endsection

<!-- TAG YANG DIAPIT OLEH SECTION('CONTENT') AKAN ME-REPLACE @YIELD('CONTENT') PADA MASTER LAYOUTS -->
@section('content')
<?php use App\Order; use App\Product; use App\OrderDetail;?>
<main class="main">
    <ol class="breadcrumb bg-dark">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Penjualan</li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-8">
                    <div class="card"  style="border-radius:20px;  box-shadow: 10px 10px 5px grey;">
                        <div class="card-header  bg-primary pt-3 pb-2" style="border-radius: 0px 20px 0px 0px">
                            <h4 class="card-title text-center">Detail Transaksi Penjualan</h4>
                        </div>
                        <div class="card-body">
                        <div class="container">
                            <div class="row ">
                                <div class="col-md-5">
                                    <table>
                                        <tr>
                                            <td> <b> Invoice</b> </td>
                                            <td> : </td>
                                            <td><?php $invoice = Order::where('id',$order_detail->order_id)->value('invoice') ?> {{$invoice}}</td>
                                        </tr>
                                        <tr>
                                            <td> <b> Date Time </b> </td>
                                            <td> : </td>
                                            <td>{{ $order_detail->created_at->format('d M Y') }} - {{ $order_detail->created_at->format('H:i:s') }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-7">
                                <table>
                                        <tr>
                                            <td width="133px"> <b> Nama Pelanggan </b> </td>
                                            <td> : </td>
                                            <td><?php $name = Order::where('id',$order_detail->order_id)->value('customer_name') ?> {{$name}}</td>
                                        </tr>
                                        <tr >
                                            <td width="133px"> <b> Nomor HP </b> </td>
                                            <td> : </td>
                                            <td><?php $phone = Order::where('id',$order_detail->order_id)->value('customer_phone') ?> {{$phone}} </td>
                                        </tr>
                                        <tr>
                                            <td width="133px"> <b> Alamat Pengiriman </b> </td>
                                            <td> : </td>
                                            <td><?php $address = Order::where('id',$order_detail->order_id)->value('customer_address') ?> {{$address}} </td>
                                        </tr>
                                    </table>
                                </div>
                                
                               
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table  table-hover table-bordered table-hover table-sm"  style=" box-shadow: 3px 2px 5px grey;">
                                        <thead class="thead thead-dark text-center">
                                            <tr>
                                                <th width="50px">No.</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Sub Price</th>
                                            </tr>
                                        </thead>
                                        <tbody> <?php $no=0; ?>
                                            @foreach ($details as $detail)
                                            <tr>
                                                <td class="text-center"><?php  $no++;  echo $no; ?> </td>
                                                <td><?php $product_name = Product::where('id',$detail->product_id)->value('name') ?> {{$product_name}}</td>
                                                <td class="text-right"> Rp. {{ number_format($detail->price)}}</td>
                                                <td class="text-center">{{$detail->qty}} </td>
                                                <td class="text-right">Rp. {{number_format($detail->price * $detail->qty)}}</td>
                                            </tr>
                                            <!-- <form  action="/administrator/penjualan/order_finish" method="post" >
                                            @csrf
                                            @method('PATCH')
                                                <input type="hidden" value="{{$detail->product_id}}" id="detail_id" name="detail_id">
                                                <input type="hidden" value="1" id="status" name="status">
                                                <button type="submit hidden" id="order_finish" ></button>
                                            </form> -->
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td colspan="3" class="text-center">Total Price</td>
                                                <td class="text-right">
                                                    <?php $detail_price = OrderDetail::join('products',function ($join){
                                                                                        $join->on('product_id','=','products.id')->where('products.seller_id','=',Auth::user()->sellers->id);
                                                                                    })->where('order_id',$order_detail->order_id)->get() ;
                                                    $total_price = 0;
                                                    foreach($detail_price as $price){
                                                        $total_price = $total_price + ($price->price * $price->qty);
                                                    }
                                                    ?>
                                                    Rp. {{number_format($total_price)}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="container">
                                <!-- jika #pesanan id pernah di klik maka sembunyikan -->
                                <?php 
                                    $order_status = Product::where('seller_id', Auth::user()->sellers->id )->join('order_details',function($join){
                                        $join->on('products.id','=','order_details.product_id');
                                    })->where('order_details.order_id',$order_detail->order_id)->first();
                                    
                                    $status = $order_status->status;
                                ?>
                                @if ($status == 1)
                                    <div class="alert alert-success alert-sm text-center"><b>Pesanan telah selesai</b></div>
                                @else
                                    <div class="text-right"><a href="{{ route('transaksi.penjualan.order_finish', $order_detail->order_id) }}"><button class="btn btn-primary" id="pesanan_selesai" style="box-shadow: 3px 2px 5px grey;">Pesanan Selesai</button></a></div>
                                @endif
                                </div>
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

@section('js')
<script>
// jika button #pesanan_selesai di klik
//$( "#pesanan_selesai" ).click(function() {
    //alert( "Handler for .click() called." );
    //$( "#order_finish" ).click();
    // $.each($('.order_finish'), function(index, value) {
    //     $( "#order_finish" ).click();
    //     //console.log(index + ':' + $(value).text());
    // });
    // $('.order_finish').each(function() {
    //     $( "#order_finish" ).click();
    // });
//});
// button submit #order_finish akan ter klik satu persatu

</script>
@endsection