<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biblioteca;

class BibliotecaController extends Controller
{
    public function index()
    {
        $biblioteca = Biblioteca::all();
        if ($biblioteca->isNotEmpty()) {
            return view('biblioteca.index', compact('biblioteca'));
        } else {
            return view('biblioteca.create', compact('biblioteca'));
           
        }
           
    }

    public function create()
    {
        return view('biblioteca.create');
    }

    public function edit($id)
    {
        $planificacion = Biblioteca::find($id);
        return view('biblioteca.edit', compact('biblioteca'));
    }

    public function store(Request $request)
    {
        // Validación de los datos recibidos
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'urldocs.*' => 'file|mimes:pdf,doc,docx|max:10240', // Límite de tamaño de archivo de 10 MB
        ]);
    
        // Inicializar array 'urldocs' en caso de que no haya archivos
        $fileData = [];
    
        // Verificar si hay archivos y procesarlos
        if ($request->hasFile('urldocs')) {
            foreach ($request->file('urldocs') as $file) {
                // Obtener el nombre original del archivo
                $originalName = $file->getClientOriginalName();
    
                // Almacenar el archivo con el nombre original
                $urlPath = $file->storeAs('documentosbiblioteca', $originalName);
    
                // Verificar si el archivo se almacenó correctamente
                if ($urlPath) {
                    // Guardar la ruta y el nombre original del archivo
                    $fileData[] = [
                        'path' => $urlPath,
                        'name' => $originalName
                    ];
                } else {
                    // Manejar el error de almacenamiento de archivos
                    return redirect()->back()->with('error', 'Error al almacenar el archivo: ' . $originalName);
                }
            }
        }
    
        // Convertir el array de archivos a JSON para almacenarlo en la base de datos
        $data['urldocs'] = json_encode($fileData);
    
        // Almacenar los datos en la base de datos
        try {
            Biblioteca::create($data);
        } catch (\Exception $e) {
            // Manejar errores de almacenamiento en la base de datos
            return redirect()->back()->with('error', 'Error al crear el artículo: ' . $e->getMessage());
        }
    
        // Redireccionar con mensaje de éxito
        return redirect(route('biblioteca.index'))->with('success', 'Artículo creado con éxito');
    }

    public function show(Biblioteca $biblioteca)
    {
        $biblioteca = Biblioteca::all();
        return view('biblioteca.show', compact('biblioteca'));
    }

    public function destroy($id)
    {
        $biblioteca = Biblioteca::find($id);
    
        if ($biblioteca) {
            $biblioteca->delete();
            return redirect()->route('biblioteca.index')->with('success', 'Artículo eliminado con éxito');
        } else {
            return redirect()->route('biblioteca.index')->with('error', 'Artículo no encontrado');
        }
    }

   /* public function downloadbiblio($id)
    {
        // Buscar el registro en la base de datos
        $biblioteca = Biblioteca::findOrFail($id);
    
        // Decodificar los archivos almacenados en JSON
        $files = json_decode($biblioteca->urldocs, true);
    
        // Verificar si existen archivos
        if (!$files) {
            return redirect()->back()->with('error', 'No se encontraron archivos para descargar.');
        }
    
        // Iterar sobre los archivos y verificar su existencia
        foreach ($files as $file) {
            $path = storage_path('app/' . $file['path']); // Ruta completa del archivo
            
            // Verificar si el archivo existe y no es un directorio
            if (file_exists($path) && !is_dir($path)) {
                // Descargar el archivo con su nombre original
                return response()->download($path, $file['name']);
            } else {
                // Agregar un mensaje de registro para el archivo no encontrado
                \Log::error('Archivo no encontrado o es un directorio: ' . $path);
            }
        }
    
        // Redireccionar con un mensaje de error si no se encuentra ningún archivo
        return redirect()->back()->with('error', 'El archivo no existe o es un directorio.');
    }*/
}
