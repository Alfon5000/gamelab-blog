@extends('layouts.app')

@section('title', 'Home')

@section('content')
  <div class="container">
    <h1 class="text-center mb-3">Gamelab Blog</h1>
    <form action="/articles" method="get">
      <div class="input-group mb-3 w-75 mx-auto">
        <input type="text" class="form-control" placeholder="Search Article ..." name="search"
          value="{{ request('search') }}">
        <button class="btn btn-outline-primary" type="button">Search</button>
      </div>
    </form>
    @if ($count < 1)
      <div class="alert alert-danger" role="alert">
        No Articles
      </div>
    @else
      <div class="row align-item-center">
        @foreach ($articles as $article)
          <div class="col-4 my-3">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $article->created_at }}</h6>
                <p class="card-text">{{ Str::substr($article->body, 0, 50) }}</p>
                <a href="/{{ $article->id }}" class="card-link btn btn-primary">Read More...</a>
              </div>
            </div>
          </div>
        @endforeach
        {{ $articles->links() }}
      </div>
    @endif
  </div>
@endsection
