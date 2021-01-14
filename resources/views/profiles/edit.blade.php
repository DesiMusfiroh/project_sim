@extends('layouts.admin')

@section('title')
    <title>Profil User Customer</title>
@endsection

@section('content')
<?php use App\Customer ; 
?>
<main class="main">
    <ol class="breadcrumb bg-dark">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Profil User</li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">


            <form action="/administrator/customer/update/{{ $customer->id }}" method="post" enctype="multipart/form-data" >
            @csrf
            @method('PATCH')
                <div class="row">
                    <div class="col-md-4">
                        <div class="card"  style="border-radius:20px;  box-shadow: 10px 10px 10px grey;">
                            <div class="card-header  pt-3 pb-2 bg-primary text-center"  style="border-radius: 0px 20px 0px 0px">
                                <h4 class="card-title">User Picture</h4>
                            </div>
                            <div class="card-body">                                
                                <div class="form-group">
                                    <label for="file_foto"> <b> Photo :  </b></label> <br>
                                    <input type="file" src="{{ asset('file_foto/' . $customer->photo) }}" name="photo" alt="{{ $customer->photo }}" value="$customer->photo">
                                </div>      
                                                           
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card"  style="border-radius:20px;  box-shadow: 10px 10px 10px grey;">
                            <div class="card-header  pt-3 pb-2 bg-primary text-center"  style="border-radius: 0px 20px 0px 0px">
                                <h4 class="card-title"> User Biodata </h4>
                            </div>
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif

                                <div class="container">
                                   
                                    
                                    <fieldset disabled>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="disabledTextInput"> <b> User Name </b> </label>
                                                <div class="input-group mb-0">
                                                <div class="input-group-prepend" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                                    <span class="input-group-text" id="basic-addon1"> <span class="fa fa-user"></span> </span>
                                                </div>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder="{{ Auth::user()->name }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="disabledTextInput"> <b> Email </b> </label>
                                                <div class="input-group mb-0">
                                                <div class="input-group-prepend" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                                    <span class="input-group-text" id="basic-addon1"> <span class="fa fa-envelope"></span> </span>
                                                </div>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder="{{ Auth::user()->email }}" readonly >
                                            </div>
                                            </div>  
                                        </div>                    
                                    </fieldset>

                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }} ">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nama_lengkap"> <b> Full Name  : </b> </label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{$customer->name}}" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nim"> <b> Phone Number  : </b> </label>
                                            <input type="text" class="form-control" id="phone" name="phone"  value="{{$customer->phone}}" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                        </div>
                                    </div>
                                    <input type="hidden" id="prody_id" name="prody_id" value="{{$customer->prody_id}}">
                   
                                    <div class="form-group mt-1">
                                        <label for="alamat"> <b> Alamat : </b> </label>
                                        <textarea class="form-control" id="address" rows="2" name="address" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;"> {{$customer->address}} </textarea>
                                    </div>

                                    <div class="text-right"> <button type="submit" class="btn btn-primary" style="box-shadow: 3px 2px 5px grey;"> Update </button> </div>
                   
                                </div>
                            
                            </div>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>
</main>
@endsection
