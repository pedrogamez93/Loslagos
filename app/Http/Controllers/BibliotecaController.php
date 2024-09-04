<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biblioteca;
use Illuminate\Support\Facades\Log;

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
            'urldocs' => 'required|file|mimes:pdf,doc,docx|max:10240', // Límite de tamaño de archivo de 10 MB
        ]);
    
        Log::info('Datos validados para almacenar documento en Biblioteca', ['data' => $data]);
    
        // Verificar si hay un archivo y procesarlo
        if ($request->hasFile('urldocs')) {
            $file = $request->file('urldocs');
            $originalName = $file->getClientOriginalName();
            $uniqueFileName = time() . '_' . $originalName; // Generar un nombre único para evitar conflictos
    
            Log::info('Procesando archivo para almacenamiento', ['nombre_original' => $originalName, 'nombre_unico' => $uniqueFileName]);
    
            try {
                // Almacenar el archivo con su nombre único generado en el almacenamiento público
                $filePath = $file->storeAs('documentosbiblioteca', $uniqueFileName, 'public');
    
                // Verificar si el archivo se almacenó correctamente
                if (!$filePath) {
                    Log::error('Error al almacenar el archivo (storeAs devolvió false)', ['nombre' => $originalName]);
                    return redirect()->back()->with('error', 'Error al almacenar el archivo: ' . $originalName);
                }
    
                Log::info('Archivo almacenado correctamente', ['ruta' => $filePath]);
    
                // Guardar la ruta del archivo en la base de datos
                $data['urldocs'] = $filePath;  // Guardar la ruta como una cadena, no como un JSON
    
            } catch (\Exception $e) {
                Log::error('Excepción al almacenar el archivo', ['error' => $e->getMessage()]);
                return redirect()->back()->with('error', 'Excepción al almacenar el archivo: ' . $e->getMessage());
            }
        } else {
            Log::warning('No se encontró un archivo válido para almacenar.');
            return redirect()->back()->with('error', 'No se encontró un archivo válido para almacenar.');
        }
    
        // Verificar que el dato de 'urldocs' esté correctamente asignado antes de guardar en la base de datos
        Log::info('Datos a guardar en la base de datos', ['data' => $data]);
    
        // Almacenar los datos en la base de datos
        try {
            Biblioteca::create($data);
            Log::info('Documento almacenado en la base de datos', ['data' => $data]);
        } catch (\Exception $e) {
            Log::error('Error al almacenar el documento en la base de datos', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error al crear el documento: ' . $e->getMessage());
        }
    
        // Redireccionar con mensaje de éxito
        return redirect(route('biblioteca.index'))->with('success', 'Documento creado con éxito');
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
