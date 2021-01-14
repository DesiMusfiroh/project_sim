<!-- FUNGSI EXTENDS DIGUNAKAN UNTUK ME-LOAD MASTER LAYOUTS YANG ADA, KARENA INI ADALAH HALAMAN HOME MAKA iniakan ME-LOAD LAYOUTS ADMIN.BLADE.PHP -->
@extends('layouts.admin')

<!-- TAG YANG DIAPIT OLEH SECTION('TITLE') AKAN ME-REPLACE @YIELD('TITLE') PADA MASTER LAYOUTS -->
@section('title')
    <title>Dashboard</title>
@endsection

<!-- TAG YANG DIAPIT OLEH SECTION('CONTENT') AKAN ME-REPLACE @YIELD('CONTENT') PADA MASTER LAYOUTS -->
@section('content')
<?php use App\Order; use App\OrderDetail; use App\Product;?>
<main class="main">
    <ol class="breadcrumb bg-dark">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Penjualan</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card"  style="border-radius:20px;  box-shadow: 10px 10px 5px grey;">
                        <div class="card-header  bg-primary pt-3 pb-2" style="border-radius: 0px 20px 0px 0px">
                            <h4 class="card-title text-center">Data Transaksi Penjualan Produk</h4>
                        </div>
                        <div class="card-body">
                        <div class="container">
                            <div class="row ">
                                <table class="table  table-hover table-striped table-hover"  style=" box-shadow: 3px 2px 5px grey;">
                                    <thead class="thead thead-dark">
                                        <tr class="text-center">
                                            <th width="30px">No</th>
                                            <th width="145px">Invoice</th>
                                            <th width="100px">Date</th>
                                            <th width="70px">Time</th>
                                            <th width="100px"> Total Price</th>
                                            <th>Customer Name</th>
                                            <th>Phone</th>
                                            <th>Address </th>
                                            <th width="40px" >Status</th>
                                            <th  width="50px">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=0; ?>                                                 
                                    @foreach ($order_details as $order_detail)
                                        <tr>
                                            <td class="text-center"><?php  $no++;  echo $no; ?></td>
                                            <td><?php $invoice = Order::where('id',$order_detail->order_id)->value('invoice') ?> {{$invoice}} </td>
                                            <td><?php $date = Order::where('id',$order_detail->order_id)->value('created_at') ?> {{ $date->format('d M Y') }}</td>
                                            <td><?php $time = Order::where('id',$order_detail->order_id)->value('created_at') ?>{{ $time->format('H:i:s') }}</td>
                                            <td class="text-right">
                                                <?php $detail_price = OrderDetail::join('products',function ($join){
                                                                                    $join->on('product_id','=','products.id')->where('products.seller_id','=',Auth::user()->sellers->id);
                                                                                })->where('order_id',$order_detail->order_id)->get() ;
                                                $total_price = 0;
                                                foreach($detail_price as $price){
                                                    $total_price = $total_price +  ($price->price * $price->qty);
                                                }
                                                ?>
                                                Rp. {{number_format($total_price)}}
                                            </td>
                                            <td><?php $name = Order::where('id',$order_detail->order_id)->value('customer_name') ?> {{$name}} </td>
                                            <td><?php $phone = Order::where('id',$order_detail->order_id)->value('customer_phone') ?> {{$phone}} </td>
                                            <td><?php $address = Order::where('id',$order_detail->order_id)->value('customer_address') ?> {{$address}} </td>
                                            <td class="text-center">
                                                <?php 
                                                    $order_status = Product::where('seller_id', Auth::user()->sellers->id )->join('order_details',function($join){
                                                        $join->on('products.id','=','order_details.product_id');
                                                    })->where('order_details.order_id',$order_detail->order_id)->first();
                                                    
                                                    $status = $order_status->status;
                                                ?>
                                                @if ($status == 1)
                                                    <div class="badge badge-success" style="color:black;"> Finish </div>
                                                @else
                                                    <div class="badge badge-warning"> New </div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <?php $details = OrderDetail::join('products',function ($join){
                                                                                    $join->on('product_id','=','products.id')->where('products.seller_id','=',Auth::user()->sellers->id);
                                                                                })->where('order_id',$order_detail->order_id)->get() ;?>
                        
                                                <a href="{{ route('transaksi.penjualan.detail', $order_detail->order_id) }}"> <button class="btn btn-sm btn-primary"><span class="fa fa-eye"></span> </button></a>
                                            </td>

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
