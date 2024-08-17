<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class CuentaController extends Controller
{
    public function index()
    {
        return view('cuenta.index');
    }

    public function register()
    {
        return view('cuenta.register');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nombres' => 'required|max:255',
        'apellidos' => 'required|max:255',
        'sexo' => 'required|in:femenino,masculino',
        'fecha_nacimiento' => 'required|date',
        'pais' => 'required|max:255',
        'departamento' => 'required|max:255',
        'ciudad' => 'required|max:255',
        'correo' => 'required|email|unique:Cuenta',
        'cedula' => 'required|unique:Cuenta',
        'contrasenia' => 'required|min:6|confirmed',
    ]);

    // Obtener los nombres de país, departamento, ciudad y hash de contraseña
    $validatedData['pais'] = $request->pais;
    $validatedData['departamento'] = $request->departamento;
    $validatedData['ciudad'] = $request->ciudad;
    $validatedData['contrasenia'] = Hash::make($validatedData['contrasenia']);

    try {
        $cuenta = Cuenta::create($validatedData);
        Log::info('Cuenta creada:', ['id' => $cuenta->idCuenta, 'datos' => $validatedData]);

        return redirect()->route('cuenta.index')->with('success', 'Cuenta creada exitosamente. Por favor, inicie sesión.');
    } catch (\Exception $e) {
        Log::error('Error al crear cuenta:', ['error' => $e->getMessage()]);
        return back()->with('error', 'Hubo un problema al crear la cuenta. Por favor, inténtelo de nuevo.');
    }
}

private function getLocationName($geonameId)
{
    $response = Http::get("http://api.geonames.org/getJSON?geonameId={$geonameId}&username=ANDRABR_GEONAMES");
    $data = $response->json();
    return $data['name'] ?? '';
}

public function login(Request $request)
{
    $credentials = $request->validate([
        'correo' => 'required|email',
        'contrasenia' => 'required',
    ]);

    Log::info('Intento de inicio de sesión:', ['correo' => $credentials['correo']]);

    $cuenta = Cuenta::where('correo', $credentials['correo'])->first();

    if (!$cuenta) {
        Log::warning('Usuario no encontrado:', ['correo' => $credentials['correo']]);
        return back()->withErrors(['correo' => 'Las credenciales proporcionadas no coinciden con nuestros registros.']);
    }

    if (Hash::needsRehash($cuenta->contrasenia)) {
        $cuenta->contrasenia = Hash::make($credentials['contrasenia']);
        $cuenta->save();
    }

    if (!Hash::check($credentials['contrasenia'], $cuenta->contrasenia)) {
        Log::warning('Contraseña incorrecta:', ['correo' => $credentials['correo']]);
        return back()->withErrors(['correo' => 'Las credenciales proporcionadas no coinciden con nuestros registros.']);
    }

    $request->session()->put('cuenta_id', $cuenta->idCuenta);
    Log::info('Inicio de sesión exitoso:', ['id' => $cuenta->idCuenta]);

    return redirect()->route('cuenta.profile')->with('success', 'Inicio de sesión exitoso');
}

public function profile()
{
    $cuenta = Cuenta::findOrFail(session('cuenta_id'));
    return view('cuenta.profile', compact('cuenta'));
}

public function updateEmail(Request $request)
{
    $request->validate([
        'new_email' => 'required|email|unique:Cuenta,correo'
    ]);

    $cuenta = Cuenta::findOrFail(session('cuenta_id'));
    $cuenta->correo = $request->new_email;
    $cuenta->save();

    return redirect()->route('cuenta.profile')->with('success', 'Correo electrónico actualizado correctamente');
}

public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:6|confirmed'
    ]);

    $cuenta = Cuenta::findOrFail(session('cuenta_id'));

    if (!Hash::check($request->current_password, $cuenta->contrasenia)) {
        return back()->withErrors(['current_password' => 'La contraseña actual es incorrecta']);
    }

    $cuenta->contrasenia = Hash::make($request->new_password);
    $cuenta->save();

    return redirect()->route('cuenta.profile')->with('success', 'Contraseña actualizada correctamente');
}

public function destroy(Request $request)
{
    $cuenta = Cuenta::findOrFail($request->session()->get('cuenta_id'));

    // Eliminar la cuenta
    $cuenta->delete();

    // Cerrar la sesión
    $request->session()->forget('cuenta_id');
    $request->session()->flush();

    return redirect()->route('cuenta.index')->with('success', 'Tu cuenta ha sido eliminada exitosamente.');
}

public function logout(Request $request)
{
    $request->session()->forget('cuenta_id');
    return redirect()->route('cuenta.index')->with('success', 'Has cerrado sesión correctamente.');
}
}
