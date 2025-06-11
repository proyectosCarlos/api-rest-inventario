<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\ProductRequest;
use App\Services\Product\ProductServices;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class ProductController extends Controller
{

    use AuthorizesRequests;
    protected $productServices;

    public function __construct(ProductServices $productServices)
    {
        $this->productServices = $productServices;
    }


    public function index()
    {
        // Mostrar el listado de productos
        return $this->productServices->index();
    }


    public function store(ProductRequest $request, Product $product)
    {
        // Guardar un nuevo producto
        $this->authorize('create', $product);
        return $this->productServices->store($request);
    }


    public function show(Product $product)
    {
        // Mostrar un producto específico
        return $this->productServices->show($product);
    }


    public function update(ProductRequest $request, Product $product)
    {
        // Actualizar un producto específico
        $this->authorize('update', $product);
        return $this->productServices->update($request, $product);
    }



    public function destroy(Product $product)
    {
        // Eliminar un producto específico
        $this->authorize('delete', $product);
        return $this->productServices->destroy($product);
    }
}
