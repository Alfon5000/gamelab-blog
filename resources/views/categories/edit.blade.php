@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
  <div class="container">
    <h1>Edit Category</h1>
    <form action="/categories/{{ $category->id }}" method="post">
      @method('put')
      @csrf
      <div class="mb-3">
        <label for="category" class="form-label">Category Name</label>
        <input type="text" class="form-control" id="category" name="name" value="{{ $category->name }}">
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
@endsection
