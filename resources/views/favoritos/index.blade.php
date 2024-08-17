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

<section id="favoritos" class="account-section py-5 text-dark" style="background-color: #434242;">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="bg-dark p-4 rounded shadow">
					<div class="account-container">
						<h1 class="fw-bold text-white">Mis Favoritos</h1>
						<div class="row">
							@foreach($favoritos as $favorito)
							<div class="col-md-4 mb-4">
								<div class="card">
									@if($favorito->vehiculo->ruta_imagen)
									<img src="{{ asset($favorito->vehiculo->ruta_imagen) }}" class="card-img-top" alt="Imagen del vehículo">
									@endif
									<div class="card-body">
										<h5 class="card-title">{{ $favorito->vehiculo->marca }} {{ $favorito->vehiculo->modelo }}</h5>
										<p class="card-text">Año: {{ $favorito->vehiculo->anio }}</p>
                                        <p class="card-text">Generación: {{ $favorito->vehiculo->generacion }}</p>
                                        <p class="card-text">Motor: {{ $favorito->vehiculo->motor }}</p>
                                        <p class="card-text">Tipo de combustible: {{ $favorito->vehiculo->tipo_combustible }}</p>
                                        <p class="card-text">Consumo Km/L-Kw/H: {{ $favorito->vehiculo->consumo_km_l }}</p>
                                        <p class="card-text">Tipo de tracción: {{ $favorito->vehiculo->tipo_traccion }}</p>
                                        <p class="card-text">Tipo de carrocería: {{ $favorito->vehiculo->tipo_carroceria }}</p>
                                        <p class="card-text">Número de Plazas: {{ $favorito->vehiculo->numero_plazas }}</p>
										<form action="{{ route('favoritos.updateCategoria', $favorito) }}" method="POST" class="mb-2">
											@csrf
											@method('PUT')
											<input type="text" name="categoria" value="{{ $favorito->categoriaFavorito }}" placeholder="Categoría">
											<button type="submit" class="btn btn-sm btn-warning">Actualizar Categoría</button>
										</form>
										<form action="{{ route('favoritos.updateEtiqueta', $favorito) }}" method="POST" class="mb-2">
											@csrf
											@method('PUT')
											<input type="text" name="etiqueta" value="{{ $favorito->etiquetaFavorito }}" placeholder="Etiqueta">
											<button type="submit" class="btn btn-sm btn-warning">Actualizar Etiqueta</button>
										</form>
										<form action="{{ route('favoritos.destroy', $favorito) }}" method="POST">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-sm btn-danger">Eliminar de Favoritos</button>
										</form>
									</div>
								</div>
							</div>
							@endforeach
						</div>
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
