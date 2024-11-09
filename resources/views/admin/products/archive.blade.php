@extends('admin.master')
@section('title')
    Archive Products
@endsection
@section('css')
@endsection
@section('title-page')
    Archive Products
@endsection
@section('path-name1')
<li class="breadcrumb-item "><a href="{{ route('products.index') }}"> Products</a></li>
@endsection
@section('path-name2')
<li class="breadcrumb-item active">Archive Products</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Categories</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>archived at</th>
                        <th>Restore</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($products as $product)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td><img src="{{Storage::url( $product->image)}}" alt="" class="img-thumbnall" style="max-width:90px"> </td>
                            <td>
                                @foreach($product->categories as $category)
                                {{ $category->name }}<br>
                                @endforeach
                            </td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->deleted_at }}</td>
                            <td>
                                <form action="{{ route('products.restore',$product) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-primary">Restore</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <!-- page script -->
    <script>
        $(function() {
            $("#example1").DataTable();
              $('#example2').DataTable({
              /*   "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,*/
              });
        });
    </script>
@endsection

{{-- @extends('layouts.admin')
@section('content')
<div class="container">
<div class="d-flex justify-content-between" style="color:#f8b806e5;">
    <div class="flex-container">
        <a class="btn btn-primary" href="{{ route('products.index') }}">Back</a>
    </div>
    <h2 class="m-auto">Archice The Products</h2>
</div>
<div class="col-12 fs-5 mt-3">
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Deleted Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 0;
            @endphp
            @foreach($products as $product)
            @php
            $i++;
            @endphp
            <tr>
                <td>{{ $i}}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->deleted_at }}</td>
                <td>
                    <form action="{{ route('products.restore',$product) }}" method="POST">
                        @csrf
                        <button class="btn btn-primary">Restore</button></a>
                    </form>
                </td>
                <td>
                    <form action="{{ route('products.forceDelete',$product->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endsection
 --}}
