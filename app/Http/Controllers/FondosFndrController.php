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

        if ($fondos->isEmpty()) {
            // Redirecciona al método 'create'
            return redirect()->route('fondosfndr.create');
        }
    
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
    
            if (!is_null($request->titulo_documento[$key])) {
                foreach ($request->titulo_documento[$key] as $key2 => $tituloDocumento) {
                    // Verificar si se ha proporcionado un archivo para este documento
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
        return redirect()->route('fondos.index')->with('success', 'Fondos creados exitosamente.');
    }

}