<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $fillable = ['id_mascota', 'diagnostico', 'tratamiento', 'medicamentos'];

    // función para filtrar los activos de los inactivos
    protected static function booted()
    {
        static::addGlobalScope('activo', function ($query) {
            $query->where('activo', true);
        });
    }

    // Relación con la tabla Mascotas
    public function mascota()
    {
        return $this->belongsTo(Mascota::class, 'id_mascota');
    }
}
