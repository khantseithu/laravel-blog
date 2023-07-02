<?php

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
    return view('posts');
});

Route::get('/posts/{post}', function($slug) {
    $path = __DIR__ . "/../resources/posts/{$slug}.html";

    if(! file_exists($path)) {
        return redirect('https://khantseithu-automatic-zebra-wqxp9j6465xhg5v5-8000.preview.app.github.dev/');
    }

    $post = file_get_contents($path);

    return view('post', [
        'post' => $post
    ]);
});
