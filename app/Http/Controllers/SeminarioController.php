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
            $originalName = $file->getClientOriginalName();
            $uniqueFileName = $this->getUniqueFileName($originalName, 'documentos');
            
            // Almacenar el archivo con el nombre único generado
            $urlDoc = $file->storeAs('documentos', $uniqueFileName, 'public');
    
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
                        $originalImageName = $imagen->getClientOriginalName();
                        $uniqueImageName = $this->getUniqueFileName($originalImageName, 'imagenes_galerias');
                        
                        $path = $imagen->storeAs('imagenes_galerias', $uniqueImageName, 'public');
    
                        $nuevaImagen = new ImagenSeminario();
                        $nuevaImagen->galeria_seminario_id = $galeria->id;
                        $nuevaImagen->nombre_imagen = $request->nombre_imagen[$indexGaleria][$indexImagen] ?? $originalImageName;
                        $nuevaImagen->archivo = $path;
                        $nuevaImagen->save();
                    }
                }
            }
        }
    
        // Redirigir a una ruta específica o realizar otra acción después de guardar los datos
        return redirect()->route('seminarios.index');
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
                $originalName = $file->getClientOriginalName();
                $uniqueFileName = $this->getUniqueFileName($originalName, 'documentos');
                
                // Almacenar el archivo con el nombre único generado
                $urlDoc = $file->storeAs('documentos', $uniqueFileName, 'public');
    
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
                        $originalImageName = $imagen->getClientOriginalName();
                        $uniqueImageName = $this->getUniqueFileName($originalImageName, 'imagenes_galerias');
                        
                        $path = $imagen->storeAs('imagenes_galerias', $uniqueImageName, 'public');
    
                        $nuevaImagen = new ImagenSeminario([
                            'galeria_seminario_id' => $galeria->id,
                            'nombre_imagen' => $request->nombre_imagen[$indexGaleria][$indexImagen] ?? $originalImageName,
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
        // Verificar que la solicitud llegue aquí.
        \Log::info('Llega al método destroyDocumento con ID: ' . $id);
        
        // Buscar el documento por su ID
        $documento = DocumentoSeminario::find($id);
        
        if (!$documento) {
            Log::error('Documento no encontrado con ID: ' . $id);
            return redirect()->back()->with('error', 'El documento no existe.');
        }
        
        // Verificar que la ruta del documento no sea nula o vacía
        if (empty($documento->url_doc)) {
            Log::error('Ruta del documento vacía para el documento con ID: ' . $id);
            return redirect()->back()->with('error', 'La ruta del archivo es inválida o está vacía.');
        }
    
        // Eliminar el archivo del almacenamiento público
        if (Storage::disk('public')->exists($documento->url_doc)) {
            if (Storage::disk('public')->delete($documento->url_doc)) {
                Log::info('Archivo eliminado: ' . $documento->url_doc);
            } else {
                Log::error('Error al intentar eliminar el archivo: ' . $documento->url_doc);
                return redirect()->back()->with('error', 'Error al intentar eliminar el archivo del almacenamiento.');
            }
        } else {
            Log::error('Archivo no encontrado en el almacenamiento: ' . $documento->url_doc);
            return redirect()->back()->with('error', 'El archivo no se encontró en el almacenamiento.');
        }
    
        // Eliminar el registro del documento en la base de datos
        try {
            $documento->delete();
            Log::info('Documento eliminado de la base de datos: ' . $documento->id);
        } catch (\Exception $e) {
            Log::error('Error al eliminar el documento de la base de datos: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al eliminar el documento de la base de datos.');
        }
        
        return redirect()->back()->with('success', 'El documento ha sido eliminado correctamente.');
    }

    public function show($id){
        // Obtén la galería y sus imágenes relacionadas
        $galeria = GaleriaSeminario::with('imagenes')->findOrFail($id);
    
        // Pasa la galería a la vista junto con sus imágenes
        return view('seminarios.show', ['galeria' => $galeria]);
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
