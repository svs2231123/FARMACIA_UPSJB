<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('settings.categories.index', compact('categories'));
    }
    public function create()
    {
    return view('settings.categories.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50|unique:categories',
            'description' => 'nullable|max:255', // <-- Cambiado a inglés
        ]);
        Category::create($validated);

        return to_route('categories.index')
            ->with('ok', 'Categoría registrada correctamente.');
    }
        public function show(Category $category)
    {
    }
    public function edit(Category $category)
    {
        return view('settings.categories.edit', compact('category'));
    }
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'max:50',
                Rule::unique('categories', 'name')->ignore($category->id),
            ],
            'descripcion' => 'nullable|max:255',
        ]);
        $category->update($validated);

        return to_route('categories.index')
            ->with('ok', 'Categoría actualizada correctamente.');
    }
    public function destroy(Category $category)
    {
    // Regla del diagrama (restrictOnDelete): ¿tiene medicamentos?
    if ($category->medicines()->exists()) {
    return to_route('categories.index')
    ->with('error', 'No se puede eliminar: tiene medicamentos asociados.');
    }
    // DELETE FROM categories WHERE id = ?
    $category->delete();
    return to_route('categories.index')
    ->with('ok', 'Categoría eliminada correctamente.');
    }
}
