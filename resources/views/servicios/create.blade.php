{{-- resources/views/servicios/create.blade.php --}}
@extends('layouts.app')

@section('content')
<h2>Registrar nuevo servicio</h2>
<form>
    <!-- Campos del formulario para registrar un servicio -->
    <label for="nombre_servicio">Nombre del Servicio:</label>
    <input type="text" id="nombre_servicio" name="nombre_servicio">

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion"></textarea>

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="precio" step="0.01">

    <!-- Añade más campos según sea necesario -->
    <button type="submit">Registrar</button>
</form>
@endsection