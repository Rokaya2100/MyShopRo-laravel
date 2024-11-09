@extends('admin.master')
@section('title')
    Add New Category
@endsection

@section('title-page')
    Add New Category
@endsection

@section('path-name1')
    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
@endsection

@section('path-name2')
    <li class="breadcrumb-item active">Create New Category</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="post">
                @csrf
                <div class="inputField">
                    <div class="form-group mt-2">
                        <h6>Category Name:</h6>
                        <input type="text" class="form-control" placeholder="Enter Name" name="name"
                            value="{{ old('name') }}" class="@error('name') is-invalid @enderror">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <h6>Category Description:</h6>
                        <input type="text" class="form-control" name="description" value="{{ old('description') }}"
                            class="@error('description') is-invalid @enderror">
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-start mt-4">
                        <button href="{{ route('categories.index') }}" type="submit" name="add"
                            class="btn btn-warning btn-lg">Add Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

