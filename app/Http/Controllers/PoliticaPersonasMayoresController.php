<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PoliticaPersonasMayores;
use App\Models\PoliticaPersonasMayoresDocs;

class PoliticaPersonasMayoresController extends Controller
{
    public function index()
    {
        $ultimoRegistro = PoliticaPersonasMayores::latest()->first();
    
        // Asegúrate de verificar si existe un registro antes de intentar acceder a sus documentos
        $docs = $ultimoRegistro ? $ultimoRegistro->documentos : collect();
    
        return view('politicapersonasmayores.index', compact('ultimoRegistro', 'docs'));
    }

    public function create()
    {
        return view('politicapersonasmayores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'bajada' => 'required',
            'urldocs.*' => 'file|mimes:pdf,doc,docx',
            'nombredocs.*' => 'required',
        ]);
    
        // Crear la política de personas mayores
        $politica = PoliticaPersonasMayores::create([
            'titulo' => $request->input('titulo'),
            'bajada' => $request->input('bajada'),
        ]);
    
        if ($request->hasFile('urldocs')) {
            $urldocs = $request->file('urldocs');
            $nombres = $request->input('nombredocs');
    
            foreach ($urldocs as $key => $documento) {
                $path = $documento->store('public/documentosPersMayo');
                $nombre = $nombres[$key]; // Obtenemos el nombre correspondiente
    
                $politica->documentos()->create([
                    'nombredocs' => $nombre,
                    'urldocs' => $path,
                ]);
            }
        }
    
        return redirect()->route('politicapersonasmayores.index')->with('success', 'Política creada correctamente.');
    }

    public function edit($id)
    {
        // Obtén el registro de PoliticaPersonasMayores con el ID proporcionado
        $ultimoRegistro = PoliticaPersonasMayores::findOrFail($id);
    
        // Verifica si el registro existe
        if ($ultimoRegistro) {
            // Obtén los documentos relacionados
            $docs = $ultimoRegistro->documentos;
    
            return view('politicapersonasmayores.edit', compact('ultimoRegistro', 'docs'));
        } else {
            // No hay registro con el ID proporcionado, puedes manejar esto según tus necesidades
            return view('politicapersonasmayores.edit')->with('message', 'No se encontró el registro con el ID proporcionado.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'bajada' => 'required',
            'urldocs.*' => 'file|mimes:pdf,doc,docx',
            'nombredocs.*' => 'required',
        ]);
    
        // Buscar la política existente por su ID
        $politica = PoliticaPersonasMayores::findOrFail($id);
    
        // Actualizar los campos de la política
        $politica->update([
            'titulo' => $request->input('titulo'),
            'bajada' => $request->input('bajada'),
        ]);
    
        // Procesar documentos existentes
        if ($request->hasFile('urldocs')) {
            $urldocs = $request->file('urldocs');
            $nombres = $request->input('nombredocs');
    
            foreach ($urldocs as $key => $documento) {
                $path = $documento->store('public/documentosPersMayo');
                $nombre = $nombres[$key];
    
                $politica->documentos()->create([
                    'nombredocs' => $nombre,
                    'urldocs' => $path,
                ]);
            }
        }
    
        return redirect()->route('politicapersonasmayores.index')->with('success', 'Política actualizada correctamente.');
    }
}