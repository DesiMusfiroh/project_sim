@extends('layouts.admin')

@section('title')
    <title>Edit Produk</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb bg-dark">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Product</li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
          
          	
            <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data" >
                @csrf
   
                @method('PUT')

              
                <div class="row">
                    <div class="col-md-8">
                        <div class="card" style="border-radius:20px;  box-shadow: 5px 5px 10px grey;">
                            <div class="card-header bg-primary" style="border-radius: 0px 20px 0px 0px">
                                <h4 class="card-title">Edit Produk</h4>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="seller_id" id="seller_id" value="{{Auth::user()->sellers->id}}">

                                <div class="form-group">
                                    <label for="name"> <b> Nama Produk </b> </label>
                                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" required style="border-radius:10px; box-shadow: 3px 1px 5px grey;">
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="description"> <b> Deskripsi </b> </label>
                                    <textarea name="description" id="description" class="form-control" style="border-radius:10px; box-shadow: 3px 1px 5px grey;">{{ $product->description }}</textarea>
                                    <p class="text-danger">{{ $errors->first('description') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card"  style="border-radius:20px;  box-shadow: 5px 5px 10px grey;">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="status"> <b> Status</label>
                                    <select name="status" class="form-control" required  style="border-radius:10px; box-shadow: 3px 1px 5px grey;">
                                        <option value="1" {{ $product->status == '1' ? 'selected':'' }}>Publish</option>
                                        <option value="0" {{ $product->status == '0' ? 'selected':'' }}>Draft</option>
                                    </select>
                                    <p class="text-danger">{{ $errors->first('status') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="category_id"> <b> Kategori </b> </label>
                                    <select name="category_id" class="form-control" style="border-radius:10px; box-shadow: 3px 1px 5px grey;">
                                        <option value="">Pilih</option>
                                        @foreach ($category as $row)
                                        <option value="{{ $row->id }}" {{ $product->category_id == $row->id ? 'selected':'' }}>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('category_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="price"> <b> Harga </b> </label>
                                    <input type="number" name="price" class="form-control" value="{{ $product->price }}" required style="border-radius:10px; box-shadow: 3px 1px 5px grey;">
                                    <p class="text-danger">{{ $errors->first('price') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="weight"> <b> Berat </b> </label>
                                    <input type="number" name="weight" class="form-control" value="{{ $product->weight }}" required style="border-radius:10px; box-shadow: 3px 1px 5px grey;">
                                    <p class="text-danger">{{ $errors->first('weight') }}</p>
                                </div>
                                <hr>
                              	<!-- GAMBAR TIDAK LAGI WAJIB, JIKA DIISI MAKA GAMBAR AKAN DIGANTI, JIKA DIBIARKAN KOSONG MAKA GAMBAR TIDAK AKAN DIUPDATE -->
                                <div class="form-group text-center">
                                    <label for="image"> <b> Foto Produk  </b> </label>
                                    <br>
                                  	<!--  TAMPILKAN GAMBAR SAAT INI -->
                                    <img src="{{ asset('storage/products/' . $product->image) }}" width="100px" height="100px" alt="{{ $product->name }}">
                                    <br> <br>
                                    <input type="file" name="image" class="form-control">
                                    <div class="text-left"> <b>Nb : </b> Biarkan kosong jika tidak ingin mengganti gambar</div>
                                    <p class="text-danger">{{ $errors->first('image') }}</p>
                                </div>
                                <div class="form-group text-right">
                                    <button class="btn btn-primary " style="box-shadow: 3px 2px 5px grey;">Update</button>
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

@section('js')
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection