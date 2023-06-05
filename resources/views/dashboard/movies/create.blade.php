@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create new</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/movies" enctype="multipart/form-data">
        @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Title</label>
        <input type="text" class="form-control @error('name') is-invalid
        @enderror" id="name" name="name" required autofocus value="{{  old('name') }}">
        @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid
        @enderror" id="slug" name="slug" required value="{{  old('slug') }}">
        @error('slug')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="genre" class="form-label">Genre</label>
        <select class="form-select"  name="genre_id" >
          @foreach ($genres as $genre )
          @if (old('genre_id') === $genre->id)
            <option value="{{ $genre->id }}" selected>{{ $genre->name }}</option>
          @else 
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
          @endif
           @endforeach
        </select>
      </div>
      {{-- <div class="mb-3">
        <label for="rilis" class="form-label">Rilis</label>
        <input type="text" class="form-control @error('rilis') is-invalid
        @enderror" id="rilis" name="rilis" required autofocus value="{{  old('rilis') }}">
        @error('rilis')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="resolusi" class="form-label">Resolusi</label>
        <input type="text" class="form-control @error('resolusi') is-invalid
        @enderror" id="resolusi" name="resolusi" required autofocus value="{{  old('resolusi') }}">
        @error('resolusi')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="durasi" class="form-label">Durasi</label>
        <input type="text" class="form-control @error('durasi') is-invalid
        @enderror" id="durasi" name="durasi" required autofocus value="{{  old('durasi') }}">
        @error('durasi')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="director" class="form-label">Director</label>
        <input type="text" class="form-control @error('director') is-invalid
        @enderror" id="director" name="director" required autofocus value="{{  old('director') }}">
        @error('director')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="studio_production" class="form-label">Studio production</label>
        <input type="text" class="form-control @error('studio_production') is-invalid
        @enderror" id="studio_production" name="studio_production" required autofocus value="{{  old('studio_production') }}">
        @error('studio_production')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div> --}}
      <div class="mb-3">
        <label class="form-label" for="image">Upload</label>
        <img class="img-preview img-fluid mb-3 col-sm-5" src="" alt="">
        <input type="file" class="form-control @error('image') is-invalid
        @enderror" id="image" name="image" onchange="previewImage()">
        @error('iamge')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">Description</label>
        @error('body')
          <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="body" type="hidden" name="body" value="{{ old('body') }}">
        <trix-editor input="body"></trix-editor>
          
      </div>
      
      <button type="submit" class="btn btn-primary mb-3">Create New</button>
    </form>
</div>
<script>
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');

  name.addEventListener('change', function() {
    fetch('/dashboard/movies/checkSlug?name=' + name.value)
      .then(response => response.json())
      .then(data => {
        slug.value = data.slug;
      })
      .catch(error => {
        console.error('Error:', error);
      });
  });


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
