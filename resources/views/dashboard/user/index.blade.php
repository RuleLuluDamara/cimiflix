@extends('dashboard.layouts.main')

@section('container')
<section class="home">

    <div class="card profile-card">
          <button class="card-menu-btn icon-box" aria-label="More" data-menu-btn>
            <span class="material-symbols-rounded  icon">more_horiz</span>
          </button>

          <ul class="ctx-menu">

            <li class="ctx-item">
              <b class="ctx-menu-btn icon-box">
                <span class="material-symbols-rounded  icon" aria-hidden="true">edit</span>

                <span class="ctx-menu-text">
                    {{-- <button class="card-menu-btn icon-box" aria-label="More" data-menu-btn> --}}
                            <a href="/dashboard/user/{{ auth()->user()->username }}/edit" class="btn btn-warning mb-3">Edit</a>
                    {{-- </button> --}}
                    {{-- <a href="/dashboard/user/{{ auth()->user()->username }}/edit">Edit</a> --}}
                </span>
              </b utton>
            </li>

            <li class="ctx-item">
              <button class="ctx-menu-btn icon-box">
                <span class="material-symbols-rounded  icon" aria-hidden="true">cached</span>

                <span class="ctx-menu-text">Refresh</span>
              </button>
            </li>

            <li class="divider"></li>

            <li class="ctx-item">
              <button class="ctx-menu-btn red icon-box">
                <span class="material-symbols-rounded  icon" aria-hidden="true">delete</span>

                <span class="ctx-menu-text">Deactivate</span>
              </button>
            </li>

          </ul>
          <h1>Account Information</h1>

          <div class="profile-card-wrapper">

            <figure class="card-avatar">
              <img src="{{ asset('images/avatar-1.jpg') }}" alt="Elizabeth Foster" width="48" height="48">
            </figure>

            
            <div>
              <p class="card-title">{{ auth()->user()->name }}</p>
              <p class="card-title">Username : {{ auth()->user()->username }}</p>
            </div>

          </div>

          <ul class="contact-list">

            <li>
              <a href="mailto:{{ auth()->user()->email }}" class="contact-link icon-box">
                <span class="material-symbols-rounded  icon">mail</span>

                <p class="text">{{ auth()->user()->email }}m</p>
              </a>
            </li>

          </ul>
        </div>
        @can('admin')
        <div class="card-wrapper">
          <div class="card task-card">
            <div>
              <a href="/dashboard/users" class="navbar-link icon-box">
              <span class="material-symbols-rounded  icon">folder</span>

              <span>Accounts</span>
            </a>
            </div>
          </div>
          
          <div class="card task-card ">
            <div class="card-icon icon-box blue">
              <a href="/dashboard/genres" class="navbar-link icon-box">
              <span class="material-symbols-rounded  icon">folder</span>

              <span>Genres</span>
            </a>
            </div>
          </div>
          
          <div class="card task-card">
            <div>
              <a href="/dashboard/movies" class="navbar-link icon-box">
              <span class="material-symbols-rounded  icon">folder</span>

              <span>Movie List</span>
            </a>
            </div>
          </div>

          <div class="card task-card">
            <div class="card-icon icon-box blue">
              <a href="/dashboard/payment_method" class="navbar-link icon-box">
              <span class="material-symbols-rounded  icon">folder</span>

              <span>Payment Method</span>
            </a>
            </div>
          </div>

        </div>
        <div class="card revenue-card">

          <button class="card-menu-btn icon-box" aria-label="More" data-menu-btn>
            <span class="material-symbols-rounded  icon">more_horiz</span>
          </button>

          <ul class="ctx-menu">

            <li class="ctx-item">
              <button class="ctx-menu-btn icon-box">
                <span class="material-symbols-rounded  icon" aria-hidden="true">edit</span>

                <span class="ctx-menu-text">Edit</span>
              </button>
            </li>

            <li class="ctx-item">
              <button class="ctx-menu-btn icon-box">
                <span class="material-symbols-rounded  icon" aria-hidden="true">cached</span>

                <span class="ctx-menu-text">Refresh</span>
              </button>
            </li>

          </ul>

          <p class="card-title">Revenue</p>

          <data class="card-price" value="2100">$2,100</data>

          <p class="card-text">Last Week</p>

          <div class="divider card-divider"></div>

          <ul class="revenue-list">

            <li class="revenue-item icon-box">

              <span class="material-symbols-rounded  icon  green">trending_up</span>

              <div>
                <data class="revenue-item-data" value="15">15%</data>

                <p class="revenue-item-text">Prev Week</p>
              </div>

            </li>

            <li class="revenue-item icon-box">

              <span class="material-symbols-rounded  icon  red">trending_down</span>

              <div>
                <data class="revenue-item-data" value="10">10%</data>

                <p class="revenue-item-text">Prev Month</p>
              </div>

            </li>

          </ul>

        </div>
        

          {{-- <div class="divider card-divider"></div>

          <ul class="progress-list">

            <li class="progress-item">

              <div class="progress-label">
                <p class="progress-title">Project Completion</p>

                <data class="progress-data" value="85">85%</data>
              </div>

              <div class="progress-bar">
                <div class="progress" style="--width: 85%; --bg: var(--blue-ryb);"></div>
              </div>

            </li>

            <li class="progress-item">

              <div class="progress-label">
                <p class="progress-title">Overall Rating</p>

                <data class="progress-data" value="7.5">7.5</data>
              </div>

              <div class="progress-bar">
                <div class="progress" style="--width: 75%; --bg: var(--coral);"></div>
              </div>

            </li>

          </ul>

        </div> --}}
    {{-- <div class="container">
        <h1>Account Information</h1>
        <a href="/dashboard/user/{{ auth()->user()->username }}/edit" class="btn btn-warning mb-3">Edit</a>
            
            
        @if (auth()->check())
            <table class="table">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ auth()->user()->email }}</td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>{{ auth()->user()->username }}</td>
                    </tr>
                    <!-- Add more fields as needed -->
                </tbody>
            </table>
        @else
            <p>Please log in to view your account information.</p>
        @endif
    </div> --}}
</section>
<section class="projects">

        <div class="section-title-wrapper">
          <h2 class="section-title">Other Features</h2>

          {{-- <button class="btn btn-link icon-box">
            <span>View All</span>

            <span class="material-symbols-rounded  icon" aria-hidden="true">arrow_forward</span>
          </button> --}}
        </div>

        <ul class="project-list">

          <li class="project-item">
            <div class="card project-card">

              <button class="card-menu-btn icon-box" aria-label="More" data-menu-btn>
                <span class="material-symbols-rounded  icon">more_horiz</span>
              </button>

              <ul class="ctx-menu">

                <li class="ctx-item">
                  <button class="ctx-menu-btn icon-box">
                    <span class="material-symbols-rounded  icon" aria-hidden="true">visibility</span>

                    <span class="ctx-menu-text">View</span>
                  </button>
                </li>

                <li class="ctx-item">
                  <button class="ctx-menu-btn icon-box">
                    <span class="material-symbols-rounded  icon" aria-hidden="true">edit</span>

                    <span class="ctx-menu-text">Edit</span>
                  </button>
                </li>

                <li class="divider"></li>

                <li class="ctx-item">
                  <button class="ctx-menu-btn red icon-box">
                    <span class="material-symbols-rounded  icon" aria-hidden="true">delete</span>

                    <span class="ctx-menu-text">Delete</span>
                  </button>
                </li>

              </ul>
              <h3 class="card-title">
                <a href="/dashboard/rating_umur">Rating Umur</a>
              </h3>

              <div class="card-badge blue">Age</div>

              <div class="card-progress-box">

                <div class="progress-label">
                  <span class="progress-title"></span>

                  <data class="progress-data" value="75"></data>
                </div>

                <div class="progress-bar">
                  <div class="progress" style="--width: 75%; --bg: var(--emerald);"></div>
                </div>

              </div>

              <ul class="card-avatar-list">

                <li class="card-avatar-item">
                  <a href="#">
                    <img src=" {{ asset('images/avatar-1.jpg') }}" alt="Elizabeth Foster" width="32" height="32">
                  </a>
                </li>

                <li class="card-avatar-item">
                  <a href="#">
                    <img src="{{ asset('images/avatar-2.jpg') }}" alt="John Foster" width="32" height="32">
                  </a>
                </li>

              </ul>

            </div>
          </li>

          <li class="project-item">
            <div class="card project-card">

              <button class="card-menu-btn icon-box" aria-label="More" data-menu-btn>
                <span class="material-symbols-rounded  icon">more_horiz</span>
              </button>

              <ul class="ctx-menu">

                <li class="ctx-item">
                  <button class="ctx-menu-btn icon-box">
                    <span class="material-symbols-rounded  icon" aria-hidden="true">visibility</span>

                    <span class="ctx-menu-text">View</span>
                  </button>
                </li>

                <li class="ctx-item">
                  <button class="ctx-menu-btn icon-box">
                    <span class="material-symbols-rounded  icon" aria-hidden="true">edit</span>

                    <span class="ctx-menu-text">Edit</span>
                  </button>
                </li>

                <li class="divider"></li>

                <li class="ctx-item">
                  <button class="ctx-menu-btn red icon-box">
                    <span class="material-symbols-rounded  icon" aria-hidden="true">delete</span>

                    <span class="ctx-menu-text">Delete</span>
                  </button>
                </li>

              </ul>

              <h3 class="card-title">
                <a href="/dashboard/casts">Cast</a>
              </h3>

              <div class="card-badge orange">Actor</div>

              <p class="card-text">
              </p>

              <div class="card-progress-box">

                <div class="progress-label">
                  <span class="progress-title"></span>

                  <data class="progress-data" value="50"></data>
                </div>

                <div class="progress-bar">
                  <div class="progress" style="--width: 50%; --bg: var(--imperial-red);"></div>
                </div>

              </div>

              <ul class="card-avatar-list">

                <li class="card-avatar-item">
                  <a href="#">
                    <img src="{{ asset('images/avatar-1.jpg') }}" alt="Elizabeth Foster" width="32" height="32">
                  </a>
                </li>

                <li class="card-avatar-item">
                  <a href="#">
                    <img src="{{ asset('images/avatar-2.jpg') }}" alt="John Foster" width="32" height="32">
                  </a>
                </li>

              </ul>

            </div>
          </li>

        </ul>

      </section>
 @endcan

@endsection
