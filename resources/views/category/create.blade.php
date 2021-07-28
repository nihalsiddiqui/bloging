@extends('layouts.master')
<style>
    .post{
        display: flex;
        flex-flow: row;
        align-items: center;
        justify-content: center;
        border: 2px solid black;
        width: 50%;
        transform: translate(50%, 50%);
        padding: 20px;
    }
</style>
@section('content')
    <div class="post">
        <form class="col-md-8" action="{{ url('/category/store') }}" method="post">
            @csrf
            <h2>Create Ctegory</h2>
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control" id="tokenfield-typeahead" value="" />
            </div>
{{--            <input type="hidden" name="post_id" value="{{\App\Models\post::id()}}">--}}

            <button style="margin-top: 10px" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection


