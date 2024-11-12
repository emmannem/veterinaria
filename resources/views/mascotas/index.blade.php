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
                <form>
                    <!-- Campos del formulario para registrar una mascota -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de la Mascota:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="especie" class="form-label">Especie:</label>
                        <input type="text" class="form-control" id="especie" name="especie">
                    </div>
                    <div class="mb-3">
                        <label for="raza" class="form-label">Raza:</label>
                        <input type="text" class="form-control" id="raza" name="raza">
                    </div>
                    <div class="mb-3">
                        <label for="edad" class="form-label">Edad:</label>
                        <input type="text" class="form-control" id="edad" name="edad">
                    </div>
                    <div class="mb-3">
                        <label for="peso" class="form-label">Peso:</label>
                        <input type="text" class="form-control" id="peso" name="peso">
                    </div>
                    <div class="mb-3">
                        <label for="dueno" class="form-label">Dueño:</label>
                        <input type="text" class="form-control" id="dueno" name="dueno">
                    </div>
                    <div class="mb-3">
                        <label for="contacto" class="form-label">Contacto:</label>
                        <input type="text" class="form-control" id="contacto" name="contacto">
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

<!-- Modal de edición de mascota -->
<div class="modal fade" id="editarMascotaModal" tabindex="-1" aria-labelledby="editarMascotaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarMascotaModalLabel">Editar mascota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editarMascotaForm">
                    <!-- Campos del formulario para editar una mascota -->
                    <div class="mb-3">
                        <label for="editNombre" class="form-label">Nombre de la Mascota:</label>
                        <input type="text" class="form-control" id="editNombre" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="editEspecie" class="form-label">Especie:</label>
                        <input type="text" class="form-control" id="editEspecie" name="especie">
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
                        <input type="text" class="form-control" id="editDueno" name="dueno">
                    </div>
                    <div class="mb-3">
                        <label for="editContacto" class="form-label">Contacto:</label>
                        <input type="text" class="form-control" id="editContacto" name="contacto">
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
                    <button class="btn btn-warning btn-sm" onclick="abrirModalEditar('Max', 'Perro', 'Labrador', 3, 25, 'Juan Pérez', '+1 234 567 890')">
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

<script>
    function abrirModalEditar(nombre, especie, raza, edad, peso, dueno, contacto) {
        document.getElementById('editNombre').value = nombre;
        document.getElementById('editEspecie').value = especie;
        document.getElementById('editRaza').value = raza;
        document.getElementById('editEdad').value = edad;
        document.getElementById('editPeso').value = peso;
        document.getElementById('editDueno').value = dueno;
        document.getElementById('editContacto').value = contacto;

        var editarModal = new bootstrap.Modal(document.getElementById('editarMascotaModal'));
        editarModal.show();
    }
</script>
@endsection