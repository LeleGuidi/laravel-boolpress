<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::where('public', 1)->get();
        return response()->json($posts);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->with(['categories', 'tags'])->first();
        return response()->json($post);
    }
}
