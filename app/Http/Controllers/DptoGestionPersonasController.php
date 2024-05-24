<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Models\DptoGestionPersonas;
use App\Models\DocGestionPersonas;

class DptoGestionPersonasController extends Controller{

    public function index()
    {
        $ultimoDepartamento = DptoGestionPersonas::latest()->first();
    
        // Comprobar si existe el último departamento
        if ($ultimoDepartamento) {
            $documentosUltimoDepartamento = $ultimoDepartamento->documentos;
            $documentosTodos = DocGestionPersonas::all(); // Obtener todos los documentos
    
            return view('dptogestionpersonas.index', [
                'departamento' => $ultimoDepartamento,
                'documentosUltimoDepartamento' => $documentosUltimoDepartamento,
                'documentosTodos' => $documentosTodos,
            ]);
        } else {
            // Si no hay departamentos, redirigir a la vista de creación
            return redirect()->route('dptogestionpersonas.create');
        }
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
                $path = $documento->store('public/documentos');
                $nombre = $nombres[$key]; // Obtenemos el nombre correspondiente
    
                $departamento->documentos()->create([
                    'ruta' => $path,
                    'nombre' => $nombre, // Guardamos el nombre del documento
                ]);
            }
        }
    
        return redirect()->route('dptogestionpersonas.index');
    }

    public function edit($id)
    {
        // Buscar el departamento por ID
        $departamento = DptoGestionPersonas::findOrFail($id);
    
        // Obtener los documentos asociados al departamento, si es necesario
        $documentos = $departamento->documentos; // Asegúrate de que esta línea esté obteniendo los datos correctamente
    
        // Pasar los datos a la vista
        return view('dptogestionpersonas.edit', compact('departamento', 'documentos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'bajada' => 'required',
            'documentos.*' => 'file|mimes:pdf,doc,docx', // Puedes ajustar los tipos de archivo permitidos
            
        ]);

        $departamento = DptoGestionPersonas::findOrFail($id);
        $departamento->update([
            'titulo' => $request->input('titulo'),
            'bajada' => $request->input('bajada'),
        ]);

        if ($request->hasFile('documentos')) {
            // Eliminar o manejar documentos antiguos si es necesario

            $documentos = $request->file('documentos');
            $nombres = $request->input('nombres');

            foreach ($documentos as $key => $documento) {
                $path = $documento->store('public/documentos');
                $nombre = $nombres[$key]; // Obtenemos el nombre correspondiente

                // Aquí, en lugar de crear, puedes querer actualizar o crear nuevos registros
                $departamento->documentos()->updateOrCreate(
                    ['nombre' => $nombre], // clave para buscar
                    ['ruta' => $path, 'nombre' => $nombre] // datos a actualizar o crear
                );
            }
        }

        return redirect()->route('dptogestionpersonas.index');
    }

    /*public function show($id)
    {
        $departamento = DptoGestionPersonas::with('documentos')->find($id);
        $documentos = $departamento->documentos;
    
        return view('dptogestionpersonas.show', ['departamento' => $departamento, 'documentos' => $documentos]);
    }*/

    public function deleteDocumento($dptogestionpersona, $documentoId)
    {
        // Encuentra el documento específico y elimínalo
        $documento = DocGestionPersonas::find($documentoId);
        if ($documento) {
            Storage::delete($documento->ruta); // Asegúrate de que esta ruta sea correcta
            $documento->delete();
            return back()->with('success', 'Documento eliminado con éxito.');
        } else {
            return back()->with('error', 'Documento no encontrado.');
        }
    }

    public function deleteDepartamento($departamentoId)
    {
        $departamento = DptoGestionPersonas::with('documentos')->findOrFail($departamentoId);

        // Eliminar documentos asociados, si existen
        foreach ($departamento->documentos as $documento) {
            Storage::delete($documento->ruta); // Eliminar archivo físico
            $documento->delete(); // Eliminar registro del documento
        }

        // Eliminar el registro del departamento
        $departamento->delete();

        return redirect()->route('dptogestionpersonas.create')->with('success', 'Departamento eliminado con éxito.');
    }
}