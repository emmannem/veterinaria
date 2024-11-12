{{-- resources/views/servicios/index.blade.php --}}
@extends('layouts.app')

@section('content')
<h2>Servicios</h2>

<!-- Botón para abrir el modal de registrar nuevo servicio -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#registroServicioModal">
    Registrar servicio
</button>

<!-- Modal de registro de servicio -->
<div class="modal fade" id="registroServicioModal" tabindex="-1" aria-labelledby="registroServicioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registroServicioModalLabel">Registrar un servicio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <!-- Campos del formulario para registrar un servicio -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Servicio:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio:</label>
                        <input type="number" step="0.01" class="form-control" id="precio" name="precio">
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal de edición de servicio -->
<div class="modal fade" id="editarServicioModal" tabindex="-1" aria-labelledby="editarServicioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarServicioModalLabel">Editar servicio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editarServicioForm">
                    <!-- Campos del formulario para editar un servicio -->
                    <div class="mb-3">
                        <label for="editNombre" class="form-label">Nombre del Servicio:</label>
                        <input type="text" class="form-control" id="editNombre" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="editDescripcion" class="form-label">Descripción:</label>
                        <textarea class="form-control" id="editDescripcion" name="descripcion"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editPrecio" class="form-label">Precio:</label>
                        <input type="number" step="0.01" class="form-control" id="editPrecio" name="precio">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Tabla de servicios -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre del Servicio</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <!-- Datos de ejemplo -->
        <tr>
            <td>Consulta General</td>
            <td>Consulta médica básica</td>
            <td>$500.00</td>
            <td>
                <!-- Botones de Editar y Eliminar -->
                <div class="btn-group" role="group" aria-label="Acciones">
                    <button class="btn btn-warning btn-sm" onclick="abrirModalEditar('Consulta General', 'Consulta médica básica', 500)">
                        <i class="fas fa-edit"></i> Editar
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="eliminarServicio(1)">
                        <i class="fas fa-trash"></i> Eliminar
                    </button>
                </div>
            </td>
        </tr>
        <tr>
            <td>Vacunación</td>
            <td>Aplicación de vacuna completa</td>
            <td>$300.00</td>
            <td>
                <div class="btn-group" role="group" aria-label="Acciones">
                    <button class="btn btn-warning btn-sm" onclick="abrirModalEditar('Vacunación', 'Aplicación de vacuna completa', 300)">
                        <i class="fas fa-edit"></i> Editar
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="eliminarServicio(2)">
                        <i class="fas fa-trash"></i> Eliminar
                    </button>
                </div>
            </td>
        </tr>
    </tbody>
</table>

<script>
    function abrirModalEditar(nombre, descripcion, precio) {
        document.getElementById('editNombre').value = nombre;
        document.getElementById('editDescripcion').value = descripcion;
        document.getElementById('editPrecio').value = precio;

        var editarModal = new bootstrap.Modal(document.getElementById('editarServicioModal'));
        editarModal.show();
    }
</script>
@endsection