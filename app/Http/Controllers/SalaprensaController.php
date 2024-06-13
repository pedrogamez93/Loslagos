<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salaprensa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
class SalaprensaController extends Controller
{
    public function index()
    {
        // Obtén las noticias con paginación
        $noticias = Salaprensa::paginate(12); // 12 noticias por página, ajusta según tus necesidades
    
        // Retorna la vista con las noticias paginadas
        return view('salaprensa.index', ['noticias' => $noticias]);
    }

    public function create()
    {
        return view('salaprensa.create');
    }

     
    public function store(Request $request)
    {
        Log::info('Inicio del método store', $request->all());

        try {
            $validatedData = $request->validate([
                'titulo' => 'required|string',
                'categoria' => 'nullable|string',
                'descripcion' => 'nullable|string',
                'archivo_path' => 'nullable|mimes:jpeg,png,jpg,gif,mp4,webm,ogg|max:102400',
                'fecha' => 'nullable|date',
            ]);
            Log::info('Validación completada', $validatedData);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Error de validación', ['errors' => $e->errors()]);
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        $datosd = $request->except('_token');

        // Manejo del archivo
        if ($request->hasFile('archivo_path')) {
            Log::info('Archivo detectado en la solicitud', ['archivo_name' => $request->file('archivo_path')->getClientOriginalName()]);

            try {
                $archivoPath = $request->file('archivo_path')->store('saladeprensa', 'public');
                Log::info('Archivo subido correctamente', ['archivo_path' => $archivoPath]);
                $datosd['archivo_path'] = $archivoPath;
            } catch (\Exception $e) {
                Log::error('Error al subir el archivo', ['error' => $e->getMessage()]);
                return redirect()->back()->with('error', 'Error al subir el archivo: ' . $e->getMessage());
            }
        } else {
            Log::info('No se detectó archivo en la solicitud');
        }

        // Otras asignaciones y ajustes según tus necesidades
        $datosd['created_at'] = now();
        $datosd['updated_at'] = now();

        try {
            Salaprensa::insert($datosd);
            Log::info('Noticia guardada en la base de datos', $datosd);
        } catch (\Exception $e) {
            Log::error('Error al guardar la noticia en la base de datos', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error al guardar la noticia: ' . $e->getMessage());
        }

        return redirect('/saladeprensa/create')->with('success', 'Noticia guardada exitosamente');
    }

    
    public function indexTabla()
        {
            $saladeprensa['saladeprensa'] = Salaprensa::orderBy('created_at', 'asc')->paginate(7);
            return view('salaprensa.tabla', $saladeprensa);
        }

        public function mostrarVideo($carpeta, $video)
        {
            $path = storage_path('app/public/' . $carpeta . '/' . $video);
        
            if (!File::exists($path)) {
                abort(404);
            }
        
            return response()->file($path);
        }

        public function mostrarImagen($carpeta, $imagen)
        {
            $rutaCompleta = storage_path("app/public/{$carpeta}/{$imagen}");
        
            if (file_exists($rutaCompleta)) {
                return response()->file($rutaCompleta);
            } else {
                abort(404); // O redirige a una página de error según tus necesidades
            }
        }

    public function edit($id)
    {
        $noticias = Salaprensa::findOrFail($id);
        // Puedes necesitar cargar otras cosas según tus necesidades
        return view('salaprensa.edit', compact('noticias'));
    }

    public function update(Request $request, $id)
    {
        $noticia = Salaprensa::findOrFail($id);
    
        // Valida y actualiza los campos según tu modelo
        $request->validate([
            'titulo' => 'nullable',
            'categoria' => 'nullable',
            'descripcion' => 'nullable',
            'archivo_path' => 'nullable|mimes:jpeg,png,jpg,gif,mp4,webm,ogg|max:20480', // Ajusta las reglas según tus necesidades
            'fecha' => 'nullable|date',
        ]);
    
        // Actualiza solo los campos que se proporcionan en la solicitud
        $noticia->update(array_filter($request->only(['titulo', 'categoria', 'descripcion', 'fecha'])));
    
        // Si se ha enviado un nuevo archivo, maneja la lógica para actualizar 'archivo_path'
        if ($request->hasFile('archivo_path')) {
            if ($noticia->archivo_path) {
                // Elimina la foto o video anterior si existe
                Storage::delete('public/' . $noticia->archivo_path);
            }
            // Sube y guarda el nuevo archivo
            $archivoPath = $request->file('archivo_path')->store('saladeprensa', 'public');
            $noticia->archivo_path = $archivoPath;
            $noticia->save(); // Guarda nuevamente para actualizar 'archivo_path'
        }
    
        return redirect()->route('salaprensa.vernoticia')->with('success', 'Noticia modificada exitosamente');
    }
    
    



    public function destroy($id)
    {
        $Salaprensa = Salaprensa::findOrFail($id);
        $Salaprensa->delete();
    
        return redirect()->route('salaprensa.vernoticia')->with('success', 'Noticia eliminada exitosamente');
    }
    
    public function show($id)
    {
        $noticia = Salaprensa::findOrFail($id);
        return view('salaprensa.show', compact('noticia'));
    }


    
}
