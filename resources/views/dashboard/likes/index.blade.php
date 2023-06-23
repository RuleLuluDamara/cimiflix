@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Favorites</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success" role='alert'>
  {{ session('success') }}
</div>
@endif
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Movie</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($likes as $like)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $like->movie->name }}</td>
        <td>
          <form action="/dashboard/likes/{{ $like->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge btn-danger border-0" onclick="return confirm('Are you sure?')">
              remove
            </button>
          </form>
        </td>
      </tr>
      
      {{-- <div class="card task-card">

            <div class="card-icon icon-box green">
              <span class="material-symbols-rounded  icon">task_alt</span>
            </div>

            <div>
              <data class="card-data" value="21">21</data>

              <p class="card-text">Tasks Completed</p>
            </div>

          </div> --}}
      @endforeach
    </tbody>
  </table>
</div>

@endsection
