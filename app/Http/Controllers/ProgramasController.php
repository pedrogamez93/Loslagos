<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programas;
use App\Models\Programasbtn;
use App\Models\ProgramasColecciones;
use App\Models\ProgramasDescripciones;
use App\Models\ProgramasDocumentos;
use App\Models\ProgramasFotografias;


class ProgramasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programas = Programas::all(); // Cambiar el nombre del modelo

        return view('programas.index', compact('programas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $programa = Programas::findOrFail($id);
        return view('programas.show')->with('programa', $programa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $programa=Programas::findOrfail($id);
        return view('programas.edit', compact('programa') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $programa = request()->except(['_token' , '_method']);
        Programas::where('id' , '=' ,$id)->update($programa);

        $programa=Programas::findOrfail($id);
        return redirect()->route('programas.index')->with('success', 'Programa editado exitosamente.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Programas::destroy($id);
        return redirect()->route('programas.index')->with('success', 'Programa eliminado exitosamente.');

    }
}
