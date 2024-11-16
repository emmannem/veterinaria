{{--resources\views\citas\index.blade.php--}}
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
                <form action="{{ route('citas.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="id_mascota" class="form-label">Mascota:</label>
                        <select class="form-select" id="id_mascota" name="id_mascota" required>
                            <option selected disabled>Seleccione una mascota</option>
                            @foreach ($mascotas as $mascota)
                            <option value="{{ $mascota->id }}">{{ $mascota->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="servicio_id" class="form-label">Servicio:</label>
                        <select class="form-select" id="servicio_id" name="servicio_id" required>
                            <option selected disabled>Seleccione un servicio</option>
                            @foreach ($servicios as $servicio)
                            <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha:</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>
                    <div class="mb-3">
                        <label for="hora" class="form-label">Hora:</label>
                        <input type="time" class="form-control" id="hora" name="hora" required>
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado:</label>
                        <select class="form-select" id="estado" name="estado" required>
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
        @foreach ($citas as $cita)
        <tr>
            <td>{{ $cita->mascota->nombre }}</td>
            <td>{{ $cita->servicio->nombre }}</td>
            <td>{{ $cita->fecha }}</td>
            <td>{{ $cita->hora }}</td>
            <td>{{ $cita->estado }}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Acciones">
                    <!-- Botón para abrir modal de edición -->
                    <button class="btn btn-warning btn-sm"
                        data-cita="{{ json_encode($cita) }}"
                        onclick="abrirModalEditar(this)">
                        <i class="fas fa-edit"></i> Editar
                    </button>

                    <!-- Formulario para eliminar -->
                    <form action="{{ route('citas.destroy', $cita->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarEliminacion()">
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
        return confirm("¿Estás seguro de que deseas eliminar esta cita?");
    }
</script>


<!-- Modal de edición de cita -->
<div class="modal fade" id="editarCitaModal" tabindex="-1" aria-labelledby="editarCitaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarCitaModalLabel">Editar cita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editarCitaForm" method="POST">
                    @csrf
                    @method('PUT') <!-- Esto añade el método PUT -->

                    <!-- ID oculto para identificar la cita -->
                    <input type="hidden" id="editCitaId" name="id">

                    <!-- Otros campos -->
                    <div class="mb-3">
                        <label for="editMascota" class="form-label">Mascota:</label>
                        <select class="form-select" id="editMascota" name="id_mascota">
                            <option disabled>Seleccione una mascota</option>
                            @foreach ($mascotas as $mascota)
                            <option value="{{ $mascota->id }}">{{ $mascota->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editServicio" class="form-label">Servicio:</label>
                        <select class="form-select" id="editServicio" name="servicio_id">
                            <option disabled>Seleccione un servicio</option>
                            @foreach ($servicios as $servicio)
                            <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                            @endforeach
                        </select>
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

<script>
    function abrirModalEditar(button) {
        const cita = JSON.parse(button.getAttribute('data-cita'));

        // Asignar el ID oculto
        document.getElementById('editCitaId').value = cita.id;

        // Seleccionar la mascota actual
        const mascotaSelect = document.getElementById('editMascota');
        mascotaSelect.value = cita.id_mascota;

        // Seleccionar el servicio actual
        const servicioSelect = document.getElementById('editServicio');
        servicioSelect.value = cita.servicio_id;

        // Asignar otros valores
        document.getElementById('editFecha').value = cita.fecha;
        document.getElementById('editHora').value = cita.hora;
        document.getElementById('editEstado').value = cita.estado;

        // Configurar la acción del formulario
        const form = document.getElementById('editarCitaForm');
        form.action = `/citas/${cita.id}`;

        // Añadir confirmación al guardar
        form.onsubmit = function() {
            return confirm("¿Estás seguro de que deseas guardar estos cambios?");
        };

        // Mostrar el modal
        const editarModal = new bootstrap.Modal(document.getElementById('editarCitaModal'));
        editarModal.show();
    }
</script>

@endsection