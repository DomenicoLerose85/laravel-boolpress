@extends('layouts.admin');

@section('content')
  <a href="{{route('admin.posts.create')}}" class="btn btn-primary">Create a new post</a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Creation Date</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($categories as $category)
    <tr>
      <td><a href="{{route('admin.categories.show', $category->id)}}">{{$category->id}}</a></td>
      <td><a href="{{route('admin.categories.show', $category->id)}}">{{$category->title}}</a></td>
      <td>{{$category->created_at}}</td>
      <td><a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-primary">Edit</a></td>
      <td>
        <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" @@click="openModal($event, {{$category->id}}" class="btn btn-warning delete">Delete</button>

        </form>
      </td>
    </tr>    
    @endforeach
  </tbody>
</table>
{{ $categories->links() }}
@endsection