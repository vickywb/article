@extends('layouts.author2')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header"><h3>{{ __('Form Create New Category')  }}</h3></div>
        <div class="card-body">
          <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                  <form role="form" action="{{ route('author.postcategories.store')  }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- text input -->
                    <div class="form-group my-2">
                      <label for="name">{{ __('Name of Category') }}</label>
                      <input value="{{ old('name') }}" type="text" class="form-control" name="name" id="name" placeholder="{{ __('input a Name of Category') }}" required autocomplete="off">  
                    </div>
                    <div class="form-group my-2">
                      <label for="slug">{{ __('Name of Slug') }}</label>
                      <input value="{{ old('slug') }}" type="text" class="form-control" name="slug" id="slug"  required autocomplete="off">  
                    </div>
                    <div class="form-group my-2">
                      <label for="image">Input an Image</label>
                      <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    <div class="box-footer">
                      <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
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

@section('javascript2')
<script>
  //untuk menambahkan auto slug ketika title sudah diisi
  const name = document.querySelector('#name'); //make an variable using title id as parameter
  const slug = document.querySelector('#slug'); //make an variable using slug id as parameter

  name.addEventListener('change', function() { //title element have a event 'change' which is when the cursor touch any spot after input value on title. function fetch will get the url and add title value
    fetch('/author/postcategories/cekSlug?name=' + name.value)
    .then(Response => Response.json()) 
    .then(data => slug.value = data.slug)
  });
</script>
@endsection