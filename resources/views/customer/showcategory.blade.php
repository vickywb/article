@extends('layouts.home')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header mt-5" style="text-align: center">
            <h2>Article Category: {{ $category->name }}</h2>
            <img src="{{ $category->image == Null ? asset('images/programming.jpg') : Storage::url('category/'. $category->image)  }}" alt="..." width="500px" height="350">
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-md-4 mt-3">
                        <img src="{{ $article->image == null ? asset('images/wb.jpg') : storage::url('article/' . $article->image )}}" alt="" width="350px" height="300px">
                        <div class="card-title fs-4">
                            <small class="text-muted">Title: <a href="{{ url('articles?='. $article->slug) }}">{{ Str::limit($article->title, '25') }}</a></small><br>
                            <small class="text-muted">Created By: <a href="{{ url('articles?user=' . $article->user->username) }}">{{ $article->user->username }}</a></small>
                        </div>
                        <div class="card-text fs-5">
                            <p>{{ Str::limit($article->description, '20') }}</p>
                        </div>
                         <div>
                            <a href="{{ url('article/' .  $article->slug) }}" class="btn btn-outline-primary mb-3">Read more..</a>
                        </div>
                    </div>
                @endforeach
                    <div class="card-footer" style="text-align: center">
                        <a href="/" class="btn btn-outline-danger">Back</a>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
