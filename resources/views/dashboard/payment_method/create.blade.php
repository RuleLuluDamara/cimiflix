@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create new</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/payment_method" enctype="multipart/form-data">
        @csrf
      <div class="mb-3">
        <label for="method" class="form-label">Method</label>
        <input type="text" class="form-control @error('method') is-invalid
        @enderror" id="method" name="method" required autofocus value="{{  old('method') }}">
        @error('method')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary mb-3">Create New</button>
    </form>
</div>

@endsection
