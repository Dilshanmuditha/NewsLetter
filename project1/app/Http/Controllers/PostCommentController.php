<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostCommentController extends Controller
{
    public function store(Post $post)
     {
        $post->comment()->create([
            'user_id' => request()->user()->id,
            'body'=> request('body'),
        ]);

        return back();
     }
}
