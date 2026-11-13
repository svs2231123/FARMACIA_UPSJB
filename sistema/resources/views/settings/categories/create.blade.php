@extends('template.administrador')
@section('title', 'CATEGORÍAS')
@section('name_section', 'CATEGORÍAS')
@section('description', 'Nueva categoría')
@section('item_section', 'Nuevo registro')
@section('section', 'Categorías')
@section('module', 'Configuraciones')
@section('content')
<div class="card bg-white border-0 shadow-sm border-5 border-top border-secondary">
<div class="card-body">
{{-- POST /categories → CategoryController@store --}}
<form action="{{ route('categories.store') }}" method="POST">
@csrf {{-- token de seguridad: sin él, 419 Page Expired --}}
@include('settings.categories.form')
    </div>
</div>
@endsection