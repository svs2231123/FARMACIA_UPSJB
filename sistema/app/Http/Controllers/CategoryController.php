<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // SELECT * FROM categories
        $categories = Category::all();
        // compact() envía $categories a la vista con el mismo nombre
        return view('settings.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('settings.categories.create');
    }

    // CREATE: valida, guarda y redirige
    public function store(Request $request)
        {
        // Reglas copiadas de la migración: string('name', 50)->unique()
            $validated = $request->validate([
            'name' => 'required|max:50|unique:categories',
            'descripcion' => 'nullable|max:255',
            ]);
        // Si la validación falla, Laravel vuelve al formulario y no sigue
        // INSERT INTO categories (gracias a #[Fillable] del modelo)
        Category::create($validated);
        // PRG: redirige al listado con un mensaje flash
        return to_route('categories.index')
        ->with('ok', 'Categoría registrada correctamente.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('settings.categories.edit', compact('category'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'max:50',
                // Único, sin contar la categoría que se está editando actualmente
                Rule::unique('categories', 'name')->ignore($category->id),
            ],
            'descripcion' => 'nullable|max:255',
        ]);

        // UPDATE categories SET ... WHERE id = ?
        $category->update($validated);

        return to_route('categories.index')
            ->with('ok', 'Categoría actualizada correctamente.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
