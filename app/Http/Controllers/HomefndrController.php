<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\homefndr;
use App\Models\FondosFndr;
use App\Models\SeccionesFndr;
use App\Models\DocsSeccionesFndr;


class HomefndrController extends Controller
{
    public function index()
    {
        // Intentar obtener el último registro de Homefndr
        $ultimoHomefndr = Homefndr::latest()->first();

        // Si no hay registros, redirigir a la vista de creación
        if (!$ultimoHomefndr) {
            return redirect()->route('homefndr.create');
        }

        // Si hay un registro, pasarlo a la vista
        return view('homefndr.index', compact('ultimoHomefndr'));
    }


    public function create()
    {
        return view('homefndr.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'bajada' => 'nullable|string',
            'descripcion' => 'nullable|string',
        ]);

        // Crear el trámite incluso si algunos campos están vacíos
            $nuevoHomefndr = homefndr::create([
                    'titulo' => $request->input('titulo'),
                    'bajada' => $request->input('bajada'),
                    'descripcion' => $request->input('descripcion'),
            ]);

            

            return redirect()->route('homefndr.index');
    }

    public function edit($id)
{
    // Buscar el registro por ID o fallar si no existe
    $homefndr = homefndr::findOrFail($id);

    // Pasar el registro a la vista de edición
    return view('homefndr.edit', compact('homefndr'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'titulo' => 'required|string|max:255',
        'bajada' => 'nullable|string',
        'descripcion' => 'nullable|string',
    ]);

    // Buscar el registro por ID o fallar si no existe
    $homefndr = homefndr::findOrFail($id);

    // Actualizar el registro con los datos del formulario
    $homefndr->update([
        'titulo' => $request->titulo,
        'bajada' => $request->bajada,
        'descripcion' => $request->descripcion,
    ]);

    // Redirigir a la vista que prefieras, por ejemplo, al índice
    return redirect()->route('homefndr.index')->with('success', 'Registro actualizado correctamente');
}


public function homefndrsindex()
{
    // Intentar obtener el último registro de Homefndr
    $ultimoHomefndr = Homefndr::latest()->first();
    $fondos = FondosFndr::all();


    // Si hay un registro, pasarlo a la vista
    return view('homefndrs.index', compact('ultimoHomefndr', 'fondos'));
}

}
