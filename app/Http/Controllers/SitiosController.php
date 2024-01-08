<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sitios;
use Illuminate\Support\Facades\Storage;

class SitiosController extends Controller
{
    public function index()
    {
        // Obtén las noticias con paginación
        $sitios = Sitios::paginate(20); // 12 noticias por página, ajusta según tus necesidades
    
        // Retorna la vista con las noticias paginadas
         return view('sitiodegobierno.index', compact('sitios'));
    }

    public function create()
    {
        return view('sitiodegobierno.create');
    }

    public function edit($id)
    {
        $sitiodegobierno = Sitios::findOrFail($id);
        // Puedes necesitar cargar otras cosas según tus necesidades
        return view('sitiodegobierno.edit', compact('sitiodegobierno'));
    }

    public function update(Request $request, $id)   
    {
        $sitio = Sitios::findOrFail($id);

        // Valida y actualiza los campos según tu modelo
        $request->validate([
            'titulo' => 'nullable',
            'categoria' => 'nullable',
            'descripcion' => 'nullable',
            'archivo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ajusta las reglas según tus necesidades
            'fecha' => 'nullable',
        ]);

        // Verifica si se ha enviado un nuevo archivo
        if ($request->hasFile('archivo_path')) {
            // Elimina la foto anterior si existe
            if ($sitio->archivo_path) {
                // Utiliza Storage::delete() para eliminar la foto anterior
                Storage::delete('public/' . $sitio->archivo_path);
            }

            // Sube y guarda la nueva foto
            $archivoPath = $request->file('archivo_path')->store('sitiodegobierno', 'public');
            $sitio->archivo_path = $archivoPath;
        }

        // Actualiza los demás campos
        $sitio->update($request->except('archivo_path'));

        return redirect('/sitiodegobierno')->with('success', 'Sitio actualizado exitosamente');
    }






    public function indexTabla()
        {
            $sitios['sitios'] = Sitios::orderBy('created_at', 'asc')->paginate(20);
            return view('sitiodegobierno.tabla', $sitios);
        }



    public function store(Request $request)
    {

      
        $request->validate([
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
            'archivo_path' => 'required|file|mimes:jpeg,jpg,png,gif',
            'url' => 'required|string',
          
        ]);
        
        


        $datosd = $request->except('_token');
        
        
        // Manejo del archivo
        if ($request->hasFile('archivo_path')) {
            $archivoPath = $request->file('archivo_path')->store('sitiodegobierno', 'public');
            $datosd['archivo_path'] = $archivoPath;
        }

        // Otras asignaciones y ajustes según tus necesidades
        $datosd['created_at'] = now();
        $datosd['updated_at'] = now();

        Sitios::insert($datosd);

        return redirect('/sitiodegobierno/create')->with('success', 'Sitio guardado exitosamente');
    }


    public function mostrarImagen($imagen)
    {
        return response()->file(storage_path('app/public/sitiodegobierno/' . $imagen));
        
    }

    public function destroy($id)
{
    $funcionarios = Sitios::findOrFail($id);
    $funcionarios->delete();

    return redirect()->route('sitiodegobierno.vernoticia')->with('success', 'Sitio eliminado exitosamente');
}




}
