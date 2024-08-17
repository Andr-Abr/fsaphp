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
                    <a class="nav-link" href="#">Home</a>
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

<section class="colored-section py-5 text-left text-light" style="background-color: #000000;">
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{ route('vehicles.busquedaAvanzada') }}" class="btn btn-dark" style="margin-right: 10px;">Búsqueda Avanzada</a>
                <a href="{{ route('vehicles.comparar') }}" class="btn btn-dark">Comparar</a>
            </div>
        </div>
        <br>
        <form id="searchForm" action="{{ route('vehicles.resultados') }}" method="get">
            <div class="row">
                <div class="col-auto">
                    <label for="marca" class="form-label">Marca</label>
                    <select id="marca" name="marca" class="form-select">
                        <option value="">Todas las marcas</option>
                        @foreach($marcas as $marca)
                            <option value="{{ $marca }}">{{ $marca }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <label for="modelo" class="form-label">Modelo</label>
                    <select id="modelo" name="modelo" class="form-select">
                        <option value="">Todos los modelos</option>
                        @foreach($modelos as $modelo)
                            <option value="{{ $modelo }}">{{ $modelo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <label for="anio" class="form-label">Año</label>
                    <select id="anio" name="anio" class="form-select">
                        <option value="">Todos los años</option>
                        @foreach($anios as $anio)
                            <option value="{{ $anio }}">{{ $anio }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-auto">
                    <button type="submit" class="btn btn-warning">Buscar</button>
                </div>
            </div>
        </form>
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
