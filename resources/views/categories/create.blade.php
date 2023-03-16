@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
  <div class="container">
    <h1>Create Category</h1>
    <form action="/categories" method="post">
      @csrf
      <div class="mb-3">
        <label for="category" class="form-label">Category Name</label>
        <input type="text" class="form-control" id="category" name="name">
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
    </form>
  </div>
@endsection
