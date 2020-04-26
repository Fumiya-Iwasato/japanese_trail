@extends('layouts.layout_2')
@section('title')
  {{ $blog->title }}
@endsection
@section('content')
  <div class="container article">
    <div class="row article-box">
      <h2 class="text-center">{{ $blog->title }}</h2>
      <p class="text-right article-date">{{ $blog->updated_at->format('M-d-Y') }}</p>
      <div class="image article-image">
            @if ($blog->image_path)
                <img src="{{ asset('storage/image/' . $post->image_path) }}" class="image">
            @endif
          </div>
      <p class="article-text">{{ $blog->body }}</p>
    </div>
  </div>
@endsection