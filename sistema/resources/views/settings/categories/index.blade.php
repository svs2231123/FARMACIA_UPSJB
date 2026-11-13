@extends('template.administrador')
@section('title', 'CATEGORÍAS')
@section('name_section', 'CATEGORÍAS')
@section('description', 'Listado de categorías')
@section('item_section', 'Inicio')
@section('section', 'Categorías')
@section('module', 'Configuraciones')
@section('content')
{{-- Mensajes flash: los envían store(), update() y destroy() --}}
@if (session('ok'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{ session('ok') }}
<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif
@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
{{ session('error') }}
<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif
<div class="card bg-white border-0 shadow-sm border-5 border-top border-secondary">
<div class="card-header bg-white">
<div class="row">
<div class="col-12 col-md-3">
{{-- Botón al formulario de registro --}}
<a href="{{ route('categories.create') }}"
class="btn btn-primary rounded-3 text-uppercase text-white w-100">
<i class="bi bi-plus-lg me-2"></i>
<span class="small fw-medium">Nuevo registro</span>
</a>
</div>
</div>
</div>
<div class="card-body">
{{-- count(): cuántas categorías llegaron del controlador --}}
<h6 class="text-uppercase small text-muted mb-3">
Total de registros encontrados: {{ $categories->count() }}
</h6>
<table id="display" class="table table-sm table-hover w-100 bg-white">
<thead>
<tr>
<th class="text-center align-middle text-uppercase small">Nº</th>
<th class="text-center align-middle text-uppercase small">Nombre</th>
<th class="text-center align-middle text-uppercase small">Descripción</th>
<th class="text-center align-middle text-uppercase small">Acciones</th>
</tr>
</thead>
<tbody>
@php $contador = 1; @endphp {{-- número de fila --}}
{{-- Una fila por categoría --}}
@foreach ($categories as $category)
<tr>
<td class="text-center align-middle">{{ $contador }}</td>
<td class="text-start align-middle">{{ $category->name }}</td>
<td class="text-start align-middle">{{ $category->description }}</td>
<td class="text-center align-middle">
{{-- Menú de acciones de la fila --}}
<div class="dropdown">
<button class="btn btn-light" type="button"
data-bs-toggle="dropdown">
<i class="bi bi-three-dots-vertical"></i>
</button>
<ul class="dropdown-menu dropdown-menu-end">
{{-- Editar: GET /categories/{id}/edit --}}
<li>
<a class="dropdown-item"
href="{{ route('categories.edit', $category->id) }}">
Editar
</a>
</li>
<li>
{{-- Eliminar: formulario DELETE (un enlace solo envía GET) --}}
<form method="POST"
action="{{ route('categories.destroy', $category->id) }}"
onsubmit="return confirm('¿Eliminar este registro?');">
@csrf
@method('DELETE')
<button type="submit" class="dropdown-item">Eliminar</button>
</form>
</li>
</ul>
</div>
</td>
</tr>
@php $contador++; @endphp
@endforeach
</tbody>
</table>
</div>
</div>
@endsection