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
                <form action="{{ route('recetas.store') }}" method="POST">
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
        @foreach ($recetas as $receta)
        <tr>
            <td>{{ $receta->mascota->nombre }}</td>
            <td>{{ $receta->diagnostico }}</td>
            <td>{{ $receta->tratamiento }}</td>
            <td>{{ $receta->medicamentos }}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Acciones">
                    <!-- Botón para abrir modal de edición -->
                    <button class="btn btn-warning btn-sm"
                        data-receta="{{ json_encode($receta)}}"
                        onclick="abrirModalEditar(this)">
                        <i class="fas fa-edit"></i> Editar
                    </button>

                    <!-- Formulario para eliminar -->
                    <form action="{{ route('recetas.destroy', $receta->id) }}" method="POST" style="display: inline;" onsubmit="return confirmarEliminacion()">
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
<div class="modal fade" id="editarRecetaModal" tabindex="-1" aria-labelledby="editarRecetaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarRecetaModalLabel">Editar Historial</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editarRecetaForm" method="POST">
                    @csrf
                    @method('PUT') <!-- Esto añade el método PUT -->

                    <!-- ID oculto para identificar el historial -->
                    <input type="hidden" id="editRecetaId" name="id">

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
        const receta = JSON.parse(button.getAttribute('data-receta'));

        // Asignar el ID oculto
        document.getElementById('editRecetaId').value = receta.id;

        // Seleccionar la mascota actual
        const mascotaSelect = document.getElementById('editMascota');
        mascotaSelect.value = receta.id_mascota;

        // Asignar otros valores
        document.getElementById('editDiagnostico').value = receta.diagnostico;
        document.getElementById('editTratamiento').value = receta.tratamiento;
        document.getElementById('editMedicamentos').value = receta.medicamentos;

        // Configurar la acción del formulario
        const form = document.getElementById('editarRecetaForm');
        form.action = `/recetas/${receta.id}`;

        // Añadir confirmación al guardar
        form.onsubmit = function() {
            return confirm("¿Estás seguro de que deseas guardar estos cambios?");
        };

        // Mostrar el modal
        const editarModal = new bootstrap.Modal(document.getElementById('editarRecetaModal'));
        editarModal.show();
    }
</script>

@endsection