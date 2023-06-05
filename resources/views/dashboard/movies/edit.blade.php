@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit</h1>
</div>

<div class="col-lg-8">
    <form method="movies" action="/dashboard/movies/{{ $movies->slug }}" class="mb-5" enctype="multipart/form-data">
      @method('put')
        @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control @error('title') is-invalid
        @enderror" id="title" name="title" required autofocus value="{{  old('title', $movies->title) }}">
        @error('title')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid
        @enderror" id="slug" name="slug" required value="{{  old('slug', $movies->slug) }}">
        @error('slug')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="genre" class="form-label">Category</label>
        <select class="form-select"  name="genre_id" >
          @foreach ($categories as $genre )
          @if (old('genre_id', $movies->genre->id) == $genre->id)
            <option value="{{ $genre->id }}" selected>{{ $genre->name }}</option>
          @else 
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
          @endif
           @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label" for="image">Upload</label>
        <input type="hidden" name='oldImage' value="{{ $movies->image }}">
        @if ($movies->image)
          <img src="{{ asset('storage/' . $movies->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="" >
        @else
          <img class="img-preview img-fluid mb-3 col-sm-5" src="" alt="">
        @endif
        <input type="file" class="form-control @error('image') is-invalid
        @enderror" id="image" name="image" onchange="previewImage()">
        @error('image')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      <div class="mb-3">
        <label for="body" class="form-label">Description</label>
        @error('body')
          <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="body" type="hidden" name="body" value="{{ old('body', $movies->body) }}">
        <trix-editor input="body"></trix-editor>
          
      </div>
      
      <button type="submit" class="btn btn-primary mb-3">Update</button>
    </form>
</div>
<script>
const name = document.querySelector('#name');
const name = document.querySelector('#slug');

name.addEventListener('change', function(){
  fetch('/dashboard/movies/checkSlug?title=' + name.value)
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