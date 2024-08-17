<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistorialController extends Controller
{
    public function index()
    {
        $historial = Historial::where('idCuenta', session('cuenta_id'))->orderBy('fechaVisualizacion', 'desc')->get();
        return view('historial.index', compact('historial'));
    }

    public function store(Request $request)
    {
        Historial::create([
            'idCuenta' => session('cuenta_id'),
            'idVehiculos' => $request->idVehiculos,
            'fechaVisualizacion' => now(),
            'terminosBusqueda' => $request->terminosBusqueda,
        ]);

        return redirect()->back();
    }

    public function destroy()
    {
        Historial::where('idCuenta', session('cuenta_id'))->delete();
        return redirect()->back()->with('success', 'Historial borrado.');
    }
}
