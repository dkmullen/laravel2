<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show($slug) 
    {
        // $posts = [
        //     'my-first-post' => 'Welcome. This is my first post',
        //     'my-second-post' => 'Welcome. This is my second post',
        // ];

        // $post = DB::table('posts')->where('slug', $slug)->first();
        // Cleaner way to do the above using Eloquent
        $post = Post::where('slug', $slug)->firstOrFail();
        // dd($post);
    
        // Replaced by firstOrFailß
        // if(!$post) {
        //     // Laravel's 404 page...
        //     abort(404, 'Sorry, that post doesn\'t exist.');
        // }
    
        return view('post', [
            'post' => $post
        ]);
    }
}
