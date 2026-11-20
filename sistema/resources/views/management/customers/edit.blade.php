@extends('template.administrador')
@section('title', 'CLIENTES')
@section('name_section', 'CLIENTES')
@section('description', 'Actualizar cliente')
@section('item_section', 'Actualizar registro')
@section('section', 'Clientes')
@section('module', 'Gestión')
@section('content')
    <div class="card bg-white border-0 shadow-sm border-5 border-top border-secondary">
        <div class="card-body">
            {{-- PUT /customers/{id} → CustomerController@update --}}
            <form action="{{ route('customers.update', $customer->idCliente) }}" method="POST">
                @csrf
                @method('PUT')
                @include('management.customers.form')
            </form>
        </div>
    </div>
@endsection
