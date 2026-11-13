@extends('template.administrador')

@section('title', 'CATEGORÍAS')
@section('name_section', 'CATEGORÍAS')
@section('description', 'Actualizar categoría')
@section('item_section', 'Actualizar registro')
@section('section', 'Categorías')
@section('module', 'Configuraciones')

@section('content')
    <div class="card bg-white border-0 shadow-sm border-5 border-top border-secondary">
        <div class="card-body">
            {{-- PUT /categories/{id} → CategoryController@update --}}
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- HTML solo envía POST: aquí se indica PUT --}}
                
                {{-- El mismo formulario; ahora $category existe y llena los campos --}}
                @include('settings.categories.form')
                
                {{-- Opcional: Botón de envío si no está incluido en el form parcial --}}
                {{-- <button type="submit" class="btn btn-primary mt-3">Actualizar</button> --}}
            </form>
        </div>
    </div>
@endsection
