@extends('template.administrador')
@section('title', 'MEDICAMENTOS')
@section('name_section', 'MEDICAMENTOS')
@section('description', 'Actualizar medicamento')
@section('item_section', 'Actualizar registro')
@section('section', 'Medicamentos')
@section('module', 'Gestión')
@section('content')
    <div class="card bg-white border-0 shadow-sm border-5 border-top border-secondary">
        <div class="card-body">
            {{-- PUT /medicines/{id} → MedicineController@update --}}
            <form action="{{ route('medicines.update', $medicine->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('management.medicines.form')
            </form>
        </div>
    </div>
@endsection
