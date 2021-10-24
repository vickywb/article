@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <img src="{{ $articles->image == null ? url('images/programming.jpg') : Storage::url('article/' . $articles->image) }}" alt="image" width="100%" height="600px">
                    <div class="card-title mt-3">
                    <h2>Title: {{ $articles->title }}</h2>
                      <small class="text-muted fs-5">Created By: <a href="{{ url('articles?user=' . $articles->user->username) }}">{{ $articles->user->username }}</a> in <a href="{{ url('articles?category=' . $articles->category->slug ) }}">{{ $articles->category->name }}</a></small>
                    </div>
                    <div class="card-text fs-3">
                        {!! $articles->description !!}
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
