<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;

class WelcomeController extends Controller
{
    public function index() {
        $posts = Post::orderBy('created_at', 'asc')->take(9)->get();
        $posts = Post::latest()->paginate(9);
        return view('welcome', compact('posts'));
    }

    public function show($id) {
        $post = Post::find($id);
        $post->content = Str::markdown($post->content);
        return view('post-detail', compact('post'));
    }
}
