<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
// Importa los modelos
use App\Models\FondosFndr;
use App\Models\SeccionesFndr;
use App\Models\DocsSeccionesFndr;
use App\Models\Documento;
use Illuminate\Support\Facades\Log; // Importar la clase Log


use Illuminate\Support\Facades\DB;



class FondosFndrController extends Controller
{
    // Ejemplo de funciÃ³n para mostrar un listado de fondos
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
        //dd($request->all());

       // ValidaciÃ³n de los datos del formulario
    $request->validate([
        'titulo' => 'nullable|string',
        'bajada' => 'nullable|string',
        'descripcion' => 'nullable|string',
        'nota' => 'nullable|string',
        'titulo_seccion.*' => 'nullable|string', // ValidaciÃ³n para al menos un tÃ­tulo de secciÃ³n
        'titulo_documento..' => 'nullable|string', // ValidaciÃ³n para al menos un tÃ­tulo de documento
        'ruta_documento..' => 'nullable|mimes:pdf,doc,docx,zip,rar|max:86400', // ValidaciÃ³n para al menos un archivo adjunto
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
    
        if (isset($request->titulo_documento[$key])) {
            $seccionId = $seccion->id;
    
            foreach ($request->titulo_documento[$key] as $key2 => $tituloDocumento) {
                if (!is_null($tituloDocumento) && isset($request->ruta_documento[$key][$key2])) {
                    $rutaDocumento = $request->ruta_documento[$key][$key2]->store('documentos', 'public');
    
                    $documento = new DocsSeccionesFndr();
                    $documento->titulo_documento = $tituloDocumento;
                    $documento->ruta_documento = $rutaDocumento;
                    $documento->seccion_fndr_id = $seccionId;
                    $documento->save();
                }
            }
        }
    }


        
    
        // Redireccionar a la vista deseada con un mensaje de Ã©xito
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
        $fondo->nota = $request->nota;

        // Actualiza otros campos segÃºn sea necesario

        $fondo->save();

        return redirect()->route('fondosfndr.index')->with('success', 'Fondo FNDR actualizado exitosamente');
    }

    public function destroy($id)
    {
        $fondo = FondosFndr::findOrFail($id);
        $fondo->delete();

        return redirect()->route('fondosfndr.index')->with('success', 'Fondo FNDR eliminado exitosamente');
    }


    public function destroyDoc($id)
{
    try {
        // Encuentra el documento por su ID y verifica si realmente existe
        $documento = DocsSeccionesFndr::findOrFail($id);
        
        // ObtÃ©n el fondo asociado al documento, asegurÃ¡ndote que cada relaciÃ³n existe
        $fondoId = optional(optional($documento->seccion)->fondo)->id;
        if (is_null($fondoId)) {
            return back()->withErrors('El fondo asociado no se encuentra disponible.');
        }
        
        // Elimina el documento
        $documento->delete();
        
        // Redirige de vuelta a la pÃ¡gina de ediciÃ³n del fondo con un mensaje de Ã©xito
        return redirect()->route('fondosfndr.edit', $fondoId)->with('success', 'Documento eliminado correctamente');
    } catch (\Exception $e) {
        // En caso de cualquier excepciÃ³n, redirige de vuelta con un mensaje de error
        return back()->withErrors('Error al eliminar el documento: ' . $e->getMessage());
    }
}
    


public function agregarDocumento(Request $request, $fondo_id)
{
    $fondo = FondosFndr::findOrFail($fondo_id);

    if ($fondo) {
        $seccion = $fondo->secciones->first();

        if ($seccion) {
            $documentos = $request->file('ruta_documento');
            $titulos = $request->input('titulo_documento');

            if ($documentos && $titulos) {
                foreach ($documentos as $index => $documento) {
                    $nombre_documento = Str::uuid() . '.' . $documento->getClientOriginalExtension();
                    $documento_path = $documento->storeAs('documentos', $nombre_documento, 'public');

                    DocsSeccionesFndr::create([
                        'titulo_documento' => $titulos[$index], // Usando el tÃ­tulo ingresado por el usuario
                        'ruta_documento' => $documento_path,
                        'seccion_fndr_id' => $seccion->id
                    ]);
                }
                return redirect()->back()->with('success', 'Documentos agregados correctamente.');
            } else {
                return redirect()->back()->with('error', 'No se seleccionaron documentos para agregar o falta el tÃ­tulo.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontrÃ³ la secciÃ³n en este fondo.');
        }
    }

    return redirect()->back()->with('error', 'No se encontrÃ³ el fondo.');
}


//funcion abrir documentos



public function abrirDocumento($id)
{
    $documento = DocsSeccionesFndr::find($id);

    if (!$documento) {
        return response()->json(['error' => 'Documento no encontrado'], 404);
    }

    $rutaCompleta = $documento->ruta_documento;

    Log::info("Ruta completa del documento: " . $rutaCompleta);

    $rutaArchivo = storage_path('app/public/' . $rutaCompleta);

    Log::info("Ruta completa del archivo: " . $rutaArchivo);

    if (file_exists($rutaArchivo) && is_file($rutaArchivo)) {
        // Obtener la extensiÃ³n del archivo
        $extension = pathinfo($rutaCompleta, PATHINFO_EXTENSION);

        // Verificar si la extensiÃ³n es .docx y agregarla si es necesario
        $nombreArchivoConExtension = $documento->titulo_documento;
        if (strcasecmp($extension, 'docx') == 0) {
            $nombreArchivoConExtension .= '.docx';
        } else {
            $nombreArchivoConExtension .= '.' . $extension;
        }

        // Descargar el archivo con su nombre original y extensiÃ³n
        return response()->download($rutaArchivo, $nombreArchivoConExtension);
    } else {
        Log::error("El archivo no existe o es un directorio: " . $rutaArchivo);
        return response()->json(['error' => 'El archivo no existe o es un directorio.'], 404);
    }
}





}