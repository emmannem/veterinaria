{{-- resources/views/citas/index.blade.php --}}
@extends('layouts.app')

@section('content')
<h2>Listado de Citas</h2>
<!-- Aquí iría el formulario para programar una cita o la lista de citas -->
<a href="{{ route('citas.create') }}">Agendar nueva cita</a>
@endsection