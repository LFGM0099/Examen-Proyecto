<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Http\Request;

class AutoController extends Controller
{
    /**
     * Muestra una lista de todos los autos (función READ del CRUD).
     */
    public function index()
    {
        // Obtiene todos los autos de la base de datos
        $autos = Auto::all();
        // Pasa los autos a la vista index
        return view('autos.index', compact('autos'));
    }

    /**
     * Muestra el formulario para crear un nuevo auto.
     */
    public function create()
    {
        // Simplemente retorna la vista del formulario de creación
        return view('autos.create');
    }

    /**
     * Almacena un auto recién creado en la base de datos (función CREATE del CRUD).
     */
    public function store(Request $request)
    {
       // dd($request->all());
        // 1. Validación de los datos
        $validatedData = $request->validate([
            'marca' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'anio' => 'required|integer|min:1900|max:' . date('Y'), 
            'motor' => 'required|string|max:50',
        ]);

        // 2. Creación del registro en la BD
        Auto::create($validatedData);

        // 3. Redirección
        return redirect()->route('autos.index')
                         ->with('success', 'Auto agregado exitosamente.');
    }

    /**
     * Muestra el formulario para editar el auto especificado.
     */
    public function edit(Auto $auto)
    {
        $auto = Auto::find($auto);
        // La inyección de dependencias de Laravel (Auto $auto) 
        // ya encuentra y carga el auto por 'id_auto'
        return view('autos.edit', compact('auto'));
    }

    /**
     * Actualiza el auto especificado en la base de datos (función UPDATE del CRUD).
     */
    public function update(Request $request, Auto $auto)
    {
        // 1. Validación de los datos
        $validatedData = $request->validate([
            'marca' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'anio' => 'required|integer|min:1900|max:' . date('Y'),
            'motor' => 'required|string|max:50',
        ]);

        // 2. Actualización del registro en la BD
        $auto->update($validatedData);

        // 3. Redirección
        return redirect()->route('autos.index')
                         ->with('success', 'Auto actualizado exitosamente.');
    }

    /**
     * Elimina el auto especificado de la base de datos (función DELETE del CRUD).
     */
    public function destroy(Auto $auto)
    {
        // 1. Eliminación del registro
        $auto->delete();

        // 2. Redirección
        return redirect()->route('autos.index')
                         ->with('success', 'Auto eliminado exitosamente.');
    }
}