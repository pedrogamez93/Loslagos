<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\TramitesDigitales;
use App\Models\TramitesDigitalesDocs;
use Carbon\Carbon;


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
        ini_set('post_max_size', '1024M');
        // Validar los campos del formulario
        $request->validate([
            'titulo' => 'required|string|max:255',
            'tags' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'fecha_apertura' => 'nullable|date',
            'fecha_cierre' => 'nullable|date',
            'icono' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nombre_btn' => 'nullable|string',
            'url' => 'nullable|string',
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
            'nombre_btn' => $request->input('nombre_btn'),
            'url' => $request->input('url'),
            'url_single' => $request->input('url_single'),
        ]);
    
        // Procesar el icono si está presente
        if ($request->hasFile('icono')) {
            $iconoPath = $request->file('icono')->store('iconos');
            $nuevoTramite->update(['icono' => $iconoPath]);
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
        $tramites = TramitesDigitales::findOrFail($id);
        return view('tramites.show', compact('tramites'));
    }

    public function destroy($id)
    {
        TramitesDigitales::destroy($id);
        return redirect()->route('tramites.index');
    }
}