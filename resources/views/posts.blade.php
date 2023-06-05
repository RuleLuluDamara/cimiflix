
@extends('layouts\main')

@section('container')
    <h1 class="mb-4 text-center">{{ $title }}</h1>


    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/blog">
                @if (request('ca'))
                    
                @endif
                <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Find" name="find" value="{{ request('find') }}">
                <button class="btn btn-outline-secondary" type="submit" >Find</button>
                </div>
            </form>
        </div>
        
    </div>

    @if ($posts->count())
        <div class="card mb-3">
            <div style="max-height: 350px; overflow:hidden;">
            @if ($posts[0]->image)
                <img class= "img-fluid" src="{{  asset('storage/' . $posts[0]->image) }}" alt="" >
            @else
            <img src="https://source.unsplash.com/1200x490/?" class="card-img-top" alt="{{ $posts[0]->category->nama }}">
            @endif
            </div>
            <div class="card-body text-center">
                <h5 class="card-title"><a href="/posts/{{ $posts[0]->id}}">{{  $posts[0]->title }}</a></h5>
                <p>
                    <small>
                        by, <a href="/authors/{{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> in 
                        <a href="/blog?categories/{{ $posts[0]->category->slug }}">
                            {{ $posts[0]->category->nama }}
                        </a>
                        {{ $posts[0]->created_at->diffForHumans()}}
                    </small>
                </p>

                <p class="card-text">{{  $posts[0]->excerpt }}</p>

                <a href="/posts/{{ $posts[0]->slug}}" class= "btn btn-primary"> 
                    Read more
                </a>
            </div>
        </div>


    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post )
           
            <div class="col-md-4">
                <div class="card">
                    <div class="position-absolute bg-dark px-3 py-2 text-white"><a href="/blog?categories/{{ $post->category->slug }}">{{ $post->category->nama }}</a></div>
                    @if ($post->image)
                        <img class= "img-fluid" src="{{  asset('storage/' . $post->image) }}" alt="" >
                    @else
                    <img src="https://source.unsplash.com/1200x490/?{{ $post->category->nama }}" class="card-img-top" alt="{{ $post->category->nama }}">
                    @endif
                    <p>
                        <small>
                            by, <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a>
                            {{ $post->created_at->diffForHumans()}}
                        </small>
                    </p>
                    <div class="card-body">
                        <h5 class="card-title">{{ $post["title"] }}</h5>
                        <p class="card-text">{{ $post["excerpt"] }}</p>
                        <a href="/posts/{{ $post->id}}" class="btn btn-primary">Read more..</a>
                    </div>
                </div>
            </div>
             @endforeach
        </div>
    </div>
    @else
        <p>No post found</p>
    @endif


@endsection
    
