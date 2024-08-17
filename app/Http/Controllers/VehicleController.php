<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Historial;

class VehicleController extends Controller
{
    public function index(Request $request)
{
	$vehicles = Vehicle::all();
    $orderBy = $request->input('ordenarPor', 'idVehiculos');
    $direction = $request->input('direccion', 'asc');

    $vehicles = Vehicle::orderBy($orderBy, $direction)->get();

    return view('vehicles.index', compact('vehicles', 'orderBy', 'direction'));
}

    public function create()
    {
        return view('vehicles.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'marca' => 'required|max:255',
            'modelo' => 'required|max:255',
            'anio' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'generacion' => 'required|max:225',
            'motor' => 'required|max:255',
            'tipo_combustible' => 'required|max:50',
            'consumo_km_l' => 'required|numeric|min:0',
            'tipo_traccion' => 'required|max:50',
            'tipo_carroceria' => 'required|max:50',
            'numero_plazas' => 'required|integer|min:1|max:20',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('vehicles', 'public');
            $validatedData['ruta_imagen'] = '/storage/' . $imagePath;
        }

        Vehicle::create($validatedData);

        return redirect()->route('vehicles.index')->with('success', 'Vehículo agregado con éxito.');
    }

    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $validatedData = $request->validate([
            'marca' => 'required|max:255',
            'modelo' => 'required|max:255',
            'anio' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'generacion' => 'required|max:225',
            'motor' => 'required|max:255',
            'tipo_combustible' => 'required|max:50',
            'consumo_km_l' => 'required|numeric|min:0',
            'tipo_traccion' => 'required|max:50',
            'tipo_carroceria' => 'required|max:50',
            'numero_plazas' => 'required|integer|min:1|max:20',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('imagen')) {
            if ($vehicle->ruta_imagen) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $vehicle->ruta_imagen));
            }
            $imagePath = $request->file('imagen')->store('vehicles', 'public');
            $validatedData['ruta_imagen'] = '/storage/' . $imagePath;
        }

        $vehicle->update($validatedData);

        return redirect()->route('vehicles.index')->with('success', 'Vehículo actualizado con éxito.');
    }

    public function destroy(Vehicle $vehicle)
    {
        if ($vehicle->ruta_imagen) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $vehicle->ruta_imagen));
        }
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Vehículo eliminado con éxito.');
    }

    private function saveImage($file)
    {
    $fileName = Str::uuid() . '_' . $file->getClientOriginalName();
    $file->storeAs('public/uploads', $fileName);
    return '/storage/uploads/' . $fileName;
    }

    public function buscar()
{
    $marcas = Vehicle::distinct()->pluck('marca')->sort();
    $modelos = Vehicle::distinct()->pluck('modelo')->sort();
    $anios = Vehicle::distinct()->pluck('anio')->sort()->reverse();

    return view('vehicles.buscar', compact('marcas', 'modelos', 'anios'));
}

public function resultados(Request $request)
{
    $query = Vehicle::query();

    if ($request->filled('marca')) {
        $query->where('marca', 'like', '%' . $request->marca . '%');
    }
    if ($request->filled('modelo')) {
        $query->where('modelo', 'like', '%' . $request->modelo . '%');
    }
    if ($request->filled('anio')) {
        $query->where('anio', $request->anio);
    }

    if ($request->filled('generacion')) {
        $query->where('generacion', 'like', '%' . $request->generacion . '%');
    }
    if ($request->filled('motor')) {
        $query->where('motor', 'like', '%' . $request->motor . '%');
    }
    if ($request->filled('tipo_combustible')) {
        $query->where('tipo_combustible', $request->tipo_combustible);
    }
    if ($request->filled('tipo_traccion')) {
        $query->where('tipo_traccion', $request->tipo_traccion);
    }
    if ($request->filled('tipo_carroceria')) {
        $query->where('tipo_carroceria', $request->tipo_carroceria);
    }
    if ($request->filled('numero_plazas')) {
        $query->where('numero_plazas', $request->numero_plazas);
    }
    if ($request->filled('consumo_km_l')) {
        $query->where('consumo_km_l', '<=', $request->consumo_km_l);
    }

    $vehicles = $query->paginate(9);

    try {
        $cuentaId = session('cuenta_id'); // Obtener el ID de cuenta de la sesión
        if ($cuentaId) {
            $searchTerms = $request->only(['marca', 'modelo', 'anio', 'generacion', 'motor', 'tipo_combustible', 'tipo_traccion', 'tipo_carroceria', 'numero_plazas', 'consumo_km_l']);
            $searchTermsString = implode(', ', array_filter($searchTerms));

            foreach ($vehicles as $vehicle) {
                Historial::create([
                    'idCuenta' => $cuentaId,
                    'idVehiculos' => $vehicle->idVehiculos,
                    'fechaVisualizacion' => now(),
                    'terminosBusqueda' => $searchTermsString,
                ]);
            }
        }
    } catch (\Exception $e) {
        return redirect()->route('cuenta.index')->with('error', 'Debe iniciar sesión para ver los resultados.');
    }

    return view('vehicles.resultados', compact('vehicles'));
}

public function getModelos(Request $request)
{
    $modelos = Vehicle::where('marca', $request->marca)
                      ->distinct()
                      ->pluck('modelo')
                      ->sort();
    return response()->json($modelos);
}

public function getAnios(Request $request)
{
    $anios = Vehicle::where('marca', $request->marca)
                    ->distinct()
                    ->pluck('anio')
                    ->sort()
                    ->reverse();
    return response()->json($anios);
}

public function comparar()
{
    return view('vehicles.comparar');
}

public function busquedaAvanzada()
{
    $marcas = Vehicle::distinct()->pluck('marca')->sort();
    $modelos = Vehicle::distinct()->pluck('modelo')->sort();
    $anios = Vehicle::distinct()->pluck('anio')->sort()->reverse();
    $generaciones = Vehicle::distinct()->pluck('generacion')->sort();
    $motores = Vehicle::distinct()->pluck('motor')->sort();
    $tiposCombustible = Vehicle::distinct()->pluck('tipo_combustible')->sort();
    $tiposTraccion = Vehicle::distinct()->pluck('tipo_traccion')->sort();
    $tiposCarroceria = Vehicle::distinct()->pluck('tipo_carroceria')->sort();
    $numeroPlazas = Vehicle::distinct()->pluck('numero_plazas')->sort();

    $minConsumoKmL = Vehicle::min('consumo_km_l');
    $maxConsumoKmL = Vehicle::max('consumo_km_l');
    $defaultConsumoKmL = ($minConsumoKmL + $maxConsumoKmL) / 2;

    return view('vehicles.busqueda-avanzada', compact(
        'marcas', 'modelos', 'anios', 'generaciones', 'motores', 'tiposCombustible',
        'tiposTraccion', 'tiposCarroceria', 'numeroPlazas',
        'minConsumoKmL', 'maxConsumoKmL', 'defaultConsumoKmL'
    ));
}

public function buscarSugerencias(Request $request)
{
    $query = $request->input('query');
    $vehicles = Vehicle::where('marca', 'like', "%$query%")
                       ->orWhere('modelo', 'like', "%$query%")
                       ->orWhere('anio', 'like', "%$query%")
                       ->orWhere('motor', 'like', "%$query%")
                       ->take(7)
                       ->get();
    return response()->json($vehicles);
}

public function getVehicleDetails($id)
{
    $vehicle = Vehicle::findOrFail($id);
    return response()->json($vehicle);
}
}
