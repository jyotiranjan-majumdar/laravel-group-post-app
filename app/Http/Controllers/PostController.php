<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user','likes'])->latest()->paginate(10);
        return view('posts.index', ['post'=>$posts]);
    }

    public function store(request $request)
    {
        $this->validate($request, [
            'body'=>'required'
        ]);
        
        $request->user()->posts()->create($request->only('body'));

        return back();


    }


    public function destroy(Post $post)
    {
        $post->delete();

        return back();

    }
}
