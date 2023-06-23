@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Casts List</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success" role='alert'>
  {{ session('success') }}
</div>
@endif
      <div class="table-responsive">
        <a href="/dashboard/casts/create" class="btn btn-primary">New Cast</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($casts as $cast )
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $cast->name }}</td>
              <td>
                <a href="/dashboard/casts/{{ $cast->id }}/edit" class="badge btn-warning">edit</a>
                <form action="/dashboard/casts/{{ $cast->id }}" method="post" class="d-inline">
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