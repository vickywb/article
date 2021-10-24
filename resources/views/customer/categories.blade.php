@extends('layouts.home')

@section('content')
    <div class="container mt-5">
        <h3 style="text-align: center">All Categories</h3>
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-md-4 mt-5">
                <a href="{{ url('articles?category='. $category->slug) }}">
                <div class="card bg-dark text-white">
                    <img src="{{ $category->image == Null ? asset('images/programming.jpg') : Storage::url('category/' . $category->image) }}" class="card-img" alt="{{ $category->name }}" height="400px">
                    <div class="card-img-overlay d-flex align-items-center p-0">
                      <h5 class="card-title text-center flex-fill py-4 fs-4" style="background-color: rgba(0, 0, 0, 0.7)">{{ $category->name }}</h5>
                    </div>
                </div>
                </a>    
            </div>
            @endforeach
        </div>
        <div class="pagination justify-content-center py-2">
            {{ $categories->links() }}
        </div>
    </div>
@endsection
