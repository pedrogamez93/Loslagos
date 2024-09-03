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
        // Validación de los datos recibidos
        $request->validate([
            'titulo' => 'required|string|max:255',
            'bajada' => 'required|string',
            'urldocs.*' => 'file|mimes:pdf,doc,docx|max:10240', // Límite de tamaño de archivo de 10 MB
            'nombredocs.*' => 'required|string|max:255',
        ]);
    
        // Crear la política de personas mayores
        $politica = PoliticaPersonasMayores::create([
            'titulo' => $request->input('titulo'),
            'bajada' => $request->input('bajada'),
        ]);
    
        // Verificar si hay archivos y procesarlos
        if ($request->hasFile('urldocs')) {
            $urldocs = $request->file('urldocs');
            $nombres = $request->input('nombredocs');
    
            foreach ($urldocs as $key => $documento) {
                // Obtener el nombre original del archivo
                $originalName = $documento->getClientOriginalName();
                
                // Generar un nombre único si el archivo ya existe
                $uniqueFileName = $this->getUniqueFileName($originalName, 'public/documentosPersMayo');
    
                // Almacenar el archivo con su nombre único generado
                $path = $documento->storeAs('public/documentosPersMayo', $uniqueFileName);
    
                // Comprobar si se ha almacenado correctamente
                if ($path) {
                    // Crear un nuevo registro de documento relacionado con la política
                    $politica->documentos()->create([
                        'nombredocs' => $nombres[$key], // Obtenemos el nombre correspondiente
                        'urldocs' => $path,
                    ]);
                } else {
                    // Log y manejo del error de almacenamiento
                    \Log::error('Error al almacenar el archivo: ' . $originalName);
                    return redirect()->back()->with('error', 'Error al almacenar el archivo: ' . $originalName);
                }
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
        \Log::info('Inicio del método update.', ['id' => $id]); // Log para rastrear el inicio del método
    
        // Validación de los datos recibidos, todos los campos son opcionales
        $request->validate([
            'titulo' => 'nullable|string|max:255',  // Eliminar 'required'
            'bajada' => 'nullable|string',
            'urldocs.*' => 'nullable|mimes:pdf,doc,docx|max:5120',
            'nombredocs.*' => 'nullable|string',
        ]);
    
        // Buscar la política existente por su ID
        $politica = PoliticaPersonasMayores::findOrFail($id);
        \Log::info('Política encontrada.', ['politica_id' => $politica->id]); // Log para rastrear la política encontrada
    
        // Actualizar los campos de la política solo si se proporciona un valor
        if ($request->has('titulo')) {
            $politica->titulo = $request->input('titulo');
            \Log::info('Actualizando título.', ['titulo' => $request->input('titulo')]); // Log para verificar el título
        }
    
        if ($request->filled('bajada')) { // Utilizar filled() en lugar de has() para detectar valores vacíos
            $politica->bajada = $request->input('bajada');
            \Log::info('Actualizando bajada.', ['bajada' => $request->input('bajada')]); // Log para verificar la bajada
        } else {
            \Log::info('No se proporciona bajada en la solicitud.'); // Log para cuando la bajada no se proporciona
        }
    
        $politica->save();
        \Log::info('Campos de política actualizados.', ['titulo' => $politica->titulo, 'bajada' => $politica->bajada]); // Log para verificar la actualización
    
        try {
            // Procesar documentos existentes y nuevos
            $documentos = $request->file('urldocs') ?? [];
            $nombres = $request->input('nombredocs') ?? [];
    
            \Log::info('Documentos recibidos para procesar.', ['cantidad' => count($documentos)]); // Log para contar los documentos
    
            foreach ($documentos as $key => $documento) {
                $nombre = $nombres[$key] ?? 'documento_' . ($key + 1);
                
                // Obtener el nombre original del archivo
                $originalName = $documento->getClientOriginalName();
                \Log::info('Nombre original del documento.', ['originalName' => $originalName]);
    
                // Generar un nombre único para el archivo si ya existe
                $uniqueFileName = $this->getUniqueFileName($originalName, 'public/documentosPersMayo');
    
                // Almacenar el archivo con su nombre único generado
                $ruta = $documento->storeAs('public/documentosPersMayo', $uniqueFileName);
                \Log::info('Documento almacenado con éxito.', ['ruta' => $ruta]);
    
                // Crear el nuevo documento en la base de datos
                PoliticaPersonasMayoresDocs::create([
                    'politica_personas_mayores_id' => $politica->id,
                    'nombredocs' => $nombre,
                    'urldocs' => $ruta,
                ]);
            }
        } catch (\Exception $e) {
            // Manejar la excepción
            \Log::error('Error al procesar documentos: ' . $e->getMessage());
            return redirect()->route('politicapersonasmayores.index')->with('error', 'Error al procesar documentos');
        }
    
        return redirect()->route('politicapersonasmayores.index')->with('success', 'Política actualizada correctamente.');
    }
    
    /**
     * Genera un nombre de archivo único si ya existe un archivo con el mismo nombre.
     *
     * @param string $fileName El nombre original del archivo
     * @param string $directory El directorio donde se almacenará el archivo
     * @return string El nombre único generado
     */
    private function getUniqueFileName($fileName, $directory)
    {
        $filePath = storage_path('app/' . $directory . '/' . $fileName);
        $fileNameWithoutExt = pathinfo($fileName, PATHINFO_FILENAME);
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
    
        $counter = 1;
    
        // Mientras el archivo exista, agregar un número al final del nombre
        while (file_exists($filePath)) {
            $fileName = $fileNameWithoutExt . "($counter)." . $extension;
            $filePath = storage_path('app/' . $directory . '/' . $fileName);
            $counter++;
        }
    
        return $fileName;
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