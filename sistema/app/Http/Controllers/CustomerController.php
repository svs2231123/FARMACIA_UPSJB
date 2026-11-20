<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('management.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('management.customers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|max:150',
            'dni'   => 'required|digits:8|unique:customers,dni',
            'phone' => 'nullable|max:15',
            'age'   => 'nullable|integer|min:0|max:255',
        ]);
        Customer::create($validated);

        return to_route('customers.index')
            ->with('ok', 'Cliente registrado correctamente.');
    }

    public function edit(Customer $customer)
    {
        return view('management.customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name' => 'required|max:150',
            'dni'  => [
                'required',
                'digits:8',
                Rule::unique('customers', 'dni')->ignore($customer->idCliente, 'idCliente'),
            ],
            'phone' => 'nullable|max:15',
            'age'   => 'nullable|integer|min:0|max:255',
        ]);
        $customer->update($validated);

        return to_route('customers.index')
            ->with('ok', 'Cliente actualizado correctamente.');
    }

    public function destroy(Customer $customer)
    {
        // Regla restrictOnDelete: ¿tiene ventas?
        if ($customer->sales()->exists()) {
            return to_route('customers.index')
                ->with('error', 'No se puede eliminar: tiene ventas asociadas.');
        }
        $customer->delete();

        return to_route('customers.index')
            ->with('ok', 'Cliente eliminado correctamente.');
    }
}
