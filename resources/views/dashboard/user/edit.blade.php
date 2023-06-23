@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Movie</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/user/{{ $user->username }}" enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="form-floating">
              <input type="text" name="name" class="form-control @error('name') is-invalid
              @enderror" id="name" placeholder="Name" required value="{{ old('name', $user->name) }}" >
              <label for="name">Name</label>
              @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="text" name="username"  class="form-control @error('username') is-invalid
              @enderror" id="username" placeholder="Username" required value="{{ old('username',  $user->username) }}" >
              <label for="username">Username</label>
              @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="email" name="email" class="form-control @error('email') is-invalid
              @enderror" id="email" placeholder="name@example.com" required value="{{ old('email',  $user->email) }}" >
              <label for="email">Email address</label>
              @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
      
      <button type="submit" class="btn btn-primary mb-3">Update</button>
    </form>
</div>


@endsection
