<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pregunta;


class PreguntasFrecuentesController extends Controller
{
    //
    public function preguntasfrecuentesIndex()
    {
        $preguntas = Pregunta::all(); // Cambiar el nombre del modelo

        return view('preguntasfrecuentes', compact('preguntas'));
        
    }
    
    public function mostrarTodosLosProgramas()
{
    $programas = Programa::all();

    return view('todoslosprogramas', ['programas' => $programas]);
}

public function store(Request $request)
{
    // Validación de datos
    $request->validate([
        'titulo' => 'required|string|max:255',
        'bajada' => 'nullable|string',
        'imagen' => 'required|image|mimes:png,jpg,jpeg|max:2048', // Ajusta los formatos y el tamaño según tus necesidades
    ]);

    // Procesamiento de la imagen
    $imagenPath = $request->file('imagen')->store('imagenes_programas', 'public');

    // Crear un nuevo programa
    $programas = new Programas();
    $programas->titulo = $request->input('titulo');
    $programas->bajada = $request->input('bajada');
    $programas->imagen = $imagenPath; // Almacena la ruta de la imagen en la base de datos

    // Guardar el programa en la base de datos
    $programas->save();

    // Redireccionar con un mensaje de éxito
    return redirect()->route('programas.index')->with('success', 'Programa creado exitosamente.');
}



}
