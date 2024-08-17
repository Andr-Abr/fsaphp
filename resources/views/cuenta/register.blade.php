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
    <img src="{{ asset('img/fondo.jpg') }}" class="img-fluid" alt="fondoimagen" style="object-fit: cover; width: 100%; height: 65vh;">
</div>

<section id="registrarse" class="account-section py-5 text-dark" style="background-color: #434242;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="bg-white p-4 rounded shadow">
                    <div class="account-container">
                        <h2 class="text-center mb-4"><strong>Registrarse</strong></h2>
                        <form id="registerForm" action="{{ route('cuenta.store') }}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-2">
                                    <input type="text" class="form-control" id="nombres" name="nombres" required placeholder="Nombres">
                                    <div class="invalid-feedback">
                                        Por favor, ingrese sus nombres.
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" id="apellidos" name="apellidos" required placeholder="Apellidos">
                                    <div class="invalid-feedback">
                                        Por favor, ingrese sus apellidos.
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-select" id="sexo" name="sexo" required>
                                        <option selected disabled value="">Sexo</option>
                                        <option value="femenino">Femenino</option>
                                        <option value="masculino">Masculino</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor, seleccione su sexo.
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="d-flex align-items-center">
                                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                                        <label for="fecha_nacimiento" class="ms-2">Fecha de nacimiento</label>
                                    </div>
                                    <div class="invalid-feedback">
                                        Por favor, seleccione su fecha de nacimiento.
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" id="pais" name="pais" required>
                                        <option selected disabled value="">País</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor, seleccione su País.
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" id="departamento" name="departamento" required>
                                        <option selected disabled value="">Departamento</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor, seleccione su Departamento
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" id="ciudad" name="ciudad" required>
                                        <option selected disabled value="">Ciudad</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor, seleccione su Ciudad.
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 mt-2">
                                <div class="col-md-2">
                                    <input type="email" class="form-control" id="correo" name="correo" required placeholder="Email">
                                    <div class="invalid-feedback">
                                        Por favor, ingrese un email válido.
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" id="cedula" name="cedula" required placeholder="Cédula">
                                    <div class="invalid-feedback">
                                        Por favor, ingrese su cédula.
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <input type="password" class="form-control" id="contrasenia" name="contrasenia" required placeholder="Contraseña">
                                    <div class="invalid-feedback">
                                        Por favor, ingrese una contraseña.
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <input type="password" class="form-control" id="contrasenia_confirmation" name="contrasenia_confirmation" required placeholder="Repetir Contraseña">
                                    <div class="invalid-feedback">
                                        Por favor, repita su contraseña.
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 mt-3">
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-warning w-100">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
                <a href="#" class="text-light me-3"><img src="{{ asset('img/facebook.png') }}" alt="Facebook" class="img-fluid" style="max-width: 30px;"></a>
                <a href="#" class="text-light me-3"><img src="{{ asset('img/instagram.png') }}" alt="Instagram" class="img-fluid" style="max-width: 30px;"></a>
                <a href="#" class="text-light"><img src="{{ asset('img/twitter.png') }}" alt="Twitter" class="img-fluid" style="max-width: 30px;"></a>
            </div>
        </div>
    </div>
</footer>
@endsection
