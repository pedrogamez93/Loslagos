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

    $request->validate([
        'titulo' => 'required|max:255',
        'bajada' => 'nullable',
        'nombredoc.*' => 'required_with:urldoc.*|max:255',
        'urldoc.*' => 'nullable|file|mimes:pdf,doc,docx'
    ]);

    $difusion = ImagenRegion::create([
        'titulo' => $request->titulo,
        'bajada' => $request->bajada
    ]);

    if ($request->hasFile('urldoc')) {
        $documentos = $request->file('urldoc');
        $nombresDocumentos = $request->input('nombredoc');

        foreach ($documentos as $key => $documento) {
             $path = $documento->store('documento', 'public');
             $nombre = isset($nombresDocumentos[$key]) ? $nombresDocumentos[$key] : 'documento_' . ($key + 1);
            
            // Crear registro en la base de datos
            $doc = ImagenRegionDocs::create([
                'imagenregion_id' => $difusion->id,
                'nombredoc' => $nombre,
                'urldoc' => $path,
            ]);
        }
    }

   /* if ($request->has('nombredoc')) {
        foreach ($request->nombredoc as $key => $nombredoc) {
            if ($request->hasFile('urldoc')) {
                $file = $request->urldoc[$key];
                $urldoc = $file->store('documentos', 'public');

                ImagenRegionDocs::create([
                    'nombredoc' => $nombredoc,
                    'urldoc' => $urldoc,
                    'imagenregion_id' => $difusion->id
                ]);
            }
        }
    }*/

    return redirect()->route('imagenregion.index');

    }

    public function update(Request $request, $id) {

    $request->validate([
        'titulo' => 'required|max:255',
        'bajada' => 'nullable',
        'nombredoc.*' => 'required_with:urldoc.*|max:255',
        'urldoc.*' => 'nullable|file|mimes:pdf,doc,docx'
    ]);

    $difusion = ImagenRegion::findOrFail($id);
    $difusion->update([
        'titulo' => $request->titulo,
        'bajada' => $request->bajada
    ]);

    // Solo agregar nuevos documentos
    if ($request->has('nombredoc')) {
        foreach ($request->nombredoc as $key => $nombredoc) {
            if ($request->hasFile('urldoc')) {
                $file = $request->urldoc[$key];
                $urldoc = $file->store('documentos', 'public');

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
