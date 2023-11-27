<?php

namespace App\Http\Controllers;

use App\Models\AsambleaClimatica;
use App\Models\AsambleaClimaticaDocs;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AsambleaClimaticaController extends Controller
{
    public function index()
    {
        $asamblea = AsambleaClimatica::latest()->first();
    
        if ($asamblea) {
            $documentos = $asamblea->documentos;
            return view('asambleaclimatica.index', compact('asamblea', 'documentos'));
        } else {
            return view('asambleaclimatica.index')->with('message', 'No hay asambleas disponibles.');
        }
    }

    public function create()
    {
        return view('asambleaclimatica.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo_one' => 'required|string|max:255',
            'descripcion_one' => 'nullable|string',
            'titulo_two' => 'nullable|string',
            'descripcion_two' => 'nullable|string',
            'titulo_tree' => 'nullable|string',
            'descripcion_tree' => 'nullable|string',
            'titulo_four' => 'nullable|string',
            'descripcion_four' => 'nullable|string',
            'titulo_five' => 'nullable|string',
            'descripcion_five' => 'nullable|string',
            'titulo_six' => 'nullable|string',
            'descripcion_six' => 'nullable|string',
            'titulo_seccion_two' => 'nullable|string',
        ]);

        // Crear el trámite incluso si algunos campos están vacíos
            $nuevoAsamblea = AsambleaClimatica::create([
                    'titulo_one' => $request->input('titulo_one'),
                    'descripcion_one' => $request->input('descripcion_one'),
                    'titulo_two' => $request->input('titulo_two'),
                    'descripcion_two' => $request->input('descripcion_two'),
                    'titulo_tree' => $request->input('titulo_tree'),
                    'descripcion_tree' => $request->input('descripcion_tree'),
                    'titulo_four' => $request->input('titulo_four'),
                    'descripcion_four' => $request->input('descripcion_four'),
                    'titulo_five' => $request->input('titulo_five'),
                    'descripcion_five' => $request->input('descripcion_five'),
                    'titulo_six' => $request->input('titulo_six'),
                    'descripcion_six' => $request->input('descripcion_six'),
                    'titulo_seccion_two' => $request->input('titulo_seccion_two'),
            ]);

            try {
                // Procesar documentos (individuales y comprimidos)
                $documentos = $request->file('ruta_documento');
                $nombresDocumentos = $request->input('nombre_documento') ?? [];
        
                foreach ($documentos ?? [] as $key => $documento) {
                    $nombreDocumento = $nombresDocumentos[$key] ?? 'documento_' . ($key + 1);
                    $rutaDocumento = $documento->store('documentosasamblea');
        
                    // Almacena en la base de datos
                    AsambleaClimaticaDocs::create([
                        'asamblea_climaticas_id' => $nuevoAsamblea->id,
                        'nombre_documento' => $nombreDocumento,
                        'ruta_documento' => $rutaDocumento,
                    ]);
                }
            } catch (\Exception $e) {
                // Manejar la excepción, por ejemplo, registrar un mensaje en los logs
                \Log::error('Error al procesar documentos: ' . $e->getMessage());
            }

            return redirect()->route('asambleaclimatica.index');
    }

    public function show($id)
    {
        $asamblea = AsambleaClimatica::findOrFail($id);
        return view('asambleaclimatica.show', compact('asamblea'));
    }

    public function edit($id)
    {
        // Lógica para obtener los datos de la asamblea con el ID proporcionado
        $asamblea = AsambleaClimatica::findOrFail($id);
    
        // Pasa los datos a la vista de edición
        return view('asambleaclimatica.edit', compact('asamblea'));
    }
    
    public function update(Request $request, $id)
    {
        // Validar y actualizar los datos del formulario
        $request->validate([
            // Agrega reglas de validación según tus necesidades
            'titulo_one' => 'required',
            'descripcion_one' => 'nullable|string',
            'titulo_two' => 'nullable|string',
            'descripcion_two' => 'nullable|string',
            'titulo_tree' => 'nullable|string',
            'descripcion_tree' => 'nullable|string',
            'titulo_four' => 'nullable|string',
            'descripcion_four' => 'nullable|string',
            'titulo_five' => 'nullable|string',
            'descripcion_five' => 'nullable|string',
            'titulo_six' => 'nullable|string',
            'descripcion_six' => 'nullable|string',
            'titulo_seccion_two' => 'nullable|string',
        ]);
    
        // Lógica para actualizar los datos en la base de datos
        $asamblea = AsambleaClimatica::findOrFail($id);
        $asamblea->update([
            'titulo_one' => $request->input('titulo_one'),
            'descripcion_one' => $request->input('descripcion_one'),
            'titulo_two' => $request->input('titulo_two'),
            'descripcion_two' => $request->input('descripcion_two'),
            'titulo_tree' => $request->input('titulo_tree'),
            'descripcion_tree' => $request->input('descripcion_tree'),
            'titulo_four' => $request->input('titulo_four'),
            'descripcion_four' => $request->input('descripcion_four'),
            'titulo_five' => $request->input('titulo_five'),
            'descripcion_five' => $request->input('descripcion_five'),
            'titulo_six' => $request->input('titulo_six'),
            'descripcion_six' => $request->input('descripcion_six'),
            'titulo_seccion_two' => $request->input('titulo_seccion_two'),
        ]);
    
        // Redirecciona a la vista index
        return redirect()->route('asambleaclimatica.index')->with('success', 'Asamblea actualizada exitosamente');
    }

    public function destroy($id)
    {
        $asamblea = AsambleaClimatica::findOrFail($id);
        $asamblea->delete();
        return redirect()->route('asambleaclimatica.index');
    }
}
