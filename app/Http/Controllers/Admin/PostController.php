<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts = Post::latest()->get();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255|unique:posts',
            'image' => 'required|mimes:jpg,png,bmp,jpeg',
            'category' => 'required',
            'tags' => 'required',
            'body' => 'required',
        ]);
        $slug = Str::slug($request->title, '-');
        $image = $request->image;
        $imageName = $slug . '-' . uniqid() . Carbon::now()->timestamp . '.' . $image->getClientOriginalExtension();

        if (!Storage::disk('public')->exists('post')) {
            Storage::disk('public')->makeDirectory('post');
        }

        // image Croped
        $img = Image::make($image->getRealPath())->resize(752, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->stream();

        Storage::disk('public')->put('post/' . $imageName, $img);

        $post = new Post();
        $post->title = $request->title;
        $post->user_id = Auth::id();
        $post->category_id = $request->category;
        $post->slug = $slug;
        $post->image = $imageName;
        $post->body = $request->body;
        if (isset($request->status)) {
            $post->status = 1;
        }
        $post->save();
        $tags = [];
        $stringTags = array_map('trim', explode(',', $request->tags));
        foreach ($stringTags as $tag) {
            array_push($tags, ['name' => $tag]);
        }
        $post->tags()->createMany($tags);
        return redirect()->route('admin.post.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::findOrFail($id);
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('admin.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->title == Post::findOrFail($id)->title) {
            $this->validate($request, [
                'title' => 'required|max:255',
                'image' => 'sometimes|mimes:jpg,png,bmp,jpeg|max:5000',
                'category' => 'required',
                'tags' => 'required',
                'body' => 'required',
            ]);
        } else {
            $this->validate($request, [
                'title' => 'required|max:255|unique:posts',
                'image' => 'sometimes|mimes:jpg,png,bmp,jpeg|max:5000',
                'category' => 'required',
                'tags' => 'required',
                'body' => 'required',
            ]);
        }
        $post = Post::findOrFail($id);
        $slug = Str::slug($request->title, '-');
        if (isset($request->image)) {
            $image = $request->image;
            $imageName = $slug . '-' . uniqid() . Carbon::now()->timestamp . '.' . $image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('post')) {
                Storage::disk('public')->makeDirectory('post');
            }

            if (Storage::disk('public')->exists('post/' . $post->image)) {
                Storage::disk('public')->delete('post/' . $post->image);
            }

            $postImage = Image::make($image->getRealPath())->resize(752, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->stream();

            Storage::disk('public')->put('post/' . $imageName, $postImage);
        } else {
            $imageName = $post->image;
        }
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->category_id = $request->category;
        $post->slug = $slug;
        $post->image = $imageName;
        $post->body = $request->body;
        if (isset($request->status)) {
            $post->status = true;
        } else {
            $post->status = false;
        }
        $post->save();
        //delete old tags
        $post->tags()->delete();
        $tags = [];
        $stringTags = array_map('trim', explode(',', $request->tags));
        foreach ($stringTags as $tag) {
            array_push($tags, ['name' => $tag]);
        }
        $post->tags()->createMany($tags);
        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if (Storage::disk('public')->exists('post/' . $post->image)) {
            Storage::disk('public')->delete('post/' . $post->image);
        }
        $post->tags()->delete();
        $post->delete();

        return redirect()->route('admin.post.index');
    }
}
