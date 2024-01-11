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
    //IMPRESION DE LA RELACION DE TABLAS
        $programas = Programas::with('descripcion')->get();
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
        
                // Validar los datos del formulario
                $request->validate([
                    'titulo' => 'required',
                    'bajada' => 'required',
                    'bajada_programa' => 'required',
                    'titulo_descripcion' => 'required',
                    'bajada_descripcion' => 'required',
                    'nombrebtn' => 'required',
                    'urlbtn' => 'required',
                    'nombreDocumento' => 'required',
                    'urlDocumento' => 'file|mimes:pdf,doc,docx', // Ajusta según los tipos de documentos que deseas permitir

                ]);

                // Crear un nuevo programa
                $programa = new Programas;
                $programa->titulo = $request->titulo;
                $programa->bajada = $request->bajada;
                $programa->bajada_programa = $request->bajada_programa;
                $programa->save();

                // Crear una nueva descripción de programa
                $descripcion = new ProgramasDescripciones;
                $descripcion->programa_id = $programa->id;
                $descripcion->titulo_descripcion = $request->titulo_descripcion;
                $descripcion->bajada_descripcion = $request->bajada_descripcion;
                $descripcion->save();

                // Crear un nuevo botón de programa
                $botones = new Programasbtn;
                $botones->programa_id = $programa->id;
                $botones->nombrebtn = $request->nombrebtn;
                $botones->urlbtn = $request->urlbtn;
                $botones->save();

                // Crear un nuevo docuento
                $documentos = new ProgramasDocumentos;
                $documentos->programa_id = $programa->id;
                $documentos->nombreDocumento = $request->nombreDocumento;
                $documentos->urlDocumento = $request->urlDocumento;
                $documentos->save();

                // Procesar y guardar el documento si se proporcionó
                if ($request->hasFile('urlDocumento')) {
                    $documento = $request->file('urlDocumento');
                    $nombreDocumento = $documento->getClientOriginalName();

                    // Guardar el documento en el sistema de archivos
                    $rutaDocumento = $documento->storeAs('documentos', $nombreDocumento);

                    // Crear un nuevo registro en la tabla programas_documentos
                    ProgramasDocumento::create([
                        'programa_id' => $programa->id,
                        'nombreDocumento' => $nombreDocumento,
                        'urlDocumento' => $urlDocumento,
                    ]);
                }

                // Recuperar los datos para mostrar en la vista
                $programas = Programas::all();
                $descripciones = ProgramasDescripciones::all();
                $botones = Programasbtn::all();
                $documentos = ProgramasDocumentos::all();

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

            $programa = Programa::with('colecciones', 'descripciones', 'documentos', 'fotografias', 'botones')->find($id);
    return view('programa.show', ['programa' => $programa]);
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
    // Buscar el programa por ID
    $programa = Programas::find($id);

    // Verificar si el programa existe
    if ($programa) {
        // Eliminar descripciones relacionadas
        $programa->descripcion()->delete();

        // Eliminar botones relacionados
        $programa->botones()->delete();

        // Finalmente, eliminar el programa
        $programa->delete();

        return redirect()->route('programas.index')->with('success', 'Programa y registros relacionados eliminados exitosamente.');
    }

    return redirect()->route('programas.index')->with('error', 'No se encontró el programa.');
}
    
}
