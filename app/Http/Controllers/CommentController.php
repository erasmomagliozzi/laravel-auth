<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Post;

use Illuminate\Http\Request;

class CommentController extends Controller
{


  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    $request->validate([
        'name' =>'required|string|max:255',
        'body' => 'required|string',
    ]);
    $data = $request->all();

    $newComment = new Comment;
    $newComment->fill($data);
    $saved = $newComment->save();

    if(!$saved) {
      return redirect()->back();
    }


    return redirect()->route('posts.show', $newComment->post->slug);
  }

}
