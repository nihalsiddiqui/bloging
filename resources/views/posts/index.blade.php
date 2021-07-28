@extends('layouts.master')
@section('content')
    <div class="container" style=" transform: translate(0%, 11%);
">
        <h2>Show All Posts</h2>

        <div class="row justify-content-center">
            <div class="col-8">
                <a href="{{url('posts/create')}}" style="    margin-bottom: 10px;" class="btn btn-primary">Create Post</a>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <br>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Tag</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->body }}</td>

                                <td>
                                    @foreach($post->category as $tata)
                                        {{ $tata->name }}
                                        @if(!$loop->last)
                                         ,
                                        @endif

                                    @endforeach
                                </td>
                            <td>
                                    @foreach($post->tag as $fetch)
                                        {{ $fetch->name }}
                                        @if(!$loop->last)
                                         ,
                                        @endif

                                    @endforeach
                                </td>
                            <td style="justify-content: space-around;display: flex;flex-flow: row">
                                <a href="{{route('posts.edit',$post->id) }}"class="btn btn-primary">Edit</a>
                                <a href="{{route('posts.delete',$post->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a style="float: right" href="{{url('posts/create')}}"class="btn btn-success">Back</a>
            </div>
        </div>
    </div>
@endsection
