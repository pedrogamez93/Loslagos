<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salaprensa;

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
            $archivoPath = $request->file('archivo_path')->store('salaprensa', 'public');
            $datosd['archivo_path'] = $archivoPath;
        }

        // Otras asignaciones y ajustes según tus necesidades
        $datosd['created_at'] = now();
        $datosd['updated_at'] = now();

        Salaprensa::insert($datosd);

        return redirect('/saladeprensa/create')->with('success', 'Documento guardado exitosamente');
    }


    public function mostrarImagen($imagen)
    {
        return response()->file(storage_path('app/public/salaprensa/' . $imagen));
    }

}
