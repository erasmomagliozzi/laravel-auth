<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{

   private $validateRules;

   public function __construct()
   {

     $this->validateRules = [
       'title' => 'required|string|max:255',
       'body' => 'required|string'
     ];
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::where('user_id', Auth::id())->get();

      return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $idUser = Auth::user()->id;
      $request->validate($this->validateRules);
      $data = $request->all();

      $newPost = new Post;
      $newPost->title = $data['title'];
      $newPost->body = $data['body'];
      $newPost->user_id = $idUser;
      $newPost->slag = Str::finish(Str::slug($newPost->title), rand(1, 1000));

      $saved = $newPost->save();
      if(!$saved) {
        return redirect()->back();
      }

      return redirect()->route('admin.posts.show', $newPost->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->get();
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
      $post = Post::where('slug', $slug)->get();
      return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
      if(empty($post)){
        abort(404);
      }

      $post->delete();
      return redirect()->route('admin.posts.index');
    }
}
