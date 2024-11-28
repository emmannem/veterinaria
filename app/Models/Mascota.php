<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    // Si la tabla en la base de datos tiene un nombre diferente
    protected $table = 'mascotas';

    // Si necesitas definir los campos que se pueden asignar masivamente
    protected $fillable = ['nombre', 'especie', 'raza', 'edad', 'peso', 'dueno', 'contacto', 'imagen'];

    // función para filtrar los activos de los inactivos
    protected static function booted()
    {
        static::addGlobalScope('activo', function ($query) {
            $query->where('activo', true);
        });
    }
}
