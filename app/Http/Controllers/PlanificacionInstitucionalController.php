<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlanificacionInstitucional;

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
        $data = $request->validate([
            'titulo' => 'required',
            'urldocs.*' => 'file|mimes:pdf,doc,docx',
        ]);

        if ($request->hasFile('urldocs')) {
            $urlPath = $request->file('urldocs')->store('documentosPlanificacionIn');
            $data['urldocs'] = $urlPath;
        }
                // Almacena en la base de datos
                PlanificacionInstitucional::create($data);


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
