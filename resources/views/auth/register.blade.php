@extends('layouts.auth')
@section('title')
    <title>Register</title>
@endsection

@section('content')
<style>
body {
  background: url('/data_file/backregis1.png') no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  background-size: cover;
  -o-background-size: cover;
}

</style>
<div class="container">

    <div class="row justify-content-center">
    <div class="col-md-7">
            <div class="card-group" >
                <div class="card p-4"  style="border-radius:20px" >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h1>Register</h1>
                                <p class="text-muted">Make a new account</p>
                            </div>
                            <div class="col-md-6 text-right">
                                <img src="{{asset ('assets/img/ji capster putih.png') }}" width="150px" height="60px" alt="">
                            </div>
                        </div>
                       
                        <form  method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend " style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                    <span class="input-group-text" >
                                        <i class="icon-user"></i>
                                    </span>
                                </div>
                              
                                <input placeholder="Username" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus style=" border-color:#c4cdcf;" >
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"  style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                    <span class="input-group-text">
                                        <i class="icon-envelope"></i>
                                    </span>
                                </div>
                                <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  style=" border-color:#c4cdcf; ">
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend"  style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                    <span class="input-group-text">
                                        <i class="icon-lock"></i>
                                    </span>
                                </div>
                                <input  placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"  style=" border-color:#c4cdcf; " >
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend"  style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                    <span class="input-group-text">
                                        <i class="icon-lock"></i> 
                                    </span>
                                </div>
                                <input   placeholder="Konfirmasi Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"  style=" border-color:#c4cdcf; ">
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
                                    <button class="btn btn-primary px-4"  style="box-shadow: 3px 2px 5px grey;">{{ __('Register') }}</button>
                                </div>
                                <div class="col-6 text-right">
                                    @if (Route::has('register')) Already Have an Account? <a  href="{{ route('login') }}"> {{ __('Login') }}</a>
                                    @endif 
                                

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="col-md-6">
            <div class="card box"  style="border-radius:20px;  box-shadow: 10px 10px 10px black;">
                <div class="card-header pt-3 pb-2 bg-primary"  style="border-radius: 20px 20px 0px 0px"> <h4 class="card-title text-center" style="color:white;  font-weight:bold; font-size:30px">{{ __('Register') }} </h4></div>

                <div class="card-body">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right" style="font-size:16px; color:white; font-weight:bold;">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus style="color:white; background: transparent; border-radius:5px;  box-shadow: 3px 3px 5px white; border:none;" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="font-size:16px; color:white; font-weight:bold;">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" style="background: transparent; color:white;  border-radius:5px;  box-shadow: 3px 3px 5px white; border:none;">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right" style="font-size:16px; color:white; font-weight:bold;">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" style="background: transparent; color:white; border-radius:5px;  box-shadow: 3px 3px 5px white; border:none;">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right" style="font-size:16px; color:white; font-weight:bold;">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" style="background: transparent; border-radius:5px; color:white;  box-shadow: 3px 3px 5px white; border:none;">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->
    </div>
</div>
@endsection
