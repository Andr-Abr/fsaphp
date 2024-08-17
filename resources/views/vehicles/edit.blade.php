@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Vehículo</h1>
    <form action="{{ route('vehicles.update', $vehicle) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" value="{{ $vehicle->marca }}" required>
        </div>
        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="modelo" value="{{ $vehicle->modelo }}" required>
        </div>
        <div class="form-group">
            <label for="anio">Año</label>
            <input type="number" class="form-control" id="anio" name="anio" value="{{ $vehicle->anio }}" required>
        </div>
        <div class="form-group">
            <label for="generacion">Generación</label>
            <input type="text" class="form-control" id="generacion" name="generacion" value="{{ $vehicle->generacion }}" required>
        </div>
        <div class="form-group">
            <label for="motor">Motor</label>
            <input type="text" class="form-control" id="motor" name="motor" value="{{ $vehicle->motor }}" required>
        </div>
        <div class="form-group">
            <label for="tipo_combustible">Tipo Combustible</label>
            <input type="text" class="form-control" id="tipo_combustible" name="tipo_combustible" value="{{ $vehicle->tipo_combustible }}" required>
        </div>
        <div class="form-group">
            <label for="consumo_km_l">Consumo (Km/L)</label>
            <input type="number" class="form-control" id="consumo_km_l" name="consumo_km_l" value="{{ $vehicle->consumo_km_l }}" required>
        </div>
        <div class="form-group">
            <label for="tipo_traccion">Tipo Tracción</label>
            <input type="text" class="form-control" id="tipo_traccion" name="tipo_traccion" value="{{ $vehicle->tipo_traccion }}" required>
        </div>
        <div class="form-group">
            <label for="tipo_carroceria">Tipo Carrocería</label>
            <input type="text" class="form-control" id="tipo_carroceria" name="tipo_carroceria" value="{{ $vehicle->tipo_carroceria }}" required>
        </div>
        <div class="form-group">
            <label for="numero_plazas">Número Plazas</label>
            <input type="number" class="form-control" id="numero_plazas" name="numero_plazas" value="{{ $vehicle->numero_plazas }}" required>
        </div>
        <div class="form-group">
            <label for="ruta_imagen">Ruta Imagen</label>
            <input type="text" class="form-control" id="ruta_imagen" name="ruta_imagen" value="{{ $vehicle->ruta_imagen }}" required>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" class="form-control-file" id="imagen" name="imagen">
            @if ($vehicle->ruta_imagen)
                <img src="{{ $vehicle->ruta_imagen }}" alt="Imagen actual" style="max-width: 200px;">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
