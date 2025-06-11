<?php

namespace App\Http\Controllers;

use App\Services\Category\CategoryServices;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\CategoryRequest;


class CategoryController extends Controller
{
    use AuthorizesRequests;
    protected $categoryServices;

    public function __construct(CategoryServices $categoryServices)
    {
        $this->categoryServices = $categoryServices;
    }

    public function index()
    {
        return $this->categoryServices->index();
    }


    public function store(CategoryRequest $request, Category $category)
    {
        // Guardar una nueva categoria
        $this->authorize('create', $category);
        return $this->categoryServices->store($request);
    }


    public function show(Category $category)
    {
        // Mostrar una  categoria específica    
        return $this->categoryServices->show($category);
    }


    public function update(CategoryRequest $request, Category $category)
    {
        // Actualizar una categoria específica
        $this->authorize('update', $category);
        return $this->categoryServices->update($request, $category);
    }


    public function destroy(Category $category)
    {
        // Eliminar una categoria específica
        $this->authorize('delete', $category);
        return $this->categoryServices->destroy($category);
    }
}
