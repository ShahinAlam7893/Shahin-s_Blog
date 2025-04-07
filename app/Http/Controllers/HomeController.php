<?php

namespace App\Http\Controllers;
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
        // Fetch public posts with the user who created them
        $posts = Post::with('user')->where('visibility', 'public')->latest()->get();

        // Return data to the Home.vue component using Inertia
        return Inertia::render('Home', [
            'posts' => $posts,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }
}
