<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;

    protected $table = 'Favoritos';
    protected $primaryKey = 'idFavoritos';
    public $timestamps = false;

    protected $fillable = [
        'idCuenta', 'idVehiculos', 'categoriaFavorito', 'etiquetaFavorito'
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
