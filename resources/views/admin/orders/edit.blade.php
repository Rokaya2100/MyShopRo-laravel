@extends('admin.master')
@section('title')
    Update Status Order
@endsection

@section('title-page')
    Update Status Order
@endsection

@section('path-name1')
    <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Orders</a></li>
@endsection

@section('path-name2')
    <li class="breadcrumb-item">Update Status Order</li>
@endsection

@section('path-name3')
    <li class="breadcrumb-item">Order {{ $order->id }}</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('error'))
                <div class="bg-danger">{{ session('error') }}</div>
            @endif
            <form action="{{ route('orders.update', $order->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="inputField">
                    <div class="form-group">
                        <h6>Customer Name:</h6>
                        <input type="text" disabled class="form-control"
                            value="{{ $order->user?->fname }} {{ $order->user?->lname }}">
                    </div>
                    <div class="form-group mt-2">
                        <h6>Product Name:</h6>
                        <input type="text" disabled class="form-control" value="{{ $order->product?->name }}">
                    </div>
                    <div class="form-group mt-2">
                        <h6>Order Date:</h6>
                        <input type="text" disabled class="form-control" value="{{ $order->careted_at }}">
                    </div>
                    <div class="form-group mt-2">
                        <h6>Price:</h6>
                        <input type="text" disabled class="form-control" value="{{ $order->product?->price }}">
                    </div>
                    <div class="mt-2">
                        <h6>Choose a Status:</h6>
                        <select name="status" class="form-control">
                            @foreach (app\Models\Order::getStatus() as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex justify-content-start mt-2">
                        <button href="{{ route('orders.index') }}" type="submit" name="add"
                            class="btn btn-warning btn-lg">Update status order</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
