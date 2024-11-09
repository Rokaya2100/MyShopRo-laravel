@extends('admin.master')
@section('title')
Show Products
@endsection
@section('css')
@endsection
@section('title-page')
Show Products
@endsection
@section('path-name1')
<li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
@endsection
@section('path-name2')
<li class="breadcrumb-item active">Show Product</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
        <div class="inputField">
        <div class="form-group">
            <h6>Name:</h6>
            <input disabled class="form-control" name="name" value="{{ $product->name }}">
        </div>
        <div class="form-group mt-2">
            <h6>Description:</h6>
            <input disabled class="form-control" name="description" value="{{ $product->description }}">
        </div>
        <div class="form-group mt-2">
            <h6>Image:</h6>
            <img src="{{Storage::url( $product->image)}}" alt="" class="img-thumbnall" style="max-width:130px">
        </div>
        <div class="form-group mt-2">
            <h6>Categories:</h6>
            @foreach($product->categories as $category)
                {{ $category->name }}<br>
            @endforeach
        </div>
        <div class="form-group mt-2">
            <h6>Price:</h6>
            <input disabled class="form-control" name="price" value="{{ $product->price }}">
        </div>
        <div class="form-group mt-2">
            <h6>Stock:</h6>
            <input disabled class="form-control" name="stock" value="{{ $product->stock }}">
        </div>
        <div class="form-group mt-2">
            <h6>Created at:</h6>
            <input disabled class="form-control" name="description" value="{{ $product->created_at }}">
        </div>
        <div class="form-group mt-2">
            <h6>Updated at:</h6>
            <input disabled class="form-control" name="description" value="{{ $product->updated_at }}">
        </div>
        <div class="d-flex justify-content-start mt-2">
            <a href="{{ route('products.edit',$product->id) }}"><button class="btn btn-primary mr-2">Edit</button></a>
            <form action="{{ route('products.forcedelete',$product->id) }}" method="get">
                @csrf
                <button type="submit" class="btn btn-danger" style="color: white; margin=0;">Delete</button>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
