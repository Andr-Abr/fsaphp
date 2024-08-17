@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/logo.png') }}" alt="Logo de la aplicación" width="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('vehicles.buscar') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#footer-section">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cuenta.profile') }}">Cuenta</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid p-0">
    <img src="{{ asset('img/fondo.jpg') }}" class="img-fluid" alt="fondoimagen" style="object-fit: cover; width: 100%; height: 65vh;">
</div>

<section id="resultados" class="resultados py-5" style="background-color: #59646A">
    <div class="container mt-5">
        @if(session('success'))
        <div class="alert alert-success">
        {{ session('success') }}
        </div>
        @endif
        <h1><strong>Resultados de Búsqueda</strong></h1>
        <br>
        <div id="resultados">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($vehicles as $vehiculo)
                <div class="col">
                    <div class="card h-100">
                        @if($vehiculo->ruta_imagen)
                            <img src="{{ asset($vehiculo->ruta_imagen) }}" class="card-img-top" alt="Imagen del vehículo">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $vehiculo->marca . ' ' . $vehiculo->modelo }}</h5>
                            <p class="card-text">Año: {{ $vehiculo->anio }}</p>
                            <p class="card-text">Generación: {{ $vehiculo->generacion }}</p>
                            <p class="card-text">Motor: {{ $vehiculo->motor }}</p>
                            <p class="card-text">Tipo de combustible: {{ $vehiculo->tipo_combustible }}</p>
                            <p class="card-text">Consumo Km/L-Kw/H: {{ $vehiculo->consumo_km_l }}</p>
                            <p class="card-text">Tipo de tracción: {{ $vehiculo->tipo_traccion }}</p>
                            <p class="card-text">Tipo de carrocería: {{ $vehiculo->tipo_carroceria }}</p>
                            <p class="card-text">Número de Plazas: {{ $vehiculo->numero_plazas }}</p>
                        </div>
                    @if(session()->has('cuenta_id'))
                        <form action="{{ route('favoritos.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="idVehiculos" value="{{ $vehiculo->idVehiculos }}">
                            <button type="submit" class="btn btn-sm btn-warning">Agregar a Favoritos</button>
                        </form>
                    @else
                        <a href="{{ route('cuenta.index') }}" class="btn btn-sm btn-warning">Iniciar sesión para agregar a Favoritos</a>
                    @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        {{ $vehicles->links() }}
    </div>
</section>

<footer id="footer-section" class="footer-section bg-dark text-light py-4">
    <div class="container">
        <div class="row align-items-center">
            <!-- Logo -->
            <div class="col-md-3 text-center text-md-start mb-3 mb-md-0">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 100px;">
            </div>
            <!-- Links -->
            <div class="col-md-6 text-center mb-3 mb-md-0">
                <a href="#" class="text-light text-decoration-none me-3">© {{ date('Y') }}</a>
                <a href="#" class="text-light text-decoration-none me-3">T&Cs</a>
                <a href="#" class="text-light text-decoration-none">Privacidad</a>
            </div>
            <!-- Subscribe -->
            <div class="col-md-3 text-center text-md-end mb-3 mb-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Ingrese su Email">
                    <button class="btn btn-light" type="button">Suscribirse</button>
                </div>
            </div>
        </div>
        <div class="row align-items-center mt-3">
            <!-- Social Media Icons -->
            <div class="col text-center">
                <a href="#" class="text-light me-3"><img src="{{ asset('img/facebook.png') }}" alt="Facebook" class="img-fluid" style="max-width: 30px;"></a>
                <a href="#" class="text-light me-3"><img src="{{ asset('img/instagram.png') }}" alt="Instagram" class="img-fluid" style="max-width: 30px;"></a>
                <a href="#" class="text-light"><img src="{{ asset('img/twitter.png') }}" alt="Twitter" class="img-fluid" style="max-width: 30px;"></a>
            </div>
        </div>
    </div>
</footer>
@endsection
