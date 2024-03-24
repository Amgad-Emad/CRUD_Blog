<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $postsfromDB = Post::all();

    return view('posts.index', ['posts' => $postsfromDB]);
});
//1- define a new route so the user can access it through browser
//2-difne controller that renders a view
//3-difine view that contains list of posts
//4- remove the static html data form the view

Route::get('/posts',[PostController::class,'index'])->name('posts.index');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::post('/posts',[PostController::class,'store'])->name('posts.store');


Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show');
Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/user',[UserController::class,'create'])->name('user.create');
Route::post('/user',[UserController::class,'store'])->name('user.store');

