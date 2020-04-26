@extends('layouts.admin')
@section('title', 'Index')
@section('content')
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
                            <div class="form-group row">
                                <div class="col-md-8 ml-auto">
                                    <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                                </div>
                                <div class="col-md-2">
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-primary" value="Search">
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
                                            <td><a href="{{ route('article', ['id' => $blog->id]) }}">{{ \Str::limit($blog->title, 20) }}</a></td>
                                            <td>{{ \Str::limit($blog->body, 40) }}</td>
                                            <td><a href="{{ route('admin_edit', ['id' => $blog->id]) }}">Edit</a></td>
                                            <td><a href="{{ route('admin_delete', ['id' => $blog->id]) }}" class="btn-dell">Delete</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="pagination">
                    {{$posts->links()}}
                </div>
                
            </div>
        </div>
    </div>
    @section('script')
    <script>
    $(function(){
    $(".btn-dell").click(function(){
    if(confirm("Are you sure to delete?")) {
    } else {
    return false;
    }
    });
    });
    </script>
    @endsection
@endsection