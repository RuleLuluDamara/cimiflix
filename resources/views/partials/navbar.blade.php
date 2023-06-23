<header class="header" data-header>
    <div class="container">

      <div class="overlay" data-overlay></div>

      <a href="/" class="logo">
        <img src="{{ asset('/images/logo2.png') }}" alt="Cimiflix logo" style="width: 55px;">
      </a>

      <div class="header-actions">

        <button class="search-btn">
          <ion-icon name="search-outline"></ion-icon>
        </button>

        @auth
        <div class="lang-wrapper">
          <label for="language">
            Welcome back, {{ auth()->user()->name }}
          </label>
        </div>
        
        <form action="/logout" method="post">
          @csrf
          <button  type="submit" onclick="window.location.href = '/logout';" class="btn btn-primary" >Sign Out</button>
        </form>
        <button  type="submit" onclick="window.location.href = '/dashboard';" class="btn btn-primary" >Dashboard</button>

        @else

        <button onclick="window.location.href = '/login';" class="btn btn-primary" >Sign in</button>
        </ul>
        @endauth
      </div>

      <button class="menu-open-btn" data-menu-open-btn>
        <ion-icon name="reorder-two"></ion-icon>
      </button>

      <nav class="navbar" data-navbar>

        <div class="navbar-top">

          <a href="./index.html" class="logo">
            <img src="{{ asset('/images/logo.svg') }}" alt="Cimiflix logo">
          </a>

          <button class="menu-close-btn" data-menu-close-btn>
            <ion-icon name="close-outline"></ion-icon>
          </button>

        </div>

        <ul class="navbar-list">

          <li>
            <a href="/" class="navbar-link">Home</a>
          </li>

          <li>
            <a href="about" class="navbar-link">About</a>
          </li>

          <li>
            <a href="movies" class="navbar-link">Movies</a>
          </li>

          <li>
            <a href="genres" class="navbar-link">Genres</a>
          </li>

          <li>
            <a href="subscription" class="navbar-link">Subscription</a>
          </li>

        </ul>

        <ul class="navbar-social-list">

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-pinterest"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-youtube"></ion-icon>
            </a>
          </li>

        </ul>

      </nav>

    </div>
  </header>

{{-- <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark ">
    <div class="container">
        <a class="navbar-brand" href="/">Cimiflix</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link scrollto active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link scrollto active" href="about">About</a>
                </li>
                <li class="nav-item">
                <a class="nav-link scrollto active" href="movies">Movies</a>
                </li>
                <li class="nav-item">
                <a class="nav-link scrollto active" href="genres">Genres</a>
                </li>
            </ul>

            <ul  class="navbar-nav">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome back, {{ auth()->user()->name }}
                    </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Sign Out</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item ms-auto">
                        <a class="nav-link" href="/login">Sign in</a>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav> --}}




