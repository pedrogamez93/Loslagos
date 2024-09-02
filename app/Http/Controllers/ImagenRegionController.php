<?php

namespace App\Http\Controllers;

use App\Models\ImagenRegion;
use App\Models\ImagenRegionDocs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenRegionController extends Controller {

    public function index() {

        $imagenregion = ImagenRegion::with('documentos')->latest()->first();

        if (!$imagenregion) {
            return redirect()->route('imagenregion.create');
        }

        return view('imagenregion.index', compact('imagenregion'));
    }

    public function create() {

    return view('imagenregion.create');

    }

    public function store(Request $request) {
        // Validar la solicitud
        $request->validate([
            'titulo' => 'required|max:255',
            'bajada' => 'nullable',
            'nombredoc.*' => 'required_with:urldoc.*|max:255',
            'urldoc.*' => 'nullable|file|mimes:pdf,doc,docx'
        ]);
    
        // Crear el registro de ImagenRegion
        $difusion = ImagenRegion::create([
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
    
                    // Verificar si ya existe un archivo con el mismo nombre y modificarlo si es necesario
                    $storedName = $this->getUniqueFileName($originalName, 'documentos');
    
                    // Almacenar el archivo con su nombre (único) generado
                    $urldoc = $file->storeAs('documentos', $storedName, 'public');
    
                    // Crear el registro en la base de datos con el nombre original y la ruta
                    ImagenRegionDocs::create([
                        'nombredoc' => $nombredoc,
                        'urldoc' => $urldoc,
                        'imagenregion_id' => $difusion->id
                    ]);
                }
            }
        }
    
        return redirect()->route('imagenregion.index');
    }

    public function download($id) {
        $document = ImagenRegionDocs::findOrFail($id);
    
        // Obtener la ruta completa del archivo
        $filePath = storage_path('app/public/' . $document->urldoc);
    
        // Verificar si el archivo existe
        if (file_exists($filePath)) {
            // Descargar el archivo con el nombre original
            return response()->download($filePath, basename($document->urldoc));
        }
    
        return redirect()->back()->with('error', 'El archivo no existe.');
    }

    public function update(Request $request, $id) {
        // Validar la solicitud
        $request->validate([
            'titulo' => 'required|max:255',
            'bajada' => 'nullable',
            'nombredoc.*' => 'required_with:urldoc.*|max:255',
            'urldoc.*' => 'nullable|file|mimes:pdf,doc,docx'
        ]);
    
        // Encontrar el registro de ImagenRegion a actualizar
        $difusion = ImagenRegion::findOrFail($id);
    
        // Actualizar el registro principal
        $difusion->update([
            'titulo' => $request->titulo,
            'bajada' => $request->bajada
        ]);
    
        // Verificar si hay nuevos documentos para agregar
        if ($request->has('nombredoc')) {
            foreach ($request->nombredoc as $key => $nombredoc) {
                // Verificar si el archivo correspondiente existe en el array
                if ($request->hasFile('urldoc') && isset($request->urldoc[$key])) {
                    $file = $request->file('urldoc')[$key]; // Obtener el archivo correspondiente
    
                    // Obtener el nombre original del archivo
                    $originalName = $file->getClientOriginalName();
    
                    // Verificar si ya existe un archivo con el mismo nombre y modificarlo si es necesario
                    $storedName = $this->getUniqueFileName($originalName, 'documentos');
    
                    // Almacenar el archivo con su nombre (único) generado
                    $urldoc = $file->storeAs('documentos', $storedName, 'public');
    
                    // Crear un nuevo registro de ImagenRegionDocs en la base de datos
                    ImagenRegionDocs::create([
                        'nombredoc' => $nombredoc,
                        'urldoc' => $urldoc,
                        'imagenregion_id' => $difusion->id
                    ]);
                }
            }
        }
    
        return redirect()->route('imagenregion.index');
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
        $filePath = storage_path('app/public/' . $directory . '/' . $fileName);
        $fileNameWithoutExt = pathinfo($fileName, PATHINFO_FILENAME);
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
    
        $counter = 1;
    
        // Mientras el archivo exista, agregar un número al final del nombre
        while (file_exists($filePath)) {
            $fileName = $fileNameWithoutExt . "($counter)." . $extension;
            $filePath = storage_path('app/public/' . $directory . '/' . $fileName);
            $counter++;
        }
    
        return $fileName;
    }

    public function edit($id) {

    $imagenregion = ImagenRegion::with('documentos')->findOrFail($id);

    return view('imagenregion.edit', compact('imagenregion'));

    }

    public function destroyDocs($id) {

    $documento = ImagenRegionDocs::findOrFail($id);

    // Opcional: Eliminar el archivo del almacenamiento si es necesario
    if (Storage::exists($documento->urldoc)) {
        Storage::delete($documento->urldoc);
    }

    $documento->delete();

    return back()->with('success', 'Documento eliminado con éxito.');

    }
}
