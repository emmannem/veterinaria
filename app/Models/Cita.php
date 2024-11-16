<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = ['id_mascota', 'servicio_id', 'fecha', 'hora', 'estado'];

    // Relación con la tabla Mascotas
    public function mascota()
    {
        return $this->belongsTo(Mascota::class, 'id_mascota');
    }

    // Relación con la tabla Servicios
    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }
}
