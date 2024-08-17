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

<section id="busqueda-avanzada" class="advanced-search py-5" style="background-image: url('{{ asset('img/searchad.png') }}'); background-size: cover; background-position: center;">
    <h2 class="text-center"><strong>Búsqueda Avanzada</strong></h2>
    <br><br><br><br><br><br><br><br><br>
    <div class="container">
        <form action="{{ route('vehicles.resultados') }}" method="get">
            <div class="row g-3 ml-3 mt-4">
                <div class="col-auto">
                    <label for="marca" class="form-label">Marca</label>
                    <select name="marca" id="marca" class="form-select">
                        <option value="">Todas las marcas</option>
                        @foreach($marcas as $marca)
                            <option value="{{ $marca }}">{{ $marca }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <label for="modelo" class="form-label">Modelo</label>
                    <select name="modelo" id="modelo" class="form-select">
                        <option value="">Todos los modelos</option>
                        @foreach($modelos as $modelo)
                            <option value="{{ $modelo }}">{{ $modelo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <label for="anio" class="form-label">Año</label>
                    <select name="anio" id="anio" class="form-select">
                        <option value="">Todos los años</option>
                        @foreach($anios as $anio)
                            <option value="{{ $anio }}">{{ $anio }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row g-3 ml-3 mt-4">
                <div class="col-auto">
                    <label for="generacion" class="form-label">Generación</label>
                    <select name="generacion" id="generacion" class="form-select">
                        <option value="">Todas las generaciones</option>
                        @foreach($generaciones as $generacion)
                            <option value="{{ $generacion }}">{{ $generacion }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <label for="motor" class="form-label">Motor</label>
                    <select name="motor" id="motor" class="form-select">
                        <option value="">Todos los motores</option>
                        @foreach($motores as $motor)
                            <option value="{{ $motor }}">{{ $motor }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <label for="tipo_combustible" class="form-label">Tipo de combustible</label>
                    <select name="tipo_combustible" id="tipo_combustible" class="form-select">
                        <option value="">Todos los tipos de combustible</option>
                        @foreach($tiposCombustible as $tipoCombustible)
                            <option value="{{ $tipoCombustible }}">{{ $tipoCombustible }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row g-3 ml-3 mt-4">
                <div class="col-auto">
                    <label for="tipo_traccion" class="form-label">Tipo de tracción</label>
                    <select name="tipo_traccion" id="tipo_traccion" class="form-select">
                        <option value="">Todos los tipos de tracción</option>
                        @foreach($tiposTraccion as $tipoTraccion)
                            <option value="{{ $tipoTraccion }}">{{ $tipoTraccion }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <label for="tipo_carroceria" class="form-label">Tipo de carrocería</label>
                    <select name="tipo_carroceria" id="tipo_carroceria" class="form-select">
                        <option value="">Todos los tipos de carrocería</option>
                        @foreach($tiposCarroceria as $tipoCarroceria)
                            <option value="{{ $tipoCarroceria }}">{{ $tipoCarroceria }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <label for="numero_plazas" class="form-label">Número de Plazas</label>
                    <select name="numero_plazas" id="numero_plazas" class="form-select">
                        <option value="">Todos los números de plazas</option>
                        @foreach($numeroPlazas as $numPlazas)
                            <option value="{{ $numPlazas }}">{{ $numPlazas }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row g-3 ml-3 mt-4">
                <div class="col-auto">
                    <label for="consumo_km_l" class="form-label"><strong>Consumo Km/L - Kw/h</strong></label>
                    <input type="range" class="form-range" id="consumo_km_l" name="consumo_km_l"
                        min="{{ $minConsumoKmL }}" max="{{ $maxConsumoKmL }}" step="0.001" value="{{ $defaultConsumoKmL }}">
                    <span id="consumo_km_l_value" class="fw-bold">{{ number_format($defaultConsumoKmL, 3) }}</span>
                </div>
            </div>
            <div class="row g-3 ml-3 mt-4">
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
