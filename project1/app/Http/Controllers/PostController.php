<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
   public function post(Post $post)
   {
      return view('post', [
         'post' => $post,
      ]);
   }

   public function category(Category $category)
   {

      return view('welcome', [
         'post' => $category->post->load(['category', 'author']),
         'currentCategory' => $category,
         'categories' => category::all(),
      ]);
   }

   public function handle()
   {
      $post = Post::latest();

      return view('welcome', [
         'post' => $post->paginate(5),
         'categories' => category::all(),
      ]);
   }
}
