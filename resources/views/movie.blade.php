
@extends('layouts\main')

@section('container')
<main>
    <article>

      <!-- 
        - #MOVIE DETAIL
      -->

      <section class="movie-detail">
        <div class="container">

          <figure class="movie-detail-banner">

            {{-- <img src="{{ asset('images/movie-4.png') }}" alt="Free guy movie poster"> --}}
            @if ($movie->image)
            <div style="max-height: 350px; overflow:hidden;">
                <img class= "img-fluid" src="{{  asset('storage/' . $movie->image) }}" alt="" >

            </div>
            @else
            <img class= "img-fluid" src="https://source.unsplash.com/600x900/?avengers" alt="{{ $movie->genre->name }}" >
            @endif
            <button class="play-btn">
              <ion-icon name="play-circle-outline"></ion-icon>
            </button>

          </figure>

          <div class="movie-detail-content">

            <h1 class="h1 detail-title">
                <strong>{{ $movie->name }}</strong>
              {{-- Free <strong>Guy</strong> --}}
            </h1>

            <div class="meta-wrapper">

              <div class="badge-wrapper">
                <div class="badge badge-fill">{{ $movie->ratingumur }}</div>

                <div class="badge badge-outline">{{ $movie->resolusi }}</div>
              </div>

              <div class="ganre-wrapper">
                <a href="/genres/{{ $movie->genre->slug }}">
                    {{ $movie->genre->name }}
                </a>
              </div>

              <div class="date-time">

                <div>
                  <ion-icon name="calendar-outline"></ion-icon>

                  <time datetime="{{ $movie->rilis }}">{{ $movie->rilis->format('Y') }}</time>
                </div>

                <div>
                  <ion-icon name="time-outline"></ion-icon>

                  <time datetime="PT115M">{{ $movie->durasi }}</time>
                </div>

                 <div>
                  <ion-icon name="star"></ion-icon>

                  <a>{{ $movie->userrating->last()->rating }}</a>
                </div>

              </div>

            </div>

            <p class="storyline">
              {{ $movie->body }}
            </p>

            <div class="details-actions">

              {{-- <button class="share">
                <ion-icon name="heart"></ion-icon>

                <span>Like</span>
              </button> --}}
              @auth

              <form action="/movies/{{ $movie->id }}/like" method="post">
              @csrf
              <button type="submit" name="like" value="true" class="share">
                  <ion-icon name="heart"></ion-icon>
                  <span>Add to Favorites</span>
              </button>
              </form>
              @endauth

              <div class="title-wrapper">
                <p class="title">Prime Video</p>

                <p class="text">Streaming Channels</p>
              </div>

              {{-- <button class="btn btn-primary">
                <ion-icon name="play"></ion-icon>

                <span>Watch Now</span>
              </button> --}}
              @auth
                
              <form action="/movies/{{ $movie->id }}/bookmark" method="post">
                @csrf
                <button type="submit" name="bookmark" value="true" class="btn btn-primary">
                  <ion-icon name="bookmark"></ion-icon>
                  <span>Bookmark</span>
                </button>
              </form>
              @endauth
              

            </div>

          </div>

        </div>
      </section>

        
      <section class="service">
        <div class="container">
          
          <div class="service-content">

            <p class="service-subtitle">Comments</p>

            @foreach ($comments as $comment )
            <ul class="service-list">
              <li>
                <div class="service-card">
                  <div class="card-icon">
                    <ion-icon name="tv"></ion-icon>
                  </div>
                  <div class="card-content">
                    <h3 class="h3 card-title">{{ $comment->user->name }}</h3>
                    
                    <p class="card-text">
                      {{ $comment->message }}
                    </p>
                  </div>
                </div>
              </li>
            </ul>
            @endforeach

          </div>

        </div>
      </section>
      @auth

      <section class="cta">
        <div class="container">
          
          <div class="title-wrapper">
            <h2 class="cta-title">Comment Here</h2>
          </div>
          
          <form action="/movies/{{  $movie->id }}/comment" class="cta-form" method="post">
            @csrf
            <input type="text" id="message" name="message" required placeholder="comment" class="email-field">
            @error('message')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
            <button type="submit" class="cta-form-btn">Comment</button>
          </form>
          
        </div>
        
      </section>
      <section class="cta">
        <div class="container">
          
          <div class="title-wrapper">
            <h2 class="cta-title">Rate</h2>
          </div>   
          <form class="cta-form" action="/movies/{{ $movie->id }}/rating" method="post">
            @csrf
            <div class="centered-container">
              <select  name="rating" required>
              <option value="">Select</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
          </select>
          </div>

          <button type="submit" class="cta-form-btn">Submit</button>
          </form>            
          
        </div>
      </section>
      @endauth


        


      

{{-- <div class="container">
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
            <img class= "img-fluid" src="https://source.unsplash.com/1200x490/?avengers" alt="{{ $movie->genre->name }}" >
            @endif
            <article class="my-3 fs-5">
            {!! $movie->body !!}   
            </article>

            <a href="/movies">back</a>
        </div>
    </div>
</div> --}}
@endsection

