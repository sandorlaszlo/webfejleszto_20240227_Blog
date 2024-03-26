<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // if (!$request->has('name')) {
        //     return response()->json(["message" => "Name field is required."], 422);
        // }

        $request->validate([
            // 'name' =>'required|max:255|unique:categories,name'
            'name' => ['required','max:255', 'unique:categories,name']
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return $category;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $category = Category::findOrFail($id);
        $category = Category::find($id);
        if ($category == null) {
            return response()->json(['message' => 'Category not found.'], 404);
        }
        return $category;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return response()->json(['message' => 'Category not found.'], 404);
        }

        $request->validate([
            'name' => ['required','max:255', 'unique:categories,name']
        ]);

        $category->name = $request->name;
        $category->save();

        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return response()->json(['message' => 'Category not found.'], 404);
        }
        $category->delete();
        // return response('', 204);
        return response()->noContent();
    }
}
