<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                        request(['search', 'category', 'author'])
                    )->paginate(5)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        //dd($post);
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
