<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/dashboard">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/user">
              <span data-feather="file"></span>
              Profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/bookmarks">
              <span data-feather="file"></span>
              Bookmark
            </a>
          </li>
        </ul>

        @can('admin')
          
          <h6 class="sidebar-heading d-flex justify-content-between alig-items-center px-3 mt-4 mb-1 text-muted">
            <span>Administrator</span>
          </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/users">
              <span data-feather="grid"></span>
              Accounts
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/genres">
              <span data-feather="grid"></span>
              Movie Genres
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/movies">
              <span data-feather="file"></span>
              Movie List
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/casts">
              <span data-feather="file"></span>
              Movie Cast
            </a>
          </li>
        </ul>
         @endcan
      </div>
    </nav>