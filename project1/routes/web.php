<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostCommentController;
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



/*Route::get('/dashboard', function (Post $post) {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/

require __DIR__.'/auth.php';
Route::get('/', [PostController::class,'handle']);
Route::post('/admin/posts',[AdminController::class,'store']);
Route::get('post/{post:slug}',[PostController::class,'post']);
Route::get('categories/{category:name}',[PostController::class,'category']);
Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard/create',[AdminController::class,'dashboardCreate']);
Route::post('posts/{post:slug}/comment', [PostCommentController::class, 'store']);
