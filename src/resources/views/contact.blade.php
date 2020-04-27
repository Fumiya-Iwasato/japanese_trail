@extends('layouts.layout_2')
@section('title', 'Contact')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto contact-form">
        <h1 class="cnt-title">Contact</h1>
        <hr class=cnt-hr>
        <form action="{{ route('send') }}" method="post" enctype="multipart/form-data">
            @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="form-group row label">
                <label class="col-md-2 lbl" for="title">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-group row label">
                <label class="col-md-2 lbl" for="title">e-mail</label>
                <input type="text" class="form-control" name="email" value="{{ old('email') }}">
            </div>
            <div class="form-group row label">
                <label class="col-md-2 lbl" for="title">Title</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
            </div>
            <div class="form-group row label">
                <label class="col-md-2 lbl" for="body">body</label>
                <textarea class="form-control" name="body" rows="15">{{ old('body') }}</textarea>
            </div>
            {{ csrf_field() }}
            <input type="submit" class="btn btn-primary" value="Send">
        </form>
      </div>
    </div>
  </div>
@endsection