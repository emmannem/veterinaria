{{--resources\views\historiales\index.blade.php--}}
@extends('layouts.app')

@section('content')
<h2>Historial Medico</h2>

<!-- Botón para abrir el modal de registrar nueva cita -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#registroHistorialModal">
    Registrar Historial
</button>

<!-- Modal de registro de cita -->
<div class="modal fade" id="registroHistorialModal" tabindex="-1" aria-labelledby="registroHistorialModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registroHistorialModalLabel">Registrar una Historial</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('historiales.store') }}" method="POST">
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
                        <label for="diagnostico" class="form-label">Diagnostico:</label>
                        <textarea class="form-control" id="diagnostico" name="diagnostico" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tratamiento" class="form-label">Tratamiento:</label>
                        <textarea class="form-control" id="tratamiento" name="tratamiento" require></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="medicamentos" class="form-label">Medicamentos:</label>
                        <textarea class="form-control" id="medicamentos" name="medicamentos" require></textarea>
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
            <th>Diagnostico</th>
            <th>Tratamiento</th>
            <th>Medicamentos</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($historiales as $historial)
        <tr>
            <td>{{ $historial->mascota->nombre }}</td>
            <td>{{ $historial->diagnostico }}</td>
            <td>{{ $historial->tratamiento }}</td>
            <td>{{ $historial->medicametos }}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Acciones">
                    <!-- Botón para abrir modal de edición -->
                    <button class="btn btn-warning btn-sm"
                        data-historial="{{ json_encode($historial)}}"
                        onclick="abrirModalEditar(this)">
                        <i class="fas fa-edit"></i> Editar
                    </button>

                    <!-- Formulario para eliminar -->
                    <form action="{{ route('historiales.destroy', $historial->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarEliminacion()">
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
        return confirm("¿Estás seguro de que deseas eliminar este historial?");
    }
</script>


<!-- Modal de edición de cita -->
<div class="modal fade" id="editarHistorialModal" tabindex="-1" aria-labelledby="editarHistorialModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarHistorialModalLabel">Editar Historial</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editarHistorialForm" method="POST">
                    @csrf
                    @method('PUT') <!-- Esto añade el método PUT -->

                    <!-- ID oculto para identificar el historial -->
                    <input type="hidden" id="editHistorialId" name="id">

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
                        <label for="editDiagnostico" class="form-label">Diagnostico:</label>
                        <textarea class="form-control" id="editDiagnostico" name="diagnostico"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editTratamiento" class="form-label">Tratamiento:</label>
                        <textarea class="form-control" id="editTratamiento" name="tratamiento"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editMedicamentos" class="form-label">Medicamentos:</label>
                        <textarea class="form-control" id="editMedicamentos" name="medicamentos"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    function abrirModalEditar(button) {
        const historial = JSON.parse(button.getAttribute('data-historial'));

        // Asignar el ID oculto
        document.getElementById('editHistorialId').value = Historial.id;

        // Seleccionar la mascota actual
        const mascotaSelect = document.getElementById('editMascota');
        mascotaSelect.value = cita.id_mascota;

        // Asignar otros valores
        document.getElementById('editDiagnostico').value = historial.diagnostico;
        document.getElementById('editTratamiento').value = historial.tratamiento;
        document.getElementById('editMedicamentos').value = historial.medicamentos;

        // Configurar la acción del formulario
        const form = document.getElementById('editarHistorialForm');
        form.action = `/historiales/${historial.id}`;

        // Añadir confirmación al guardar
        form.onsubmit = function() {
            return confirm("¿Estás seguro de que deseas guardar estos cambios?");
        };

        // Mostrar el modal
        const editarModal = new bootstrap.Modal(document.getElementById('editarHistorialModal'));
        editarModal.show();
    }
</script>

@endsection