<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::latest()->take(6)->get();
        return view('index', compact('posts'));
    }

    public function posts()
    {
        $categories = Category::all();
        $posts = Post::latest()->take(10)->get();
        return view('posts', compact('posts', 'categories'));
    }

    public function categories()
    {
        $categories = Category::latest()->take(4)->get();
        return view('categories', compact('categories'));
    }
}
