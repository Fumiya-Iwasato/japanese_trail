@extends('layouts.layout_2')
@section('title')
  {{ $blog->title }}
@endsection
@section('content')
  <div class="container article">
      <div class="row">
        <div class="col-md-12 text-center">
          <p class="article-date">{{ $blog->updated_at->format('M-d-Y') }}</p>
          <h1 class="article-title">{{ $blog->title }}</h1>
          <img src="{{ asset('storage/image/' . $blog->image_path) }}" class="article-image">
          <div class="article-text">{!! nl2br(e($blog->desc)) !!}</div>
          <div class="article-text">{!! $blog->body !!}</div>
          <!-- <div class="row article-video"> -->
            <div class="article-video">{!! $blog->video !!}</div>
          <!-- </div> -->
          @guest
            <div class="back-box">
              <a href="{{ route('top') }}" class="back">Back</a>
            </div>
          @else
          <div class="row">
            <div class="back-box col-md-2">
              <a href="{{ route('top') }}" class="back-2">Back</a>
            </div>
            <div class="back-box col-md-2">
              <a href="{{ route('admin_edit', ['id' => $blog->id]) }}" class="back-2">EDIT</a>
            </div>
          </div>
          @endguest
        </div>
      </div>
    </div>
@endsection