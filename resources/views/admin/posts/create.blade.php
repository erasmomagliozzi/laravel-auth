@extends('layouts.app');
@section('content')
  <form action="{{route('admin.posts.store')}}" method="post">
    @csrf
    @method('POST')
    <label for="title">Titolo</label>
    <div class="form-group">
      <input type="text" name="title">

    </div>
    <label for="body">Body</label>
    <div class="form-group">
      <textarea name="name" rows="8" cols="80">

      </textarea>
    </div>


    <input type="hidden" name="user_id" value="{{Auth::id()}}">
    <button class="btn btn-success"type="submit" name="button">Salva</button>

  </form>
@endsection