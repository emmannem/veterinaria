<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
    ];

    // función para filtrar los activos de los inactivos
    protected static function booted()
    {
        static::addGlobalScope('activo', function ($query) {
            $query->where('activo', true);
        });
    }
}
