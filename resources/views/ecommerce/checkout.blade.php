@extends('layouts.ecommerce')

@section('title')
    <title>Checkout - UnjaMarket</title>
@endsection

@section('content')
<?php 
    use App\Customer; 
    use App\User;
    
    $user_id = Auth::user()->id;
    $customer = Customer::where('user_id',$user_id)->first();
    $email = Auth::user()->email;

?>
    <!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="overlay"></div>
			<div class="container">
				<div class="banner_content text-center">
					<h2>Informasi Pengiriman</h2>
					<div class="page_link">
                        <a href="{{ url('/') }}">Home</a>
						<a href="#">Checkout</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Checkout Area =================-->
	<section class="checkout_area section_gap">
		<div class="container">
			<div class="billing_details">
				<div class="row">
					<div class="col-lg-8">
                        <h3>Informasi Pengiriman</h3>
                        
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        
                        <form class="row contact_form" action="{{ route('front.store_checkout') }}" method="post" novalidate="novalidate">
                            @csrf
                        <div class="col-md-12 form-group p_star">
                            <label for="">Nama Lengkap</label>
                            <div class="input-group mb-0"  style="border-radius:10px; border-color:#0f91db; box-shadow: 3px 3px 10px grey;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"> <span class="fa fa-user"></span> </span>
                                </div>
                                <input type="text" class="form-control" id="first" name="customer_name" value="{{$customer->name}}" required>
                            </div>
                            <p class="text-danger">{{ $errors->first('customer_name') }}</p>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <label for="">No Telp</label> 
                            <div class="input-group mb-0"  style="border-radius:10px; border-color:#0f91db; box-shadow: 3px 2px 10px grey;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"> <span class="fa fa-phone"></span> </span>
                                </div>
                                <input type="text" class="form-control" id="number" name="customer_phone" value="{{$customer->phone}}" required>
                            </div>
                            
                            <p class="text-danger">{{ $errors->first('customer_phone') }}</p>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <label for="">Email</label>
                            <div class="input-group mb-0"  style="border-radius:10px; border-color:#0f91db; box-shadow: 3px 3px 10px grey;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"> <span class="fa fa-envelope"></span> </span>
                                </div>
                                <input type="email" class="form-control" id="email" name="email" value="{{$email}}" required readonly>
                            </div>
                            
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label for="">Alamat Lengkap</label>
                            <div class="input-group mb-0"  style="border-radius:10px; border-color:#0f91db; box-shadow: 3px 3px 10px grey;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"> <span class="fa fa-map-marker"></span> </span>
                                </div>
                                <input type="text" class="form-control" id="add1" name="customer_address"  value="{{$customer->address}}"  required >
                            </div>
                            
                            <p class="text-danger">{{ $errors->first('customer_address') }}</p>
                        </div>
                        <div>
                            <input type="hidden" id="prody_id" name="prody_id" value="{{$customer->prody_id}}">
                        </div>
                        <!-- <div class="col-md-12 form-group p_star">
                            <label for="">Universitas</label>
                            <select class="form-control" name="university_id" id="university_id" required>
                                <option value="">Pilih Universitas</option>
                                @foreach ($universities as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('university_id') }}</p>
                        </div> -->
                        <!-- <div class="col-md-12 form-group p_star">
                            <label for="">Fakultas</label>
                            <select class="form-control" name="faculty_id" id="faculty_id" required>
                                <option value="">Pilih Fakultas</option>
                            </select>
                            <p class="text-danger">{{ $errors->first('faculty_id') }}</p>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label for="">Prodi</label>
                            <select class="form-control" name="prody_id" id="prody_id" required>
                                <option value="">Pilih Prodi</option>
                            </select>
                            <p class="text-danger">{{ $errors->first('prody_id') }}</p>
                        </div> -->
                    
					</div>
					<div class="col-lg-4">
						<div class="order_box">
							<h2>Ringkasan Pesanan</h2>
							<ul class="list">
								<li>
									<a href="#">Product
										<span>Total</span>
									</a>
                                </li>
                                @foreach ($carts as $cart)
								<li>
									<a href="#">{{ \Str::limit($cart['product_name'], 10) }}
                                        <span class="middle">x {{ $cart['qty'] }}</span>
                                        <span class="last">Rp {{ number_format($cart['product_price']) }}</span>
									</a>
                                </li>
                                @endforeach
							</ul>
							<ul class="list list_2">
								<li>
									<a href="#">Subtotal
                                        <span>Rp {{ number_format($subtotal) }}</span>
									</a>
								</li>
								<li>
									<a href="#">Pengiriman
										<span>Rp 0</span>
									</a>
								</li>
								<li>
									<a href="#">Total
										<span>Rp {{ number_format($subtotal) }}</span>
									</a>
								</li>
							</ul>
                            <button class="main_btn" >Bayar Pesanan</button>
                            </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Checkout Area =================-->
@endsection

@section('js')
    <!-- <script>
        $('#university_id').on('change', function() {
            $.ajax({
                url: "{{ url('/api/faculty') }}",
                type: "GET",
                data: { university_id: $(this).val() },
                success: function(html){
                    
                    $('#faculty_id').empty()
                    $('#faculty_id').append('<option value="">Pilih Fakultas</option>')
                    $.each(html.data, function(key, item) {
                        $('#faculty_id').append('<option value="'+item.id+'">'+item.name+'</option>')
                    })
                }
            });
        })
        $('#faculty_id').on('change', function() {
            $.ajax({
                url: "{{ url('/api/prody') }}",
                type: "GET",
                data: { faculty_id: $(this).val() },
                success: function(html){
                    $('#prody_id').empty()
                    $('#prody_id').append('<option value="">Pilih Prodi</option>')
                    $.each(html.data, function(key, item) {
                        $('#prody_id').append('<option value="'+item.id+'">'+item.name+'</option>')
                    })
                }
            });
        })
    </script> -->
@endsection