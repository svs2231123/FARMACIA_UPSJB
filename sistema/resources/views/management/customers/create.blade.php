@extends('template.administrador')
@section('title', 'CLIENTES')
@section('name_section', 'CLIENTES')
@section('description', 'Nuevo cliente')
@section('item_section', 'Nuevo registro')
@section('section', 'Clientes')
@section('module', 'Gestión')
@section('content')
    <div class="card bg-white border-0 shadow-sm border-5 border-top border-secondary">
        <div class="card-body">
            {{-- POST /customers → CustomerController@store --}}
            <form action="{{ route('customers.store') }}" method="POST">
                @csrf
                @include('management.customers.form')
            </form>
        </div>
    </div>
@endsection
