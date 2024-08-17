@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Vehículo</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $vehicle->marca }} {{ $vehicle->modelo }}</h5>
            <p class="card-text">Año: {{ $vehicle->anio }}</p>
            <p class="card-text">Generación: {{ $vehicle->generacion }}</p>
            <p class="card-text">Motor: {{ $vehicle->motor }}</p>
            <p class="card-text">Tipo de Combustible: {{ $vehicle->tipo_combustible }}</p>
            <p class="card-text">Consumo (Km/L): {{ $vehicle->consumo_km_l }}</p>
            <p class="card-text">Tipo de Tracción: {{ $vehicle->tipo_traccion }}</p>
            <p class="card-text">Tipo de Carrocería: {{ $vehicle->tipo_carroceria }}</p>
            <p class="card-text">Número de Plazas: {{ $vehicle->numero_plazas }}</p>
            @if ($vehicle->ruta_imagen)
                <img src="{{ $vehicle->ruta_imagen }}" alt="Imagen del vehículo" style="max-width: 300px;">
            @endif
        </div>
    </div>
    <a href="{{ route('vehicles.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
