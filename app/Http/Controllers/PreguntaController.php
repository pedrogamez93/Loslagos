<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preguntas = Pregunta::all();
        return view('preguntas.index', compact('preguntas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('preguntas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'pregunta' => 'required|max:500',
            'respuesta' => 'required|max:500',
            // Puedes añadir más reglas de validación según tus necesidades
        ]);

        // Crear una nueva pregunta en la base de datos
        Pregunta::create($validatedData);

        // Redirigir con un mensaje de éxito
        return redirect()->route('preguntas.index')->with('success', 'Pregunta creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function show(Pregunta $pregunta)
    {
        // Puedes agregar lógica para mostrar detalles si es necesario
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    $pregunta = Pregunta::findOrFail($id);
    return view('preguntas.edit', compact('pregunta'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $pregunta = request()->except(['_token' , '_method']);
        Pregunta::where('id' , '=' ,$id)->update($pregunta);

        $pregunta=Pregunta::findOrfail($id);
// Redirigir con un mensaje de éxito
return redirect()->route('preguntas.index')->with('success', 'Pregunta Frecuente Editada exitosamente.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Puedes agregar lógica para eliminar el recurso si es necesario
        Pregunta::destroy($id);
        return redirect()->route('preguntas.index')->with('success', 'Pregunta Frecuente Eliminada exitosamente.');

    }
}
