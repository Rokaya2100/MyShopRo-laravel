@extends('admin.master')
@section('title')
Dashboard
@endsection

@section('css')

@endsection

@section('title-page')
    Dashboard
@endsection

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$orders->count()}}</h3>

                  <p>New Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('orders.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ $categories->count()}}</h3>

                  <p>Total Number of Categories</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{route('categories.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{ $users->count()-1}}</h3>

                  <p>Total Number of Customers</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('users.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{ $products->count()}}</h3>
                  <p>Total Number of Products</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{route('products.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
    </section>
{{-- <div class="row ml-5">
    <div class="card col-5 ml-4 m-2">
        <div class="card-body">
            <h4 style="color: f8b806e5;"><i class="bi bi-currency-dollar"></i> Total Number of Orders:</h4>
            <h2 class="card-title m-auto" style="color: black; font-size:30px">{{ $orders->count()}}</h2>
        </div>
        <div class="card-body" style="background-color: rgb(41, 41, 41); font-size:25px; ">
            <a href="{{ route('orders.index')}}" class="m-auto" style="color: #f8b806e5">The Orders</a>
        </div>
    </div>

    <div class="card col-5 ml-5 m-2">
        <div class="card-body">
            <h4 style="color: f8b806e5;"><i class="bi bi-currency-dollar"></i> Total Number of Categories:</h4>
            <h2 class="card-title m-auto" style="color: black; font-size:30px">{{ $categories->count()}}</h2>
        </div>
        <div class="card-body" style="background-color: rgb(41, 41, 41); font-size:25px; ">
            <a href="{{ route('categories.index')}}" class="m-auto" style="color: #f8b806e5">The Categories</a>
        </div>
    </div>
</div>
<div class="row ml-5">
    <div class="card col-5 ml-4 m-2">
        <div class="card-body">
            <h4 style="color: f8b806e5;"><i class="bi bi-currency-dollar"></i> Total Number of Products:</h4>
            <h2 class="card-title m-auto" style="color: black; font-size:30px">{{ $products->count()}}</h2>
        </div>
        <div class="card-body" style="background-color: rgb(41, 41, 41); font-size:25px; ">
            <a href="{{ route('products.index')}}" class="m-auto" style="color: #f8b806e5">The Products</a>
        </div>
    </div>

    <div class="card col-5 ml-5 m-2">
        <div class="card-body">
            <h4 style="color: f8b806e5;"><i class="bi bi-currency-dollar"></i> Total Number of Customers:</h4>
            <h2 class="card-title m-auto" style="color: black; font-size:30px">{{ $users->count()-1}}</h2>
        </div>
        <div class="card-body" style="background-color: rgb(41, 41, 41); font-size:25px; ">
            <a href="{{ route('users.index')}}" class="m-auto" style="color: #f8b806e5">The Customers</a>
        </div>
    </div>
</div> --}}
@endsection

@section('js')

@endsection
