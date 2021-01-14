<!-- FUNGSI EXTENDS DIGUNAKAN UNTUK ME-LOAD MASTER LAYOUTS YANG ADA, KARENA INI ADALAH HALAMAN HOME MAKA iniakan ME-LOAD LAYOUTS ADMIN.BLADE.PHP -->
@extends('layouts.admin')

<!-- TAG YANG DIAPIT OLEH SECTION('TITLE') AKAN ME-REPLACE @YIELD('TITLE') PADA MASTER LAYOUTS -->
@section('title')
    <title>Dashboard</title>
@endsection

<!-- TAG YANG DIAPIT OLEH SECTION('CONTENT') AKAN ME-REPLACE @YIELD('CONTENT') PADA MASTER LAYOUTS -->
@section('content')
<?php use App\Order; use App\Product;?>
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
                                            <th width="100px">Invoice</th>
                                            <th width="70px">Date</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th  width="40px">Qty</th>
                                            <th>Sub Price</th>
                                            <th>Customer Name</th>
                                            
                                            <th>Address </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=0; ?>                                                 
                                    @foreach ($order_details as $order_detail)
                                        <tr>
                                            <td class="text-center"><?php  $no++;  echo $no; ?></td>
                                            <td><?php $invoice = Order::where('id',$order_detail->order_id)->value('invoice') ?> {{$invoice}} </td>
                                            <td>{{ $order_detail->created_at->format('d M Y') }}</td>
                                            <td><?php $product_name = Product::where('id',$order_detail->product_id)->value('name') ?> {{$product_name}}</td>
                                            <td class="text-right">Rp. {{number_format($order_detail->price)}}</td>
                                            <td class="text-center">{{$order_detail->qty}}</td>
                                            <td class="text-right">Rp. {{number_format($order_detail->price * $order_detail->qty)}}</td>
                                            <td><?php $name = Order::where('id',$order_detail->order_id)->value('customer_name') ?> {{$name}} </td>
                                            
                                            <td><?php $address = Order::where('id',$order_detail->order_id)->value('customer_address') ?> {{$address}} </td>


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
