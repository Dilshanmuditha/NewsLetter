<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboardCreate()
    {
        return view('post-create');
    }
    public function index()
    {
        $post = Post::latest();
        return view('dashboard', [
            'post' => Post::all()
        ]);
    }
    public function store()
    {
        //dd($request->all());
        $posts = new Post;
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required'
        ]);
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);
        return redirect('/dashboard');
    }
}
