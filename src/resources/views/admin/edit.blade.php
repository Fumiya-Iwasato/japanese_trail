@extends('layouts.admin')
@section('title', 'Edit')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>Edit</h1>
                <hr>
                <form action="{{ route('admin_update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2 lbl" for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title', $blog_form->title) }}">
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 lbl" for="body">Content</label>
                        <textarea class="form-control" name="body" rows="20">{{ old('body', $blog_form->body) }}</textarea>
                    </div>
                    <div class="input-group">
                        <label class="col-md-2 lbl" for="title">Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="image">
                            <label class="custom-file-label" for="customFile" data-browse="Browse">{{ $blog_form->image_path }}</label>
                        </div>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary reset">Cancel</button>
                        </div>
                    </div>
                    <div class="form-group row update-btn">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $blog_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection