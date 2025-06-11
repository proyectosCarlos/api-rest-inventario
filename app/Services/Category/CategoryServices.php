<?php

namespace App\Services\Category;

use App\Models\Category;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\CategoryRequest;

class CategoryServices
{
    public function index()
    {
        $categories = Category::paginate(10);
        return new CategoryResource($categories);
    }

    public function store(CategoryRequest $request)
    {
        try {
            $category = Category::create($request->validated());
            return response()->json([
                'status' => 'success',
                'message' => 'Categoria creada exitosamente',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al crear la categoria',
                'data' => $e->getMessage()
            ], 500);
        }
    }

    public function show(Category $category)
    {
        try {
            $category = Category::findOrFail($category->id);
            return new CategoryResource($category);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al mostrar la categoria',
                'data' => $e->getMessage()
            ], 500);
        }
    }

    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $category = Category::findOrFail($category->id);
            $category->update($request->validated());
            return response()->json([
                'status' => 'success',
                'message' => 'Categoria actualizada exitosamente',
                'data' => new CategoryResource($category)
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al actualizar la categoria',
                'data' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Category $category)
    {
        try {
            $category = Category::findOrFail($category->id);
            $category->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Categoria eliminada correctamente'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al eliminar la categoria',
                'data' => $e->getMessage()
            ], 500);
        }
    }
}
