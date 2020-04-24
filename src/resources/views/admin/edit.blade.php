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
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 lbl" for="body">Content</label>
                        <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">image</label>
                        <div class="col-md-10">
                            <div class="custom-file col-md-6">
                                <input type="file" class="custom-file-input" id="inputFile">
                                <label class="custom-file-label" for="inputFile" data-browse="file">Change file</label>
                            </div>
                            <div class="form-text text-info">
                                {{ $blog_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">Delete file
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
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