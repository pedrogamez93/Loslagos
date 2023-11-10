<?php

namespace App\Http\Controllers;

use App\Models\TramitesDigitales;
use App\Models\TramitesDigitalesDocs;
use Illuminate\Http\Request;

class TramitesDigitalesController extends Controller{

    public function index(){
        $tramites = TramitesDigitales::all();
        return view('tramites.index', compact('tramites'));
    }

    public function create()
    {
        return view('tramites.create');
    }

public function store(Request $request)
{
    $request->validate([
        'titulo' => 'required|string|max:255',
        'tags' => 'string',
        'descripcion' => 'string',
        'fecha_apertura' => 'date',
        'fecha_cierre' => 'date',
        'icono' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'nombre_btn' => 'string',
        'url' => 'string',
        'url_single' => 'string',
        'ruta_documento.*' => 'nullable|mimes:pdf,doc,docx|max:2048',
        'nombre_documento.*' => 'string',
        'ruta_comprimido.*' => 'nullable|mimes:zip|max:2048',
        'nombre_comprimido.*' => 'string',
    ]);

    // Crear el trámite incluso si algunos campos están vacíos
    $nuevoTramite = TramitesDigitales::create([
        'titulo' => $request->input('titulo'),
        'tags' => $request->input('tags'),
        'descripcion' => $request->input('descripcion'),
        'fecha_apertura' => $request->input('fecha_apertura'),
        'fecha_cierre' => $request->input('fecha_cierre'),
        'nombre_btn' => $request->input('nombre_btn'),
        'url' => $request->input('url'),
        'url_single' => $request->input('url_single'),
    ]);

    if ($request->hasFile('icono')) {
        $iconoPath = $request->file('icono')->store('iconos');
        $nuevoTramite->update(['icono' => $iconoPath]);
    }

    $documentos = $request->file('ruta_documento');
    $nombresDocumentos = $request->input('nombre_documento');
    
    if ($documentos) {
        foreach ($documentos as $key => $documento) {
            $nombreDocumento = isset($nombresDocumentos[$key]) ? $nombresDocumentos[$key] : 'documento_' . ($key + 1);
            $rutaDocumento = $documento->storeAs('public/documentostramites/individual', $nombreDocumento . '.' . $documento->getClientOriginalExtension());
    
            // Almacena en la base de datos para documentos individuales
            TramitesDigitalesDocs::create([
                'tramite_id' => $nuevoTramite->id,
                'nombre_documento' => $nombreDocumento,
                'ruta_documento' => $rutaDocumento,
            ]);
        }
    }
    
    // Procesar documentos comprimidos
    $comprimidos = $request->file('ruta_comprimido');
    
    if ($comprimidos) {
        foreach ($comprimidos as $key => $comprimido) {
            $nombreComprimido = $request->input('nombre_comprimido')[$key] ?? 'comprimido_' . ($key + 1);
            $rutaComprimido = $comprimido->storeAs('public/documentostramites/comprimido', $nombreComprimido . '.' . $comprimido->getClientOriginalExtension());
    
            // Almacena en la base de datos para documentos comprimidos
            TramitesDigitalesDocs::create([
                'tramite_id' => $nuevoTramite->id,
                'nombre_documento' => $nombreComprimido,
                'ruta_documento' => $rutaComprimido,
            ]);
        }
    }

    return redirect()->route('tramites.index');
}

    public function edit($id)
    {
        $tramite = TramitesDigitales::findOrFail($id);
        return view('tramites.edit', compact('tramite'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'tags' => 'string',
            'descripcion' => 'string',
            'fecha_apertura' => 'date',
            'fecha_cierre' => 'date',
            'icono' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nombre_btn' => 'string',
            'url' => 'string',
            'url_single' => 'string',
            'ruta_documento.*' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'nombre_documento.*' => 'string',
            'ruta_comprimido.*' => 'nullable|mimes:zip|max:2048',
            'nombre_comprimido.*' => 'string',
        ]);

        $tramites = TramitesDigitales::findOrFail($id);

        $tramites->update([
            'titulo' => $request->input('titulo'),
            'tags' => $request->input('tags'),
            'descripcion' => $request->input('descripcion'),
            'fecha_apertura' => $request->input('fecha_apertura'),
            'fecha_cierre' => $request->input('fecha_cierre'),
            'nombre_btn' => $request->input('nombre_btn'),
            'url' => $request->input('url'),
            'url_single' => $request->input('url_single'),
        ]);

        if ($request->hasFile('icono')) {
            $iconoPath = $request->file('icono')->store('iconos');
            $tramites->update(['icono' => $iconoPath]);
        }

        return redirect()->route('tramites.index');
    }

    public function show($id){
        $tramite = TramitesDigitales::findOrFail($id);
        return view('tramites.show', compact('tramite'));
    }

    public function destroy($id)
    {
        TramitesDigitales::destroy($id);
        return redirect()->route('tramites.index');
    }

    /*public function showList(){
    $tramites = TramitesDigitales::all();
    return view('tramites.show', compact('tramites'));

    } */
}