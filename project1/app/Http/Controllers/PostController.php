<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class PostController extends Controller
{
    
     public function store(){
        //dd($request->all());

        $posts = new Post;
        $attributes = request()->validate([
            'title'=> 'required',
            'thumbnail'=> 'required|image',
            'slug'=> ['required',Rule::unique('posts','slug')],
            'excerpt'=> 'required',
            'body'=> 'required'
        ]);
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);
        return redirect('/dashboard');
     }



     public function index()
     {
        $post = Post::latest();
        return view('dashboard',[
            'post' => Post::all()
        ]);
     }

     public function post(Post $post)
     {       
        return view('post',[
          'post'=> $post
        ]);
     }
     public function category(Category $category)
     {
        
      return view('welcome', [
         'post' => $category->post->load(['category', 'author']),
         'currentCategory' => $category,
         'categories' => category::all()
     ]);
     }
}
