<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/posts', function () {
    $posts = Post::all();
    return view('posts', ['posts' => $posts]);
});

Route::get('/posts/{id}', function ($id) {
    $post = Post::find($id);
    // dd($post);
    return view('post', ['post' => $post]);
});

Route::get('/categories', function () {
    $categories = Category::all();
    return view('categories', ['categories' => $categories]);
});

Route::get('/categories/{id}', function ($id) {
    $category = Category::find($id);
    // dd($category);
    if ($category == null) {
        return abort(404);
    }
    $posts = $category->posts;
    // dd($posts);
    return view('posts', ['posts' => $posts]);
});