@extends('layouts.master')
<style>
    .post{
        display: flex;
        flex-flow: row;
        align-items: center;
        justify-content: center;
        border: 2px solid black;
        width: 50%;
        transform: translate(50%, 30%);
        padding: 20px;
    }
</style

@section('content')
    <div class="row post">
        <form class="col-md-8" action="{{ route('category.update',$category->id) }}" method="post">
            <h2>Edit Category</h2>
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="title" name="name" value="{{$category->name}}">
            </div>
            {{--            <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">--}}

            {{--            <label for="exampleInputPassword1">Category</label>--}}
            {{--            <select class="form-control form-control-sm" name="category">--}}
            {{--                <option VALUE="{{$post->category}}">{{$post->category}}</option>--}}
            {{--                <option VALUE="{{$post->category}}">{{$post->category}}</option>--}}
            {{--                <option VALUE="{{$post->category}}">{{$post->category}}</option>--}}
            {{--            </select>--}}
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
