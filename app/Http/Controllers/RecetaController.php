<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use App\Models\Mascota;
use Illuminate\Http\Request;

class RecetaController extends Controller
{
    /**
     * Muestra todos los historiales medicos.
     */
    public function index()
    {
        $recetas = Receta::with(['mascota'])->get();
        $mascotas = Mascota::all();

        return view('recetas.index', compact('recetas', 'mascotas'));
    }

    /**
     * Muestra el formulario para crear un nuevo historial.
     */
    public function create()
    {
        $mascotas = Mascota::all();

        return view('recetas.create', compact('mascotas'));
    }

    /**
     * Almacena una nuevo historial en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_mascota' => 'required|exists:mascotas,id',
            'diagnostico' => 'required|string|max:255',
            'tratamiento' => 'required|string|max:255',
            'medicamentos' => 'required|string|max:255',
        ]);

        Receta::create($request->all());

        return redirect()->route('recetas.index')->with('success', 'Historial Medico registrado exitosamente.');
    }

    /**
     * Muestra los detalles de un historial específica.
     */
    public function show($id)
    {
        $receta = Receta::with(['mascota'])->findOrFail($id);

        return view('recetas.show', compact('receta'));
    }

    /**
     * Muestra el formulario para editar un historial existente.
     */
    public function edit($id)
    {
        $recetas = Receta::findOrFail($id);
        $mascotas = Mascota::all();

        return view('recetas.edit', compact('historial', 'mascotas'));
    }

    /**
     * Actualiza un historial en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $receta = Receta::findOrFail($id);

        $request->validate([
            'id_mascota' => 'required|exists:mascotas,id',
            'diagnostico' => 'required|string|max:255',
            'tratamiento' => 'required|string|max:255',
            'medicamentos' => 'required|string|max:255',
        ]);

        $receta->update($request->all());

        return redirect()->route('recetas.index')->with('success', 'Historial actualizado exitosamente.');
    }

    /**
     * Elimina logicamente un historial de la base de datos.
     */
    public function destroy($id)
    {
        $receta = Receta::findOrFail($id);
        $receta->activo = false;
        $receta->save();

        return redirect()->route('recetas.index');
    }
}
