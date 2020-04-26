@extends('layouts.admin')
@section('title', 'New Article')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>New Article</h1>
                <hr>
                <form action="{{ route('admin_create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2 lbl" for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 lbl" for="body">Content</label>
                        <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 lbl" for="title">Image</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="Update">
                </form>
            </div>
        </div>
    </div>
@endsection