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
                        <a class="nav-link" href="#cuenta-section">Cuenta</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid p-0">
        <img src="{{ asset('img/fondo.jpg') }}" class="img-fluid" alt="fondoimagen"
            style="object-fit: cover; width: 100%; height: 65vh;">
    </div>

    <section id="cuenta-section" class="account-section py-5 text-dark" style="background-color: #434242;">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="bg-white p-4 rounded shadow">
                        <h2 class="text-center mb-4"><strong>Inicio de sesión</strong></h2>
                        <form id="loginForm" action="{{ route('cuenta.login') }}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            <div class="row g-2">
                                <div class="col">
                                    <input type="email" class="form-control" id="correo" name="correo" required
                                        placeholder="Email">
                                    <div class="invalid-feedback">
                                        Por favor, ingrese un email válido.
                                    </div>
                                </div>
                                <div class="col">
                                    <input type="password" class="form-control" id="contrasenia" name="contrasenia" required
                                        placeholder="Contraseña">
                                    <div class="invalid-feedback">
                                        Por favor, ingrese una contraseña.
                                    </div>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-secondary w-100"><strong>Iniciar sesión</strong></button>
                                </div>
                                <div class="col">
                                    <a href="{{ route('cuenta.register') }}" class="btn btn-warning w-100"><strong>Registrarse</strong></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
                    <a href="#" class="text-light me-3"><img src="{{ asset('img/facebook.png') }}" alt="Facebook"
                            class="img-fluid" style="max-width: 30px;"></a>
                    <a href="#" class="text-light me-3"><img src="{{ asset('img/instagram.png') }}"
                            alt="Instagram" class="img-fluid" style="max-width: 30px;"></a>
                    <a href="#" class="text-light"><img src="{{ asset('img/twitter.png') }}" alt="Twitter"
                            class="img-fluid" style="max-width: 30px;"></a>
                </div>
            </div>
        </div>
    </footer>
@endsection
