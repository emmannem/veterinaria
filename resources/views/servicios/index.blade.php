{{-- resources/views/servicios/index.blade.php --}}
@extends('layouts.app')

@section('content')
<h2>Servicios de la Veterinaria</h2>
<a href="{{ route('servicios.create') }}">Registrar nuevo servicio</a>
@endsection