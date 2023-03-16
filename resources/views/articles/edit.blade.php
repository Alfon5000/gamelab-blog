@extends('layouts.app')

@section('title', 'Edit Article')

@section('content')
  <div class="container">
    <h1>Edit Article</h1>
    <form action="/articles/{{ $article->id }}" method="post">
      @method('put')
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}">
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        <textarea class="form-control" id="body" rows="5" name="body">{{ $article->body }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
@endsection
