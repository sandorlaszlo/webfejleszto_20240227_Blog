<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = User::all();
        return view('authors', ['authors' => $authors]);
    }

    public function show(string $id)
    {
        $author = User::find($id);

        if ($author == null) {
            return abort(404);
        }

        $posts = $author->posts;
        return view('posts', ['posts' => $posts]);
    }
}
