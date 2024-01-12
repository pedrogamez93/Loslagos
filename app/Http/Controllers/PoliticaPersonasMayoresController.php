<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\PoliticaPersonasMayores;
use App\Models\PoliticaPersonasMayoresDocs;

class PoliticaPersonasMayoresController extends Controller
{
    public function index()
    {
        $ultimoRegistro = PoliticaPersonasMayores::latest()->first();
        
        // Si hay un último registro, mostrar la vista index con los datos
        if ($ultimoRegistro) {
            $docs = $ultimoRegistro->documentos; // Obteniendo los documentos relacionados
        
            return view('politicapersonasmayores.index', compact('ultimoRegistro', 'docs'));
        } else {
            // Si no hay registros, redirigir a la vista de creación con un mensaje
            return redirect()->route('politicapersonasmayores.create')
                             ->with('message', 'No se encontraron datos');
        }
    }

    public function create()
    {
        return view('politicapersonasmayores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'bajada' => 'required',
            'urldocs.*' => 'file|mimes:pdf,doc,docx',
            'nombredocs.*' => 'required',
        ]);
    
        // Crear la política de personas mayores
        $politica = PoliticaPersonasMayores::create([
            'titulo' => $request->input('titulo'),
            'bajada' => $request->input('bajada'),
        ]);
    
        if ($request->hasFile('urldocs')) {
            $urldocs = $request->file('urldocs');
            $nombres = $request->input('nombredocs');
    
            foreach ($urldocs as $key => $documento) {
                $path = $documento->store('public/documentosPersMayo');
                $nombre = $nombres[$key]; // Obtenemos el nombre correspondiente
    
                $politica->documentos()->create([
                    'nombredocs' => $nombre,
                    'urldocs' => $path,
                ]);
            }
        }
    
        return redirect()->route('politicapersonasmayores.index')->with('success', 'Política creada correctamente.');
    }

    public function edit($id)
    {
        // Obtén el registro de PoliticaPersonasMayores con el ID proporcionado
        $ultimoRegistro = PoliticaPersonasMayores::findOrFail($id);
    
        // Verifica si el registro existe
        if ($ultimoRegistro) {
            // Obtén los documentos relacionados
            $docs = $ultimoRegistro->documentos;
    
            return view('politicapersonasmayores.edit', compact('ultimoRegistro', 'docs'));
        } else {
            // No hay registro con el ID proporcionado, puedes manejar esto según tus necesidades
            return view('politicapersonasmayores.edit')->with('message', 'No se encontró el registro con el ID proporcionado.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'bajada' => 'nullable|string',
            'urldocs.*' => 'nullable|mimes:pdf,doc,docx|max:5120',
            'nombredocs.*' => 'nullable|string',
        ]);
    
        // Buscar la política existente por su ID
        $politica = PoliticaPersonasMayores::findOrFail($id);
    
        // Actualizar los campos de la política
        $politica->update([
            'titulo' => $request->input('titulo'),
            'bajada' => $request->input('bajada'), 
        ]);
    
        try {
            // Procesar documentos existentes y nuevos
            $documentos = $request->file('urldocs') ?? [];
            $nombres = $request->input('nombredocs') ?? [];
    
            foreach ($documentos as $key => $documento) {
                $nombre = $nombres[$key] ?? 'documento_' . ($key + 1);
                $ruta = $documento->store('public/documentosPersMayo');
    
                // Actualiza o crea el registro del documento
                PoliticaPersonasMayoresDocs::updateOrCreate(
                    ['politica_personas_mayores_id' => $politica->id, 'nombredocs' => $nombre],
                    ['urldocs' => $ruta]
                );
            }
        } catch (\Exception $e) {
            // Manejar la excepción
            \Log::error('Error al procesar documentos: ' . $e->getMessage());
            return redirect()->route('politicapersonasmayores.index')->with('error', 'Error al procesar documentos');
        }
    
        return redirect()->route('politicapersonasmayores.index')->with('success', 'Política actualizada correctamente.');
    }

    public function destroyDocPolitica($ultimoRegistroId, $documentoId)
    {
        // Encuentra el documento específico relacionado con una audiencia
        $documento = PoliticaPersonasMayoresDocs::where('politica_personas_mayores_id', $ultimoRegistroId)
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

    public function destroypolitica($id)
    {
        $ultimoRegistro = PoliticaPersonasMayores::findOrFail($id);
        $ultimoRegistro->delete();

        // Puedes manejar aquí la eliminación de documentos relacionados si es necesario

        return redirect()->route('politicapersonasmayores.create')->with('success', 'Audiencia eliminada correctamente');
    }
}