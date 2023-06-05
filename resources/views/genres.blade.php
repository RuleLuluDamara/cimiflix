
@extends('layouts\main')

@section('container')
    <h1>{{ $title }}</h1>

    <div class="container">
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
    </div>
    
@endsection
    
