@extends('layouts.app');
@section('content')
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Body</th>
        <th>User ID</th>
        <th>Created at</th>
        <th>Updated at</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->body}}</td>
        <td>{{$post->user_id}}</td>
        <td>{{$post->created_at}}</td>
        <td>{{$post->update_at}}</td>
      </tr>
    </tbody>
  </table>

  <h3>Tags</h3>
    @foreach ($post->tags as $tag)
     <ul>
      <li>{{$tag->name}}</li>
     </ul>
    @endforeach
@endsection
