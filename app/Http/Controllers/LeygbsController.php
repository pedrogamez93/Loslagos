<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Ley;

class LeygbsController extends Controller {

    public function index() {
                // Obtén los datos que deseas mostrar en la vista
                $ley = Ley::latest()->first();
    
                if ($ley) {
                    // Si encontraste registros, pasa los datos a la vista
                    return view('leygobiernoregional.index', compact('ley'));
                } else {
                    // Si no hay registros, puedes manejarlo de alguna manera
                    return view('leygobiernoregional.index')->with('message', 'No se encontraron datos de "Cómo funciona"');
                }
    
    }

    public function create() {
        return view('leygobiernoregional.create');
    }

    public function store(Request $request) {
               $data = $request->validate([
                    'tipo_norma' => 'required',
                    'fecha_publicacion' => 'required|date',
                    'fecha_promulgacion' => 'required|date',
                    'organismo' => 'required',
                    'titulo' => 'required',
                    'tipo_version' => 'required',
                    'inicio_vigencia' => 'required|date',
                    'enlacedoc' => 'required|file|mimes:pdf',
                    'url' => 'required', // Campo 'url' debe ser una URL válida
                ]);
    
        // Almacena el archivo PDF en la carpeta 'storage/app/public/documentos'
        if ($request->hasFile('enlacedoc')) { 
            $pdfPath = $request->file('enlacedoc')->store('documentos', 'public');
            // Genera la URL pública para acceder al archivo
            $pdfUrl = Storage::url($pdfPath);
        }

        // Guarda los datos en la base de datos
        $ley = new Ley; // Usar el modelo Ley
        $ley->tipo_norma = $request->input('tipo_norma');
        $ley->fecha_publicacion = $request->input('fecha_publicacion');
        $ley->fecha_promulgacion = $request->input('fecha_promulgacion');
        $ley->organismo = $request->input('organismo');
        $ley->titulo = $request->input('titulo');
        $ley->tipo_version = $request->input('tipo_version');
        $ley->inicio_vigencia = $request->input('inicio_vigencia');
        $ley->url = $request->input('url'); // Almacena la URL ingresada
        $ley->enlacedoc = $pdfUrl; // Almacena la URL pública del archivo PDF
        $ley->save();
    
        // Redirecciona a la página de éxito o a donde desees después de guardar los datos.
        return redirect('/leygobiernoregional'); 

  }
}