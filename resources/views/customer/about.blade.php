@extends('layouts.home')

@section('content')
    <div class="container mt-5">
        <h3 style="text-align: center">All Author</h3>
        <div class="row">
            @foreach ($users as $user)
            <div class="col-md-4 mt-5">
                <a href="{{ url('articles?user='. $user->username) }}">
                <div class="card bg-dark text-white">
                    <img src="{{ $user->image == Null ? asset('images/programming.jpg') : Storage::url('profile/' . $user->image) }}" class="card-img" alt="{{ $user->name }}" height="300px">
                    <div class="card-img-overlay d-flex align-items-center p-0">
                      <h5 class="card-title text-center flex-fill py-4 fs-4" style="background-color: rgba(0, 0, 0, 0.7)">{{ $user->username }}</h5>
                    </div>
                </div>
                </a>  
            </div>
            @endforeach
        </div>
        <div class="pagination justify-content-center py-2">
            {{ $users->links() }}
        </div>
    </div>
@endsection
