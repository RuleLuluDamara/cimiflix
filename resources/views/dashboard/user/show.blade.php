@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-5">{{ $user->name }}</h1>

            <a href="/dashboard" class="btn btn-success mb-3">Back</a>
            <a href="/dashboard/user/{{ $user->username }}/edit" class="btn btn-warning mb-3">edit</a>

            <form action="/dashboard/user/{{ $user->username }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="btn btn-danger mb-3" onclick="return confirm('Are you sure?')">
                delete
              </button>
            </form>            
            <div class="form-floating">
              <input type="text" name="name" class="form-control @error('name') is-invalid
              @enderror" id="name" placeholder="Name" required value="{{ old('name', $user->name) }}" disabled>
              <label for="name">Name</label>
              @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="text" name="username"  class="form-control @error('username') is-invalid
              @enderror" id="username" placeholder="Username" required value="{{ old('username',  $user->username) }}" disabled>
              <label for="username">Username</label>
              @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="email" name="email" class="form-control @error('email') is-invalid
              @enderror" id="email" placeholder="name@example.com" required value="{{ old('email',  $user->email) }}" disabled>
              <label for="email">Email address</label>
              @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>

        </div>
    </div>
</div>
@endsection