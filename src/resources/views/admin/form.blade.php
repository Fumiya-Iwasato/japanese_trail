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
                        <label class="col-md-2 lbl" for="desc">Description</label>
                        <textarea class="form-control" name="desc" rows="5">{{ old('desc') }}</textarea>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 lbl" for="body">Content</label>
                        <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 lbl" for="video">Video</label>
                        <textarea class="form-control" name="video" rows="3">{{ old('video') }}</textarea>
                    </div>
                    <div class="input-group">
                        <label class="img-lbl lbl" for="title">Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="image">
                            <label class="custom-file-label" for="customFile" data-browse="Browse">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary reset">Cancel</button>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary update-btn" value="Update">
                </form>
            </div>
        </div>
    </div>
@endsection