<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;

    protected $table = 'Cuenta';
    protected $primaryKey = 'idCuenta';
    public $timestamps = false;

    protected $fillable = [
        'nombres', 'apellidos', 'sexo', 'fecha_nacimiento',
        'pais', 'departamento', 'ciudad', 'correo', 'cedula', 'contrasenia'
    ];

// Borrar registros relacionados al eliminar una cuenta
public function historial()
{
    return $this->hasMany(Historial::class, 'idCuenta');
}

public function favoritos()
{
    return $this->hasMany(Favorito::class, 'idCuenta');
}

protected static function boot()
{
    parent::boot();

    static::deleting(function ($cuenta) {
        // Eliminar registros relacionados
        $cuenta->historial()->delete();
        $cuenta->favoritos()->delete();
    });
}
}
