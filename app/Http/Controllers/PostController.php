<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user', 'comments')->latest('id')->paginate(4);
        //$posts = Post::all();
        return view('home', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $user_id = $request->user_id;
        $title = $request->title;
        $description = $request->description;
        if ($request->image !== null) {
            $image = $request->file('image')->store('posts', 'public');
        }
        else{
            $image = 'no image';
        }

        Post::create([
            'user_id' => $user_id,
            'title' => $title,
            'description' => $description,
            'image' => $image
        ]);

        return to_route('post.index')->with('message', 'has been posted succussfylly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $user_id = $request->user_id;
        $title = $request->title;
        $description = $request->description;
        if ($request->image !== null) {
            $image = $request->file('image')->store('posts', 'public');
        }
        else{
            $image = 'no image';
        }

        $post->update([
            'user_id' => $user_id,
            'title' => $title,
            'description' => $description,
            'image' => $image
        ]);

        return to_route('post.index')->with('message', 'post has been updated succussfylly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('post.index')->with('message', 'post deleted successfully!');
    }
}
