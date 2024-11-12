{{-- resources/views/citas/index.blade.php --}}
@extends('layouts.app')

@section('content')
<h2>Citas</h2>

<!-- Botón para abrir el modal de registrar nueva cita -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#registroCitaModal">
    Registrar cita
</button>

<!-- Modal de registro de cita -->
<div class="modal fade" id="registroCitaModal" tabindex="-1" aria-labelledby="registroCitaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registroCitaModalLabel">Registrar una cita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <!-- Campos del formulario para registrar una cita -->
                    <div class="mb-3">
                        <label for="mascota" class="form-label">Mascota:</label>
                        <input type="text" class="form-control" id="mascota" name="mascota">
                    </div>
                    <div class="mb-3">
                        <label for="servicio" class="form-label">Servicio:</label>
                        <input type="text" class="form-control" id="servicio" name="servicio">
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha:</label>
                        <input type="date" class="form-control" id="fecha" name="fecha">
                    </div>
                    <div class="mb-3">
                        <label for="hora" class="form-label">Hora:</label>
                        <input type="time" class="form-control" id="hora" name="hora">
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado:</label>
                        <select class="form-select" id="estado" name="estado">
                            <option value="Pendiente">Pendiente</option>
                            <option value="Realizado">Realizado</option>
                            <option value="Cancelado">Cancelado</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal de edición de cita -->
<div class="modal fade" id="editarCitaModal" tabindex="-1" aria-labelledby="editarCitaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarCitaModalLabel">Editar cita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editarCitaForm">
                    <!-- Campos del formulario para editar una cita -->
                    <div class="mb-3">
                        <label for="editMascota" class="form-label">Mascota:</label>
                        <input type="text" class="form-control" id="editMascota" name="mascota">
                    </div>
                    <div class="mb-3">
                        <label for="editServicio" class="form-label">Servicio:</label>
                        <input type="text" class="form-control" id="editServicio" name="servicio">
                    </div>
                    <div class="mb-3">
                        <label for="editFecha" class="form-label">Fecha:</label>
                        <input type="date" class="form-control" id="editFecha" name="fecha">
                    </div>
                    <div class="mb-3">
                        <label for="editHora" class="form-label">Hora:</label>
                        <input type="time" class="form-control" id="editHora" name="hora">
                    </div>
                    <div class="mb-3">
                        <label for="editEstado" class="form-label">Estado:</label>
                        <select class="form-select" id="editEstado" name="estado">
                            <option value="Pendiente">Pendiente</option>
                            <option value="Realizado">Realizado</option>
                            <option value="Cancelado">Cancelado</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Tabla de citas -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mascota</th>
            <th>Servicio</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <!-- Datos de ejemplo -->
        <tr>
            <td>Fido</td>
            <td>Consulta General</td>
            <td>2024-12-01</td>
            <td>10:30</td>
            <td>Pendiente</td>
            <td>
                <!-- Botones de Editar y Eliminar -->
                <div class="btn-group" role="group" aria-label="Acciones">
                    <button class="btn btn-warning btn-sm" onclick="abrirModalEditar('Fido', 'Consulta General', '2024-12-01', '10:30', 'Pendiente')">
                        <i class="fas fa-edit"></i> Editar
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="eliminarCita(1)">
                        <i class="fas fa-trash"></i> Eliminar
                    </button>
                </div>
            </td>
        </tr>
        <tr>
            <td>Luna</td>
            <td>Vacunación</td>
            <td>2024-12-02</td>
            <td>14:00</td>
            <td>Realizado</td>
            <td>
                <div class="btn-group" role="group" aria-label="Acciones">
                    <button class="btn btn-warning btn-sm" onclick="abrirModalEditar('Luna', 'Vacunación', '2024-12-02', '14:00', 'Realizado')">
                        <i class="fas fa-edit"></i> Editar
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="eliminarCita(2)">
                        <i class="fas fa-trash"></i> Eliminar
                    </button>
                </div>
            </td>
        </tr>
    </tbody>
</table>

<script>
    function abrirModalEditar(mascota, servicio, fecha, hora, estado) {
        document.getElementById('editMascota').value = mascota;
        document.getElementById('editServicio').value = servicio;
        document.getElementById('editFecha').value = fecha;
        document.getElementById('editHora').value = hora;
        document.getElementById('editEstado').value = estado;

        var editarModal = new bootstrap.Modal(document.getElementById('editarCitaModal'));
        editarModal.show();
    }
</script>
@endsection