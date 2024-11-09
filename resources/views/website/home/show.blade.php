@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex" style="color:#f8b806e5;">
      <h2 class="m-auto">The Book</h2>
    </div>
    <div class="post mt-4 text-center">
        <div class="post-title"><h3>{{ $book->title }}</h3></div>
          <div class="post-details">
            <p class="post-info">
              <span style="font-size: 20px; color:rgb(80, 80, 80);">
                <i class="bi bi-pencil-square"></i> {{ $book->author?->name }}
              </span><br>
              <h5>{{ $book->description }}</h5><hr>
              <h5>
                <i class="bi bi-tags"></i>
                @foreach($book->categories as $category)
                {{ $category->name }}
                @endforeach
              </h5><hr>
              <span><span style="font-size:18px">Added  Date: </span>{{ $book->created_at }}</span><hr>
              <a href="{{ route('home.index') }}"><button class="btn btn-primary mt-2">Back</button></a>
            </p>
          </div>
      </div>
</div>
@endsection