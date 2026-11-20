@extends('template.administrador')
@section('title', 'MEDICAMENTOS')
@section('name_section', 'MEDICAMENTOS')
@section('description', 'Nuevo medicamento')
@section('item_section', 'Nuevo registro')
@section('section', 'Medicamentos')
@section('module', 'Gestión')
@section('content')
    <div class="card bg-white border-0 shadow-sm border-5 border-top border-secondary">
        <div class="card-body">
            {{-- POST /medicines → MedicineController@store --}}
            <form action="{{ route('medicines.store') }}" method="POST">
                @csrf
                @include('management.medicines.form')
            </form>
        </div>
    </div>
@endsection
