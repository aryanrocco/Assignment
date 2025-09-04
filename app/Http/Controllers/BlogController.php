<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Show all posts
    public function index()
    {
        $posts = Post::latest()->paginate(6);
        return view('blog.index', compact('posts'));
    }

    // Show single post
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('blog.show', compact('post'));
    }
}
