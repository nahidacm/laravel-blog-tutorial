@extends('layout')

@section('content')
    <h1>{{ $post->title }}</h1>
    {{ $post->body }}
    <hr>
    <div class="comments">
        <ul class="list-group">
            @foreach($post->comments as $comment)
                <li class="list-group-item">
                    <strong>
                        {{ $comment->created_at->diffForHumans() }}:
                    </strong>
                    {{ $comment->body }}
                </li>
            @endforeach
        </ul>
    </div>
    <hr>
    <div class="card">
        <div class="card-block">
            <form action="/posts/{{ $post->id }}/comments" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="body" class="form-control" placeholder="Your Comment here" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
            </form>
            @include('layouts.errors')
        </div>
    </div>
@endsection