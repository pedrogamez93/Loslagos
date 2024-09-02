<?php

namespace App\Http\Controllers;
use App\Models\Difusion;
use App\Models\DifusionDocs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DifusionController extends Controller {

    public function index() {

        $difusion = Difusion::with('documentos')->latest()->first();

        if (!$difusion) {
            return redirect()->route('difusion.create');
        }

        return view('difusion.index', compact('difusion'));
    }

    public function create() {

    return view('difusion.create');

    }

    public function store(Request $request) {
        // Validar la solicitud
        $request->validate([
            'titulo' => 'required|max:255',
            'bajada' => 'nullable',
            'nombredoc.*' => 'required_with:urldoc.*|max:255',
            'urldoc.*' => 'nullable|file|mimes:pdf,doc,docx'
        ]);
    
        // Crear el registro de Difusion
        $difusion = Difusion::create([
            'titulo' => $request->titulo,
            'bajada' => $request->bajada
        ]);
    
        // Verificar si existen documentos
        if ($request->has('nombredoc')) {
            foreach ($request->nombredoc as $key => $nombredoc) {
                if ($request->hasFile('urldoc') && isset($request->urldoc[$key])) {
                    $file = $request->file('urldoc')[$key]; // Obtener el archivo correspondiente
    
                    // Obtener el nombre original del archivo
                    $originalName = $file->getClientOriginalName();
    
                    // Generar un nombre único si el archivo ya existe
                    $uniqueFileName = $this->getUniqueFileName($originalName, 'public/documentos');
    
                    // Almacenar el archivo con su nombre único generado
                    $urldoc = $file->storeAs('public/documentos', $uniqueFileName);
    
                    // Crear el registro en la base de datos con el nombre original y la ruta
                    DifusionDocs::create([
                        'nombredoc' => $nombredoc,
                        'urldoc' => $urldoc,
                        'difusion_id' => $difusion->id
                    ]);
                }
            }
        }
    
        return redirect()->route('difusion.index');
    }

    public function update(Request $request, $id) {
        // Validar la solicitud
        $request->validate([
            'titulo' => 'required|max:255',
            'bajada' => 'nullable',
            'nombredoc.*' => 'required_with:urldoc.*|max:255',
            'urldoc.*' => 'nullable|file|mimes:pdf,doc,docx'
        ]);
    
        // Buscar la difusión existente por su ID
        $difusion = Difusion::findOrFail($id);
        $difusion->update([
            'titulo' => $request->titulo,
            'bajada' => $request->bajada
        ]);
    
        // Solo agregar nuevos documentos
        if ($request->has('nombredoc')) {
            foreach ($request->nombredoc as $key => $nombredoc) {
                if ($request->hasFile('urldoc') && isset($request->urldoc[$key])) {
                    $file = $request->file('urldoc')[$key]; // Obtener el archivo correspondiente
    
                    // Obtener el nombre original del archivo
                    $originalName = $file->getClientOriginalName();
    
                    // Generar un nombre único si el archivo ya existe
                    $uniqueFileName = $this->getUniqueFileName($originalName, 'public/documentos');
    
                    // Almacenar el archivo con su nombre único generado
                    $urldoc = $file->storeAs('public/documentos', $uniqueFileName);
    
                    // Crear el registro en la base de datos con el nombre original y la ruta
                    DifusionDocs::create([
                        'nombredoc' => $nombredoc,
                        'urldoc' => $urldoc,
                        'difusion_id' => $difusion->id
                    ]);
                }
            }
        }
    
        return redirect()->route('difusion.index');
    }

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

    public function edit($id) {

    $difusion = Difusion::with('documentos')->findOrFail($id);

    return view('difusion.edit', compact('difusion'));

    }

    public function destroyDocs($id) {

    $documento = DifusionDocs::findOrFail($id);

    // Opcional: Eliminar el archivo del almacenamiento si es necesario
    if (Storage::exists($documento->urldoc)) {
        Storage::delete($documento->urldoc);
    }

    $documento->delete();

    return back()->with('success', 'Documento eliminado con éxito.');

    }
}