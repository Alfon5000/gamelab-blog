@extends('layouts.app')

@section('title', 'Categories')

@section('content')
  <div class="container">
    <h1 class="mb-3 text-center">Categories</h1>
    <form action="/categories" method="get">
      <div class="input-group mb-3 w-50 mx-auto">
        <input type="text" class="form-control" placeholder="Search Category ..." name="search"
          value="{{ request('search') }}">
        <button class="btn btn-outline-primary" type="button">Search</button>
      </div>
    </form>
    <a href="/categories/create" class="btn btn-primary mb-3">Create Category</a>
    @if ($count < 1)
      <div class="alert alert-danger" role="alert">
        No Categories
      </div>
    @else
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $category->name }}</td>
              <td>
                <a href="/categories/{{ $category->id }}/edit" class="btn btn-warning">Edit</a>
                <form action="/categories/{{ $category->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $categories->links() }}
    @endif
  </div>
@endsection
