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
public function indexTabla()
{
    $documentos['documentos'] = Documento::orderBy('created_at', 'asc')->paginate(20);
    return view('documentos.tabladocumentos', $documentos);
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

    public function edit($id)
    {
        $documento = Documento::findOrFail($id);
        // Puedes necesitar cargar otras cosas según tus necesidades
        return view('documentos.edit', compact('documento'));
    }

     public function update(Request $request, $id)
    {
        $documento = Documento::findOrFail($id);

        // Valida y actualiza los campos según tu modelo
        $request->validate([
            'nombre' => 'required',
            // Agrega otras reglas de validación según tus necesidades
        ]);

        $documento->update($request->all());

        return redirect('/documentos')->with('success', 'Documento actualizado exitosamente');
    }

    public function destroy($id)
    {
        $documento = Documento::findOrFail($id);
        $documento->delete();

        return redirect()->route('documentos.verdocumentos')->with('success', 'Documento eliminado exitosamente');
    }
}
