@extends('layouts.layout')
@section('title', 'Japanese Trail Races')
@section('content')
  @foreach($posts as $post)
    <div class="container blog-list">
      <div class="row">
        <div class="text-center">
          <p class="blog-date">{{ $post->updated_at->format('M-d-Y') }}</p>
          <a href="{{ route('article', ['id' => $post->id]) }}" class="blog-title">{{ str_limit($post->title, 50) }}</a>
          <a href="{{ route('article', ['id' => $post->id]) }}" class="blog-image">
              @if ($post->image_path)
                  <img src="{{ asset('storage/image/' . $post->image_path) }}" class="blog-image">
              @endif
          </a>
          <p class="blog-text">{{ str_limit($post->body, 300) }}</P>
          <div class="read-more-box">
            <a href="{{ route('article', ['id' => $post->id]) }}" class="read-more">Read more</a>
          </div>
        </div>
      </div>
    </div>
  @endforeach
      <div class="pagination top-pagination">
        {{$posts->links()}}
      </div>
@endsection