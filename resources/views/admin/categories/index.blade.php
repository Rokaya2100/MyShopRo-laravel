@extends('admin.master')
@section('title')
    Categories
@endsection

@section('title-page')
    Categories
@endsection

@section('path-name1')
<li class="breadcrumb-item active"><a href="{{ route('categories.index') }}">Categories</a></li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header" style="color:#f8b806e5;">
            <a href="{{ route('categories.create') }}"><button class="btn btn-primary">Add Category</button></a>
        </div>
        <div class="card-body">
            <div class="mb-3 mr-0">
                <form action="{{ route('category.search') }}" method="get" class="d-flex">
                    @csrf
                    <input class="form-control me-3" name="search" style="width: 520px;" type="search" aria-label="Search" placeholder="Search for Category you want">
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
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($categories as $category)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>
                                <a href="{{ route('categories.show', $category->id) }}"><button class="btn btn-success">Show</button></a>
                            </td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}"><button class="btn btn-primary">Edit</button></a>
                            </td>
                            <td>
                                <form action="{{ route('categories.destroy',$category->id) }}" method="post">
                                     @csrf
                                     @method('DELETE')
                                     <button type="submit" class="btn btn-danger" style="color: white; margin=0;" name="Archive">Delete</button>
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
