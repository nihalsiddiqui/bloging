@extends('layouts.master')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
        <form class="col-md-8" action="{{ route('posts.update',$post->id) }}" method="post">
            @csrf
            <div class="form-group">
                <h2>Edit Post</h2>
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
            </div>
            <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">
            <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <textarea class="form-control"  name="body" id="body" rows="3">{{$post->body}}</textarea>
            </div>
            <label for="exampleInputPassword1">Category</label>
            <select id="category" class="form-control form-control-sm" multiple="multiple" name="category[]">
                @foreach($category as $categoryData)
                    @if(in_array($categoryData->name, $listsCat ))
                        <option selected value="{{$categoryData->id}}">{{$categoryData->name}}</option>

                    @else
                        <option value="{{$categoryData->id}}">{{$categoryData->name}}</option>
                    @endif
                @endforeach
            </select>
            <label for="exampleInputPassword1">Tag</label>
            <select id="tag" class="form-control form-control-sm" multiple="multiple" name="tag[]">
                @foreach($tag as $tagData)
                    @if(in_array($tagData->name, $liststag ))
                        <option selected value="{{$tagData->id}}">{{$tagData->name}}</option>

                    @else
                        <option value="{{$tagData->id}}">{{$tagData->name}}</option>
                    @endif
                @endforeach
            </select>
            <button style="margin-top: 5px" type="submit" class="btn btn-primary ">Save</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('#category').select2({
            placeholder:'select a option',
            allowclear:true
        });
        $('#tag').select2({
            placeholder:'select a option',
            allowclear:true
        });
    </script>
@endsection
