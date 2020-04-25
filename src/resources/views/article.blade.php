@extends('layouts.layout_2')
@section('title')
  {{ $blog->title }}
@endsection
@section('content')
  <div class="container blog">
    <div class="row">
      <p>{{ $blog->updated_at->format('M-d-Y') }}</p>
      <h1>{{ $blog->title }}</h1>
      <div class="image">
            @if ($blog->image_path)
                <img src="{{ asset('storage/image/' . $post->image_path) }}" class="image">
            @endif
          </div>
      <p>{{ $blog->body }}</p>
    </div>
  </div>
@endsection