<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presentaciones;
use Illuminate\Support\Facades\Storage;

class PresentacionesController extends Controller {

    public function index()
    {
        $presentacion = Presentaciones::all();
        if ($presentacion->isNotEmpty()) {
            return view('presentaciones.show', compact('presentacion'));
        } else {
            return view('presentaciones.create', compact('presentacion'));
           
        }
           
    }

    public function create()
    {
        return view('presentaciones.create');
    }

    public function edit($id)
    {
        $presentacion = Presentaciones::find($id);
        return view('presentaciones.edit', compact('presentacion'));
    }

    public function store(Request $request)
    {
        // Validación de los datos recibidos
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'urldocs.*' => 'file|mimes:pdf,doc,docx|max:10240', // Límite de tamaño de archivo de 10 MB
        ]);
    
        \Log::info('Archivos recibidos: ' . json_encode($request->file('urldocs'))); // Verificar los archivos recibidos
    
        // Inicializar variable para almacenar múltiples rutas de documentos
        $fileData = [];
    
        // Verificar si hay archivos y procesarlos
        if ($request->hasFile('urldocs')) {
            foreach ($request->file('urldocs') as $file) {
                // Obtener el nombre original del archivo
                $originalName = $file->getClientOriginalName();
                \Log::info('Procesando archivo: ' . $originalName); // Log para verificar
    
                // Generar un nombre único si el archivo ya existe
                $uniqueFileName = $this->getUniqueFileName($originalName, 'documentospresentacion');
    
                // Almacenar el archivo con su nombre único generado
                $filePath = $file->storeAs('documentospresentacion', $uniqueFileName, 'public');
    
                \Log::info('Archivo almacenado en: ' . $filePath); // Verificar ruta de almacenamiento
    
                // Verificar si el archivo se almacenó correctamente
                if ($filePath) {
                    // Guardar la ruta del archivo y el nombre original en el array
                    $fileData[] = [
                        'path' => $filePath,
                        'name' => $originalName
                    ];
                } else {
                    // Manejar el error si el archivo no se pudo almacenar
                    return redirect()->back()->with('error', 'Error al almacenar el archivo: ' . $originalName);
                }
            }
        }
    
        // Comprobar si hay datos de archivos antes de guardar
        if (empty($fileData)) {
            return redirect()->back()->with('error', 'No se han subido archivos.');
        }
    
        // Convertir el array de archivos a JSON para almacenarlo en la base de datos
        $data['urldocs'] = json_encode($fileData);
    
        \Log::info('Datos almacenados: ' . json_encode($data)); // Verificar los datos antes de guardar
    
        // Almacenar los datos en la base de datos
        try {
            Presentaciones::create($data);
        } catch (\Exception $e) {
            // Manejar errores de almacenamiento en la base de datos
            \Log::error('Error al crear el artículo: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al crear el artículo: ' . $e->getMessage());
        }
    
        // Redireccionar con mensaje de éxito
        return redirect(route('presentaciones.index'))->with('success', 'Artículo creado con éxito');
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

    public function show(Presentaciones $presentacion)
    {
        $presentacion = Presentaciones::all();
        return view('presentacion.show', compact('presentacion'));
    }

    public function destroy($id)
    {
        $presentacion = Presentaciones::find($id);
    
        if ($presentacion) {
            // Verificar si el archivo existe y eliminarlo del almacenamiento
            if ($presentacion->urldocs && Storage::exists($presentacion->urldocs)) {
                Storage::delete($presentacion->urldocs);
            }
    
            // Eliminar el registro de la base de datos
            $presentacion->delete();
            
            return redirect()->route('presentaciones.index')->with('success', 'Artículo eliminado con éxito');
        } else {
            return redirect()->route('presentaciones.index')->with('error', 'Artículo no encontrado');
        }
    }

    public function download($id) {
        $presentacion = Presentaciones::findOrFail($id);
    
        // Obtener la ruta completa del archivo
        $filePath = storage_path('app/public/' . $presentacion->urldoc);
    
        // Verificar si el archivo existe
        if (file_exists($filePath)) {
            // Descargar el archivo con el nombre original
            return response()->download($filePath, basename($presentacion->urldoc));
        }
    
        return redirect()->back()->with('error', 'El archivo no existe.');
    }

}
