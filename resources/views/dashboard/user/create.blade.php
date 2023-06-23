@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create new</h1>
</div>

<div class="col-lg-8">
    <form action="/dashboard/users" method="post">
    @csrf
    <div class="form-floating">
      <input type="text" name="name" class="form-control @error('name') is-invalid
      @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
      <label for="name">Name</label>
      @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
       @enderror
    </div>
    <div class="form-floating">
      <input type="text" name="username"  class="form-control @error('username') is-invalid
      @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
      <label for="username">Username</label>
      @error('username')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
       @enderror
    </div>
    <div class="form-floating">
      <input type="email" name="email" class="form-control @error('email') is-invalid
      @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
      <label for="email">Email address</label>
       @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
       @enderror
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control @error('password') is-invalid
      @enderror" id="password" placeholder="Password" required>
      <label for="password">Password</label>
       @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
       @enderror
    </div>

    <button class="btn btn-primary w-100 py-2" type="submit">Add</button>
    </form>
</div>
<script>
  document.addEventListener('trix-file-accept', function(){
    e.preventdefault();
  });

  function previewImage(){
  const image = document.querySelector('#image');
  const imgPreview = document.querySelector('.img-preview');
  
  imgPreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);
  oFReader.onload = function(oFREvent) {
    imgPreview.src = oFREvent.target.result;
  }

  }

</script>

@endsection
