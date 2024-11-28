<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Muestra una lista de todos los servicios.
     */
    public function index()
    {
        $servicios = Servicio::all(); // Obtener todos los servicios de la base de datos
        return view('servicios.index', compact('servicios'));
    }

    /**
     * Muestra el formulario para crear un nuevo servicio.
     */
    public function create()
    {
        return view('servicios.create');
    }

    /**
     * Almacena un nuevo servicio en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
        ]);

        // Crear el servicio
        Servicio::create($data);

        // Redirigir a la lista de servicios con un mensaje de éxito
        return redirect()->route('servicios.index')->with('success', 'Servicio creado exitosamente.');
    }

    /**
     * Muestra los detalles de un servicio específico.
     */
    public function show(Servicio $servicio)
    {
        return view('servicios.show', compact('servicio'));
    }

    /**
     * Muestra el formulario para editar un servicio existente.
     */
    public function edit(Servicio $servicio)
    {
        return view('servicios.edit', compact('servicio'));
    }

    /**
     * Actualiza los datos de un servicio en la base de datos.
     */
    public function update(Request $request, Servicio $servicio)
    {
        // Validar los datos del formulario
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
        ]);

        // Actualizar el servicio
        $servicio->update($data);

        // Redirigir a la lista de servicios con un mensaje de éxito
        return redirect()->route('servicios.index')->with('success', 'Servicio actualizado exitosamente.');
    }

    /**
     * Elimina logicamente un servicio de la base de datos.
     */
    public function destroy(Servicio $servicio)
    {
        // Eliminar el servicio
        $servicio->activo = false;
        $servicio->save();

        // Redirigir a la lista de servicios con un mensaje de éxito
        return redirect()->route('servicios.index');
    }
}
