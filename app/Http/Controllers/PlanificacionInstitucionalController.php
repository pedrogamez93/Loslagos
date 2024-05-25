<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlanificacionInstitucional;
use Illuminate\Support\Facades\Log;

class PlanificacionInstitucionalController extends Controller
{
    public function index()
    {
        $planificacion = PlanificacionInstitucional::all();
        if ($planificacion->isNotEmpty()) {
            return view('listplanificainstitucional.show', compact('planificacion'));
        } else {
            return view('listplanificainstitucional.create', compact('planificacion'));
           
        }
           
    }

    public function create()
    {
        return view('listplanificainstitucional.create');
    }

    public function edit($id)
    {
        $planificacion = PlanificacionInstitucional::find($id);
        return view('listplanificainstitucional.edit', compact('planificacion'));
    }

    public function store(Request $request)
    {
        \Log::info('Inicio del método store');
        $data = $request->validate([
            'titulo' => 'required',
            'urldocs.*' => 'file|mimes:pdf,doc,docx',
        ]);
    
        if ($request->hasFile('urldocs')) {
            \Log::info('Archivo recibido: ' . $request->file('urldocs')->getClientOriginalName());
    
            try {
                $urlPath = $request->file('urldocs')->store('documentosPlanificacionIn');
                \Log::info('Archivo guardado en: ' . $urlPath);
                $data['urldocs'] = $urlPath;
            } catch (\Exception $e) {
                \Log::error('Error al guardar el archivo: ' . $e->getMessage());
            }
        } else {
            \Log::error('No se recibió ningún archivo.');
        }
    
        // Almacena en la base de datos
        try {
            PlanificacionInstitucional::create($data);
            \Log::info('Datos guardados en la base de datos');
        } catch (\Exception $e) {
            \Log::error('Error al guardar los datos en la base de datos: ' . $e->getMessage());
        }
    
        return redirect(route('listplanificainstitucional.index'))->with('success', 'Artículo creado con éxito');
    }

    public function show(PlanificacionInstitucional $planificacion)
    {
        $planificacion = PlanificacionInstitucional::all();
        return view('listplanificainstitucional.show', compact('planificacion'));
    }

    public function destroy($id)
    {
        $planificacion = PlanificacionInstitucional::find($id);
    
        if ($planificacion) {
            $planificacion->delete();
            return redirect()->route('listplanificainstitucional.index')->with('success', 'Artículo eliminado con éxito');
        } else {
            return redirect()->route('listplanificainstitucional.index')->with('error', 'Artículo no encontrado');
        }
    }
}
