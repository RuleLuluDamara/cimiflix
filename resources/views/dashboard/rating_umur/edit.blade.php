@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Payment Method</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/rating_umur/{{ $rating_umur->id }}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="rate" class="form-label">Method</label>
                <input type="text" class="form-control @error('rate') is-invalid @enderror" id="rate" name="rate" required autofocus value="{{ old('rate', $rating_umur->rate) }}">
                @error('rate')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mb-3">Update</button>
            <a href="/dashboard/rating_umur" class="btn btn-secondary mb-3">Cancel</a>
        </form>
    </div>
</div>
@endsection
