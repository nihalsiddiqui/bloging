@extends('layouts.master')
@section('content')
    <div class="container" style=" transform: translate(0%, 11%);">
        <h2>Show All Tags</h2>

        <div class="row justify-content-center">
            <div class="col-8">
                <a href="{{url('tag/create')}}" style="    margin-bottom: 10px;" class="btn btn-primary">Create Tag</a>
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
                        <th>Name</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td style="justify-content: space-around;display: flex;flex-flow: row">
                                <a href="{{route('tag.edit',$tag->id) }}"class="btn btn-primary">Edit</a>
                                <a href="{{route('tag.delete',$tag->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a style="float: right" href="{{url('category/create')}}"class="btn btn-success">Back</a>
            </div>
        </div>
    </div>
@endsection
