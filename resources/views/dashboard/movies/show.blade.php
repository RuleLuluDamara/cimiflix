@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-5">{{ $movie->name }}</h1>

            <a href="/dashboard/movies" class="btn btn-success mb-3">Back</a>
            <a href="/dashboard/movies/{{ $movie->slug }}/edit" class="btn btn-warning mb-3">Edit</a>
            <form action="/dashboard/movies/{{ $movie->slug }}" method="movie" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger border-0 mb-3" onclick="return confirm('Are you sure?')">
                    delete
                  </button>
                </form>
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