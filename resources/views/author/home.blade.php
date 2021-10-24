@extends('layouts.author')

@section('content')
  @foreach ($articles as $article)
  <div class="card-header mt-3" style="text-align: center">
    <h3>All Article</h3>
  </div>
        <div class="row">
          <div class="col-md-6 mt-3">
            <img src="{{ $article->image == null ? url('images/kunkka.png') : Storage::url( ('article/'. $article->image) ) }}" width="500px" height="350px">
          </div>

          <div class="col-md-6 mt-3">
            <div class="card-header">
              <h3 class=><a href="/author/articles/{{ $article->slug }}">{{ $article->title }}</a></h3>
            </div>
            <small class="text-muted">Created By: <a href="/author/{{ $article->user->username }}"> {{ $article->user->name }}</a>, Category: <a href="/author/categories/{{ $article->category->slug }}">{{ $article->category->name }}</a></small>
            <p><h4>{{ Str::limit($article->description, '100') }}</h4></p>
            <a href="/author/articles/{{ $article->slug }}">Read More...</a>
          </div>

          <div class="card-footer mt-2">
            <small class="text-muted">Last created {{ $article->created_at }}, By: {{ $article->user->name }}</small>
          </div>
        </div>
  @endforeach
        <div class="pagination justify-content-center py-2">
          {{ $articles->links() }}
        </div>
@endsection
