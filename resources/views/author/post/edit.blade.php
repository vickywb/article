@extends('layouts.author2')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header"><h3>{{ __('Form Edit Article')  }}</h3></div>
        <div class="card-body">
          <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                  <form role="form" action="{{ route('author.posts.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <!-- text input -->
                    {{-- <select class="form-select" aria-label="Default select example" name="user_id" required>
                      <option selected value="">Select Author Name</option>
                        <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                    </select> --}}

                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    
                    <div class="form-group">
                      <label for="category_id"></label>
                        <select class="form-select" aria-label="Select Category" name="category_id">
                          <option>Select Category</option>
                          @foreach ($categories as $category)
                            @if (old('category_id', $article->category_id) == $category->id)
                              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                          @endforeach
                        </select>
                   </div>

                    <div class="form-group my-2">
                      <label for="title">{{ __('Title') }}</label>
                      <input value="{{ old('title', $article->title) }}" type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" required autocomplete="off">  
                        @error('title')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                      <label for="slug">{{ __('Slug') }}</label>
                      <input value="{{ old('slug', $article->slug) }}" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" required autocomplete="off">  
                        @error('slug')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                      <label for="image" class="form-label">Input an Image</label>
                      <input type="hidden" name="oldImage" value="{{ $article->image }}">
                      @if ($article->image)
                        <img src="{{ Storage::url('article/' . $article->image ) }}" alt="" class="img-preview img-fluid mb-3 col-sm-3 d-block">
                      @else
                       <img class="img-preview img-fluid mb-3 col-sm-5"> 
                      @endif
                      <input type="file" class="form-control" id="image" name="image" onchange="previewImage()">
                    </div>
                    <div class="form-group my-2">
                      <label for="description" class="form-label">{{ ('Description') }}</label>
                      <input id="description" type="hidden" name="description" value="{{ old('description', $article->description) }}">
                      <trix-editor input="description"></trix-editor>
                      {{-- <textarea class="form-control" id="description" rows="5" name="description" required placeholder="{{ __('input a Description') }}">{{ old('description') }}</textarea> --}}
                  </div>
                    <div class="box-footer">
                      <button type="submit" class="btn btn-success">{{ __('Update') }}</button>
                      <button type="button" class="btn btn-secondary float-right" onclick="window.history.back()">{{ __('Cancel') }}</button>
                    </div>
                  </form>
                </div>
                <!-- /.box-body -->
              </div>
          </div>
        </div>
      </div>
</div>
@endsection

@section('javascript')
<script>
  //untuk menambahkan auto slug ketika title sudah diisi
  const title = document.querySelector('#title'); //make an variable using title id as parameter
  const slug = document.querySelector('#slug'); //make an variable using slug id as parameter

  title.addEventListener('change', function() { //title element have a event 'change' which is when the cursor touch any spot after input value on title. function fetch will get the url and add title value
    fetch('/author/posts/checkSlug?title=' + title.value) //then title value is a 'string' which is should be changed to a json
    .then(Response => Response.json()) 
    .then(data => slug.value = data.slug)
  });

  document.addEventListener('trix-file-accept', function(e) { 
    e.preventDefault();
  })

function previewImage() {
  const image = document.querySelector('#image');
  const imgPreview = document.querySelector('.img-preview');

  imgPreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload = function(oFREvent) {
    imgPreview.src = oFREvent.target.result;
  }
}
</script>
@endsection