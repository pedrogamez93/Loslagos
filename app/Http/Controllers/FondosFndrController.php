<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Importa los modelos
use App\Models\FondosFndr;
use App\Models\SeccionesFndr;
use App\Models\DocsSeccionesFndr;
use Illuminate\Support\Facades\DB;
class FondosFndrController extends Controller
{
    // Ejemplo de función para mostrar un listado de fondos
    public function index()
    {
        $fondos = FondosFndr::all(); // Obtiene todos los fondos
    
        return view('fondosfndr.index', compact('fondos'));
    }

    public function create() {
        
        return view('fondosfndr.create');

    }

    public function store(Request $request)
    {
       // Validación de los datos del formulario
    $request->validate([
        'titulo' => 'nullable|string',
        'bajada' => 'nullable|string',
        'descripcion' => 'nullable|string',
        'nota' => 'nullable|string',
        'titulo_seccion.*' => 'nullable|string', // Validación para al menos un título de sección
        'titulo_documento..' => 'nullable|string', // Validación para al menos un título de documento
        'ruta_documento..' => 'nullable|mimes:pdf,doc,docx,zip,rar|max:86400', // Validación para al menos un archivo adjunto
    ]);
    
        // Crear el fondo
        $fondo = FondosFndr::create([
            'titulo' => $request->titulo,
            'bajada' => $request->bajada,
            'descripcion' => $request->descripcion,
            'nota' => $request->nota,
        ]);
    
        // Procesar secciones y documentos
        foreach ($request->titulo_seccion as $key => $tituloSeccion) {
            $seccion = SeccionesFndr::create([
                'fondo_fndr_id' => $fondo->id,
                'titulo_seccion' => $tituloSeccion,
            ]);
    
            foreach ($request->titulo_documento as $key => $tituloDocumentos) {
                // Verificar si se ha proporcionado un archivo para este documento
                foreach ($tituloDocumentos as $key2 => $tituloDocumento) {
                    if (!is_null($tituloDocumento) && isset($request->ruta_documento[$key][$key2])) {
                        $documento = new DocsSeccionesFndr();
                        $documento->titulo_documento = $tituloDocumento;
                        $documento->ruta_documento = $request->ruta_documento[$key][$key2]->store('documentos');
                        $documento->seccion_fndr_id = $seccion->id;
                        $documento->save();
                    }
                }
            }
            
            
        }
    
        // Redireccionar a la vista deseada con un mensaje de éxito
        return redirect()->route('fondosfndr.index')->with('success', 'Fondo FNDR creado exitosamente.');
    }

    public function show($id)
    {
        // Encuentra el fondo por su ID con sus secciones y documentos relacionados cargados
        $fondo = FondosFndr::with('secciones.documentos')->findOrFail($id);
    
        // Pasa el fondo a la vista show.blade.php
        return view('fondosfndr.show', compact('fondo'));
    }
    


    public function edit($id)
    {
        $fondo = FondosFndr::findOrFail($id);
        return view('fondosfndr.edit', compact('fondo'));
    }

    public function update(Request $request, $id)
    {
        $fondo = FondosFndr::findOrFail($id);
        $fondo->titulo = $request->titulo;
        $fondo->bajada = $request->bajada;
        $fondo->descripcion = $request->descripcion;
        // Actualiza otros campos según sea necesario

        $fondo->save();

        return redirect()->route('fondosfndr.index')->with('success', 'Fondo FNDR actualizado exitosamente');
    }

    public function destroy($id)
    {
        $fondo = FondosFndr::findOrFail($id);
        $fondo->delete();

        return redirect()->route('fondosfndr.index')->with('success', 'Fondo FNDR eliminado exitosamente');
    }

    public function destroyDocumento($id)
{
    dd($id);
    // Encuentra el documento por su ID
    $documento = DocsSeccionesFndr::findOrFail($id);
    dd($documento);

    // Elimina el archivo físico del servidor
    if (file_exists(public_path($documento->ruta_documento))) {
        unlink(public_path($documento->ruta_documento));
    }

    // Elimina el registro de la base de datos
    $documento->delete();

    return redirect()->back()->with('success', 'Documento eliminado correctamente');
}

}