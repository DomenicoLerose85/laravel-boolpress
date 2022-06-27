@extends('layouts.admin');

@section('content')
    <form action="{{route(admin.posts.store)}}" method="POST">
        @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" placeholder="Insert title">
  </div>
  <div class="mb-3">
    <label for="content" class="form-label">Content</label>
    <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{old('content')}}</textarea>
  </div>
  <div class="mb-3 form-check">
    <label for="category" class="form-label">Categoriey</label>
    <select name="category" id="category">
      @foreach ($categories as $category)
      <option value="{{$category->id}}">{{$category->name}}</option>
          
      @endforeach 
    </select>
    @error('category_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="checkbox" class="form-check-input" id="published" name="published">
    <label class="form-check-label" {{old('published') ? 'checked' : ''}} for="published">Published</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection