<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $post = Post::latest();
    return view('welcome',[
        'post' => $post->paginate(5),
        'categories'=> category::all()
]);
});

/*Route::get('/dashboard', function (Post $post) {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/

require __DIR__.'/auth.php';

Route::get('/dashboard/create',function(){
    return view('post-create');
});

Route::post('/admin/posts',[PostController::class,'store']);
Route::get('/dashboard', [PostController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('post/{post:slug}',[PostController::class,'post']);
Route::get('categories/{category:name}',[PostController::class,'category']);
