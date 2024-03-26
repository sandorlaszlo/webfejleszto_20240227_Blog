<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::with('author', 'category')->get();
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

        // $post = new Post();

        // $post->title = $request->title;
        // $post->body = $request->body;
        // $post->lead = $request->lead;
        // $post->category_id = $request->category_id;
        // $post->published_at = $request->published_at;

        // $post->save();

        $post = Post::create($request->all());

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
        $post->load('author', 'category');

        return $post;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'string|max:100',
            'body' => 'string',
            'lead' => 'string',
            'published_at' => 'date',
            'category_id' => 'integer|exists:categories,id',
        ]);

        $post = Post::find($id);
        if ($post == null) {
            return response()->json(["message" => "No post found with the given id."], 404);
        }

        // $post->title = $request->title;
        // $post->body = $request->body;
        // $post->lead = $request->lead;
        // $post->category_id = $request->category_id;
        // $post->published_at = $request->published_at;

        // $post->save();

        $post->update($request->all());

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
