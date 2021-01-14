
@extends('layouts.admin')

@section('title')
    <title>List Kategori</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb bg-dark">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Kategori</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
              	
              	<!-- BAGIAN INI AKAN MENG-HANDLE FORM INPUT NEW CATEGORY  -->
                <div class="col-md-4">
                    <div class="card" style="border-radius:20px;  box-shadow: 10px 10px 10px grey;">
                        <div class="card-header  pb-2 pt-3 bg-primary"  style="border-radius: 0px 20px 0px 0px">
                            <h4 class="card-title">Kategori Baru</h4>
                        </div>
                        <form action="{{ route('category.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            
                            <div class="form-group">
                                <label for="name"><b> Kategori </b></label>
                                <input type="text" name="name" class="form-control" required style="border-radius:10px; box-shadow: 3px 2px 5px grey;">
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="parent_id"><b> Parent </b></label>
                                
                                <select name="parent_id" class="form-control" style="border-radius:10px; box-shadow: 3px 2px 5px grey;">
                                    <option value="">None</option>
                                    @foreach ($parent as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </div>
                           
                        </div>
                        <div class="card-footer text-right"  style="border-radius: 0px 0px 20px 20px ">
                            <div class="form-group mb-1">
                                <button class="btn btn-primary"  style="box-shadow: 3px 2px 5px grey;">Tambah</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- BAGIAN INI AKAN MENG-HANDLE FORM INPUT NEW CATEGORY  -->
              
                <!-- BAGIAN INI AKAN MENG-HANDLE TABLE LIST CATEGORY  -->
                <div class="col-md-8">
                    <div class="card"  style="border-radius:20px;  box-shadow: 10px 10px 10px grey;">
                        <div class="card-header pb-2 pt-3 bg-primary" style="border-radius: 0px 20px 0px 0px">
                            <h4 class="card-title" >List Kategori</h4>
                        </div>
                        <div class="card-body">
                          	<!-- KETIKA ADA SESSION SUCCESS  -->
                            @if (session('success'))
                              <!-- MAKA TAMPILKAN ALERT SUCCESS -->
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <!-- KETIKA ADA SESSION ERROR  -->
                            @if (session('error'))
                              <!-- MAKA TAMPILKAN ALERT DANGER -->
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <div class="container">
                                <table class="table table-hover table-bordered "  style=" box-shadow: 3px 2px 5px grey;">
                                    <thead class="thead thead-dark">
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Kategori</th>
                                            <th>Parent</th>
                                            <th>Created At</th>
                                            <th width="150px" >Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=0; ?>                                                 
                                      	<!-- LOOPING DATA KATEGORI SESUAI JUMLAH DATA YANG ADA DI VARIABLE $CATEGORY -->
                                        @forelse ($category as $val)
                                        <tr class="text-center">
                                            <td class="text-center"><?php  $no++;  echo $no; ?></td>
                                            <td><strong>{{ $val->name }}</strong></td>
                                          
                                          	<!-- MENGGUNAKAN  OPERATOR, UNTUK MENGECEK, JIKA $val->parent ADA MAKA TAMPILKAN NAMA PARENTNYA, SELAIN ITU MAKA TANMPILKAN STRING - -->
                                            <td>{{ $val->parent ? $val->parent->name:'-' }}</td>
                                          
                                            <!-- FORMAT TANGGAL KETIKA KATEGORI DIINPUT SESUAI FORMAT INDONESIA -->
                                            <td>{{ $val->created_at->format('d-m-Y') }}</td>
                                            <td>
                                              
                                                <!-- FORM ACTION UNTUK METHOD DELETE -->
                                                <form action="{{ route('category.destroy', $val->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('category.edit', $val->id) }}" class="btn btn-warning btn-sm"  style="box-shadow: 3px 2px 5px grey;">Edit</a>
                                                    <button class="btn btn-danger btn-sm"  style="box-shadow: 3px 2px 5px grey;">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <!-- JIKA DATA CATEGORY KOSONG, MAKA AKAN DIRENDER KOLOM DIBAWAH INI  -->
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                           
                            {!! $category->links() !!}
                        </div>
                    </div>
                </div>
                <!-- BAGIAN INI AKAN MENG-HANDLE TABLE LIST CATEGORY  -->
            </div>
        </div>
    </div>
</main>
@endsection