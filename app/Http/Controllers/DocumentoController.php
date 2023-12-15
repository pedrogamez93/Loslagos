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
    $documentos['documentos'] = Documento::orderBy('created_at', 'asc')->paginate(2);
    return view('documentos.index', $documentos);
}

    public function create()
    {
        return view('documentos.create');
    }

    
    public function store(Request $request)
    {
      

        $datosd = request()->except('_token');
        if($request->hasFile('archivo_path')){
            $datosd['archivo_path'] = $request->file('archivo_path')->store('documentos','public');

        }

        $datosd['created_at'] = now();
        $datosd['updated_at'] = now();

        Documento::insert($datosd);
        return redirect('/documentos')->with('success', 'Documento guardado exitosamente');
    }

    public function buscar(Request $request)
    {
        $request->validate([
            'categoria' => 'nullable',
            'nombre' => 'nullable',
        ]);

        $categoria = $request->input('categoria');
        $nombre = $request->input('nombre');
       
        $documentos = Documento::where('categoria', $categoria);

        if ($nombre) {
            $documentos = Documento::where('nombre', 'LIKE', "%$nombre%");
        }

        $documentos = $documentos->get();
        

        return view('documentos.resultados', compact('documentos'));
    }
}
