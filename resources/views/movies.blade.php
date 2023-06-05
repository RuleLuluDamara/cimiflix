
@extends('layouts\main')

@section('container')
    <h1 class="mb-4 text-center">{{ $title }}</h1>


    <div class="container">
        <div class="row">
            @foreach ($movies as $movie)
            
            <div class="col-md-4">
                <div class="card">
                    <div class="position-absolute bg-dark px-3 py-2 text-white"><a href="/genres/{{ $movie->genre->slug }}">{{ $movie->genre->name }}</a></div>
                    @if ($movie->image)
                        <img class= "img-fluid" src="{{  asset('storage/' . $movie->image) }}" alt="" >
                    @else
                    <img src="https://source.unsplash.com/1200x490/?{{ $movie->genre->name }}" class="card-img-top" alt="{{ $movie->genre->name }}">
                    @endif
                    <p>
                        <small>
                            By, {{ $movie->director }}
                            {{ $movie->created_at->diffForHumans()}},
                            Rilis {{ $movie->rilis }}
                        </small>
                    </p>
                    <div class="card-body">
                        <h5 class="card-title"><a href="/movies/{{ $movie->id}}">{{ $movie["name"] }}</a></h5>
                        <p class="card-text">{{ $movie["excerpt"] }}</p>
                        <a href="/movies/{{ $movie->id}}" class="btn btn-primary">Read more..</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    {{-- @else
        <p>No post found</p>
    @endif --}}


@endsection
    
