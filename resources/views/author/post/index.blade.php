@extends('layouts.author2')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
           <h1>Welcome, {{ auth()->user()->name }}</h1>
</div>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <div class="float-right">
                <a href="{{ route('author.posts.create') }}"><span data-feather="plus"></span>Add New Article</a>
            </div>

        </div>
        <div class="card-body">
         @if ( $articles->count())
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @foreach ($articles as $article)
                <tbody>
                    <tr>
                        <th scope="col">{{ $loop->iteration}}</th>
                        <td><img src="{{ $article->image == Null ? url('images/programming.jpg') : Storage::url('article/'. $article->image) }}" class="image" width="75px" height="75px"></td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->category->name }}</td>
                        <td>
                        <a href="{{ route('author.posts.show', $article->slug ) }}" class="badge bg-info"><span data-feather="eye"></span></a>
                        <a href="{{ route('author.posts.edit', $article->id) }}" class="badge bg-info"><span data-feather="edit"></span></a>
                        <form action="{{ route('author.posts.destroy', $article->id) }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Are u sure?')"><span data-feather="trash-2"></span></button>
                        </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            @else
            <p class="text-center fs-4">Articles Not Found</p>
        @endif
          <div class="pagination justify-content-center py-2">
            {{ $articles->links() }}
          </div>
        </div>
    </div>
</div>
@endsection
