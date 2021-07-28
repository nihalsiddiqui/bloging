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
        transform: translate(50%, 20%);
        padding: 20px;
    }
</style>
@section('content')
    <div class="row post">
        <form class="col-md-8" action="{{ url('/post') }}" method="post">
            <h2>Create Post</h2>
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" required class="form-control" id="title" name="title" placeholder="Enter email">
            </div>
            <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">
{{--            <input type="hidden" name="user_id" value="{{\App\Models\category::id()}}">--}}
            <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <textarea required class="form-control" name="body" id="body" rows="3"></textarea>
            </div>
            <label for="exampleInputPassword1">Category</label>
            <select id="category" class="form-control form-control-sm" multiple="multiple" name="category[]">
                @foreach($categorys as $category)
                <option VALUE="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <label for="exampleInputPassword1">Tags</label>
            <select id="tag" class="form-control form-control-sm" multiple="multiple" name="tag[]">
                @foreach($tags as $tag)
                    <option VALUE="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
            <button style="margin-top: 10px" type="submit" class="btn btn-primary">Submit</button>
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
