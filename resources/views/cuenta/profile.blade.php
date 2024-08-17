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
        <div class="container mt-5">
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
                <div class="col-md-10">
                    <div class="bg-white p-4 rounded shadow">
                        <div class="account-container">
            <h2><strong>Perfil de Usuario</strong></h2>
            <div class="row">
                <div class="col-md-6">
                    <h3>Información personal</h3>
                    <p><strong>Nombre de usuario:</strong> {{ $cuenta->nombres }} {{ $cuenta->apellidos }}</p>
                    <p><strong>Correo electrónico:</strong> {{ $cuenta->correo }}</p>
                    <p><strong>Sexo:</strong> {{ $cuenta->sexo }}</p>
                    <p><strong>Cedula:</strong> {{ $cuenta->cedula }}</p>
                    <p><strong>Fecha de nacimiento:</strong> {{ $cuenta->fecha_nacimiento }}</p>
                    <p><strong>Lugar de nacimiento:</strong> {{ $cuenta->pais }}, {{ $cuenta->departamento }}, {{ $cuenta->ciudad }}</p>

                    <h3>Cambiar correo electrónico</h3>
                    <form action="{{ route('cuenta.updateEmail') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="new_email">Nuevo correo electrónico:</label>
                            <input type="email" class="form-control" id="new_email" name="new_email" required>
                        </div>
                        <button type="submit" class="btn btn-warning mt-2">Guardar nuevo correo</button>
                    </form>

                    <h3 class="mt-4">Cambiar contraseña</h3>
                    <form action="{{ route('cuenta.updatePassword') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="current_password">Contraseña actual:</label>
                            <input type="password" class="form-control" id="current_password" name="current_password"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="new_password">Nueva contraseña:</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                        </div>
                        <div class="form-group">
                            <label for="new_password_confirmation">Confirmar nueva contraseña:</label>
                            <input type="password" class="form-control" id="new_password_confirmation"
                                name="new_password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-warning mt-2">Guardar nueva contraseña</button>
                    </form>
                    <div class="mt-5">
                        <h3>Eliminar Cuenta</h3>
                        <p>Advertencia: Esta acción es irreversible y eliminará todos tus datos.</p>
                        <form action="{{ route('cuenta.destroy') }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar tu cuenta? Esta acción no se puede deshacer.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar mi cuenta</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>Acciones</h3>
                    <a href="{{ route('historial.index') }}" class="btn btn-secondary">Historial</a>
                    <a href="{{ route('favoritos.index') }}" class="btn btn-secondary">Favoritos</a>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline-block">
                        @csrf
                        <button type="submit" class="btn btn-danger">Cerrar sesión</button>
                    </form>
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
