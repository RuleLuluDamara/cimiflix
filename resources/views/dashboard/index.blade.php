@extends('dashboard.layouts.main')

@section('container')
<h2 class="h2 article-title">{{  auth()->user()->name }}</h2>

      <p class="article-subtitle">Welcome to Dashboard!</p>
@endsection