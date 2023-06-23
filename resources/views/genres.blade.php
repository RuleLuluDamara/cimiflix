
@extends('layouts\main')

@section('container')
        <section class="top-rated">
                <div class="container">

                <p class="section-subtitle">Online Streaming</p>

                <h2 class="h2 section-title">Movies</h2>

                <ul class="movies-list">
                    @foreach ($genres as $genre)

                    <li>
                    <div class="movie-card">

                        <a href="/genres/{{ $genre->slug}}">
                            <figure class="card-banner">
                            {{-- <img src="{{ asset('images/movie-1.png') }}" alt="Sonic the Hedgehog 2 movie poster"> --}}
                            @if ($genre->image)
                            <img class= "img-fluid" src="{{  asset('storage/' . $genre->image) }}" alt="" >
                            @else
                            <img src="https://source.unsplash.com/400x400/?{{ $genre->name }}" class="card-img-top" alt="{{ $genre->name }}">
                            @endif
                            </figure>
                        </a>

                       <div class="title-wrapper">
                        <a href="/genres/{{ $genre->slug }}">
                            <h3 class="card-title">{{ $genre->name }}</h3>
                        </a>
                        {{-- <time datetime="{{ $genre->rilis }}">{{ $genre->rilis }}</time>
                        </div>

                        <div class="card-meta">
                        <div class="badge badge-outline">{{ $genre->resolusi }}</div>

                        <div class="duration">
                            <ion-icon name="time-outline"></ion-icon>

                            <time datetime="{{ $genre->durasi }}">{{ $genre->durasi }}</time>
                        </div>

                        <div class="rating">
                            <ion-icon name="star"></ion-icon>

                            <data>7.8</data>
                        </div> --}}
                        </div> 

                    </div>
                    </li>
            @endforeach
        </section>

    {{-- <div class="container">
        <div class="row">

            @foreach ($genres as $genre)
                
            
            <div class="col-md-4">
                <a href="/genres/{{ $genre->slug }}">
                <div class="card bg-dark text-dark">
                <img src="https://source.unsplash.com/400x400?{{ $genre->name}}" class="card-img" alt="{{ $genre->name}}">
                <div class="card-img-overlay d-flex align-items-center p-0">
                    <h5 class="card-title text-white text-center flex-fill p-4" style="background-color : rgba(0,0,0,0,7)">{{ $genre->name}}</h5>
                </div>
                </div>
                </a>
            </div>

            @endforeach
        </div>
    </div> --}}
    
@endsection
    
