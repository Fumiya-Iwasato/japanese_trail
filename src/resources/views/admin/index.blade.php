@extends('layouts.admin')
@section('title', 'Index')
@section('content')
    <!-- フラッシュメッセージ -->
    @if (Session::has('message'))
        <p>{{ session('message') }}</p>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>Index</h1>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ route('admin_form') }}" role="button" class="btn btn-primary">Create</a>
                    </div>
                    <div class="col-md-8">
                        <form action="{{ route('admin_index') }}" method="get">
                            @method('GET')
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-8">
                                    <input type="text" class="form-control @if (!empty($errors->first('title'))) is-invalid @endif" id="title" name="title" value="{{ old('title', $title ?? '') }}" placeholder="{{ __('Title') }}">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('name') }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search mr-1"></i>{{ __('Search') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="row">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">ID</th>
                                        <th width="15%">Date</th>
                                        <th width="20%">Title</th>
                                        <th width="50%">Content</th>
                                        <th width="5%"></th>
                                        <th width="5%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $blog)
                                        <tr>
                                            <th>{{ $blog->id }}</th>
                                            <td>{{ $blog->updated_at->format('M-d-Y') }}</td>
                                            <td>{{ \Str::limit($blog->title, 20) }}</td>
                                            <td>{{ \Str::limit($blog->body, 30) }}</td>
                                            <td><a href="{{ route('admin_edit', ['id' => $blog->id]) }}">Edit</a></td>
                                            <td><a href="{{ route('admin_delete', ['id' => $blog->id]) }}">Delete</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection