@extends('layouts.author')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2>Post By Author: {{ $user->username }}</h2>
                    @foreach ($articles as $article)
                    <div class="card-title">
                       <h5 class="text-muted">Title: <a href="/author/articles/{{ $article->slug }}">{{ $article->title }}</a></h5> 
                       <h6 class="text-muted">category: <a href="/author/categories/{{ $article->category->slug }}">{{ $article->category->name }}</a></h6>
                    </div>
                    <div class="card-text">
                        <p>{{ Str::limit($article->description, '30') }}</p>
                    </div>
                    @endforeach

                    <div class="card-footer">
                        <a href="/">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection