{{-- resources/views/mascotas/index.blade.php --}}
@extends('layouts.app')

@section('content')
<h2>Mascotas</h2>

<!-- Botón para abrir el modal de registrar nueva mascota -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#registroMascotaModal">
    Registrar mascota
</button>

<!-- Modal de registro de mascota -->
<div class="modal fade" id="registroMascotaModal" tabindex="-1" aria-labelledby="registroMascotaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registroMascotaModalLabel">Registrar una mascota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('mascotas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Campos del formulario para registrar una mascota -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de la Mascota:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="especie" class="form-label">Especie:</label>
                        <input type="text" class="form-control" id="especie" name="especie" required>
                    </div>
                    <div class="mb-3">
                        <label for="raza" class="form-label">Raza:</label>
                        <input type="text" class="form-control" id="raza" name="raza">
                    </div>
                    <div class="mb-3">
                        <label for="edad" class="form-label">Edad:</label>
                        <input type="number" class="form-control" id="edad" name="edad">
                    </div>
                    <div class="mb-3">
                        <label for="peso" class="form-label">Peso:</label>
                        <input type="number" step="0.1" class="form-control" id="peso" name="peso">
                    </div>
                    <div class="mb-3">
                        <label for="dueno" class="form-label">Dueño:</label>
                        <input type="text" class="form-control" id="dueno" name="dueno" required>
                    </div>
                    <div class="mb-3">
                        <label for="contacto" class="form-label">Contacto:</label>
                        <input type="text" class="form-control" id="contacto" name="contacto" required>
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen:</label>
                        <input type="file" class="form-control" id="imagen" name="imagen">
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Tabla de mascotas -->
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
        @foreach ($mascotas as $mascota)
        <tr>
            <td>{{ $mascota->nombre }}</td>
            <td>{{ $mascota->especie }}</td>
            <td>{{ $mascota->raza }}</td>
            <td>{{ $mascota->edad }}</td>
            <td>{{ $mascota->peso }}</td>
            <td>{{ $mascota->dueno }}</td>
            <td>{{ $mascota->contacto }}</td>
            <td>
                @if ($mascota->imagen)
                <img src="{{ Storage::url($mascota->imagen) }}" alt="Imagen de {{ $mascota->nombre }}" width="100">
                @else
                <span>No hay imagen</span>
                @endif
            </td>
            <td>
                <!-- Botones de Editar y Eliminar -->
                <div class="btn-group" role="group">
                    <button class="btn btn-warning btn-sm" data-mascota="{{ json_encode($mascota) }}"
                        onclick="abrirModalEditar(this)">
                        <i class="fas fa-edit"></i> Editar
                    </button>
                    <form action="{{ route('mascotas.destroy', $mascota->id) }}" method="POST" style="display:inline;" onsubmit="return confirmarEliminacion()">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Eliminar
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    function confirmarEliminacion() {
        return confirm("¿Estás seguro de que deseas eliminar esta mascota?");
    }
</script>


<!-- Modal de edición de mascota -->
<div class="modal fade" id="editarMascotaModal" tabindex="-1" aria-labelledby="editarMascotaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarMascotaModalLabel">Editar mascota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editarMascotaForm" action="{{ route('mascotas.update', ['mascota' => 'ID_PLACEHOLDER']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editMascotaId" name="id">
                    <!-- Campos del formulario para editar una mascota -->
                    <div class="mb-3">
                        <label for="editNombre" class="form-label">Nombre de la Mascota:</label>
                        <input type="text" class="form-control" id="editNombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="editEspecie" class="form-label">Especie:</label>
                        <input type="text" class="form-control" id="editEspecie" name="especie" required>
                    </div>
                    <div class="mb-3">
                        <label for="editRaza" class="form-label">Raza:</label>
                        <input type="text" class="form-control" id="editRaza" name="raza">
                    </div>
                    <div class="mb-3">
                        <label for="editEdad" class="form-label">Edad:</label>
                        <input type="number" class="form-control" id="editEdad" name="edad">
                    </div>
                    <div class="mb-3">
                        <label for="editPeso" class="form-label">Peso:</label>
                        <input type="number" step="0.1" class="form-control" id="editPeso" name="peso">
                    </div>
                    <div class="mb-3">
                        <label for="editDueno" class="form-label">Dueño:</label>
                        <input type="text" class="form-control" id="editDueno" name="dueno" required>
                    </div>
                    <div class="mb-3">
                        <label for="editContacto" class="form-label">Contacto:</label>
                        <input type="text" class="form-control" id="editContacto" name="contacto" required>
                    </div>
                    <div class="mb-3">
                        <label for="editImagen" class="form-label">Imagen:</label>
                        <input type="file" class="form-control" id="editImagen" name="imagen">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function abrirModalEditar(button) {
        // Obtener el JSON de la mascota desde el atributo data-mascota
        const mascota = JSON.parse(button.getAttribute('data-mascota'));

        // Asignar el ID de la mascota al campo oculto y actualizar la acción del formulario
        document.getElementById('editMascotaId').value = mascota.id;

        // Asignar los valores a los campos del modal
        document.getElementById('editNombre').value = mascota.nombre;
        document.getElementById('editEspecie').value = mascota.especie;
        document.getElementById('editRaza').value = mascota.raza;
        document.getElementById('editEdad').value = mascota.edad;
        document.getElementById('editPeso').value = mascota.peso;
        document.getElementById('editDueno').value = mascota.dueno;
        document.getElementById('editContacto').value = mascota.contacto;

        // Configurar la acción del formulario
        const form = document.getElementById('editarMascotaForm');
        form.action = `/mascotas/${mascota.id}`;

        // Añadir confirmación al guardar
        form.onsubmit = function() {
            return confirm("¿Estás seguro de que deseas guardar estos cambios?");
        };

        // Mostrar el modal de edición
        const editarModal = new bootstrap.Modal(document.getElementById('editarMascotaModal'));
        editarModal.show();
    }
</script>

@endsection