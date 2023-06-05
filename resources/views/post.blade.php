
@extends('layouts\main')

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-5">{{ $post->title }}</h1>

            <p>by,
                <a href="/authors/{{ $post->author->username }}">
                {{ $post->author->name }}
                </a> in
                <a href="/blog->category={{ $post->category->slug }}">
                    {{ $post->category->nama }}
                </a>
            </p>

            @if ($post->image)
            <div style="max-height: 350px; overflow:hidden;">
                <img class= "img-fluid" src="{{  asset('storage/' . $post->image) }}" alt="" >

            </div>
            @else
            <img class= "img-fluid" src="https://source.unsplash.com/1200x490/?{{ $post->category->nama }}" alt="{{ $post->category->nama }}" >
            @endif
            <article class="my-3 fs-5">
            {!! $post->body !!}   
            </article>

            <a href="/blog">back</a>
        </div>
    </div>
</div>
@endsection

