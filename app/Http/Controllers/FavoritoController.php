<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritoController extends Controller
{
    public function index()
    {
        $favoritos = Favorito::where('idCuenta', session('cuenta_id'))->with('vehiculo')->get();
        return view('favoritos.index', compact('favoritos'));
    }

    public function store(Request $request)
    {
        $favorito = Favorito::create([
            'idCuenta' => session('cuenta_id'),
            'idVehiculos' => $request->idVehiculos,
        ]);

        return redirect()->back()->with('success', 'Vehículo agregado a favoritos.');
    }

    public function destroy(Favorito $favorito)
    {
        $favorito->delete();
        return redirect()->back()->with('success', 'Vehículo eliminado de favoritos.');
    }

    public function updateCategoria(Request $request, Favorito $favorito)
    {
        $favorito->update(['categoriaFavorito' => $request->categoria]);
        return redirect()->back()->with('success', 'Categoría actualizada.');
    }

    public function updateEtiqueta(Request $request, Favorito $favorito)
    {
        $favorito->update(['etiquetaFavorito' => $request->etiqueta]);
        return redirect()->back()->with('success', 'Etiqueta actualizada.');
    }
}
