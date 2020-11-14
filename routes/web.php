<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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
    return view('welcome');
});

Route::get('/aboutme', function () {
    // Retrieves name from the address string (ie, ?name=Dennis)
    $name = request('name');
    return view('aboutme', [
        'name' => $name
    ]);
});

Route::get('/json', function () {
    return ['foo' => 'bar'];
});

Route::get('/text', function () {
    return 'Heel it now, dig?';
});

// {post} is a wildcard, can be anything
// This example does the routing through a closure
Route::get('/posts/{post}', function ($post) {
    $posts = [
        'my-first-post' => 'Welcome. This is my first post',
        'my-second-post' => 'Welcome. This is my second post',
    ];

    if(!array_key_exists($post, $posts)) {
        // Laravel's 404 page...
        abort(404, 'Sorry, that post doesn\'t exist.');
    }

    return view('post', [
        'post' => $posts[$post]
    ]);
});

// This example does the routing through a controller
Route::get('/moreposts/{post}', [PostsController::class, 'show']);