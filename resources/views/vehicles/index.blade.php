@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Vehículos</h1>
    <a href="{{ route('vehicles.create') }}" class="btn btn-primary mb-3">Agregar Vehículo</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead class="table-dark">>
            <tr>
                <th>
                    <a class="text-white text-decoration-none" href="{{ route('vehicles.index', ['ordenarPor' => 'idVehiculos', 'direccion' => ($orderBy == 'idVehiculos' && $direction == 'asc') ? 'desc' : 'asc']) }}">
                        ID
                        @if ($orderBy == 'idVehiculos')
                            {!! $direction == 'asc' ? '▲' : '▼' !!}
                        @endif
                    </a>
                </th>

                <th>
                    <a class="text-white text-decoration-none" href="{{ route('vehicles.index', ['ordenarPor' => 'marca', 'direccion' => ($orderBy == 'marca' && $direction == 'asc') ? 'desc' : 'asc']) }}">
                        Marca
                        @if ($orderBy == 'marca')
                            {!! $direction == 'asc' ? '▲' : '▼' !!}
                        @endif
                    </a>
                </th>

                <th>
                    <a class="text-white text-decoration-none" href="{{ route('vehicles.index', ['ordenarPor' => 'modelo', 'direccion' => ($orderBy == 'modelo' && $direction == 'asc') ? 'desc' : 'asc']) }}">
                        Modelo        @if ($orderBy == 'modelo')
                            {!! $direction == 'asc' ? '▲' : '▼' !!}
                        @endif
                    </a>
                </th>

                <th>
                    <a class="text-white text-decoration-none" href="{{ route('vehicles.index', ['ordenarPor' => 'anio', 'direccion' => ($orderBy == 'anio' && $direction == 'asc') ? 'desc' : 'asc']) }}">
                        Año
                        @if ($orderBy == 'anio')
                            {!! $direction == 'asc' ? '▲' : '▼' !!}
                        @endif
                    </a>
                </th>

                <th>
                    <a class="text-white text-decoration-none" href="{{ route('vehicles.index', ['ordenarPor' => 'generacion', 'direccion' => ($orderBy == 'generacion' && $direction == 'asc') ? 'desc' : 'asc']) }}">
                        Generación
                        @if ($orderBy == 'generacion')
                            {!! $direction == 'asc' ? '▲' : '▼' !!}
                        @endif
                    </a>
                </th>

                <th>
                    <a class="text-white text-decoration-none" href="{{ route('vehicles.index', ['ordenarPor' => 'motor', 'direccion' => ($orderBy == 'motor' && $direction == 'asc') ? 'desc' : 'asc']) }}">
                        Motor
                        @if ($orderBy == 'motor')
                            {!! $direction == 'asc' ? '▲' : '▼' !!}
                        @endif
                    </a>
                </th>

                <th>
                    <a class="text-white text-decoration-none" href="{{ route('vehicles.index', ['ordenarPor' => 'tipo_combustible', 'direccion' => ($orderBy == 'tipo_combustible' && $direction == 'asc') ? 'desc' : 'asc']) }}">
                        Tipo Combustible        @if ($orderBy == 'tipo_combustible')
                            {!! $direction == 'asc' ? '▲' : '▼' !!}
                        @endif
                    </a>
                </th>

                <th>
                    <a class="text-white text-decoration-none" href="{{ route('vehicles.index', ['ordenarPor' => 'consumo_km_l', 'direccion' => ($orderBy == 'consumo_km_l' && $direction == 'asc') ? 'desc' : 'asc']) }}">
                        Consumo (Km/L)
                        @if ($orderBy == 'consumo_km_l')
                            {!! $direction == 'asc' ? '▲' : '▼' !!}
                        @endif
                    </a>
                </th>

                <th>
                    <a class="text-white text-decoration-none" href="{{ route('vehicles.index', ['ordenarPor' => 'tipo_traccion', 'direccion' => ($orderBy == 'tipo_traccion' && $direction == 'asc') ? 'desc' : 'asc']) }}">
                        Tipo Tracción        @if ($orderBy == 'tipo_traccion')
                            {!! $direction == 'asc' ? '▲' : '▼' !!}
                        @endif
                    </a>
                </th>

                <th>
                    <a class="text-white text-decoration-none" href="{{ route('vehicles.index', ['ordenarPor' => 'tipo_carroceria', 'direccion' => ($orderBy == 'tipo_carroceria' && $direction == 'asc') ? 'desc' : 'asc']) }}">
                        Tipo Carrocería
                        @if ($orderBy == 'tipo_carroceria')
                            {!! $direction == 'asc' ? '▲' : '▼' !!}
                        @endif
                    </a>
                </th>

                <th>
                    <a class="text-white text-decoration-none" href="{{ route('vehicles.index', ['ordenarPor' => 'numero_plazas', 'direccion' => ($orderBy == 'numero_plazas' && $direction == 'asc') ? 'desc' : 'asc']) }}">
                        Número Plazas
                        @if ($orderBy == 'numero_plazas')
                            {!! $direction == 'asc' ? '▲' : '▼' !!}
                        @endif
                    </a>
                </th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->idVehiculos }}</td>
                    <td>{{ $vehicle->marca }}</td>
                    <td>{{ $vehicle->modelo }}</td>
                    <td>{{ $vehicle->anio }}</td>
                    <td>{{ $vehicle->generacion }}</td>
                    <td>{{ $vehicle->motor }}</td>
                    <td>{{ $vehicle->tipo_combustible }}</td>
                    <td>{{ $vehicle->consumo_km_l  }}</td>
                    <td>{{ $vehicle->tipo_traccion }}</td>
                    <td>{{ $vehicle->tipo_carroceria  }}</td>
                    <td>{{ $vehicle->numero_plazas }}</td>
                    <td>
                        @if ($vehicle->ruta_imagen)
                            <img src="{{ $vehicle->ruta_imagen }}" alt="Imagen del vehículo" style="max-width: 50px; max-height: 50px;">
                        @else
                            Sin imagen
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('vehicles.show', $vehicle->idVehiculos) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('vehicles.edit', $vehicle->idVehiculos) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('vehicles.destroy', $vehicle->idVehiculos) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este vehículo?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
