<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

use App\Models\Post;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Display the home page with posts.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $posts = Post::with('user')
        ->where('visibility', 'public')
        ->latest()
        ->paginate(6) 
        ->withQueryString();
        
        return Inertia::render('Home', [
            'posts' => $posts,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }
    public function readMore(Request $request, $id)
    {
        // Fetch the post by ID
        //$post = Post::with('user')->findOrFail($id);
        $post = Post::with(['user', 'comments.user'])->findOrFail($id);


        // Return data to the ReadMore.vue component using Inertia
        return Inertia::render('ReadMore', [
            'post' => $post,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
        
    }
}
