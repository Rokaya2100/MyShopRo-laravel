@extends('admin.master')
@section('title')
Add New Product
@endsection
@section('css')
@endsection
@section('title-page')
Add New Product
@endsection
@section('path-name1')
<li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
@endsection
@section('path-name2')
<li class="breadcrumb-item active">Create New Product</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('error'))
                <div class="bg-danger">{{ session('error')}}</div>
            @endif
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="inputField">
            <div class="form-group mt-2">
                <h6>Name:</h6>
                <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-2">
                <h6>Description:</h6>
                <input type="text" class="form-control" placeholder="Enter Description" name="description" value="{{ old('description') }}" class="@error('description') is-invalid @enderror">
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-2">
                <h6>Image:</h6>
                <input type="file" class="form-control" name="image" value="{{ old('image') }}" class="@error('image') is-invalid @enderror">
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div  class="form-group mt-2">
                <h6>Categories:</h6>
                @foreach($categories as $category)
                <div class="form-check">
                <input class="form-check-input" name="categories_ids[]" value="{{ $category->id }}" type="checkbox" id="check">
                <label class="form-check-label" for="check">{{ $category->name }}</label>
                </div>
                @endforeach
            </div>
            <div class="form-group mt-2">
                <h6>Price:</h6>
                <input type="text" class="form-control" placeholder="Enter Price" name="price" value="{{ old('price') }}" class="@error('price') is-invalid @enderror">
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-2">
                <h6>Stock:</h6>
                <input type="number" class="form-control" placeholder="Enter Stock" name="stock" value="{{ old('stock') }}" class="@error('stock') is-invalid @enderror">
                @error('stock')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-start mt-2">
                <button href="{{ route('products.index') }}" type="submit" name="add" class="btn btn-warning btn-lg">Add Product</button>
            </div>
            </div>
        </form>
    </div>
    </div>
@endsection

@section('js')

@endsection

