@extends('layouts.admin')

@section('title')
    <title>List Product</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb bg-dark">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Product</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="border-radius:20px;  box-shadow: 10px 10px 10px grey;">
                        <div class="card-header pt-3 pb-2 bg-primary" style="border-radius: 0px 20px 0px 0px">
                            <h4 class="card-title text-center">
                                List Product
                            </h4>
                        </div>
                        <div class="card-body">
                            
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                        
                            <form action="{{ route('product.index') }}" method="get">
                                <div class="input-group mb-3 col-md-3 float-right" >
                                    <!-- Q YANG AKAN MENAMPUNG DATA PENCARIAN -->
                                    <input type="text" name="q" class="form-control" placeholder="Cari..." value="{{ request()->q }}">
                                    <div class="input-group-append" style="border-radius:10px;  box-shadow: 3px 2px 5px grey;">
                                        <button class="btn btn-secondary" type="button" >Cari</button>
                                    </div>
                                </div>
                            </form>

                            <!-- TOMBOL UNTUK MENGARAHKAN KE HALAMAN ADD PRODUK -->
                            <a href="{{ route('product.create') }}" class="btn btn-primary float-right" style="box-shadow: 3px 2px 5px grey;">Tambah</a>
                          
                            <!-- TABLE UNTUK MENAMPILKAN DATA PRODUK -->
                            <div class="table-responsive container">
                                <table class="table table-hover table-bordered" style=" box-shadow: 3px 2px 5px grey;">
                                    <thead class="thead thead-dark bg-secondary">
                                        <tr class="text-center">
                                            <th>Image</th>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Berat</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- LOOPING DATA TERSEBUT MENGGUNAKAN FORELSE -->
                                       
                                        @forelse ($product as $row)
                                        <tr>
                                            <td width="160px">
                                                <!-- MENAMPILKAN GAMBAR DARI FOLDER PUBLIC/STORAGE/PRODUCTS -->
                                                <img src="{{ asset('storage/products/' . $row->image) }}" width="150px" height="100px" alt="{{ $row->name }}" >
                                            </td>
                                            <td>
                                                <p><strong>{{ $row->name }}</strong></p>
                                                <!--  NAMA KATEGORINYA DIAMBIL DARI HASIL RELASI PRODUK DAN KATEGORI -->
                                                <label>Kategori : <span class="badge badge-info">{{ $row->category->name }}</span></label><br>
                                                <label>Berat : <span class="badge badge-info">{{ $row->weight }} gr</span></label>
                                            </td>
                                            <td class="text-center">Rp {{ number_format($row->price) }}</td>
                                            <td class="text-center"> {{ $row->weight }} gr</td>
                                            <td class="text-center">{{ $row->created_at->format('d-m-Y') }}</td>
                                            
                                            <!-- KARENA BERISI HTML MAKA DIGUNAKAN { !! UNTUK MENCETAK DATA -->
                                            <td width="100px" class="text-center">{!! $row->status_label !!}</td>
                                            <td width="125px" class="text-center">
                                                <!-- FORM UNTUK MENGHAPUS DATA PRODUK -->
                                                <form action="{{ route('product.destroy', $row->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('product.edit', $row->id) }}" class="btn btn-warning btn-sm" style="box-shadow: 3px 2px 5px grey;">Edit</a>
                                                    <button class="btn btn-danger btn-sm" style="box-shadow: 3px 2px 5px grey;">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                      
                            {!! $product->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
