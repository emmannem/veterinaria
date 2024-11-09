{{-- resources/views/mascotas/index.blade.php --}}
@extends('layouts.app')

@section('content')
<h2>Listado de Mascotas</h2>
<!-- Aquí iría el formulario de registro de mascotas o la lista de mascotas -->
<a href="{{ route('mascotas.create') }}">Registrar nueva mascota</a>
@endsection