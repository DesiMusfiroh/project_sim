<!-- FUNGSI EXTENDS DIGUNAKAN UNTUK ME-LOAD MASTER LAYOUTS YANG ADA, KARENA INI ADALAH HALAMAN HOME MAKA iniakan ME-LOAD LAYOUTS ADMIN.BLADE.PHP -->
@extends('layouts.admin')

<!-- TAG YANG DIAPIT OLEH SECTION('TITLE') AKAN ME-REPLACE @YIELD('TITLE') PADA MASTER LAYOUTS -->
@section('title')
    <title>Dashboard</title>
@endsection

<!-- TAG YANG DIAPIT OLEH SECTION('CONTENT') AKAN ME-REPLACE @YIELD('CONTENT') PADA MASTER LAYOUTS -->
@section('content')
<?php use App\OrderDetail; use App\Product; use App\Seller; ?>
<main class="main">
    <ol class="breadcrumb bg-dark">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Pembelian</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="border-radius:20px;  box-shadow: 10px 10px 5px grey;">
                        <div class="card-header bg-primary pt-3 pb-2" style="border-radius: 0px 20px 0px 0px">
                            <h4 class="card-title text-center">Data Transaksi Pembelian Produk</h4>
                        </div>
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-md-1 pl-0 pr-0">
                                    <p class="text-center"><b> No. </b> </p>
                                </div>
                                <div class="col-md-1 pl-0 pr-0">
                                    <th scope="col" ><b> Invoice </b></th>
                                </div>
                                <div class="col-md-1 pl-0 pr-0">
                                    <th scope="col" ><b> Tanggal </b></th>
                                </div>
                                <div class="col-md-1 pl-0 pr-0">
                                    <th scope="col" ><b> Total Harga </b></th>     
                                </div>
                                <div class="col-md-8 pl-4 pr-4">
                                    <p class="text-center"><b>  Order Detail  </b></p>  
                                </div>
                            </div> <hr   style="box-shadow: 0px 3px 10px blue">

                            <?php $no=0; ?>                                                 
                            @foreach ($orders as $order) 
                            <div class="row">
                                <div class="col-md-1 pl-0 pr-0">
                                    <p class="text-center"><?php  $no++;  echo $no; ?> </p>
                                </div>
                                <div class="col-md-1 pl-0 pr-0">
                                    {{ $order->invoice }}
                                </div>
                                <div class="col-md-1 pl-0 pr-0">
                                    {{ $order->created_at->format('d M Y') }}
                                </div>
                                <div class="col-md-1 pl-0 pr-0">
                                    Rp. {{ number_format($order->subtotal) }}
                                </div>
                                <div class="col-md-8 pl-4 pr-4">
                                    <table class="table table-bordered table-sm table-hover" style=" box-shadow: 3px 2px 5px grey;">
                                        <thead class="thead thead-dark">
                                            <tr class="text-center">
                                                <th width="50px">No.</th>
                                                <th> Product Name </th>
                                                <th width="105px">Price</th>
                                                <th width="60px">Qty</th>
                                                <th>Shop Name</th>
                                            </tr>
                                        </thead>
                                        <?php $order_details = OrderDetail::where('order_id',$order->id)->get(); ?>
                                        <?php $i=0; ?>  
                                        @foreach ($order_details as $order_detail)
                                        <tbody>   
                                            <tr>
                                                <td class="text-center"><?php  $i++;  echo $i; ?> </td>
                                                <td><?php $name = Product::where('id',$order_detail->product_id)->value('name') ; ?> {{ $name }}</td>
                                                <td  class="text-right">Rp. {{ number_format($order_detail->price)}} </td>
                                                <td class="text-center" >{{$order_detail->qty}}</td>
                                                <td><?php $seller_id = Product::where('id',$order_detail->product_id)->value('seller_id'); $shop_name = Seller::where('id',$seller_id)->value('shop_name') ;?> {{ $shop_name }}</td>
                                            </tr>
                                        </tbody>      
                                        @endforeach 
                                    </table>
                                </div>
                            </div>      
                            <hr  style="box-shadow: 0px 3px 10px blue">
                            @endforeach 
                               
                                <div class="row ">
                                    <div class="col-12 text-center ">
                                        {{ $orders->links() }}
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
