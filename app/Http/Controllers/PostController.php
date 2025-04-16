<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        //
        return response()->json(Post::all());
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
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        //
        $post = Post::create($request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]));

        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id): \Illuminate\Http\JsonResponse
    {
        //
        $post = Post::findOrFail($id);
        return response()->json($post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::findOrFail($id);

        $post->update($request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]));

        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        //
        $post = Post::findOrFail($id);

        $post->delete();

        return response()->json(['message' => 'Post deleted successfully.']);
    }
}
