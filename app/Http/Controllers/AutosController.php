<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auto;

class AutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
                // Obtiene todos los autos de la base de datos
        $autos = Auto::all();
        // Pasa los autos a la vista index
        return view('autos.index', compact('autos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
                // Simplemente retorna la vista del formulario de creación
        return view('autos.create');
    }

    /**
     * Store a newly created resource in storage.
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $auto = Auto::find($id);
        // La inyección de dependencias de Laravel (Auto $auto) 
        // ya encuentra y carga el auto por 'id_auto'
        return view('autos.edit', compact('auto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
                // 1. Validación de los datos
        $validatedData = $request->validate([
            'marca' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'anio' => 'required|integer|min:1900|max:' . date('Y'),
            'motor' => 'required|string|max:50',
        ]);

        // 2. Buscar el auto por ID
        $auto = Auto::where('id_auto', $id)->firstOrFail();

        // 3. Actualización del registro en la BD
        $auto->update($validatedData);

        // 4. Redirección
        return redirect()->route('autos.index')
                         ->with('success', 'Auto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 1. Buscar el auto
        $auto = Auto::where('id_auto', $id)->firstOrFail();

        // 2. Eliminar
        $auto->delete();

        // 3. Redireccionar
        return redirect()->route('autos.index')
                         ->with('success', 'Auto eliminado exitosamente.');
    }
}
