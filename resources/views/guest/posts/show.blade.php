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
    @forelse ($post->comments as $comment)
      <ul>
        <li>{{$comment->name}}</li>
        <li>{{$comment->body}}</li>
        <li>{{$comment->update_at}}</li>
      </ul>
    @empty
    <h2>nessun commnet</h2>

    @endforelse

    <div class="">
      <form action="{{route('comment.store')}}" method="post">
        @csrf
        @method('POST')
        <label for="name">Nome</label>
        <div class="form-group">
          <input type="text" name="name">

        </div>
        <label for="body">Body</label>
        <div class="form-group">
          <textarea name="body" rows="8" cols="80">

          </textarea>
        </div>

        <input type="hidden" name="post_id" value="{{$post->id}}">

        <button class="btn btn-success"type="submit" name="button">Salva</button>

      </form>
    </div>
  </div>
@endsection
