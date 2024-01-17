<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Post;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Comment::class, 'comment');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        $user_id = $request->user_id;
        $post_id = $request->post_id;
        $description = $request->description;
        Comment::create([
            'user_id' => $user_id,
            'post_id' => $post_id,
            'description' => $description,
        ]);
        // $post = Post::find($post_id);
        return to_route('post.show', $post_id)->with('message', 'comment added sucessfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        $post = Comment::find($comment->post_id);
        return view('comment.edit', compact('comment', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $user_id = $request->user_id;
        $post_id = $request->post_id;
        $description = $request->description;
        $comment->update([
            'user_id' => $user_id,
            'post_id' => $post_id,
            'description' => $description,
        ]);
        // $post = Post::find($post_id);
        return to_route('post.show', $post_id)->with('message', 'comment updated sucessfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $post_id = Post::find($comment->post_id);
        $comment->delete();
        return to_route('post.show', $post_id)->with('message', 'comment deleted successfully!');
    }
}
