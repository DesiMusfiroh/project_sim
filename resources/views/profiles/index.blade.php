@extends('layouts.admin')

@section('title')
    <title>Profil User Customer</title>
@endsection

@section('content')
<?php  use App\Customer ; use App\Prody; use App\Faculty; use App\University;
    $customer = Customer::where('user_id', Auth::user()->id )->first(); 
?>
<main class="main">
    <ol class="breadcrumb bg-dark">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Profil User</li>
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">

        @if ( Customer::where('user_id', Auth::user()->id )->first() != null ) 
            <div class="row">
                <div class="col-md-4">
                    <div class="card"  style="border-radius:20px;  box-shadow: 10px 10px 10px grey;">
                        <div class="card-header pt-3 pb-2 bg-primary text-center" style="border-radius: 0px 20px 0px 0px">
                            <h4 class="card-title">User Picture</h4>
                        </div>
                        <div class="card-body text-center">                                
                            <div class="form-group">
                                <img src="/data_file/{{$customer->photo}}" class="img-fluid mx-auto  ">
                            </div>                         
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card"  style="border-radius:20px;  box-shadow: 10px 10px 10px grey;">
                        <div class="card-header pt-3 pb-2 bg-primary text-center" style="border-radius: 0px 20px 0px 0px">
                            <h4 class="card-title"> User Biodata </h4>
                        </div>
                        <div class="card-body" >
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif

                            <div class="container">
                             
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="disabledTextInput"> <b> User Name : </b> </label>
                                            <div class="input-group mb-1">
                                                <div class="input-group-prepend" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                                    <span class="input-group-text" id="basic-addon1"> <span class="fa fa-user"></span> </span>
                                                </div>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder="{{ Auth::user()->name }}" readonly>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="disabledTextInput"> <b> Email : </b></label>
                                            <div class="input-group mb-1">
                                                <div class="input-group-prepend" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                                    <span class="input-group-text" id="basic-addon1"> <span class="fa fa-envelope"></span> </span>
                                                </div>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder="{{ Auth::user()->email }}" readonly >
                                            </div>
                                            
                                        </div>  
                                    </div>                    
                             
                                    <table class="table table-hover table-sm">
                                        <tr>
                                            <td col><b> Full Name </b> </td>
                                            <td> : </td>
                                            <td>{{ $customer->name}}</td>
                                        </tr>
                                        <tr>
                                            <td col><b> Phone Number </b> </td>
                                            <td> : </td>
                                            <td>{{ $customer->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td col><b> Program Studi </b> </td>
                                            <td> : </td>
                                            <td> <?php $prody = Prody::where('id', $customer->prody_id)->value('name'); ?>  {{ $prody }}</td>
                                        </tr>
                                        <tr>
                                            <td col><b> Fakultas </b> </td>
                                            <td> : </td>
                                            <td> <?php $faculty_id = Prody::where('id', $customer->prody_id)->value('faculty_id'); $faculty = Faculty::where('id',$faculty_id)->value('name') ?>  {{ $faculty }}</td>
                                        </tr>
                                        <tr>
                                            <td col><b> Address </b> </td>
                                            <td> : </td>
                                            <td>{{ $customer->address }}</td>
                                        </tr>

                                    </table>
                               
                   
                            </div>
                        </div>
          
                        <div class="card-footer" style="border-radius: 0px 0px 20px 20px ">
                            <div class="row justify-content-center">
                                <a href="customer/edit/{{$customer->id}}"><button class="btn btn-primary"  style="box-shadow: 3px 2px 5px grey;"> Edit Biodata </button></a>
                            </div>	
                        </div>
                    
                    </div>
                </div>
            </div>

            </div>
        @else

            <form action="customer/store" method="post" enctype="multipart/form-data" >
            @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="card"  style="border-radius:20px;  box-shadow: 10px 10px 5px grey;">
                            <div class="card-header  pt-3 pb-2 bg-primary text-center"  style="border-radius: 0px 20px 0px 0px">
                                <h4 class="card-title">User Picture</h4>
                            </div>
                            <div class="card-body">                                
                                <div class="form-group">
                                    <label for="file_foto"> <b> Photo : </b> </label>
                                    <input type="file" name="photo" >
                                </div>      
                                                           
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card"  style="border-radius:20px;  box-shadow: 10px 10px 5px grey;">
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
                                    
                                        <div class="form-row ">
                                            <div class="form-group col-md-6">
                                                <label for="disabledTextInput"><b> User Name </b> </label>
                                                <div class="input-group mb-0">
                                                <div class="input-group-prepend" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                                    <span class="input-group-text" id="basic-addon1"> <span class="fa fa-user"></span> </span>
                                                </div>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder="{{ Auth::user()->name }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="disabledTextInput"><b> Email </b></label>
                                                <div class="input-group mb-0">
                                                <div class="input-group-prepend" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                                    <span class="input-group-text" id="basic-addon1"> <span class="fa fa-envelope"></span> </span>
                                                </div>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder="{{ Auth::user()->email }}" readonly >
                                                </div>
                                            </div> 
                                        </div>                    
                                    
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }} ">
                                    <div class="form-row mb-0 mt-0 pt-0">
                                        <div class="form-group col-md-6">
                                            <label for="nama_lengkap"><b> Full Name  : </b></label>
                                            <input type="text" class="form-control" id="name" name="name" style="border-radius:10px;  box-shadow: 3px 0px 5px grey;">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nim"> <b> Phone Number  : </b> </label>
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="+62 ..." style="border-radius:10px; box-shadow: 3px 0px 5px grey;">
                                        </div>
                                    </div>
                          
                                    <div class="form-row mb-0">
                                        <div class="form-group col-md-2  text-right">
                                            <label for=""> <b> Universitas : </b> </label>
                                        </div>
                                        <div class="form-group col-md-10 ">                                           
                                            <select class="form-control" name="university_id" id="university_id" required style="border-radius:10px; box-shadow: 3px 2px 5px grey;">
                                                <option value="">Pilih Universitas</option>
                                                @foreach ($universities as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="text-danger">{{ $errors->first('university_id') }}</div>
                                        </div>
                                    </div>

                                    <div class="form-row mb-0">
                                        <div class="form-group col-md-2  text-right">
                                            <label for=""> <b> Fakultas : </b> </label>
                                        </div>
                                        <div class="form-group col-md-10">                                           
                                            <select class="form-control" name="faculty_id" id="faculty_id" required style="border-radius:10px;  box-shadow: 3px 2px 5px grey;">
                                                    <option value="">Pilih Fakultas</option>
                                            </select>
                                            <div class="text-danger">{{ $errors->first('faculty_id') }}</div>
                                        </div>
                                    </div>
                                    <div class="form-row  mb-0">
                                        <div class="form-group col-md-2 text-right">
                                            <label for=""> <b> Prodi : </b> </label>
                                        </div>
                                        <div class="form-group col-md-10">                                           
                                            <select class="form-control" name="prody_id" id="prody_id" required style="border-radius:10px;  box-shadow: 3px 2px 5px grey;">
                                                <option value="">Pilih Prodi</option>
                                            </select>
                                            <div class="text-danger">{{ $errors->first('prody_id') }}</div>
                                        </div>
                                    </div>
                   
                                    <div class="form-group mt-0 text-center ">
                                        <label for="alamat"><b> Alamat : </b> </label>
                                        <textarea class="form-control" id="address" rows="2" name="address" style="border-radius:10px;  box-shadow: 2px 1px 3px grey;"> </textarea>
                                    </div>
                                    <div class="mb-0"> <b>Nb : </b> Data Universitas, Fakultas, dan Prodi yang dimasukkan bersifat permanen</div>
                                    <div class="text-right" > <button type="submit" class="btn btn-primary" style="box-shadow: 3px 2px 5px grey;">Save </button> </div> 
                   
                                </div>
                            
                            </div>
                        </div>
                    </div>

                </div>
            </form>

        @endif
        </div>
    </div>

<!-- <input type="text" id="disabledTextInput" class="form-control" placeholder="Perempuan">-->

</main>
@endsection


@section('js')
    <script>
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
    </script>
@endsection
                               
                                
