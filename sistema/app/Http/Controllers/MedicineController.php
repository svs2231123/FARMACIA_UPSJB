<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::with('category')->get();
        return view('management.medicines.index', compact('medicines'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('management.medicines.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|max:120|unique:medication,name',
            'price' => 'required|numeric|min:0|max:99999999.99',
            'stock' => 'required|integer|min:0',
        ]);
        Medicine::create($validated);

        return to_route('medicines.index')
            ->with('ok', 'Medicamento registrado correctamente.');
    }

    public function edit(Medicine $medicine)
    {
        $categories = Category::all();
        return view('management.medicines.edit', compact('medicine', 'categories'));
    }

    public function update(Request $request, Medicine $medicine)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => [
                'required',
                'max:120',
                Rule::unique('medication', 'name')->ignore($medicine->id),
            ],
            'price' => 'required|numeric|min:0|max:99999999.99',
            'stock' => 'required|integer|min:0',
        ]);
        $medicine->update($validated);

        return to_route('medicines.index')
            ->with('ok', 'Medicamento actualizado correctamente.');
    }

    public function destroy(Medicine $medicine)
    {
        if ($medicine->saleDetails()->exists()) {
            return to_route('medicines.index')
                ->with('error', 'No se puede eliminar: tiene ventas asociadas.');
        }
        $medicine->delete();

        return to_route('medicines.index')
            ->with('ok', 'Medicamento eliminado correctamente.');
    }
}
