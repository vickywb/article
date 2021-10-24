@extends('layouts.author2')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
           <h1>Welcome, {{ auth()->user()->name }}</h1>
</div>
{{-- <div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <div class="float-right">
                <a href="#"><i class="fa fa-plus" aria-hidden="true">Tambah</i></a>
            </div>

        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Exceprt</th>
                        <th scope="col">Description</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                @foreach ($articles as $article)
                <tbody>
                    <tr>
                        <th scope="col">{{ $article->id }}</th>
                        <td><img src="{{ $article->image == Null ? url('images/kunkka.png') : Storage::url('article/'. $article->image) }}" class="image" width="75px" height="75px"></td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->slug }}</td>
                        <td>{{ Str::limit($article->description, '35') }}</td>
                        <td><a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                        <td><form action="">
                            <a href=""><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
           {{ $articles->links() }}
        </div>
    </div> --}}
</div>
@endsection
