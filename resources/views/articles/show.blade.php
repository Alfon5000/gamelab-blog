@extends('layouts.app')

@section('title', 'Article Detail')

@section('content')
  <div class="container">
    <h1 class="mb-3">{{ $article->title }}</h1>
    <small>{{ $article->updated_at }}</small>
    <p class="text-justify mt-3">{{ $article->body }}</p>
    <a href="/articles" class="btn btn-danger">Back to Articles</a>
  </div>
@endsection
