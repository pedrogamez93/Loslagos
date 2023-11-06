<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DptoGestionPersonas;
use App\Models\DocGestionPersonas;

class DptoGestionPersonasController extends Controller{

    public function index()
    {
        $ultimoDepartamento = DptoGestionPersonas::latest()->first();
        $documentosUltimoDepartamento = $ultimoDepartamento ? $ultimoDepartamento->documentos : collect();
        $documentosTodos = DocGestionPersonas::all(); // Obtener todos los documentos
    
        return view('dptogestionpersonas.index', [
            'departamento' => $ultimoDepartamento,
            'documentosUltimoDepartamento' => $documentosUltimoDepartamento,
            'documentosTodos' => $documentosTodos,
        ]);
    }

    public function create()
    {
        return view('dptogestionpersonas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'bajada' => 'required',
            'documentos.*' => 'file|mimes:pdf,doc,docx', // Puedes ajustar los tipos de archivo permitidos
            'nombres.*' => 'required', // Validación para los nombres
        ]);
    
        $departamento = DptoGestionPersonas::create([
            'titulo' => $request->input('titulo'),
            'bajada' => $request->input('bajada'),
        ]);
    
        if ($request->hasFile('documentos')) {
            $documentos = $request->file('documentos');
            $nombres = $request->input('nombres');
    
            foreach ($documentos as $key => $documento) {
                $path = $documento->store('public/documentos/dptogestionpersonas');
                $nombre = $nombres[$key]; // Obtenemos el nombre correspondiente
    
                $departamento->documentos()->create([
                    'ruta' => $path,
                    'nombre' => $nombre, // Guardamos el nombre del documento
                ]);
            }
        }
    
        return redirect()->route('dptogestionpersonas.index');
    }

    public function show($id)
    {
        $departamento = DptoGestionPersonas::with('documentos')->find($id);
        $documentos = $departamento->documentos;
    
        return view('dptogestionpersonas.show', ['departamento' => $departamento, 'documentos' => $documentos]);
    }
}