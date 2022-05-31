<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use Illuminate\Http\Request;

class PostLikecontroller extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function store(Post $post, Request $request )
   {
        if($post->likeBy($request->user())){
            return response(null, 409);
            }

        // dd($post->likeBy($request->user()));

        $post->likes()->create(['user_id' => $request->user()->id]);

        return back();
    }

    // public function destroy(Post $post, Request $request)
    // {
    //     //dd($post->post_id);
    //     $request->user()->likes()->where('post_id', $post->id)->delete();
        
    //     return back();
    // }
}
