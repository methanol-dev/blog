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
        $categories = Category::latest()->take(10)->get();
        $posts = Post::latest()->paginate(4);
        return view('posts', compact('posts', 'categories'));
    }

    public function post($id)
    {
        $posts = Post::latest()->take(3)->get();
        $post = Post::findOrFail($id);
        $categories = Category::latest()->take(10)->get();
        return view('post', compact('post', 'categories', 'posts'));
    }

    public function categories()
    {
        $categories = Category::latest()->take(4)->get();
        return view('categories', compact('categories'));
    }

    
}
