@extends('admin.master')
@section('title')
    Products
@endsection
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
@endsection
@section('title-page')
    Products
@endsection
@section('path-name1')
<li class="breadcrumb-item active"><a href="{{ route('products.index') }}">Products</a></li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header" style="color:#f8b806e5;">
            <a href="{{ route('products.create') }}"><button class="btn btn-primary">Add Product</button></a>
            <a href="{{ route('products.archive') }}"><button class="btn btn-warning"  style="color: white">Archive Products</button></a>
        </div>
        <div class="card-body">
            <div class="mb-3 mr-0">
                <form action="{{ route('product.search') }}" method="get" class="d-flex">
                    @csrf
                    <input class="form-control me-3" name="search" style="width: 520px;" type="search" aria-label="Search" placeholder="Search for Product you want">
                        <button class="btn btn-warning me-5 mt-1" style="font-weight: 600;" value="search" type="submit">Search</button>
                </form>
            </div>
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <table id="#example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Categories</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Cretaed at</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
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
                            <td>{{ $product->created_at }}</td>
                            <td>
                                <a href="{{ route('products.show', $product->id) }}"><button class="btn btn-success">Show</button></a>
                            </td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}"><button class="btn btn-primary">Edit</button></a>
                            </td>
                            <td>
                               <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning" style="color: white; margin=0;" name="Archive">Archive</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('products.forcedelete',$product->id) }}" method="get">
                                     @csrf
                                     <button type="submit" class="btn btn-danger" style="color: white; margin=0;">Delete</button>
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
    {{-- <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <!-- page script -->
    <script>
        $(function() {
            $("#example1").DataTable();
              $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
              });
        });
    </script> --}}
@endsection
