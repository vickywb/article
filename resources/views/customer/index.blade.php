@extends('layouts.home')

@section('content')
  <div class="mb-5 mt-5" style="text-align: center">
    <h3>{{ $post }}</h3>
  </div>
    <div class="row">
      <div class="col-md-6">
        
      </div>
    </div>
    @if ( $articles->count())
        
      <div class="card mb-3">
        <img src="{{ $articles[0]->image == null ? url('images/programming.jpg') : Storage::url( ('article/'. $articles[0]->image) ) }}" class="card-img-top" height="500px">
        <div class="card-body" style="text-align: center">
          <h5 class="card-title fs-4">Title: <a href="/article/{{ $articles[0]->slug }}" class="text-decoration-none">{{ $articles[0]->title }}</a></h5>
          <small class="card-title fs-6">Created By: <a href="{{ url('articles?user='. $articles[0]->user->username) }}"> {{ $articles[0]->user->username }}</a> in: <a href="{{ url('articles?category=' . $articles[0]->category->slug ) }}">{{ $articles[0]->category->name }}</a></small>
          <p class="card-text"><h4>{!! Str::limit($articles[0]->description, '150') !!}</h4></p>
          <p class="card-text"><small class="text-muted">Last created {{ $articles[0]->created_at->diffForHumans() }}, By: {{ $articles[0]->user->username }}</small></p>
          <a href="{{ url('article/' . $articles[0]->slug) }}" class="btn btn-outline-primary">Read More...</a>
        </div>
      </div>

        <div class="row">
          @foreach ($articles->skip('1') as $article)
            <div class="col-md-6 mt-3">
              <div class="position-absolute px-2 py-1 " style="background-color: rgba(0, 0, 0, 0.4);"><a href="/article/{{ $article->slug }}" class="text-white text-decoration-none">{{ $article->title }}</a></div>
              <img src="{{ $article->image == null ? url('images/programming.jpg') : Storage::url( ('article/'. $article->image) ) }}" width="500px" height="350px">
            </div>

            <div class="col-md-6 mt-3">
              <p><h4 class="">{!! Str::limit($article->description, '150') !!}</h4></p>
              <a href="/article/{{ $article->slug }}" class="btn btn-outline-primary mb-2">Read More...</a>
              <div class="container px-0 mt-4">
              <small class="text-muted">Created By: <a href="{{ url('articles?user='. $article->user->username) }}"> {{ $article->user->username }}</a>, Category: <a href="{{ url('articles?category=' . $article->category->slug ) }}">{{ $article->category->name }}</a></small>
              </div>
              <div class="card-footer mt-1">
                <small class="text-muted">Last created {{ $article->created_at->diffForHumans() }}, By: {{ $article->user->username }}</small>
              </div>
            </div>
            
           
          @endforeach
        </div>
      @else
        <p class="text-center fs-4">Articles Not Found</p>
    @endif

      <div class="pagination justify-content-center py-2">
        {{ $articles->links() }}
      </div>
      
@endsection
