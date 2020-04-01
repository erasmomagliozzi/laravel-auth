
@extends('layouts.app');
@section('content')


  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>User ID</th>
        <th>Created at</th>
        <th colspan='3'></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
      <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->user_id}}</td>
        <td>{{$post->created_at}}</td>
        <td><a href="{{route('posts.show', $post->slug)}}">View</a> </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
