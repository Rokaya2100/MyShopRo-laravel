@extends('admin.master')
@section('title')
    Orders
@endsection
@section('css')
@endsection
@section('title-page')
    List Of Orders
@endsection
@section('path-name1')
    <li class="breadcrumb-item active"><a href="{{ route('orders.index') }}">Orders</a></li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header" style="color:#f8b806e5;">
        </div>
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
                        <th>Customer</th>
                        <th>Product</th>
                        <th>Order Date</th>
                        <th>price</th>
                        <th>status</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($orders as $order)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $order->user?->fname }}</td>
                            <td>{{ $order->product?->name }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->product?->price }} </td>
                            <td>{{ $order->status }}</td>
                            <td>
                                <a href="{{ route('orders.edit', $order->id) }}"><button class="btn btn-primary">Edit
                                        Status</button></a>
                            </td>
                            <td>
                                <form action="{{ route('orders.destroy', $order->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="color: white; margin=0;"
                                        name="Archive">Delete</button>
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
