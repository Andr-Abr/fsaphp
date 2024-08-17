<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'Vehiculos';
    protected $primaryKey = 'idVehiculos';
    public $timestamps = false;

    protected $fillable = [
        'marca', 'modelo', 'anio', 'generacion', 'motor',
        'tipo_combustible', 'consumo_km_l', 'tipo_traccion',
        'tipo_carroceria', 'numero_plazas', 'ruta_imagen'
    ];
}
