@extends('layouts.author2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2><a href="">Article Category: {{ $category->name }}</a></h2>
                    @foreach ($articles as $article)
                    <div class="card-title">
                       <h5 class="text-muted">Title: <a href="/author/articles/{{ $article->slug }}">{{ $article->title }}</a></h5>
                    </div>
                    <div class="card-text">
                        <p>{{ Str::limit($article->description, '20') }}</p>
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
