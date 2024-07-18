<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsejoRegional;
use App\Models\Seccion;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ConcejoRegionalController extends Controller{

    public function index(){
        // Obtener el último registro de ConsejoRegional
        $concejo = ConsejoRegional::latest()->first();
    
        if ($concejo) {
            // Si hay un concejo, cargar sus secciones
            $concejo->load('secciones');
    
            return view('concejoregional.index', compact('concejo'));
        } else {
            // No hay concejos disponibles, redirigir a la creación
            return redirect()->route('concejoregional.create')->with('message', 'No hay comités disponibles. Puedes crear uno nuevo.');
        }
    }

    public function create()
    {
        return view('concejoregional.create');
    }

    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'tag_comentario' => 'nullable|string',
            'titulo' => 'string|max:255',
            'bajada' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'titulo_seccion.*' => 'nullable|string|max:255',
            'bajada_seccion.*' => 'nullable|string',
            'img_seccion.*.imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Otras reglas de validación
        ]);

        // Crear un nuevo consejo regional
        $consejoRegional = ConsejoRegional::create([
            'tag_comentario' => $request->input('tag_comentario'),
            'titulo' => $request->input('titulo'),
            'bajada' => $request->input('bajada'),
            'img' => $request->file('img') ? $request->file('img')->store('imagesConcejo', 'public') : null,
        ]);

        // Crear las secciones asociadas
        if ($request->has('img_seccion')) {
            foreach ($request->file('img_seccion') as $index => $file) {
                // Verificar si hay archivos en la subsección actual
                if ($file->isValid()) {
                    $seccionData = [
                        'titulo_seccion' => $request->input('titulo_seccion')[$index] ?? null,
                        'bajada_seccion' => $request->input('bajada_seccion')[$index] ?? null,
                        'img_seccion' => $file->store('imagesConcejo', 'public'),
                    ];

                    $consejoRegional->secciones()->create($seccionData);
                }
            }
        }

        return redirect()->route('concejoregional.index')->with('success', 'Consejo Regional creado exitosamente.');   
    
    }

    public function edit($concejoId)
    {
        $concejo = ConsejoRegional::findOrFail($concejoId);
        return view('concejoregional.edit', compact('concejo'));
    }

    public function editarSeccion($seccionId)
    {
        $seccion = Seccion::findOrFail($seccionId);
        return view('concejoregional.editarseccion', compact('seccion'));
    }

    public function update(Request $request, $concejoId)
    {
        // Validación
        $request->validate([
            'tag_comentario' => 'nullable|string',
            'titulo' => 'required|string|max:255',
            'bajada' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Actualizar los datos principales del Consejo Regional
        $consejoRegional = ConsejoRegional::find($concejoId);
        
        if (!$consejoRegional) {
            abort(404, 'Consejo Regional no encontrado');
        }
        
        // Si hay una nueva imagen, eliminar la antigua y almacenar la nueva
        if ($request->hasFile('img')) {
            // Eliminar la imagen antigua si existe
            if ($consejoRegional->img) {
                Storage::delete('public/' . $consejoRegional->img);
            }
            // Guardar la nueva imagen
            $consejoRegional->img = $request->file('img')->store('imagesConcejo', 'public');
        }
    
        // Actualizar los demás campos
        $consejoRegional->update([
            'tag_comentario' => $request->input('tag_comentario'),
            'titulo' => $request->input('titulo'),
            'bajada' => $request->input('bajada'),
        ]);
    
        // Guardar los cambios en la base de datos
        $consejoRegional->save();
    
        return redirect()->route('concejoregional.index')->with('success', 'Consejo Regional actualizado exitosamente.');
    }
    
    public function updateSeccion(Request $request, $seccionId)
    {
        // Validación específica para la sección
        $request->validate([
            'titulo_seccion' => 'required|string|max:255',
            'bajada_seccion' => 'nullable|string',
            'img_seccion' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Buscar la sección y actualizarla
        $seccion = Seccion::findOrFail($seccionId);
        
        // Si hay una nueva imagen, eliminar la antigua y almacenar la nueva
        if ($request->hasFile('img_seccion')) {
            // Eliminar la imagen antigua si existe
            if ($seccion->img_seccion) {
                Storage::delete('public/' . $seccion->img_seccion);
            }
            // Guardar la nueva imagen
            $seccion->img_seccion = $request->file('img_seccion')->store('seccion_images', 'public');
        }
    
        // Actualizar los demás campos
        $seccion->update([
            'titulo_seccion' => $request->input('titulo_seccion'),
            'bajada_seccion' => $request->input('bajada_seccion'),
        ]);
    
        // Guardar los cambios en la base de datos
        $seccion->save();
    
        return redirect()->route('concejoregional.index')->with('success', 'Sección actualizada exitosamente.');
    }

    public function deleteSeccion($concejoId, $seccionId)
    {
        // Validación de datos, si es necesario
        dd($concejoId, $seccionId);
        // Buscar la sección
        $seccion = Seccion::findOrFail($seccionId);

        // Eliminar la imagen asociada, si existe
        if ($seccion->img_seccion) {
            Storage::disk('public')->delete($seccion->img_seccion);
        }

        // Eliminar la sección
        $seccion->delete();

        // Puedes redireccionar o enviar una respuesta JSON según tu necesidad
        return response()->json(['message' => 'Sección eliminada exitosamente.']);
    }

    public function show($id)
    {
        // Puedes dejar el método vacío o redireccionar a otra página si es necesario
        return redirect()->route('concejoregional.index');
    }

    public function mostrarImagen($img){
        return response()->file(storage_path('app/public/imagesConcejo/' . $img));
    }

}
