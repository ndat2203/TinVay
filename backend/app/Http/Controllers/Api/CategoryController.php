<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // 📌 GET /api/categories
    public function index(Request $request)
    {
        $query = Category::query();

        // filter theo type (service / post)
        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        return response()->json([
            'status' => true,
            'data' => $query->orderBy('id', 'desc')->get()
        ]);
    }

    // 📌 GET /api/categories/{id}
    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Category not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $category
        ]);
    }

    // 📌 POST /api/categories
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
            'type' => 'required|in:service,post',
        ]);

        $category = Category::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Created successfully',
            'data' => $category
        ], 201);
    }

    // 📌 PUT /api/categories/{id}
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Category not found'
            ], 404);
        }

        $request->validate([
            'name' => 'sometimes|required',
            'slug' => 'sometimes|required|unique:categories,slug,' . $id,
            'type' => 'sometimes|required|in:service,post',
        ]);

        $category->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Updated successfully',
            'data' => $category
        ]);
    }

    // 📌 DELETE /api/categories/{id}
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Category not found'
            ], 404);
        }

        $category->delete();

        return response()->json([
            'status' => true,
            'message' => 'Deleted successfully'
        ]);
    }
}