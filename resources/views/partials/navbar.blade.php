 <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
        <a class="navbar-brand" href="/">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="about">About</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="movies">Movies</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="genres">Genres</a>
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
</nav>