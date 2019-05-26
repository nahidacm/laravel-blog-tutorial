@extends('layout')

@section('content')
    <h1>Create blog post</h1>
    <form method="post" action="/posts">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" id="body" class="form-control"></textarea>
        </div>

        @include('layouts.errors')

        <button type="submit" class="btn btn-primary">Publish</button>
    </form>
@endsection