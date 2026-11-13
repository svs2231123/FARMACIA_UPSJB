{{-- Vista hija: hereda la plantilla padre --}}
@extends('template.administrador')
{{-- Textos que la plantilla muestra en sus huecos --}}
@section('title', 'Dashboard') {{-- pestaña --}}
@section('name_section', 'Dashboard') {{-- encabezado --}}
@section('description', 'Resumen de estadísticas')
@section('item_section', 'Inicio') {{-- breadcrumb --}}
@section('section', 'Dashboard')
@section('module', 'Principal')
{{-- Contenido del dashboard: KPIs y gráficos en próximas sesiones --}}
@section('content')
<p>contenido del dasboard</p>
@endsection


