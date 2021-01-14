@extends('layouts.ecommerce')

@section('title')
    <title>Portal Jual Beli - UnjaMarket</title>
@endsection

@section('content')
	<!--================Home Banner Area =================-->
	
	
	<!-- <section class="home_banner_area">
		<div class="overlay"></div>
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content row">
					<div class="offset-lg-2 col-lg-8">
						<h3>Portal Jual-Beli
							<br />U-MARKET</h3>
						<p>Jika bisa belanja sekarang kenapa harus nanti</p>
						<a class="white_bg_btn" href="#">View Product</a>
					</div>
				</div>
			</div>
		</div>
	</section> -->

	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
	  <img class="d-block w-100" src="/storage/unja/pizza.jpg" alt="First slide" height="600px">
		<div class="carousel-caption  d-md-block">
			<h2 style="color:#78ccfa">  JI CAPSTER  </h2>
			<h3 >... Jambi Campus Shopping Center ...</h3>
		</div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/storage/unja/donat3.jpg" alt="Second slide" height="600px">
	  <div class="carousel-caption  d-md-block">
			<h2 style="color:#78ccfa">  JI CAPSTER  </h2>
			<h3 style="color:#78ccfa">... Portal E-Commerce untuk Lingkungan Kampus Jambi ...</h3>
		</div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/storage/unja/kopibuku.png" alt="Second slide" height="600px">
	  <div class="carousel-caption  d-md-block">
			<h3>... Belanja Jadi Lebih Praktis ...</h3>
		</div>
    </div>
	<div class="carousel-item">
      <img class="d-block w-100" src="/storage/unja/untitled.jpg" alt="Second slide" height="600px">
    </div>
	<div class="carousel-item">
      <img class="d-block w-100" src="/storage/unja/donat1.jpg" alt="Second slide" height="600px">
    </div>
	<div class="carousel-item">
      <img class="d-block w-100" src="/storage/unja/buah1.jpg" alt="Second slide" height="600px">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



	<section class="feature_product_area section_gap">
		<div class="main_box">
			<div class="container-fluid">
				<div class="row">
					<div class="main_title">
						<h2>Produk Terbaru</h2>
						<p>Belanja Hemat, Aman dan Nyaman.</p>
					</div>
				</div>
				<div class="row">
          
          <!-- LOOPING DATA PRODUK -->
          @forelse($products as $row)
					<div class="col col1">
						<div class="f_p_item">
							<div class="f_p_img">
                <!-- MENAMPILKAN IMAGEDARI FOLDER /PUBLIC/STORAGE/PRODUCTS -->
                <img class="img-fluid" src="{{ asset('storage/products/' . $row->image) }}" alt="{{ $row->name }}">
								<div class="p_icon">
								<a href="{{ url('/product/' . $row->slug) }}">
										<i class="lnr lnr-cart"></i>
									</a>
								</div>
							</div>
              <!-- KETIKA PRODUK INI DIKLIK MAKA AKAN DIARAHKAN KE URL DIBAWAH -->
			  <a href="{{ url('/product/' . $row->slug) }}">
                                <h4>{{ $row->name }}</h4>
								</a>
              <!-- TAMPILKAN HARGA PRODUK -->
              <h5>Rp {{ number_format($row->price) }}</h5>
						</div>
					</div>
          @empty
                    
          @endforelse
				</div>

      
				<div class="row">
					{{ $products->links() }}
				</div>
			</div>
		</div>
	</section>
	
@endsection