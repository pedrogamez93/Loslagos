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
    
        // Inicializar variable para almacenar múltiples rutas de documentos
        $fileData = [];
    
        // Verificar si hay archivos y procesarlos
        if ($request->hasFile('urldocs')) {
            foreach ($request->file('urldocs') as $file) {
                // Obtener el nombre original del archivo
                $originalName = $file->getClientOriginalName();
    
                // Generar un nombre único si el archivo ya existe
                $uniqueFileName = $this->getUniqueFileName($originalName, 'documentospresentacion');
    
                // Almacenar el archivo con su nombre único generado
                $filePath = $file->storeAs('documentospresentacion', $uniqueFileName);
    
                // Verificar si el archivo se almacenó correctamente
                if (!$filePath) {
                    return redirect()->back()->with('error', 'Error al almacenar el archivo: ' . $originalName);
                }
    
                // Guardar la ruta del archivo y el nombre original en el array
                $fileData[] = [
                    'path' => $filePath,
                    'name' => $originalName
                ];
            }
        }
    
        // Convertir el array de archivos a JSON para almacenarlo en la base de datos
        $data['urldocs'] = json_encode($fileData);
    
        // Almacenar los datos en la base de datos
        try {
            Presentaciones::create($data);
        } catch (\Exception $e) {
            // Manejar errores de almacenamiento en la base de datos
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
        $presentacion = Presentaciones::find($id);
    
        if (!$presentacion || !$presentacion->urldocs) {
            return redirect()->back()->with('error', 'Artículo o archivo no encontrado.');
        }
    
        // Decodificar el JSON para obtener el array de archivos
        $fileData = json_decode($presentacion->urldocs, true);
    
        if (empty($fileData)) {
            return redirect()->back()->with('error', 'No se encontraron archivos para descargar.');
        }
    
        // Descargar el primer archivo (puedes ajustar esto para manejar varios archivos si es necesario)
        $file = $fileData[0]; // Tomar el primer archivo del array
        $filePath = storage_path('app/public/' . $file['path']); // Obtener la ruta completa del archivo
    
        // Verificar si el archivo existe
        if (file_exists($filePath)) {
            // Descargar el archivo con el nombre original
            return response()->download($filePath, $file['name']);
        }
    
        return redirect()->back()->with('error', 'El archivo no existe.');
    }
}
