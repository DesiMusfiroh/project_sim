@extends('layouts.ecommerce')

@section('title')
    <title>Jual Produk  - JI CAPSTER</title>
@endsection

@section('content')
<?php use App\Seller; ?>
    <!--================Home Banner Area =================-->
	<section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Jual Produk </h2>
                    <div class="page_link">
                        <a href="{{ route('front.index') }}">Home</a>
                        <a href="{{ route('front.product') }}">Produk</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Category Product Area =================-->
    <section class="cat_product_area section_gap">
        <div class="container-fluid">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="product_top_bar pb-0">
                        <div class="left_dorp">
                          
                        </div>
                        <div class="right_page ml-auto mb-0">
                            <form action="{{ route('front.search') }}" method="GET">
                                @csrf                    
                                <div class="input-group mb-2">                      
                                    <input type="text" name="cari" placeholder="Cari Produk " value="{{ old('cari') }}" class="form-control" style="border-radius:5px 0px 0px 5px"><br>
                                    <div class="input-group-prepend" >                
                                        <button class="btn btn-md btn-primary" style="border-radius:0px 5px 5px 0px">   <i class="fa fa-search"></i> Cari  </button>                 
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">    
                        <div class="col-md-3">
                            <div class="pt-0 pb-0 text-center mt-0"><img src="/storage/shop/shop-vector-icon.jpg" class="img-fluid mx-auto  " height = "50px"> </div>
                        </div>
                        <div class="col-md-9 mt-4">
                            <h3 class="text-center pb-2">Shop Profile</h3> 
                            <table  class="table table-hover table-sm">
                                <tr>
                                    <td col><b> Shop Name </b> </td>
                                    <td> : </td>
                                    <td>{{ $show_seller->shop_name}}</td>
                                </tr>
                                <tr>
                                    <td col><b> Shop Description </b> </td>
                                    <td> : </td>
                                    <td>{{ $show_seller->shop_desc }}</td>
                                </tr>
                                <tr>
                                    <td col><b> Location </b> </td>
                                    <td> : </td>
                                    <td>{{ $show_seller->location }}</td>
                                </tr>
                                    
                            </table>   
                        </div> 
                    </div> <hr> 
                    <h3 class="text-center mb-0">Products on sale </h3> 
                    <div class="latest_product_inner row">
                    
                      	<!-- PROSES LOOPING DATA PRODUK-->
                        @forelse ($products as $row)
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="f_p_item">
                                <div class="f_p_img">
                                    <img class="img-fluid" src="{{ asset('storage/products/' . $row->image) }}" alt="{{ $row->name }}">
                                    <div class="p_icon">
                                        <a href="{{ url('/product/' . $row->slug) }}">
                                            <i class="lnr lnr-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <a href="{{ url('/product/' . $row->slug) }}">
                                    <h4>{{ $row->name }}</h4>
                                </a>
                                <h5>Rp {{ number_format($row->price) }}</h5>
                            </div>
                        </div>
                       

                        @empty
                            <div class="col-md-12">
                                     <h3 class="text-center">Tidak ada produk</h3>
                            </div>
                        @endforelse

                        
                      <!-- PROSES LOOPING DATA PRODUK-->
                    </div> <br>
                    <div class="row justify-content-center">
                        {{ $products->links() }}
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets cat_widgets">
                            <div class="l_w_title">
                                <h3>Kategori Produk</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                  
                                  	<!-- PROSES LOOPING DATA KATEGORI -->
                                    @foreach ($categories as $category)
                                    <li>
                                        <!-- JIKA CHILDNYA ADA, MAKA KATEGORI INI AKAN MENG-EXPAND DATA DIBAWAHNYA -->
                                        <strong><a href="{{ url('/category/' . $category->slug) }}">{{ $category->name }}</a></strong> 
                                      	<!-- PROSES LOOPING DATA CHILD KATEGORI -->
                                        @foreach ($category->child as $child)
                                        <ul class="list" style="display: block">
                                            <li>
                                                <a href="{{ url('/category/' . $child->slug) }}">{{ $child->name }}</a>
                                            </li>
                                        </ul>
                                        @endforeach
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                        
                        <aside class="left_widgets cat_widgets">
                            <div class="l_w_title">
                                <h3>Pilih Toko</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    <?php $sellers =  Seller::all(); ?>
                                    @foreach ($sellers as $seller)
                                    <li><strong><a href="{{ url('/products/seller/' . $seller->shop_name) }}">{{ $seller->shop_name }}</a></strong></li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
@endsection