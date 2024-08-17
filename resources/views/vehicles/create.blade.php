@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Vehículo</h1>
    <form action="{{ route('vehicles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" required>
        </div>
        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="modelo" required>
        </div>
        <div class="form-group">
            <label for="anio">Año</label>
            <input type="number" class="form-control" id="anio" name="anio" required>
        </div>
        <div class="form-group">
            <label for="generacion">Generación</label>
            <input type="text" class="form-control" id="generacion" name="generacion" required>
        </div>
        <div class="form-group">
            <label for="motor">Motor</label>
            <input type="text" class="form-control" id="motor" name="motor" required>
        </div>
        <div class="form-group">
            <label for="tipo_combustible">Tipo Combustible</label>
            <input type="text" class="form-control" id="tipo_combustible" name="tipo_combustible" required>
        </div>
        <div class="form-group">
            <label for="consumo_km_l">Consumo (Km/L)</label>
            <input type="number" class="form-control" id="consumo_km_l" name="consumo_km_l" required>
        </div>
        <div class="form-group">
            <label for="tipo_traccion">Tipo Tracción</label>
            <input type="text" class="form-control" id="tipo_traccion" name="tipo_traccion" required>
        </div>
        <div class="form-group">
            <label for="tipo_carroceria">Tipo Carrocería</label>
            <input type="text" class="form-control" id="tipo_carroceria" name="tipo_carroceria" required>
        </div>
        <div class="form-group">
            <label for="numero_plazas">Número Plazas</label>
            <input type="number" class="form-control" id="numero_plazas" name="numero_plazas" required>
        </div>
        <div class="form-group">
            <label for="ruta_imagen">Ruta Imagen</label>
            <input type="text" class="form-control" id="ruta_imagen" name="ruta_imagen" required>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" class="form-control-file" id="imagen" name="imagen">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
