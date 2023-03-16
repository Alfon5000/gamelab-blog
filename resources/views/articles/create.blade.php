@extends('layouts.app')

@section('title', 'Create Article')

@section('content')
  <div class="container">
    <h1>Create Article</h1>
    <form action="/articles" method="post">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        <textarea class="form-control" id="body" rows="5" name="body"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
    </form>
  </div>
@endsection
