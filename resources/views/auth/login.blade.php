@extends('layouts.auth')

@section('title')
    <title>Login</title>
@endsection

@section('content')
<style>
body {
  background: url('/data_file/backlogin1.png') no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  background-size: cover;
  -o-background-size: cover;
}

</style>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card-group" >
                <div class="card p-4"  style="border-radius:20px" >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h1>Login</h1>
                                <p class="text-muted">Sign In to your account</p>
                            </div>
                            <div class="col-md-6 text-right">
                                <img src="{{asset ('assets/img/ji capster putih.png') }}" width="150px" height="60px" alt="">
                            </div>
                        </div>
                       
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"  style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                    <span class="input-group-text">
                                        <i class="icon-user"></i>
                                    </span>
                                </div>
                              
                              	<!-- $errors->has('email') AKAN MENGECEK JIKA ADA ERROR 
                                DARI HASIL VALIDASI , SEMUA KEGAGALAN VALIDASI AKAN DISIMPAN KEDALAM VARIABLE $errors -->
                                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                    type="text" 
                                    name="email"
                                    placeholder="Email Address" 
                                    value="{{ old('email') }}" 
                                    autofocus 
                                    required>
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend"  style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                    <span class="input-group-text">
                                        <i class="icon-lock"></i>
                                    </span>
                                </div>
                                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                    type="password" 
                                    name="password"
                                    placeholder="Password" 
                                    required>
                            </div>
                            <div class="row">
                                @if (session('error'))
                                <div class="col-md-12">
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                </div>
                                @endif

                                <div class="col-6">
                                    <button class="btn btn-primary px-4"  style="box-shadow: 3px 2px 5px grey;">Login</button>
                                </div>
                                <div class="col-6 text-right">
                                    @if (Route::has('register')) Don't Have an Account? <a  href="{{ route('register') }}"> {{ __('Register') }}</a>
                                    @endif 
                                  <!--@if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                     @endif -->

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- <div class="card bg-light" style="width:44%">
                <img src="{{ asset ('assets/img/ji capster login.png') }}" class="card-img">
                </div> -->
            </div>
        </div>
    </div>
@endsection