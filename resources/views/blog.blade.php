@extends('layouts.app')

@section('content')
    <h1 class="blog-title">Latest Blog Posts</h1>

    @foreach($posts as $post)
        <div class="card">
            <h2>{{ $post['title'] }}</h2>
            <p>{{ $post['excerpt'] }}</p>
            <a href="#" class="btn">Read More</a>
        </div>
    @endforeach
@endsection