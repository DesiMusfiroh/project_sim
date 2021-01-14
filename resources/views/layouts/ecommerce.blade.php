<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="sortcut icon" href="{{ asset('assets/img/favicon.PNG') }}">
    
    @yield('title')
    
	<link rel="stylesheet" href="{{ asset('ecommerce/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('ecommerce/vendors/linericon/style.css') }}">
	<link rel="stylesheet" href="{{ asset('ecommerce/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('ecommerce/vendors/owl-carousel/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('ecommerce/vendors/lightbox/simpleLightbox.css') }}">
	<link rel="stylesheet" href="{{ asset('ecommerce/vendors/nice-select/css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('ecommerce/vendors/animate-css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('ecommerce/vendors/jquery-ui/jquery-ui.css') }}">
	
	<link rel="stylesheet" href="{{ asset('ecommerce/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('ecommerce/css/responsive.css') }}">
</head>

<body>
	<!--================Header Menu Area =================-->
	<header class="header_area">
		<div class="top_menu row m0 " style="background-color:#78ccfa">
			<div class="container-fluid">
				<div class="float-left">
					<p>Call Us: 08131 3263 264</p>
				</div>
				<div class="float-right">
				<!--Menu Disini-->
        
				</div>
			</div>
		</div>
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light ">
				<div class="container-fluid">
					<!--  -->
                    <a class="navbar-brand logo_h" href="{{ url('/') }}">
						<img src="{{asset ('assets/img/ji capster homepage.png') }}" width="180px" height="70px" alt=""> 
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					 aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!--  -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<div class="row w-100">
						

							<div class="col-lg-12">
								<ul class="nav navbar-nav navbar-right right_nav pull-right">
									
									<hr>
									
									<li class="nav-item">
										<a href="{{ route('front.index') }}" class="icons">
											<i class="fa fa-home fa-lg" aria-hidden="true"></i> 
										</a>
									</li>
									<hr>
									
									</li>
									<hr>
									<li class="nav-item">
										<a href="{{ route('front.product') }}" class="icons">
											<i class="fa fa-product-hunt fa-lg" aria-hidden="true"></i> 
										</a>
									</li>
									<hr>
									
									</li>
									<hr>
									
									<li class="nav-item">
  										<a href="{{ route('front.list_cart') }}" class="icons">
    								<i class="fa fa-shopping-cart fa-lg"></i> 
  										</a>
									</li>
										</a>
									</li>
									<hr>
									<li class="nav-item">
										<a href="/administrator/home" class="icons">
											<i class="fa fa-user fa-lg" aria-hidden="true"></i> 
										</a>
									</li>
									<hr>
									
									</li>
									<hr>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!--================Header Menu Area =================-->

    @yield('content')
    
	<!--================ start footer Area  =================-->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-16  col-md-10 col-sm-16">
					<div class="double-footer-widget">
						<h6 class="footer_title">About Us</h6>
						<p>JI CAPSTER (Jambi Campus Shopping Center) adalah Portal E-Commerce yang dibuat oleh Mahasiswa Sistem Informasi Universitas Jambi, yang mana portal ini dibangun dengan tujuan
						untuk mewadahi semua kreativitas Mahasiswa di daerah Jambi untuk bertransaksi secara online, demi terwujudnya jiwa Interpreneur pada diri Mahasiswa</p>
					</div>
				</div>
		
				<div class="col-lg-2 col-md-6 col-sm-6 text-right">
					<div class="single-footer-widget f_social_wd">
						<h6 class="footer_title">Follow Us</h6>
						<p>Let us be social</p>
						<div class="f_social">
							<a href="#">
								<i class="fa fa-facebook"></i>
							</a>
							<a href="#">
								<i class="fa fa-twitter"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row footer-bottom d-flex justify-content-between align-items-center">
				<p class="col-lg-12 footer-text text-center">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> 
                    All rights reserved | Sistem Informasi - Universitas Jambi 
    				<!-- by <a href="https://www.instagram.com/repaldi_hs/?hl=id" target="_blank">RepaldiHS</a> -->
				</p>
			</div>
		</div>
	</footer>
	<!--================ End footer Area  =================-->

	<script src="{{ asset('ecommerce/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('ecommerce/js/popper.js') }}"></script>
	<script src="{{ asset('ecommerce/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('ecommerce/js/stellar.js') }}"></script>
	<script src="{{ asset('ecommerce/vendors/lightbox/simpleLightbox.min.js') }}"></script>
	<script src="{{ asset('ecommerce/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
	<script src="{{ asset('ecommerce/vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
	<script src="{{ asset('ecommerce/vendors/isotope/isotope-min.js') }}"></script>
	<script src="{{ asset('ecommerce/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('ecommerce/js/jquery.ajaxchimp.min.js') }}"></script>
	<script src="{{ asset('ecommerce/vendors/counter-up/jquery.waypoints.min.js') }}"></script>
	<script src="{{ asset('ecommerce/vendors/flipclock/timer.js') }}"></script>
	<script src="{{ asset('ecommerce/vendors/counter-up/jquery.counterup.js') }}"></script>
	<script src="{{ asset('ecommerce/js/mail-script.js') }}"></script>
	<script src="{{ asset('ecommerce/js/theme.js') }}"></script>

	@yield('js')
</body>
</html>