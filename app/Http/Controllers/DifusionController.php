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

    $request->validate([
        'titulo' => 'required|max:255',
        'bajada' => 'nullable',
        'nombredoc.*' => 'required_with:urldoc.*|max:255',
        'urldoc.*' => 'nullable|file|mimes:pdf,doc,docx'
    ]);

    $difusion = Difusion::create([
        'titulo' => $request->titulo,
        'bajada' => $request->bajada
    ]);

    if ($request->has('nombredoc')) {
        foreach ($request->nombredoc as $key => $nombredoc) {
            if ($request->hasFile('urldoc')) {
                $file = $request->urldoc[$key];
                $urldoc = $file->store('public/documentos');

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

    $request->validate([
        'titulo' => 'required|max:255',
        'bajada' => 'nullable',
        'nombredoc.*' => 'required_with:urldoc.*|max:255',
        'urldoc.*' => 'nullable|file|mimes:pdf,doc,docx'
    ]);

    $difusion = Difusion::findOrFail($id);
    $difusion->update([
        'titulo' => $request->titulo,
        'bajada' => $request->bajada
    ]);

    // Solo agregar nuevos documentos
    if ($request->has('nombredoc')) {
        foreach ($request->nombredoc as $key => $nombredoc) {
            if ($request->hasFile('urldoc')) {
                $file = $request->urldoc[$key];
                $urldoc = $file->store('public/documentos');

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