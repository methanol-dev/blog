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
        $posts = Post::latest()->take(6)->status()->get();
        return view('index', compact('posts'));
    }

    public function posts()
    {
        $categories = Category::latest()->take(10)->get();
        $posts = Post::latest()->status()->paginate(4);
        return view('posts', compact('posts', 'categories'));
    }

    public function post($slug)
    {
        $posts = Post::latest()->take(3)->status()->get();
        $post = Post::where('slug', $slug)->status()->first();
        $categories = Category::latest()->take(10)->get();
        return view('post', compact('post', 'categories', 'posts'));
    }

    public function categories()
    {
        $categories = Category::latest()->get();
        return view('categories', compact('categories'));
    }

    public function categoryPost($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $categories = Category::all();
        $posts = $category->posts()->status()->paginate(10);
        return view('categoryPost', compact('posts', 'category', 'categories'));
    }

    public function search(Request $request)
    {
        $this->validate($request, ['search' => 'required|max:255']);
        $search = $request->search;
        $posts = Post::where('title', 'like', "%$search%")->get();
        return view('search', compact('posts'));
    }
}
