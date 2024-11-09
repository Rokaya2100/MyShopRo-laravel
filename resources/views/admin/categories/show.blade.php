@extends('admin.master')
@section('title')
Show Category
@endsection

@section('title-page')
Show Category
@endsection

@section('path-name1')
<li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
@endsection

@section('path-name2')
<li class="breadcrumb-item active">Show Category</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
        <div class="inputField">
        <div class="form-group">
            <h6>Category Name:</h6>
            <input disabled type="text" class="form-control" name="name" value="{{ $category->name }}">
        </div>
        <div class="form-group mt-2">
            <h6>Category Description:</h6>
            <input disabled type="text" class="form-control" name="description" value="{{ $category->description }}">
        </div>
        <div class="form-group mt-2">
            <h6>Created at:</h6>
            <input disabled type="text" class="form-control" name="description" value="{{ $category->created_at }}">
        </div>
        <div class="form-group mt-2">
            <h6>Updated at:</h6>
            <input disabled type="text" class="form-control" name="description" value="{{ $category->updated_at }}">
        </div>
        <div class="d-flex justify-content-start mt-2">
            <a href="{{ route('categories.edit',$category->id) }}"><button class="btn btn-primary mr-2">Edit</button></a>
            <form action="{{ route('categories.destroy',$category->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" style="color: white; margin=0;" name="Archive">Delete</button>
           </form>
        </div>
        </div>
    </div>
</div>
@endsection

