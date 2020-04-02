@extends('layouts.app');
@section('content')
  <form action="{{route('admin.posts.update', $post)}}" method="post">
    @csrf
    @method('PATCH')
    <label for="title">Titolo</label>
    <div class="form-group">
      <input type="text" name="title" value="{{$post->title}}">

    </div>
    <label for="body">Body</label>
    <div class="form-group">
      <textarea name="body" rows="8" cols="80" id="body">
        {{$post->body}}
      </textarea>
    </div>

    <label for="title">Tags</label>
    <div class="form-group">
      @foreach ($tags as $tag)
      <div class="">
        <span>{{$tag->name}}</span>

        <input type="checkbox" name="tags[]" value="{{$tag->id}} {{($post->tags->contains($tag->id)) ? 'checked' : ''}}">
      </div>
      @endforeach

    </div>


    <input type="hidden" name="user_id" value="{{Auth::id()}}">
    <button class="btn btn-success"type="submit" name="button">Salva</button>

  </form>
@endsection
