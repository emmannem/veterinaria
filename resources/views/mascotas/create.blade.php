{{-- resources/views/mascotas/create.blade.php --}}
@extends('layouts.app')

@section('content')
<h2>Registrar nueva mascota</h2>
<form>
    <!-- Campos del formulario para registrar una mascota -->
    <label for="nombre">Nombre de la Mascota:</label>
    <input type="text" id="nombre" name="nombre">

    <!-- Añade más campos según sea necesario -->
    <button type="submit">Registrar</button>
</form>
@endsection