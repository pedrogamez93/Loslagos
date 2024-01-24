<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
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
        ini_set('post_max_size', '86400');
        // Validar los campos del formulario
        $request->validate([
            'titulo' => 'required|string|max:255',
            'tags' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'fecha_apertura' => 'nullable|date_format:d-m-Y',
            'fecha_cierre' => 'nullable|date_format:d-m-Y',
            'icono' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nombre_btn.*' => 'nullable|string',
            'url.*' => 'nullable|string',
            'url_single' => 'nullable|string',
            'ruta_documento.*' => 'nullable|mimes:pdf,doc,docx,zip,rar|max:86400',
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
            $iconoPath = $request->file('icono')->store('iconos', 'public');
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
    
            // Verificar y almacenar documentos
            if ($request->hasFile('ruta_documento')) {
                $documentos = $request->file('ruta_documento');
                $nombresDocumentos = $request->input('nombre_documento');

                foreach ($documentos as $key => $documento) {
                    $path = $documento->store('public/documentostramites');
                    $nombre = isset($nombresDocumentos[$key]) ? $nombresDocumentos[$key] : 'documento_' . ($key + 1);
                    
                    // Crear registro en la base de datos
                    $doc = TramitesDigitalesDocs::create([
                        'tramite_id' => $nuevoTramite->id,
                        'nombre_documento' => $nombre,
                        'ruta_documento' => $path,
                    ]);
                }
            } else {
            }

            // Redirigir al final
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
        'titulo' => 'nullable|string|max:255',
        'tags' => 'nullable|string',
        'descripcion' => 'nullable|string',
        'fecha_apertura' => 'nullable|date',
        'fecha_cierre' => 'nullable|date',
        'icono' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'nombre_btn.*' => 'nullable|string',
        'url.*' => 'nullable|string',
        'url_single' => 'nullable|string',
        'ruta_documento.*' => 'nullable|mimes:pdf,doc,docx,zip,rar|max:86400',
        'nombre_documento.*' => 'nullable|string',
    ]);

    $tramite = TramitesDigitales::findOrFail($id);

    // Procesar fechas
    $fechaAperturaInput = $request->input('fecha_apertura');
    $fechaCierreInput = $request->input('fecha_cierre');
    
    // Verificar el formato de las fechas y procesarlas si es necesario
    $fechaApertura = $fechaAperturaInput && preg_match('/^\d{2}-\d{2}-\d{4}$/', $fechaAperturaInput)
        ? Carbon::createFromFormat('d-m-Y', $fechaAperturaInput)->toDateString()
        : $fechaAperturaInput;
    
    $fechaCierre = $fechaCierreInput && preg_match('/^\d{2}-\d{2}-\d{4}$/', $fechaCierreInput)
        ? Carbon::createFromFormat('d-m-Y', $fechaCierreInput)->toDateString()
        : $fechaCierreInput;
    
    $tramite->update([
        'titulo' => $request->input('titulo'),
        'tags' => $request->input('tags'),
        'descripcion' => $request->input('descripcion'),
        'fecha_apertura' => $fechaApertura,
        'fecha_cierre' => $fechaCierre,
        'url_single' => $request->input('url_single'),
    ]);

    if ($request->hasFile('icono')) {
        $iconoPath = $request->file('icono')->store('iconos', 'public');
        $tramite->update(['icono' => $iconoPath]);
    }

        // Actualizar o agregar nuevos botones
        if ($request->has('nombre_btn') && $request->has('url')) {
            foreach ($request->nombre_btn as $index => $nombreBtn) {
                $url = $request->url[$index];

                if (!empty($nombreBtn) && !empty($url)) {
                    // Solo agregar nuevos botones, sin modificar o borrar los existentes
                    TramitesDigitalesBtns::create([
                        'tramite_id' => $tramite->id,
                        'nombre_btn' => $nombreBtn,
                        'url' => $url,
                    ]);
                }
            }
        }

        // Actualizar o agregar nuevos documentos
        if ($request->hasFile('ruta_documento')) {
            $documentos = $request->file('ruta_documento');
            $nombresDocumentos = $request->input('nombre_documento');

            foreach ($documentos as $key => $documento) {
                // Verificar si hay un nombre para el documento actual
                $nombreDocumento = isset($nombresDocumentos[$key]) ? $nombresDocumentos[$key] : 'documento_' . ($key + 1);

                // Almacenar el archivo y obtener la ruta
                $rutaDocumento = $documento->store('documentostramites', 'public');

                // Crear o actualizar el registro del documento en la base de datos
                TramitesDigitalesDocs::create([
                    'tramite_id' => $tramite->id,
                    'nombre_documento' => $nombreDocumento,
                    'ruta_documento' => $rutaDocumento,
                ]);
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