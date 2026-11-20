@extends('template.administrador')
@section('title', 'USUARIOS')
@section('name_section', 'USUARIOS')
@section('description', 'Nuevo usuario')
@section('item_section', 'Nuevo registro')
@section('section', 'Usuarios')
@section('module', 'Configuraciones')
@section('content')
<div class="card bg-white border-0 shadow-sm border-5 border-top border-secondary">
<div class="card-body">
{{-- POST /users → UserController@store --}}
<form action="{{ route('users.store') }}" method="POST">
@csrf
@include('settings.users.form')
</form>
</div>
</div>
@endsection
