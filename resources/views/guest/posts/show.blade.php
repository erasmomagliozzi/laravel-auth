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
  <div class="comments">
    <a href="btn btn-primary" href="">New Comment</a>
    @forelse ($post->comments as $comment)
      <ul>
        <li>{{$comment->name}}</li>
        <li>{{$comment->body}}</li>
        <li>{{$comment->update_at}}</li>
      </ul>
    @empty
    <h2>nessun commnet</h2>

    @endforelse
  </div>
@endsection
