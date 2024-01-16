<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\TramitesDigitales;
use App\Models\TramitesDigitalesDocs;
use App\Models\TramitesDigitalesBtns;
use Carbon\Carbon;


class TramitesDigitalesController extends Controller{

    public function index()
    {
        $tramites = TramitesDigitales::all();
    
        if ($tramites->isEmpty()) {
            // Redirecciona al método 'create'
            return redirect()->route('tramites.create');
        }
    
        return view('tramites.index', compact('tramites'));
    }

    public function create()
    {
        return view('tramites.create');
    }

    public function store(Request $request)
    {
        ini_set('post_max_size', '4048M');
        // Validar los campos del formulario
        $request->validate([
            'titulo' => 'required|string|max:255',
            'tags' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'fecha_apertura' => 'nullable|date',
            'fecha_cierre' => 'nullable|date',
            'icono' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nombre_btn.*' => 'nullable|string',
            'url.*' => 'nullable|string',
            'url_single' => 'nullable|string',
            'ruta_documento.*' => 'nullable|mimes:pdf,doc,docx,zip,rar|max:4048',
            'nombre_documento.*' => 'nullable|string',
        ]);
    
        // Procesar fechas
        $fechaApertura = $request->input('fecha_apertura')
            ? Carbon::createFromFormat('d-m-Y', $request->input('fecha_apertura'))->toDateString()
            : null;
    
        $fechaCierre = $request->input('fecha_cierre')
            ? Carbon::createFromFormat('d-m-Y', $request->input('fecha_cierre'))->toDateString()
            : null;
    
        // Crear el trámite incluso si algunos campos están vacíos
        $nuevoTramite = TramitesDigitales::create([
            'titulo' => $request->input('titulo'),
            'tags' => $request->input('tags'),
            'descripcion' => $request->input('descripcion'),
            'fecha_apertura' => $fechaApertura,
            'fecha_cierre' => $fechaCierre,
            'url_single' => $request->input('url_single'),
        ]);
    
        // Procesar el icono si está presente
        if ($request->hasFile('icono')) {
            $iconoPath = $request->file('icono')->store('iconos' , 'public');
            $nuevoTramite->update(['icono' => $iconoPath]);
        }

            // Guardar los botones en la nueva tabla
            if ($request->has('nombre_btn') && $request->has('url')) {
                $nombreBtns = $request->input('nombre_btn');
                $urls = $request->input('url');

                foreach ($nombreBtns as $index => $nombreBtn) {
                    if (!empty($nombreBtn) && !empty($urls[$index])) {
                        TramitesDigitalesBtns::create([
                            'tramite_id' => $nuevoTramite->id,
                            'nombre_btn' => $nombreBtn,
                            'url' => $urls[$index],
                        ]);
                    }
                }
            }
    
        try {
            // Procesar documentos (individuales y comprimidos)
            $documentos = $request->file('ruta_documento');
            $nombresDocumentos = $request->input('nombre_documento') ?? [];
    
            foreach ($documentos ?? [] as $key => $documento) {
                $nombreDocumento = $nombresDocumentos[$key] ?? 'documento_' . ($key + 1);
                $rutaDocumento = $documento->store('documentostramites');
    
                // Almacena en la base de datos
                TramitesDigitalesDocs::create([
                    'tramite_id' => $nuevoTramite->id,
                    'nombre_documento' => $nombreDocumento,
                    'ruta_documento' => $rutaDocumento,
                ]);
            }
        } catch (\Exception $e) {
            // Manejar la excepción, por ejemplo, registrar un mensaje en los logs
            \Log::error('Error al procesar documentos: ' . $e->getMessage());
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
        'tags' => 'nullable|string',
        'descripcion' => 'nullable|string',
        'fecha_apertura' => 'nullable|date',
        'fecha_cierre' => 'nullable|date',
        'icono' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'nombre_btn.*' => 'nullable|string',
        'url.*' => 'nullable|string',
        'url_single' => 'nullable|string',
        'ruta_documento.*' => 'nullable|mimes:pdf,doc,docx,zip,rar|max:4048',
        'nombre_documento.*' => 'nullable|string',
    ]);

    $tramite = TramitesDigitales::findOrFail($id);

    $tramite->update([
        'titulo' => $request->input('titulo'),
        'tags' => $request->input('tags'),
        'descripcion' => $request->input('descripcion'),
        'fecha_apertura' => $request->input('fecha_apertura'),
        'fecha_cierre' => $request->input('fecha_cierre'),
        'url_single' => $request->input('url_single'),
    ]);

    if ($request->hasFile('icono')) {
        $iconoPath = $request->file('icono')->store('iconos', 'public');
        $tramite->update(['icono' => $iconoPath]);
    }

    // Actualizar o agregar nuevos botones
    if ($request->has('nombre_btn') && $request->has('url')) {
        foreach ($request->nombre_btn as $index => $nombreBtn) {
            if (!empty($nombreBtn) && !empty($request->url[$index])) {
                TramitesDigitalesBtns::create([
                    'tramite_id' => $tramite->id,
                    'nombre_btn' => $nombreBtn,
                    'url' => $request->url[$index],
                ]);
            }
        }
    }

    // Actualizar o agregar nuevos documentos
    if ($request->has('nombre_documento')) {
        $nombresDocumentos = $request->nombre_documento;
        $documentos = $request->file('ruta_documento');

        foreach ($nombresDocumentos as $index => $nombreDocumento) {
            if (!empty($documentos[$index])) {
                $rutaDocumento = $documentos[$index]->store('documentostramites', 'public');
                TramitesDigitalesDocs::create([
                    'tramite_id' => $tramite->id,
                    'nombre_documento' => $nombreDocumento,
                    'ruta_documento' => $rutaDocumento,
                ]);
            }
        }
    }

    return redirect()->route('tramites.index');
}

        public function show($id){
            try {
                // Buscar el trámite por su ID junto con sus botones y documentos relacionados
                $tramite = TramitesDigitales::with(['btns', 'documentos'])->findOrFail($id);

                // Pasar el trámite a la vista
                return view('tramites.show', compact('tramite'));
            } catch (\Exception $e) {
                // Manejar una excepción si el trámite no se encuentra
                return abort(404); // Puedes personalizar el código de respuesta según tus necesidades
            }
        }

    public function mostrarImagen($icono) {
        return response()->file(storage_path('app/public/iconos/' . $icono));
    }

    public function destroy($id)
    {
        TramitesDigitales::destroy($id);
        return redirect()->route('tramites.index');
    }

    public function destroyDoc($docId)
    {
        TramitesDigitalesDocs::destroy($docId);
        return redirect()->route('tramites.index')->with('success', 'Documento eliminado correctamente.');
    }

    public function destroyBtn($btnId)
    {
        TramitesDigitalesBtns::destroy($btnId);
        return redirect()->route('tramites.index')->with('success', 'Botón eliminado correctamente.');
    }
}