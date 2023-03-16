@extends('layouts.app')

@section('title', 'Articles')

@section('content')
  <div class="container">
    <h1 class="mb-3">Articles</h1>
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
            <th scope="col">Body</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($articles as $article)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $article->title }}</td>
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
    @endif
  </div>
@endsection
