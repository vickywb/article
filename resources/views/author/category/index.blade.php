@extends('layouts.author2')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Welcome, {{ auth()->user()->name }}</h1>
</div>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <a href="{{ route('author.postcategories.create') }}"><span data-feather="plus"></span>Add New category</a>
                    </div>
                </div>
                <div class="card-body">
                    <h2>Article Categories :</h2>
                    <div class="card-title">
                        @foreach ($categories as $category)
                        <ul>
                            <li>{{ $category->name }} 
                                <form action="{{ route('author.postcategories.destroy', $category->id) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are u sure?')"><span data-feather="trash-2"></span></button>
                                </form>
                          </li>
                        </ul>
                        @endforeach
                    </div>
                </div>
                {{-- <div class="card-body">
                @foreach ($articles as $article)
                        <h2><a href="">{{ $article->title }}</a></h2>
                        <p>{{ $article->description }}</p>
                @endforeach --}}
             </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
Saepe ut, autem voluptas, similique quis necessitatibus inventore iste facere explicabo mollitia adipisci. 
Culpa, explicabo voluptates, repellat accusamus quisquam, 
reprehenderit libero laboriosam cumque porro hic ducimus voluptatem rerum qui dolor nobis delectus veritatis neque quasi. 
Distinctio fugiat, itaque repellendus assumenda officia, 
ea ut libero id tenetur quo laborum deserunt perferendis eos repellat pariatur minima nam consequatur laudantium. 
Consectetur laudantium, voluptas eligendi ea suscipit aspernatur itaque, optio eos quas ex deleniti iste ullam!
Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea possimus qui cupiditate ducimus! Asperiores quam consequuntur earum, 
iusto suscipit sunt? Sapiente, at temporibus magni quaerat accusantium quo, 
saepe quia cupiditate earum eligendi nulla adipisci officia quidem odio sequi beatae neque! Tempora maxime deserunt pariatur enim 
laudantium exercitationem commodi nulla quia quibusdam est blanditiis perspiciatis in assumenda dolor odio dolorem minima similique magni omnis iure, 
harum officiis doloremque praesentium! Eligendi quae minus voluptate provident quo molestias explicabo commodi nostrum repellat modi? Explicabo, porro. 
aque a odio, deleniti nihil ad distinctio itaque, adipisci atque laudantium pariatur quaerat sapiente? Cum, facere! Odio, iste. --}}