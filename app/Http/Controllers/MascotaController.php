<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class MascotaController extends Controller
{
    /**
     * Muestra una lista de todas las mascotas.
     */
    public function index()
    {
        $mascotas = Mascota::all();
        return view('mascotas.index', compact('mascotas'));
    }

    /**
     * Muestra el formulario para crear una nueva mascota.
     */
    public function create()
    {
        return view('mascotas.create');
    }

    /**
     * Almacena una nueva mascota en la base de datos.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'raza' => 'nullable|string|max:255',
            'edad' => 'nullable|integer',
            'peso' => 'nullable|numeric',
            'dueno' => 'required|string|max:255',
            'contacto' => 'required|string|max:255',
            'imagen' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('imagenes/mascotas', 'public');
        }

        Mascota::create($data);

        return redirect()->route('mascotas.index')->with('success', 'Mascota registrada exitosamente.');
    }

    /**
     * Muestra los detalles de una mascota específica.
     */
    public function show(Mascota $mascota)
    {
        return view('mascotas.show', compact('mascota'));
    }

    /**
     * Muestra el formulario para editar una mascota existente.
     */
    public function edit(Mascota $mascota)
    {
        return view('mascotas.edit', compact('mascota'));
    }

    /**
     * Actualiza los datos de una mascota en la base de datos.
     */
    public function update(Request $request, Mascota $mascota)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'raza' => 'nullable|string|max:255',
            'edad' => 'nullable|integer',
            'peso' => 'nullable|numeric',
            'dueno' => 'required|string|max:255',
            'contacto' => 'required|string|max:255',
            'imagen' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            // Elimina la imagen antigua si existe
            if ($mascota->imagen) {
                Storage::disk('public')->delete($mascota->imagen);
            }
            $data['imagen'] = $request->file('imagen')->store('imagenes/mascotas', 'public');
        }

        $mascota->update($data);

        return redirect()->route('mascotas.index')->with('success', 'Mascota actualizada exitosamente.');
    }

    /**
     * Elimina logicamente una mascota de la base de datos.
     */
    public function destroy($id)
    {
        $mascota = Mascota::findOrFail($id);
        $mascota->activo = false;
        $mascota->save();

        return redirect()->route('mascotas.index');
    }
}
