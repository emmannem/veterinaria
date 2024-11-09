{{-- resources/views/citas/create.blade.php --}}
@extends('layouts.app')

@section('content')
<h2>Registrar nueva cita</h2>
<form>
    <!-- Campos del formulario para registrar una cita -->
    <label for="nombre_cliente">Nombre del Cliente:</label>
    <input type="text" id="nombre_cliente" name="nombre_cliente">

    <label for="mascota">Mascota:</label>
    <input type="text" id="mascota" name="mascota">

    <label for="fecha">Fecha de la Cita:</label>
    <input type="date" id="fecha" name="fecha">

    <!-- Añade más campos según sea necesario -->
    <button type="submit">Registrar</button>
</form>
@endsection