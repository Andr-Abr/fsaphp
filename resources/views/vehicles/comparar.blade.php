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

<section id="comparar" class="compare py-5" style="background-image: url('{{ asset('img/vs.jpg') }}'); background-size: cover; background-position: center;">
    <div class="container mt-5">
        <h1><strong>Comparación de Vehículos</strong></h1>
        <br>
        <div class="row compare-content">
            @for ($i = 1; $i <= 2; $i++)
            <div class="col-lg-6 compare-column mb-4">
                <h4 class="text-dark"><strong>Seleccionar Vehículo {{ $i }}</strong></h4>
                <div class="search-box mb-3" style="width: 278px;">
                    <input type="text" class="form-control vehiculo-search" placeholder="Buscar vehículo" data-index="{{ $i }}">
                    <div class="search-results" style="display: none;"></div>
                </div>
                <div class="card mb-3" style="width: 278px; height: 100px;">
                    <img src="" class="card-img-top" alt="Imagen del vehículo" style="max-width: 278px; max-height: 100px;">
                </div>
                <ul class="list-unstyled vehiculo-details">
                    <li>Marca: <span class="marca"></span></li>
                    <li>Modelo: <span class="modelo"></span></li>
                    <li>Año: <span class="anio"></span></li>
                    <li>Generación: <span class="generacion"></span></li>
                    <li>Motor: <span class="motor"></span></li>
                    <li>Tipo de combustible: <span class="tipo_combustible"></span></li>
                    <li>Consumo Km/L-Kw/H: <span class="consumo_km_l"></span></li>
                    <li>Tipo de tracción: <span class="tipo_traccion"></span></li>
                    <li>Tipo de carrocería: <span class="tipo_carroceria"></span></li>
                    <li>Número de Plazas: <span class="numero_plazas"></span></li>
                </ul>
            </div>
            @endfor
        </div>
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
