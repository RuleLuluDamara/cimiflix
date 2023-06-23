@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create new</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/rating_umur" enctype="multipart/form-data">
        @csrf
      <div class="mb-3">
        <label for="rate" class="form-label">Method</label>
        <input type="text" class="form-control @error('rate') is-invalid
        @enderror" id="rate" name="rate" required autofocus value="{{  old('rate') }}">
        @error('rate')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary mb-3">Create New</button>
    </form>
</div>

@endsection
