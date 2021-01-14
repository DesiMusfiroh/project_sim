@extends('layouts.admin')

@section('title')
    <title>Profil Toko </title>
@endsection

@section('content')
<?php use App\Seller; 

         $seller = Seller::where('user_id', Auth::user()->id )->first(); 
       
?>
<main class="main">
    <ol class="breadcrumb bg-dark">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Profil Toko</li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">


            <form action="/administrator/seller/update/{{ $seller->id }}"  method="post" enctype="multipart/form-data" >
            @csrf
            @method('PATCH')
                <div class="row">
                
                    <div class="col-md-10">
                        <div class="card" style="border-radius:20px;  box-shadow: 10px 10px 10px grey;">
                            <div class="card-header  pt-3 pb-2 bg-primary text-center" style="border-radius: 0px 20px 0px 0px">
                                <h4 class="card-title"> Edit Profil Toko </h4>
                            </div>
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif

                                <div class="container">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }} ">
                                    <div class="form-row">
                                        <div class="form-group col-md-5 pr-2">
                                            <label for="nama_lengkap">Shop Name  : </label>
                                            <div class="input-group mb-0" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                                <div class="input-group-prepend" >
                                                    <span class="input-group-text" id="basic-addon1"> <div style="font-size:17px"><span class="fa fa-home"></span> </div></span>
                                                </div>
                                                <input type="text" class="form-control" id="shop_name" name="shop_name" value="{{$seller->shop_name}}" >
                                            </div>
                                            
                                        </div>
                                        <div class="form-group col-md-7 pl-3">
                                        <label for="alamat">Shop Description :</label>
                                        <textarea class="form-control" id="shop_desc" rows="4" name="shop_desc"  style="border-radius:10px;  box-shadow: 3px 3px 5px grey;"> {{$seller->shop_desc}}</textarea>
                                    </div>
                                    </div>                     
                   
                                    <div class="form-group mt-1">
                                        <label for="alamat">Location :</label>
                                        <div class="input-group mb-0" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                            <div class="input-group-prepend" >
                                                <span class="input-group-text" id="basic-addon1"> <div style="font-size:25px"><span class="fa fa-map-marker"></span> </div></span>
                                            </div>
                                            <textarea class="form-control" id="location" rows="2" name="location" > {{$seller->location}}</textarea>
                                        </div>
                                        
                                    </div>
        
                                    <div class="text-right"> <button type="submit" class="btn btn-primary"  style="box-shadow: 3px 2px 5px grey;">Save </button> </div> 
                   
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

