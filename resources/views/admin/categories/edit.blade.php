@extends('admin.master')
@section('title')
    Update Category
@endsection

@section('title-page')
    Update Category
@endsection

@section('path-name1')
    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
@endsection

@section('path-name2')
    <li class="breadcrumb-item active">Update Category</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.update', $category->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="inputField">
                    <div class="form-group mt-2">
                        <h6>Category Name:</h6>
                        <input type="text" class="form-control" name="name" value="{{ $category->name }}"
                            class="@error('name') is-invalid @enderror">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <h6>Category Description:</h6>
                        <input type="text" class="form-control" name="description" value="{{ $category->description }}"
                            class="@error('description') is-invalid @enderror">
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-start mt-4">
                        <button href="{{ route('categories.index') }}" type="submit" name="add"
                            class="btn btn-warning btn-lg">Update Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
