<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sitios;

class SitiosController extends Controller
{
    public function index()
    {
        // Obtén las noticias con paginación
        $sitios = Sitios::paginate(20); // 12 noticias por página, ajusta según tus necesidades
    
        // Retorna la vista con las noticias paginadas
        return view('sitiodegobierno.index', ['sitios' => $sitios]);
    }

    public function create()
    {
        return view('sitiodegobierno.create');
    }

     
    public function store(Request $request)
    {

      
        $request->validate([
            'titulo' => 'required|string',
           
            'descripcion' => 'required|string',
            'archivo_path' => 'required|file|mimes:jpeg,jpg,png,gif',
          
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

        return redirect('/sitiodegobierno/create')->with('success', 'Documento guardado exitosamente');
    }


    public function mostrarImagen($imagen)
    {
        return response()->file(storage_path('app/public/sitiodegobierno/' . $imagen));
    }

}
