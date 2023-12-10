<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Documento;
use League\CommonMark\Node\Block\Document;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = Documento::all();
        return view('documentos.index', compact('documentos'));
    }

    public function create()
    {
        return view('documentos.create');
    }

    
    public function store(Request $request)
    {
       /* $request->validate([
            'nombre' => 'required',
            'categoria' => 'required',
            'archivo' => 'required|mimes:pdf,doc,docx|max:2048', // Ajusta los tipos de archivo y el tamaño según tus necesidades
        ]);

        // Guardar el archivo
        $archivoPath = $request->file('archivo')->store('archivos_documentos');

        // Crear el documento en la base de datos
        Documento::create([
            'nombre' => $request->input('nombre'),
            'categoria' => $request->input('categoria'),
            'archivo_path' => $archivoPath,
        ]);

        return redirect('/documentos')->with('success', 'Documento guardado exitosamente'); */

        $datosd = request()->except('_token');
        if($request->hasFile('archivo_path')){
            $datosd['archivo_path'] = $request->file('archivo_path')->store('documentos','public');

        }
        Documento::insert($datosd);
        return redirect('/documentos')->with('success', 'Documento guardado exitosamente');
    }
}
