@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Cast</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/casts/{{ $cast->id }}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Cast</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $cast->name) }}">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mb-3">Update</button>
            <a href="/dashboard/casts" class="btn btn-secondary mb-3">Cancel</a>
        </form>
    </div>
</div>
@endsection
