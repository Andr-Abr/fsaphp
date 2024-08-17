<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    protected $table = 'Historial';
    protected $primaryKey = 'idHistorial';
    public $timestamps = false;

    protected $fillable = [
        'idCuenta', 'idVehiculos', 'fechaVisualizacion', 'terminosBusqueda'
    ];

    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class, 'idCuenta');
    }

    public function vehiculo()
    {
        return $this->belongsTo(Vehicle::class, 'idVehiculos');
    }
}
