<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Ley;

class LeygbsController extends Controller {

    public function index() {
        return view('leygobiernoregional.index');
    }

    public function create() {
        return view('leygobiernoregional.create');
    }

    public function store(Request $request) {
        if ($request->isMethod('post')) {
                $request->validate([
                    'tipo_norma' => 'required',
                    'fecha_publicacion' => 'required|date',
                    'fecha_promulgacion' => 'required|date',
                    'organismo' => 'required',
                    'titulo' => 'required',
                    'tipo_version' => 'required',
                    'fecha_vigencia' => 'required|date',
                    'enlacedoc' => 'required|file|mimes:pdf',
                    'url' => 'required|url', // Campo 'url' debe ser una URL válida
                ]);
    
        // Almacena el archivo PDF en la carpeta 'storage/app/public/documentos'
        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf')->store('public/documentos');
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
        $ley->fecha_vigencia = $request->input('fecha_vigencia');
        $ley->url = $request->input('url'); // Almacena la URL ingresada
        $ley->enlacedoc = $pdfUrl; // Almacena la URL pública del archivo PDF
        $ley->save();
    
        // Redirecciona a la página de éxito o a donde desees después de guardar los datos.
        return redirect('/leygobiernoregional');
    
    }

  }
}