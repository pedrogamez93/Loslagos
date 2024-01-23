<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salaprensa;
use Illuminate\Support\Facades\Storage;


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

      
        $request->validate([
            'titulo' => 'required|string',
            'categoria' => 'required|string',
            'descripcion' => 'required|string',
            'archivo_path' => 'required|file|mimes:jpeg,jpg,png,gif',
            'fecha' => 'required|date',
        ]);
        
        


        $datosd = $request->except('_token');
        
        
        // Manejo del archivo
        if ($request->hasFile('archivo_path')) {
            $archivoPath = $request->file('archivo_path')->store('saladeprensa', 'public');
            $datosd['archivo_path'] = $archivoPath;
        }

        // Otras asignaciones y ajustes según tus necesidades
        $datosd['created_at'] = now();
        $datosd['updated_at'] = now();

        Salaprensa::insert($datosd);

        return redirect('/saladeprensa/create')->with('success', 'Noticia guardado exitosamente');
    }


    
    public function indexTabla()
        {
            $saladeprensa['saladeprensa'] = Salaprensa::orderBy('created_at', 'asc')->paginate(7);
            return view('salaprensa.tabla', $saladeprensa);
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
            'archivo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ajusta las reglas según tus necesidades
            'fecha' => 'nullable|date',
        ]);
    
        // Actualiza solo los campos que se proporcionan en la solicitud
        $noticia->update(array_filter($request->only(['titulo', 'categoria', 'descripcion', 'fecha'])));
    
        // Si se ha enviado un nuevo archivo, maneja la lógica para actualizar 'archivo_path'
        if ($request->hasFile('archivo_path')) {
            if ($noticia->archivo_path) {
                // Elimina la foto anterior si existe
                Storage::delete('public/' . $noticia->archivo_path);
            }
            // Sube y guarda la nueva foto
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
