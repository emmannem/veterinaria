{{-- resources/views/mascotas/index.blade.php --}}
@extends('layouts.app')

@section('content')
<h2>Listado de Mascotas</h2>

<!-- Botón para registrar una nueva mascota -->
<a href="{{ route('mascotas.create') }}" class="btn btn-primary mb-3">Registrar nueva mascota</a>

<!-- Tabla de ejemplo con datos ficticios -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre de la Mascota</th>
            <th>Especie</th>
            <th>Raza</th>
            <th>Edad</th>
            <th>Peso</th>
            <th>Dueño</th>
            <th>Contacto</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <!-- Datos de ejemplo -->
        <tr>
            <td>Max</td>
            <td>Perro</td>
            <td>Labrador</td>
            <td>3 años</td>
            <td>25 kg</td>
            <td>Juan Pérez</td>
            <td>+1 234 567 890</td>
            <td><img src="https://via.placeholder.com/100" alt="Imagen de Max" width="100"></td>
            <td>
                <!-- Botones de Editar y Eliminar en la misma celda -->
                <div class="btn-group" role="group" aria-label="Acciones">
                    <button class="btn btn-warning btn-sm" onclick="editarMascota(1)">
                        <i class="fas fa-edit"></i> Editar
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="eliminarMascota(1)">
                        <i class="fas fa-trash"></i> Eliminar
                    </button>
                </div>
            </td>
        </tr>
        <tr>
            <td>Luna</td>
            <td>Gato</td>
            <td>Siames</td>
            <td>2 años</td>
            <td>5 kg</td>
            <td>María López</td>
            <td>+1 987 654 321</td>
            <td><img src="https://via.placeholder.com/100" alt="Imagen de Luna" width="100"></td>
            <td>
                <!-- Botones de Editar y Eliminar en la misma celda -->
                <div class="btn-group" role="group" aria-label="Acciones">
                    <button class="btn btn-warning btn-sm" onclick="editarMascota(2)">
                        <i class="fas fa-edit"></i> Editar
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="eliminarMascota(2)">
                        <i class="fas fa-trash"></i> Eliminar
                    </button>
                </div>
            </td>
        </tr>
    </tbody>
</table>
@endsection