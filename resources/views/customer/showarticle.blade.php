@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <img src="{{ $article->image == null ? url('images/programming.jpg') : Storage::url('article/' . $article->image) }}"
                        alt="image" width="100%" height="600px">
                    <div class="card-title mt-3">
                        <h2>Title: {{ $article->title }}</h2>
                        <small class="text-muted fs-5">Created By: <a
                                href="{{ url('articles?user=' . $article->user->username) }}">{{
                                $article->user->username }}</a> in <a
                                href="{{ url('articles?category=' . $article->category->slug ) }}">{{
                                $article->category->name }}</a></small>
                    </div>
                    <div class="card-text fs-3">
                        {!! $article->description !!}
                    </div>
                    <div class="card-footer" style="text-align: center">
                        <a href="/" class="btn btn-outline-danger">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection