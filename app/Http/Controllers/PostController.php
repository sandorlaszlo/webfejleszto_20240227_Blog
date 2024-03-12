<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return $posts;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //TODO: refactor validation
        // if (!$request->has('lead') ||
        //     !$request->has('title') ||
        //     !$request->has('body') ||
        //     !$request->has('category_id'))
        // {
        //     //return response('', 422);
        //     return response()->json(["message" => "Validation failed"], 422);
        // }

        $request->validate([
            'title' => 'required|max:100',
            'body' => 'required',
            'lead' => 'required',
            'published_at' => 'date',
            'category_id' => 'required|exists:categories,id'
        ]);

        $post = new Post();

        //TODO: create() method
        $post->title = $request->title;
        $post->body = $request->body;
        $post->lead = $request->lead;
        $post->category_id = $request->category_id;
        $post->published_at = $request->published_at;

        $post->save();

        return $post;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $post = Post::find($id);
        // if ($post == null) {
        //     return response('', 404);
        // }

        $post = Post::findOrFail($id);

        return $post;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:100',
            'body' => 'required',
            'lead' => 'required',
            'published_at' => 'date',
            'category_id' => 'required|exists:categories,id'
        ]);

        $post = Post::find($id);
        if ($post == null) {
            return response()->json(["message" => "No post found with the given id."], 404);
        }

        //TODO: update() method
        $post->title = $request->title;
        $post->body = $request->body;
        $post->lead = $request->lead;
        $post->category_id = $request->category_id;
        $post->published_at = $request->published_at;

        $post->save();

        return $post;
    }


    public function destroy(string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return response()->json(["message" => "No post found with the given id."], 404);
        }
        $post->delete();
        return response()->noContent();
    }
}
