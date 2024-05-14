<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Importa los modelos
use App\Models\FondosFndr;
use App\Models\SeccionesFndr;
use App\Models\DocsSeccionesFndr;
use App\Models\Documento;

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
        //dd($request->all());

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

    if (isset($request->titulo_documento[$key])) {
        $seccionId = $seccion->id; // Almacenar el ID de la sección actual

        foreach ($request->titulo_documento[$key] as $key2 => $tituloDocumento) {
            if (!is_null($tituloDocumento) && isset($request->ruta_documento[$key][$key2])) {
                $documento = new DocsSeccionesFndr();
                $documento->titulo_documento = $tituloDocumento;
                $documento->ruta_documento = $request->ruta_documento[$key][$key2]->store('documentos');
                $documento->seccion_fndr_id = $seccionId; // Usar el ID de la sección actual
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
        $fondo->nota = $request->nota;

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


    public function destroyDoc($id)
{
    try {
        // Encuentra el documento por su ID y verifica si realmente existe
        $documento = DocsSeccionesFndr::findOrFail($id);
        
        // Obtén el fondo asociado al documento, asegurándote que cada relación existe
        $fondoId = optional(optional($documento->seccion)->fondo)->id;
        if (is_null($fondoId)) {
            return back()->withErrors('El fondo asociado no se encuentra disponible.');
        }
        
        // Elimina el documento
        $documento->delete();
        
        // Redirige de vuelta a la página de edición del fondo con un mensaje de éxito
        return redirect()->route('fondosfndr.edit', $fondoId)->with('success', 'Documento eliminado correctamente');
    } catch (\Exception $e) {
        // En caso de cualquier excepción, redirige de vuelta con un mensaje de error
        return back()->withErrors('Error al eliminar el documento: ' . $e->getMessage());
    }
}
    
 

public function agregarDocumento(Request $request, $fondo_id)
{
    // Buscar el fondo por su ID
    $fondo = FondosFndr::findOrFail($fondo_id);

    // Verificar si el fondo existe
    if ($fondo) {
        // Obtener la sección del fondo (asumiendo que solo hay una sección)
        $seccion = $fondo->secciones->first(); // Suponiendo que cada fondo tiene solo una sección

        // Verificar si la sección existe
        if ($seccion) {
            // Obtener los archivos cargados

            // Verificar si se han cargado archivos
            $documentos = $request->file('ruta_documento');

// Verificar si se han cargado archivos
if ($documentos) {
    foreach ($documentos as $documento) {
        // Guardar cada archivo en la carpeta deseada y registrar la información en la base de datos
        $documento_path = $documento->store('documentos');
        DocsSeccionesFndr::create([
            'titulo_documento' => $documento->getClientOriginalName(), // Usando el nombre original como título
            'ruta_documento' => $documento_path,
            'seccion_fndr_id' => $seccion->id
        ]);
    }
    return redirect()->back()->with('success', 'Documentos agregados correctamente.');
} else {
    return redirect()->back()->with('error', 'No se seleccionaron documentos para agregar.');
}

        } else {
            return redirect()->back()->with('error', 'No se encontró la sección en este fondo.');
        }
    }

    return redirect()->back()->with('error', 'No se encontró el fondo.');
}










}