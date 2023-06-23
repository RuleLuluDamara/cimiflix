@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Payment Method</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/payment_method/{{ $payment_method->id }}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="method" class="form-label">Method</label>
                <input type="text" class="form-control @error('method') is-invalid @enderror" id="method" name="method" required autofocus value="{{ old('method', $payment_method->method) }}">
                @error('method')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mb-3">Update</button>
            <a href="/dashboard/payment_method" class="btn btn-secondary mb-3">Cancel</a>
        </form>
    </div>
</div>
@endsection
