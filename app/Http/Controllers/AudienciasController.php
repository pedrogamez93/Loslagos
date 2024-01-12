<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\AudienciasPartes;
use App\Models\AudienciasPartesDocs;

class AudienciasController extends Controller
{
    public function index()
    {
        // Intenta obtener la última audiencia con sus documentos
        $audiencia = AudienciasPartes::with('documentos')->latest()->first();
    
        if ($audiencia) {
            // Si existe una audiencia, la envía a la vista con sus documentos
            return view('audienciasdepartes.index', compact('audiencia'));
        } else {
            // Si no hay audiencias, redirige a la vista de creación con un mensaje
            return redirect()->route('audienciasdepartes.create')->with('message', 'No hay audiencias disponibles. Por favor, crea una.');
        }
    }
    
    public function show($id)
    {
        $audiencia = AudienciasPartes::with('documentos')->find($id);

        return view('audiencias.show', compact('audiencia'));
    }

    public function create()
    {
        return view('audienciasdepartes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'bajada' => 'nullable|string',
            'titulo_secciontwo' => 'nullable|string',
            'url_doc.*' => 'nullable|mimes:pdf,doc,docx,zip,rar|max:5120',
            'nombre_doc.*' => 'nullable|string',
        ]);
    
        try {
            // Crear la audiencia
            $nuevoAudiencia = AudienciasPartes::create([
                'titulo' => $request->input('titulo'),
                'bajada' => $request->input('bajada'),
                'titulo_secciontwo' => $request->input('titulo_secciontwo'),
            ]);
    
            // Verificar si la audiencia se creó correctamente y tiene un ID
            if (!$nuevoAudiencia->id) {
                \Log::error('ID de audiencia no válido al procesar documentos');
                return redirect()->route('audienciasdepartes.index')->with('error', 'Error al crear la audiencia');
            }
    
            // Procesar documentos (individuales y comprimidos)
            $documentos = $request->file('url_doc');
            $nombresDocumentos = $request->input('nombre_doc') ?? [];
    
            foreach ($documentos ?? [] as $key => $documento) {
                $nombreDocumento = $nombresDocumentos[$key] ?? 'documento_' . ($key + 1);
                $rutaDocumento = $documento->store('documentosasamblea');
    
                // Almacena en la base de datos
                AudienciasPartesDocs::create([
                    'audiencias_parte_id' => $nuevoAudiencia->id,
                    'nombre_doc' => $nombreDocumento,
                    'url_doc' => $rutaDocumento,
                ]);
            }
        } catch (\Exception $e) {
            // Manejar la excepción, por ejemplo, registrar un mensaje en los logs
            \Log::error('Error al procesar documentos: ' . $e->getMessage());
            return redirect()->route('audienciasdepartes.index')->with('error', 'Error al procesar documentos');
        }
    
        return redirect()->route('audienciasdepartes.index');
    }

    public function edit($id)
    {
        // Lógica para obtener los datos de la asamblea con el ID proporcionado
        $audiencia = AudienciasPartes::findOrFail($id);
    
        if ($audiencia) {
            $documentos = $audiencia->documentos;
            return view('audienciasdepartes.edit', compact('audiencia', 'documentos'));
        } else {
            return view('audienciasdepartes.edit')->with('message', 'No hay asambleas disponibles.');
        }

        // Pasa los datos a la vista de edición
        return view('audienciasdepartes.edit', compact('audiencia'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'bajada' => 'nullable|string',
            'titulo_secciontwo' => 'nullable|string',
            'url_doc.*' => 'nullable|mimes:pdf,doc,docx,zip,rar|max:5120',
            'nombre_doc.*' => 'nullable|string',
        ]);
    
        // Lógica para actualizar los datos en la base de datos
        $audiencia = AudienciasPartes::findOrFail($id);
        $audiencia->update([
            'titulo' => $request->input('titulo'),
            'bajada' => $request->input('bajada'),
            'titulo_secciontwo' => $request->input('titulo_secciontwo'),
        ]);
    
        try {
            // Procesar documentos (individuales y comprimidos)
            $documentos = $request->file('url_doc');
            $nombresDocumentos = $request->input('nombre_doc') ?? [];
    
            foreach ($documentos ?? [] as $key => $documento) {
                $nombreDocumento = $nombresDocumentos[$key] ?? 'documento_' . ($key + 1);
                $rutaDocumento = $documento->store('documentosasamblea');
    
                // Actualiza o crea el registro del documento
                AudienciasPartesDocs::updateOrCreate(
                    ['audiencias_parte_id' => $audiencia->id, 'nombre_doc' => $nombreDocumento],
                    ['url_doc' => $rutaDocumento]
                );
            }
        } catch (\Exception $e) {
            // Manejar la excepción
            \Log::error('Error al procesar documentos: ' . $e->getMessage());
            return redirect()->route('audienciasdepartes.index')->with('error', 'Error al procesar documentos');
        }
    
        return redirect()->route('audienciasdepartes.index')->with('success', 'Audiencia actualizada correctamente');
    }

    public function destroyDocAudiencia($audienciaId, $documentoId)
    {
        // Encuentra el documento específico relacionado con una audiencia
        $documento = AudienciasPartesDocs::where('audiencias_parte_id', $audienciaId)
                                    ->where('id', $documentoId)
                                    ->first();

        if ($documento) {
            // Si el documento existe, lo elimina
            Storage::delete($documento->ruta); // Asegúrate de que esta ruta sea correcta
            $documento->delete();
            return back()->with('success', 'Documento eliminado con éxito.');
        } else {
            // Si el documento no se encuentra, devuelve un mensaje de error
            return back()->with('error', 'Documento no encontrado.');
        }
    }

    public function destroyaudiencia($id)
    {
        $audiencia = AudienciasPartes::findOrFail($id);
        $audiencia->delete();

        // Puedes manejar aquí la eliminación de documentos relacionados si es necesario

        return redirect()->route('audienciasdepartes.create')->with('success', 'Audiencia eliminada correctamente');
    }
}
