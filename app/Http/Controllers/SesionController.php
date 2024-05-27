<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Sesion;
use App\Models\Documento_Sesion;

class SesionController extends Controller
{
    /**
     * Display a listing of the resource.
     * Ordena y agrupa las sesiones por fecha, y muestra la próxima sesión.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todas las sesiones ordenadas por fecha
        $sesiones = Sesion::with('documentos')->orderBy('fecha_hora', 'desc')->get();
    
        // Agrupar las sesiones por año y mes
        $sesionesAgrupadas = $sesiones->groupBy(function($sesion) {
            return Carbon::parse($sesion->fecha_hora)->format('Y-m');
        });
    
        // Obtener la próxima sesión (la primera sesión en la lista ordenada)
        $proximaSesion = $sesiones->first();
    
        return view('sesiones-consejo.index', [
            'proximaSesion' => $proximaSesion,
            'sesionesAgrupadas' => $sesionesAgrupadas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sesiones-consejo.create');
    }

    /**
     * Store a newly created resource in storage.
     * Valida los datos de entrada, registra la sesión y maneja la carga de múltiples documentos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos recibidos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_hora' => 'required|date',
            'lugar' => 'required|string|max:255',
            'nombredoc.*' => 'string|max:255',
            'url.*' => 'file|mimes:pdf|max:10240',
            'fechadoc.*' => 'nullable|date',
        ]);
    
        // Convertir fecha_hora al formato correcto, si no es nula
        $fecha_hora_convertida = $validatedData['fecha_hora'] ? date('Y-m-d H:i:s', strtotime($validatedData['fecha_hora'])) : null;
    
        // Depuración para verificar los datos antes de crear la sesión
        \Log::info('Datos validados:', $validatedData);
        \Log::info('Fecha Hora Convertida:', [$fecha_hora_convertida]);
    
        // Verificación adicional antes de la creación
        if (is_null($fecha_hora_convertida)) {
            \Log::error('Fecha Hora Convertida es nula');
        } else {
            \Log::info('Fecha Hora no es nula, se procede a la creación de la sesión');
        }
    
        // Crear una nueva sesión con los datos validados y fecha_hora convertida
        try {
            $sesion = new Sesion();
            $sesion->nombre = $validatedData['nombre'];
            $sesion->fecha_hora = $fecha_hora_convertida;
            $sesion->lugar = $validatedData['lugar'];
            $sesion->save();
    
            \Log::info('Sesión creada con éxito:', ['id' => $sesion->id]);
        } catch (\Exception $e) {
            \Log::error('Error al crear la sesión:', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            dd('Error al crear la sesión:', $e->getMessage(), $e->getTraceAsString());
        }
    
        $nombresDocumentos = $request->input('nombredoc');
    
        // Procesar y guardar los documentos subidos
        if ($request->hasFile('url')) {
            foreach ($request->file('url') as $key => $documento) {
                if ($documento->isValid()) {
                    $path = $documento->store('public/documentos_sesiones');
    
                    // Obtener el nombre del documento correspondiente
                    $nombreDocumento = isset($nombresDocumentos[$key]) ? $nombresDocumentos[$key] : '';
    
                    // Obtener el valor de fechadoc
                    $fechadoc = isset($validatedData['fechadoc'][$key]) ? $validatedData['fechadoc'][$key] : null;
    
                    // Crear un nuevo Documento_Sesion
                    $doc = new Documento_Sesion([
                        'sesion_id' => $sesion->id,
                        'nombredoc' => $nombreDocumento,
                        'url' => $path,
                        'fechadoc' => $fechadoc,
                    ]);
                    $doc->save();
                }
            }
        }
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('sesionesConsejo.index')->with('success', 'Sesión creada con éxito');
    }
    
    
    
    
    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sesion = Sesion::with('documentos')->findOrFail($id);
        return view('sesionesConsejo.show', compact('sesion'));
    }

    public function downloadshowtablassesionesconsejo($id)
{
    $documento = Documento_Sesion::find($id);

    // Log para depuración del documento
    Log::info("Documento encontrado: " . json_encode($documento));

    if ($documento) {
        $rutaCompleta = $documento->url; // Esta es la ruta almacenada en la base de datos
        
        // Eliminar el prefijo 'public/' de la ruta si existe
        $rutaRelativa = str_replace('public/', '', $rutaCompleta);
        
        // Construir la ruta completa al archivo
        $rutaArchivo = storage_path('app/public/' . $rutaRelativa);

        Log::info("Ruta completa del archivo: " . $rutaArchivo);

        if (file_exists($rutaArchivo) && is_file($rutaArchivo)) {
            return response()->download($rutaArchivo);
        } else {
            Log::error("El archivo no existe o es un directorio: " . $rutaArchivo);
            return response()->json(['error' => 'El archivo no existe o es un directorio.'], 404);
        }
    } else {
        Log::error("Documento no encontrado con id: " . $id);
        return response()->json(['error' => 'Documento no encontrado.'], 404);
    }
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sesion = Sesion::with('documentos')->findOrFail($id);
        return view('sesionesConsejo.edit', compact('sesion'));
    }

    /**
     * Update the specified resource in storage.
     * Valida y actualiza la información de la sesión, maneja la eliminación y adición de documentos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_hora' => 'required|date',
            'lugar' => 'required|string|max:255',
        ]);

        $sesion = Sesion::findOrFail($id);
        $sesion->update($validatedData);

        if ($request->has('documentos_eliminados')) {
            Documento_Sesion::destroy($request->documentos_eliminados);
        }

        if ($request->hasFile('nuevos_documentos')) {
            foreach ($request->file('nuevos_documentos') as $documento) {
                $path = $documento->store('public/documentos_sesiones');
                $sesion->documentos()->create([
                    'nombre' => $documento->getClientOriginalName(),
                    'url' => $path
                ]);
            }
        }

        return redirect()->route('sesionesConsejo.index')->with('success', 'Sesión actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     * Elimina una sesión y sus documentos asociados.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sesion = Sesion::with('documentos')->findOrFail($id);
        $sesion->documentos()->delete();
        $sesion->delete();

        return redirect()->route('sesionesConsejo.index')->with('success', 'Sesión eliminada con éxito');
    }
}