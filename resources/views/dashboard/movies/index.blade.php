@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Movie List</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success" role='alert'>
  {{ session('success') }}
</div>
@endif
      <div class="table-responsive">
        <a href="/dashboard/movies/create" class="btn btn-primary">New Movie</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($movies as $movie )
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $movie->name }}</td>
              <td>{{ $movie->genre->name }}</td>
              <td>
                <a href="/dashboard/movies/{{ $movie->slug }}" class="badge btn-info">view</a>
                <a href="/dashboard/movies/{{ $movie->slug }}/edit" class="badge btn-warning">edit</a>

                <form action="/dashboard/movies/{{ $movie->slug }}" method="movie" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge btn-danger border-0" onclick="return confirm('Are you sure?')">
                    delete
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>


@endsection