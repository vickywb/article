@extends('layouts.author2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <h2 class="mb-3" style="text-align: center">{{ $articles->title }}</h2>
                <a href="{{ url('author/posts') }}" class="btn btn-sm btn-outline-danger mb-2"><span data-feather="arrow-left"></span>Back</a>
                    <img src="{{ $articles->image == null ? url('images/programming.jpg') : Storage::url('article/' . $articles->image) }}" alt="image" width="100%" height="600px">
                    <div class="card-text fs-3">
                        <p> {!! $articles->description !!}</p>
                    </div>
             </div>
            </div>
        </div>
    </div>
</div>
@endsection
