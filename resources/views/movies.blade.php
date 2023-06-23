
@extends('layouts\main')

@section('container')
    <section class="top-rated">
        <div class="container">

          <p class="section-subtitle">Online Streaming</p>

          <h2 class="h2 section-title">Movies</h2>

          <ul class="movies-list">
            @foreach ($movies as $movie)

            <li>
              <div class="movie-card">

                <a href="/movies/{{ $movie->id}}">
                    <figure class="card-banner">
                    {{-- <img src="{{ asset('images/movie-1.png') }}" alt="Sonic the Hedgehog 2 movie poster"> --}}
                    @if ($movie->image)
                    <img class= "img-fluid" src="{{  asset('storage/' . $movie->image) }}" alt="" >
                    @else
                    <img src="https://source.unsplash.com/1200x490/?{{ $movie->genre->name }}" class="card-img-top" alt="{{ $movie->genre->name }}">
                    @endif
                    </figure>
                </a>

                <div class="title-wrapper">
                  <a href="/movies/{{ $movie->id}}">
                    <h3 class="card-title">{{ $movie->name }}</h3>
                  </a>
                  <time datetime="{{ $movie->rilis }}">{{ $movie->rilis->format('Y') }}</time>
                </div>

                <div class="card-meta">
                  <div class="badge badge-outline">{{ $movie->resolusi }}</div>

                  <div class="duration">
                    <ion-icon name="time-outline"></ion-icon>

                    <time datetime="{{ $movie->durasi }}">{{ $movie->durasi }}</time>
                  </div>

                  <div class="rating">
                    <ion-icon name="star"></ion-icon>

                    <data>7.8</data>
                  </div>
                </div>

              </div>
            </li>
            @endforeach
      </section>
{{-- <section class=top-rated>
    <div class="container">
            {{-- <div class="row">
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
    </div> --}}
{{-- </section> --}}

    {{-- @else
        <p>No post found</p>
    @endif --}}
@endsection
    
