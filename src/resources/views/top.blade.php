@extends('layouts.layout')
@section('title', 'Top')
@section('content')
  @foreach($posts as $post)
    <div class="container blog-list">
      <div class="row">
        <div class="col-md-4">
          <div class="image">
            @if ($post->image_path)
                <img src="{{ asset('storage/image/' . $post->image_path) }}" class="image">
            @endif
          </div>
        </div>
        <div class="col-md-8">
          <div class="text">
            <div class="date">
                {{ $post->updated_at->format('M-d-Y') }}
            </div>
            <div class="title">
                {{ str_limit($post->title, 50) }}
            </div>
            <div class="body">
                {{ str_limit($post->body, 500) }}
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
@endsection