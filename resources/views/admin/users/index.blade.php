@extends('admin.master')
@section('title')
    Users
@endsection
@section('css')
@endsection
@section('title-page')
    Users
@endsection
@section('path-name1')
<li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Users</a></li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header" style="color:#f8b806e5;">
        </div>
        <div class="card-body">
            <div class="mb-3 mr-0">
                <form action="{{ route('user.search') }}" method="get" class="d-flex">
                    @csrf
                    <input class="form-control me-3" name="search" style="width: 520px;" type="search" aria-label="Search" placeholder="Search for User you want">
                        <button class="btn btn-warning me-5 mt-1" style="font-weight: 600;" value="search" type="submit">Search</button>
                </form>
            </div>
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Orders</th>
                    <th>Register Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach($users as $user)
                @if($user->is_admin == 0)
                @php
                    $i++;
                @endphp
                <tr>
                    <td>{{ $i}}</td>
                    <td>{{ $user->fname }}</td>
                    <td>{{ $user->lname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->city }}</td>
                    <td>
                        @if($user->orders())
                            @foreach($user->orders as $order)
                                order {{ $order->id }}<br>
                            @endforeach
                        @else no orders @endif
                    </td>
                    <td>{{$user->created_at}}</td>
                    <td>
                        @include('admin.includes.delete_modal_user',['type'=>'users','data'=>$user])
                    </td>
                </tr>
                @endif
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
              $('#example1').DataTable({
                 "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
              });
        });
    </script>
@endsection
