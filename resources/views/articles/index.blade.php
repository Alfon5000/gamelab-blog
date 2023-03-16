@extends('layouts.app')

@section('title', 'Articles')

@section('content')
  <div class="container">
    <h1 class="mb-3 text-center">Articles</h1>
    <form action="/articles" method="get">
      <div class="input-group mb-3 w-50 mx-auto">
        <input type="text" class="form-control" placeholder="Search Article ..." name="search"
          value="{{ request('search') }}">
        <button class="btn btn-outline-primary" type="button">Search</button>
      </div>
    </form>
    <a href="/articles/create" class="btn btn-primary mb-3">Create Article</a>
    @if ($count < 1)
      <div class="alert alert-danger" role="alert">
        No Articles
      </div>
    @else
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Body</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($articles as $article)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $article->title }}</td>
              <td>{{ $article->category->name }}</td>
              <td>{{ Str::substr($article->body, 0, 50) }}...</td>
              <td>
                <a href="/articles/{{ $article->id }}" class="btn btn-info">Detail</a>
                <a href="/articles/{{ $article->id }}/edit" class="btn btn-warning">Edit</a>
                <form action="/articles/{{ $article->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $articles->links() }}
    @endif
  </div>
@endsection
