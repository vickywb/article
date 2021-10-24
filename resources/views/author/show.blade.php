@extends('layouts.author')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <img src="{{ $articles->image == null ? url('images/kunkka.png') : Storage::url('article/' . $articles->image) }}" alt="image" width="100%" height="600px">
                    <div class="card-title">
                    <h2><a href="">{{ $articles->title }}</a></h2>
                    <small class="text-muted">Created By: <a href="/author/about"> {{ Auth::user()->name }}</a> in <a href="/author/categories/{{ $articles->category->slug }}">{{ $articles->category->name }}</a></small>
                    </div>
                    <div class="card-text">
                        <p>{{ $articles->description }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="/">Back</a>
                    </div>
             </div>
            </div>
        </div>
    </div>
</div>
@endsection
