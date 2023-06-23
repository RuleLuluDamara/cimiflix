@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Payment Method List</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success" role='alert'>
  {{ session('success') }}
</div>
@endif
      <div class="table-responsive">
        <a href="/dashboard/payment_method/create" class="btn btn-primary">New Method</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Payment Method</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($payment_methods as $payment_method )
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $payment_method->method }}</td>
              <td>
                <a href="/dashboard/payment_method/{{ $payment_method->id }}/edit" class="badge btn-warning">edit</a>

                <form action="/dashboard/payment_method/{{ $payment_method->id }}" method="post" class="d-inline">
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