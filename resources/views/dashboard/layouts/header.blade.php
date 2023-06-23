
<header class="header" data-header>
  <div class="container">

    <h1>
      <a href="#" class="logo">Dashboard</a>
    </h1>

    <button class="menu-toggle-btn icon-box" data-menu-toggle-btn aria-label="Toggle Menu">
      <span class="material-symbols-rounded  icon">menu</span>
    </button>

    <nav class="navbar">
      <div class="container">

        <ul class="navbar-list">

          <li>
            <a href="/" class="navbar-link active icon-box">
              <span class="material-symbols-rounded  icon">grid_view</span>

              <span>Home</span>
            </a>
          </li>

          <li>
            <a href="/dashboard/user" class="navbar-link icon-box">
              <span class="material-symbols-rounded  icon">folder</span>

              <span>Profile</span>
            </a>
          </li>

          <li>
            <a href="/dashboard/bookmarks" class="navbar-link icon-box">
              <span class="material-symbols-rounded  icon">list</span>

              <span>Bookmark</span>
            </a>
          </li>
          
          {{-- <li>
            <a href="#" class="navbar-link icon-box">
              <span class="material-symbols-rounded  icon">bar_chart</span>

              <span>Reports</span>
            </a>
          </li> --}}
          <li>
            <a href="/dashboard/likes" class="navbar-link icon-box">
              <span class="material-symbols-rounded  icon">bar_chart</span>

              <span>Favorites</span>
            </a>
          </li>

        </ul>

        <ul class="user-action-list">

          <li>
            <a href="#" class="notification icon-box">
              <span class="material-symbols-rounded  icon">notifications</span>
            </a>
          </li>

          <li>
            <a href="#" class="header-profile">

              <figure class="profile-avatar">
                <img src="{{ asset('/images/avatar-1.jpg') }}" alt="Elizabeth Foster" width="32" height="32">
              </figure>

              <div>
                <p class="profile-title">{{  auth()->user()->name }}</p>
              </div>
              
            </a>
            <div>
              
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="nav-link">
                      <span>Sign Out</span>
                    </button>
                </form>
              </div>
          </li>

        </ul>

      </div>
    </nav>

  </div>
</header>
{{-- <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Movie</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
    <form action="/logout" method="post">
        @csrf
        <button type="submit" class="nav-link px-3 bg-dark border-0">Sign Out</button>
    </form>
    
    </div>
  </div>
</header> --}}
<!-- 
    - #HEADER
  -->
