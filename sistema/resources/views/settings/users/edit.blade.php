@extends('template.administrador')
@section('title', 'USUARIOS')
@section('name_section', 'USUARIOS')
@section('description', 'Actualizar usuario')
@section('item_section', 'Actualizar registro')
@section('section', 'Usuarios')
@section('module', 'Configuraciones')
@section('content')
<div class="card bg-white border-0 shadow-sm border-5 border-top border-secondary">
<div class="card-body">
{{-- PUT /users/{id} → UserController@update --}}
<form action="{{ route('users.update', $user->id) }}" method="POST">
@csrf
@method('PUT')
@include('settings.users.form')
</form>
</div>
</div>
@endsection
