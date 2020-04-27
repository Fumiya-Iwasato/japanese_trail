@extends('layouts.layout_2')
@section('title')
  {{ $blog->title }}
@endsection
@section('content')
  <div class="container article">
    <div class="row article-box">
      <p class="article-date">{{ $blog->updated_at->format('M-d-Y') }}</p>
      <h1 class="article-title">{{ $blog->title }}</h1>
      <div class="article-image">
        @if ($blog->image_path)
            <img src="{{ asset('storage/image/' . $blog->image_path) }}">
        @endif
      </div>
      <p class="article-text">{{ $blog->body }}</p>
    </div>
  </div>
@endsection