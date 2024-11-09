@extends('website.layouts.app')
@section('content')

<div class="container">
    @if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    <div class="d-flex justify-content-start">
    <form action="{{ route('home.index') }}" method="get">
        <button href="" type="submit" name="" class="btn btn-warning active me-2">All Products</button>
    </form>
    @foreach($categories as $category)
    <form action="{{ route('home.category',$category) }}" method="get">
        <button href="" type="submit" name="" class="btn btn-outline-warning me-2">{{ $category->name }}</button>
    </form>
    @endforeach
</div>
<div class="container text-center mt-4">
    <div class="row row-cols-2">
        @foreach($products as $product)
          <div class="card col-4 m-2" style="width: 252px;">
            <div class="card-body">
                <img class="card-img-top m-auto" src="{{Storage::url( $product->image)}}" alt="" class="img-thumbnall"  style="max-width: 200px; height:200px" alt="Card image cap"><hr>
                <h3 class="card-title" style="color: #f8b806e5">{{ $product->name  }}</h3>
              <p class="card-text">{{ $product->description }}</p>
              <h5 style="color: #f8b806e5;"><i class="bi bi-currency-dollar"></i>
                {{ $product->price }}</h5>

            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <i class="bi bi-tags"></i>
                 @foreach($product->categories as $category)
                {{ $category->name }}<br>
                @endforeach
            </li>
            </ul>
            <div class="card-body">
              <a href="{{ route('home.show',$product->id) }}" class="btn btn-outline-warning">Add to cart</a>
            </div>
          </div>
          @endforeach
    </div>
</div>
</div>
@endsection
