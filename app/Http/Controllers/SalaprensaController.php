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
            $archivoPath = $request->file('archivo_path')->store('salaprensa', 'public');
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
            $saladeprensa['saladeprensa'] = Salaprensa::orderBy('created_at', 'asc')->paginate(20);
            return view('salaprensa.tabla', $saladeprensa);
        }



    public function mostrarImagen($imagen)
    {
        return response()->file(storage_path('app/public/salaprensa/' . $imagen));
    }

    public function edit($id)
    {
        $noticias = Salaprensa::findOrFail($id);
        // Puedes necesitar cargar otras cosas según tus necesidades
        return view('salaprensa.edit', compact('noticias'));
    }

    public function update(Request $request, $id)   
    {
        $sitio = Salaprensa::findOrFail($id);

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
            $archivoPath = $request->file('archivo_path')->store('saladeprensa', 'public');
            $sitio->archivo_path = $archivoPath;
        }

        // Actualiza los demás campos
        $sitio->update($request->except('archivo_path'));

        return redirect('/saladeprensa')->with('success', 'Noticia actualizado exitosamente');
    }


    public function destroy($id)
    {
        $Salaprensa = Salaprensa::findOrFail($id);
        $Salaprensa->delete();
    
        return redirect()->route('salaprensa.vernoticia')->with('success', 'Noticia eliminada exitosamente');
    }
    


}
