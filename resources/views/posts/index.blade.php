@extends('layout')

@section('content')
    <h3 class="pb-4 mb-4 font-italic border-bottom">
        From the Firehose
    </h3>

    @foreach($posts as $post)
    <div class="blog-post">
        @include('posts.post')
    </div><!-- /.blog-post -->
    @endforeach

    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
    </nav>
@endsection