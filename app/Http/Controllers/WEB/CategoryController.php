<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories', ['categories' => $categories]);
    }

    public function show(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return abort(404);
        }
        $posts = $category->posts;
        return view('posts', ['posts' => $posts]);
    }
}
