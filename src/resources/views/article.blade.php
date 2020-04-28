@extends('layouts.layout_2')
@section('title')
  {{ $blog->title }}
@endsection
@section('content')
  <div class="container article">
      <div class="row">
        <div class="text-center">
          <p class="article-date">{{ $blog->updated_at->format('M-d-Y') }}</p>
          <h1 class="article-title">{{ $blog->title }}</h1>
          <img src="{{ asset('storage/image/' . $blog->image_path) }}" class="article-image">
          <p class="article-text">{!! nl2br(e($blog->body)) !!}</P>
          <div class="back-box">
            <a href="{{ route('top') }}" class="back">Back</a>
          </div>
        </div>
      </div>
    </div>
@endsection