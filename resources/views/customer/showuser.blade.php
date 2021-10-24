@extends('layouts.home')

@section('content')
          <div class="container">
            <div class="card">
                <div class="card-body mt-5" style="text-align: center">
                    <h2>Post By Author: {{ $user->username }}</h2>
                    <img src="{{ $user->image == Null ? asset('images/profile.jpg') : Storage::url('profile/' .$user->image ) }}" alt="" width="300px" height="250px" class="card-img-center">
                    <div class="row mt-5">
                        @foreach ($articles as $article)
                            <div class="col-md-4">
                                <img src="{{ $article->image == Null ? asset('images/be.jpg') : Storage::url('article/' . $article->image ) }}" alt="" width="300px" height="250px">
                                <div class="card-title fs-5" style="text-align: left">
                                    <small class="text-muted">Title: <a href="{{ url('article/' .  $article->slug) }}">{{ Str::limit($article->title, '25') }}</a></small> <br>
                                    <small class="text-muted">Category: <a href="{{ url('category/' . $article->category->slug ) }}">{{ $article->category->name }}</a></small>
                                </div>
                                <div class="card-text fs-4">
                                    <p>{{ Str::limit($article->description, '50') }}</p>
                                </div>
                                <div>
                                    <a href="{{ url('article/' .  $article->slug) }}" class="btn btn-outline-primary mb-3">Read more..</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <a href="/" class="btn btn-outline-danger">Back</a>
                    </div>
                </div>
            </div>
          </div>
@endsection