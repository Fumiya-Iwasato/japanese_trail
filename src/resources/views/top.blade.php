@extends('layouts.layout')
@section('title', 'Top')
@section('content')
  @foreach($posts as $post)
    <div class="container blog-list">
      <div class="row">
          <div class="col-md-4">
            <a href="{{ route('article', ['id' => $post->id]) }}" class="image-btn">
              <div class="blog-image">
                @if ($post->image_path)
                    <img src="{{ asset('storage/image/' . $post->image_path) }}" class="blog-image">
                @endif
              </div>
            </a>
          </div>
          <div class="col-md-8">
            <div class="text text-left">
              <div class="blog-date">
                {{ $post->updated_at->format('M-d-Y') }}
              </div>
              <a href="{{ route('article', ['id' => $post->id]) }}" class="title-btn">
                <div class="blog-title">
                    {{ str_limit($post->title, 50) }}
                </div>
              </a>
              <div class="blog-text">
                  {{ str_limit($post->body, 300) }}
              </div>
              <div class="read-more-box">
                <a href="{{ route('article', ['id' => $post->id]) }}" class="read-more">Read more</a>
              </div>
            </div>
          </div>
      </div>
    </div>
  @endforeach
@endsection