
@extends('layouts\main')

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-5">{{ $movie->name }}</h1>

            <p>By,
                {{ $movie->director }}
                With
                <a href="/genres/{{ $movie->genre->slug }}">
                    {{ $movie->genre->name }}
                </a>
                Rilis {{ $movie->rilis }}

            </p>

            @if ($movie->image)
            <div style="max-height: 350px; overflow:hidden;">
                <img class= "img-fluid" src="{{  asset('storage/' . $movie->image) }}" alt="" >

            </div>
            @else
            <img class= "img-fluid" src="https://source.unsplash.com/1200x490/?{{ $movie->genre->name }}" alt="{{ $movie->genre->name }}" >
            @endif
            <article class="my-3 fs-5">
            {!! $movie->body !!}   
            </article>

            <a href="/movies">back</a>
        </div>
    </div>
</div>
@endsection

