<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Seminario;
use App\Models\DocumentoSeminario;
use App\Models\GaleriaSeminario;
use App\Models\ImagenSeminario;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;


class SeminarioController extends Controller {

    public function index() {
        // Recuperar el último seminario con sus relaciones
        $seminario = Seminario::with('documentos', 'galerias.imagenes')->latest()->first();
    
        // Si no hay seminarios, manejar esta situación
        if (!$seminario) {
            // Aquí puedes decidir qué hacer si no hay seminarios
            // Por ejemplo, puedes redirigir a otra ruta o pasar una variable diferente a la vista
            return redirect()->route('seminarios.create');
        }
    
        // Mostrar la vista del seminario con su información
        return view('seminarios.index', compact('seminario'));
    }

    public function create() {

        // Mostrar formulario de creación
        return view('seminarios.create');
    }

    public function store(Request $request) {
       
        $request->validate([
            'titulo' => 'required|string',
            'bajada' => 'nullable|string',
            'nombre_doc.*' => 'nullable|string',
            'url_doc.*' => 'nullable|file|mimes:pdf',
            'nombre_galeria.*' => 'nullable|string',
            'nombre_imagen.*.*' => 'nullable|string',
            'archivo.*.*' => 'nullable|image',
        ]);

        // Crear o actualizar el seminario
        $seminario = new Seminario();
        $seminario->titulo = $request->titulo;
        $seminario->bajada = $request->bajada;
        $seminario->save();
    
        // Procesar los documentos
        foreach ($request->file('url_doc') as $index => $file) {
            $nombreDoc = $request->nombre_doc[$index];
            $urlDoc = $file->store('documentos', 'public');
    
            $documento = new DocumentoSeminario([
                'nombre_doc' => $nombreDoc,
                'url_doc' => $urlDoc,
            ]);
            $seminario->documentos()->save($documento);
        }

        foreach ($request->nombre_galeria as $indexGaleria => $nombreGaleria) {
            $galeria = new GaleriaSeminario();
            $galeria->nombre_galeria = $nombreGaleria;
            $galeria->seminario_id = $seminario->id; // Asignar el ID del seminario a la galería
            $galeria->save();
     
            if (isset($request->archivo[$indexGaleria]) && is_array($request->archivo[$indexGaleria])) {
                foreach ($request->archivo[$indexGaleria] as $indexImagen => $imagen) {

                    if ($imagen->isValid()) {
                        $path = $imagen->store('imagenes_galerias', 'public');
                 
                        $nuevaImagen = new ImagenSeminario();
                        $nuevaImagen->galeria_seminario_id = $galeria->id;
                        $nuevaImagen->nombre_imagen = $request->nombre_imagen[$indexGaleria][$indexImagen] ?? $imagen->getClientOriginalName();
                        $nuevaImagen->archivo = $path;
                        $nuevaImagen->save();
        
                       // Log::info('Imagen guardada:', ['imagen_id' => $nuevaImagen->id, 'galeria_id' => $galeria->id]);
                    } else {
                       // Log::info('Archivo de imagen no válido o no encontrado:', ['indexGaleria' => $indexGaleria, 'indexImagen' => $indexImagen]);
                    }
                }
            } else {
               // Log::info('No se encontraron imágenes para la galería:', ['galeria_id' => $galeria->id]);
            }
        }
    
        // Redirigir a una ruta específica o realizar otra acción después de guardar los datos
        return redirect()->route('seminarios.index');
    }

    public function update(Request $request, $id) {
        $request->validate([
            'titulo' => 'nullable|string',
            'bajada' => 'nullable|string',
            'nombre_doc.*' => 'nullable|string',
            'url_doc.*' => 'nullable|file|mimes:pdf',
            'nombre_galeria.*' => 'nullable|string',
            'nombre_imagen.*.*' => 'nullable|string',
            'archivo.*.*' => 'nullable|image',
        ]);
    
        // Obtener el seminario existente por su ID
        $seminario = Seminario::find($id);
    
        if (!$seminario) {
            // Manejar el caso en que el seminario no existe
            return redirect()->route('seminarios.index')->with('error', 'El seminario no existe.');
        }
    
        // Actualizar los datos del seminario
        $seminario->titulo = $request->titulo;
        $seminario->bajada = $request->bajada;
        $seminario->save();
    
        // Procesar los documentos

        if ($request->hasFile('url_doc')) {
            foreach ($request->file('url_doc') as $index => $file) {
            $nombreDoc = $request->nombre_doc[$index];
            $urlDoc = $file->store('documentos', 'public');
    
            $documento = new DocumentoSeminario([
                'nombre_doc' => $nombreDoc,
                'url_doc' => $urlDoc,
            ]);
            $seminario->documentos()->save($documento);
            }
        }
    
        foreach ($request->nombre_galeria as $indexGaleria => $nombreGaleria) {
            // Verificar si la galería existe o crear una nueva
            $galeria = GaleriaSeminario::updateOrCreate(
                ['seminario_id' => $seminario->id, 'nombre_galeria' => $nombreGaleria],
                ['seminario_id' => $seminario->id]
            );
    
            if (isset($request->archivo[$indexGaleria]) && is_array($request->archivo[$indexGaleria])) {
                foreach ($request->archivo[$indexGaleria] as $indexImagen => $imagen) {
                    if ($imagen->isValid()) {
                        $path = $imagen->store('imagenes_galerias', 'public');
    
                        $nuevaImagen = new ImagenSeminario([
                            'galeria_seminario_id' => $galeria->id,
                            'nombre_imagen' => $request->nombre_imagen[$indexGaleria][$indexImagen] ?? $imagen->getClientOriginalName(),
                            'archivo' => $path,
                        ]);
                        $nuevaImagen->save();
                    }
                }
            }
        }
    
        // Redirigir a una ruta específica o realizar otra acción después de actualizar los datos
        return redirect()->route('seminarios.index')->with('success', 'El seminario ha sido actualizado correctamente.');
    }

    public function eliminarGaleria(GaleriaSeminario $galeria)
{
    try {
        // Elimina la galería y sus imágenes relacionadas
        $galeria->imagenes()->delete();
        $galeria->delete();

        return redirect()->back()->with('success', 'La galería se eliminó correctamente.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Hubo un error al eliminar la galería.');
    }
}

    public function edit($id)
    {
        // Lógica para obtener los datos del seminario con el ID proporcionado
        $seminario = Seminario::findOrFail($id);
    
        if ($seminario) {
            $documentos = $seminario->documentos;
            $galerias = $seminario->galerias;
            return view('seminarios.edit', compact('seminario', 'documentos', 'galerias'));
        } else {
            return view('seminarios.edit')->with('message', 'No hay seminarios disponibles.');
        }
    }


    public function destroyDocumento($id) {
        $documento = DocumentoSeminario::find($id);
    
        if (!$documento) {
            // Manejar el caso en que el documento no existe
            return redirect()->back()->with('error', 'El documento no existe.');
        }
    
        // Eliminar el archivo del almacenamiento
        Storage::disk('public')->delete($documento->url_doc);
    
        // Eliminar el registro de la base de datos
        $documento->delete();
    
        return redirect()->back()->with('success', 'El documento ha sido eliminado correctamente.');
    }


    public function show($id){
        // Obtén la galería y sus imágenes relacionadas
        $galeria = GaleriaSeminario::with('imagenes')->findOrFail($id);
    
        // Pasa la galería a la vista junto con sus imágenes
        return view('seminariointernacional', ['galeria' => $galeria]);
    }

    public function mostrarSeminarioImagen($filename)
    {
        $path = storage_path('app/public/imagenes_galerias/' . $filename);
    
        // Log para depuración del archivo
        \Log::info("Intentando mostrar la imagen: " . $filename);
        \Log::info("Ruta completa de la imagen: " . $path);
    
        if (!File::exists($path)) {
            \Log::error("La imagen no existe: " . $path);
            abort(404, 'Imagen no encontrada');
        }
    
        $file = File::get($path);
        $type = File::mimeType($path);
    
        \Log::info("Mostrando la imagen: " . $filename . " con tipo MIME: " . $type);
    
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
    
        return $response;
    }

    
}
