<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ComiteCiencias;
use App\Models\ComiteCienciasDocs;

class ComiteCienciasController extends Controller
{
    public function index(){

        $comites = ComiteCiencias::all();
    
        if ($comites->isEmpty()) {
            // No hay comités disponibles, redirigir a la creación
            return redirect()->route('comiteciencias.create')->with('message', 'No hay comités disponibles. Puedes crear uno nuevo.');
        } else {
            // Hay comités disponibles, mostrar en el índice
            return view('comiteciencias.index', compact('comites'));
        }
    }

    public function create()
    {
        return view('comiteciencias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'tags' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'nota' => 'nullable|string',
        ]);
    
        // Crear el trámite incluso si algunos campos están vacíos
        $nuevoComite = ComiteCiencias::create([
            'titulo' => $request->input('titulo'),
            'tags' => $request->input('tags'),
            'descripcion' => $request->input('descripcion'),
            'nota' => $request->input('nota'),
        ]);
    
        try {
            // Procesar documentos (individuales y comprimidos)
            $documentos = $request->file('ruta_documento');
            $nombresDocumentos = $request->input('nombre_documento') ?? [];
    
            foreach ($documentos ?? [] as $key => $documento) {
                $nombreDocumento = $nombresDocumentos[$key] ?? 'documento_' . ($key + 1);
                $rutaDocumento = $documento->store('public/documentoscomite'); // Ajuste aquí
    
                // Formatear la ruta correctamente
                $rutaDocumento = str_replace('public/', '', $rutaDocumento);
                \Log::info('Ruta formateada correctamente: ' . $rutaDocumento);
    
                $absolutePath = storage_path('app/public/' . $rutaDocumento);
                \Log::info('Ruta absoluta del archivo: ' . $absolutePath);
    
                if (file_exists($absolutePath)) {
                    \Log::info('El archivo realmente existe en la ruta absoluta.');
                } else {
                    \Log::error('El archivo no se encuentra en la ruta absoluta.');
                }
    
                // Almacena en la base de datos
                ComiteCienciasDocs::create([
                    'comite_ciencias_id' => $nuevoComite->id,
                    'nombre_documento' => $nombreDocumento,
                    'ruta_documento' => $rutaDocumento,
                ]);
            }
        } catch (\Exception $e) {
            // Manejar la excepción, por ejemplo, registrar un mensaje en los logs
            \Log::error('Error al procesar documentos: ' . $e->getMessage());
        }
    
        return redirect()->route('comiteciencias.index');
    }

    public function edit($id)
    {
        $comite = ComiteCiencias::findOrFail($id);
        $documentos = $comite->documentos;

        return view('comiteciencias.edit', compact('comite', 'documentos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'tags' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'nota' => 'nullable|string',
        ]);
    
        $comite = ComiteCiencias::findOrFail($id);
    
        // Actualizar el trámite
        $comite->update([
            'titulo' => $request->input('titulo'),
            'tags' => $request->input('tags'),
            'descripcion' => $request->input('descripcion'),
            'nota' => $request->input('nota'),
        ]);
    
        try {
            // Procesar documentos (individuales y comprimidos)
            $documentos = $request->file('ruta_documento');
            $nombresDocumentos = $request->input('nombre_documento') ?? [];
    
            foreach ($documentos ?? [] as $key => $documento) {
                $nombreDocumento = $nombresDocumentos[$key] ?? 'documento_' . ($key + 1);
                $rutaDocumento = $documento->store('public/documentoscomite'); // Ajuste aquí
    
                // Formatear la ruta correctamente
                $rutaDocumento = str_replace('public/', '', $rutaDocumento);
                \Log::info('Ruta formateada correctamente: ' . $rutaDocumento);
    
                $absolutePath = storage_path('app/public/' . $rutaDocumento);
                \Log::info('Ruta absoluta del archivo: ' . $absolutePath);
    
                if (file_exists($absolutePath)) {
                    \Log::info('El archivo realmente existe en la ruta absoluta.');
                } else {
                    \Log::error('El archivo no se encuentra en la ruta absoluta.');
                }
    
                // Actualizar o crear en la base de datos
                $comite->documentos()->updateOrCreate(
                    ['nombre_documento' => $nombreDocumento],
                    [
                        'comite_ciencias_id' => $comite->id,
                        'nombre_documento' => $nombreDocumento,
                        'ruta_documento' => $rutaDocumento,
                    ]
                );
            }
        } catch (\Exception $e) {
            // Manejar la excepción, por ejemplo, registrar un mensaje en los logs
            \Log::error('Error al procesar documentos: ' . $e->getMessage());
        }
    
        return redirect()->route('comiteciencias.index');
    }
    

    public function eliminarDocumento($documentoId){
        
        try {
            $documento = ComiteCienciasDocs::findOrFail($documentoId);
            $documento->delete();
    
            return response()->json(['success' => true, 'message' => 'Documento eliminado exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al eliminar el documento', 'error' => $e->getMessage()]);
        }
    }

}
