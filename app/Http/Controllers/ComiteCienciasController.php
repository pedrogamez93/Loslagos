<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ComiteCiencias;
use App\Models\ComiteCienciasDocs;

class ComiteCienciasController extends Controller
{
    public function index(){

        $comite = ComiteCiencias::latest()->first();
    
        if ($comite) {
            $documentos = $comite->documentos;
            return view('comiteciencias.index', compact('comite', 'documentos'));
        } else {
            return view('comiteciencias.index')->with('message', 'No hay asambleas disponibles.');
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
                    $rutaDocumento = $documento->store('documentoscomite');
        
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
                $rutaDocumento = $documento->store('documentoscomite');

                // Actualizar o crear en la base de datos
                $comite->documentos()->updateOrCreate(
                    ['nombre_documento' => $nombreDocumento],
                    [
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

}
