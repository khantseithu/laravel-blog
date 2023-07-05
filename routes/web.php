<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

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
    $posts = Post::latest()->with(['category','author'])->get();

    return view('posts', [
        'posts' => $posts,
        'categories' => Category::all()
    ]);
})->name('home');

Route::get('/posts/{post:slug}', function(Post $post) {
    // find the post by its slug and pass it to a view called "post"


    // ddd($post);
    return view('post', [
        'post' => $post
    ]);

});

Route::get('/category/{category:slug}', function(Category $category){
    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
})->name('category');

Route::get('/author/{author:username}', function(User $author){
    return view('posts', [
        'posts' => $author->posts
    ]);
});
