@extends('layouts.admin')

@section('title')
    <title>Edit Kategori</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb bg-dark">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Kategori</li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="border-radius:20px;  box-shadow: 10px 10px 10px grey;">
                        <div class="card-header bg-primary" style="border-radius: 0px 20px 0px 0px">
                            <h4 class="card-title">Edit Kategori</h4>
                        </div>
                        <div class="card-body">
                          	<!-- ROUTINGNYA MENGIRIMKAN ID CATEGORY YANG AKAN DIEDIT -->
                            <form action="{{ route('category.update', $category->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                 
                                <div class="form-group">
                                    <label for="name">Kategori</label>
                                    <input type="text" name="name" class="form-control" value="{{ $category->name }}" required  style="border-radius:10px; box-shadow: 3px 2px 5px grey;">
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="parent_id">Kategori</label>
                                    <select name="parent_id" class="form-control"  style="border-radius:10px; box-shadow: 3px 2px 5px grey;">
                                        <option value="">None</option>
                                        @foreach ($parent as $row)
                                      
                                      	<!-- TERDAPAT  OPERATOR UNTUK MENGECEK JIKA PARENT_ID SAMA DENGAN ID CATEGORY PADA LIST PARENT, MAKA OTOMATIS SELECTED -->
                                        <option value="{{ $row->id }}" {{ $category->parent_id == $row->id ? 'selected':'' }}>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group text-right mt-4 mb-1">
                                    <button class="btn btn-primary" style="box-shadow: 3px 2px 5px grey;">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection