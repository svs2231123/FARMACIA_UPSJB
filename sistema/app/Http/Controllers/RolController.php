<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RolController extends Controller
{
    public function index()
    {
        $roles = Rol::all();
        return view('settings.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('settings.roles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:50|unique:roles',
            'descripcion' => 'nullable|max:255',
        ]);
        Rol::create($validated);

        return to_route('roles.index')
            ->with('ok', 'Rol registrado correctamente.');
    }

    public function edit(Rol $rol)
    {
        return view('settings.roles.edit', compact('rol'));
    }

    public function update(Request $request, Rol $rol)
    {
        $validated = $request->validate([
            'nombre' => [
                'required',
                'max:50',
                Rule::unique('roles', 'nombre')->ignore($rol->id),
            ],
            'descripcion' => 'nullable|max:255',
        ]);
        $rol->update($validated);

        return to_route('roles.index')
            ->with('ok', 'Rol actualizado correctamente.');
    }

    public function destroy(Rol $rol)
    {
        // restrictOnDelete: ¿tiene usuarios asociados?
        if ($rol->users()->exists()) {
            return to_route('roles.index')
                ->with('error', 'No se puede eliminar: tiene usuarios asociados.');
        }
        $rol->delete();

        return to_route('roles.index')
            ->with('ok', 'Rol eliminado correctamente.');
    }
}
