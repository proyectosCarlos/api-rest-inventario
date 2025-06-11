<?php

namespace App\Services\Product;

use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Http\Requests\ProductRequest;


class ProductServices
{
    public function index()
    {
        $products = Product::paginate(10);
        return new ProductResource($products);
    }

    public function store(ProductRequest $request)
    {
        try {
            $product = Product::create($request->validated());
            return response()->json([
                'status' => 'success',
                'message' => 'Producto creado exitosamente'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al crear el producto',
                'data' => $e->getMessage()
            ], 500);
        }
    }

    public function show(Product $product)
    {
        try {
            $product = Product::findOrFail($product->id);
            return new ProductResource($product);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al mostrar el producto',
                'data' => $e->getMessage()
            ], 500);
        }
    }

    public function update(ProductRequest $request, Product $product)
    {
        try {
            $product = Product::findOrFail($product->id);
            $product->update($request->validated());
            return response()->json([
                'status' => 'success',
                'message' => 'Producto actualizado exitosamente',
                'data' => new ProductResource($product)
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al actualizar el producto',
                'data' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Product $product)
    {
        try {
            $product = Product::findOrFail($product->id);
            $product->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Producto eliminado correctamente'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al eliminar el producto',
                'data' => $e->getMessage()
            ], 500);
        }
    }
}
