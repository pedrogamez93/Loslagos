<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstrategiaReg;

class EstrategiasController extends Controller {

    public function index() {
        // Obtén los datos que deseas mostrar en la vista
        $estrategias = EstrategiaReg::latest()->first();
    
        if ($estrategias) {
            // Si encontraste registros, pasa los datos a la vista
            return view('estrategias.index', compact('estrategias'));
        } else {
            // Si no hay registros, puedes manejarlo de alguna manera
            return view('estrategias.create')->with('message', 'No se encontraron datos de "Cómo funciona"');
        }
    }

    public function create() {
        return view('estrategias.create');
    }

    public function store(Request $request) {
        // Valida que la solicitud sea de tipo POST
        if ($request->isMethod('post')) {
            // Valida y guarda los datos en la base de datos
            $request->validate([
                'tag_comentario' => 'required',
                'titulo' => 'required',
                'bajada' => 'required',
                'enlace' => 'required',
                'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            $estrategia = new EstrategiaReg;
            $estrategia->tag_comentario = $request->input('tag_comentario');
            $estrategia->titulo = $request->input('titulo');
            $estrategia->bajada = $request->input('bajada');
            $estrategia->enlace = $request->input('enlace');
            
            if ($request->hasFile('img')) {
                $imagePath = $request->file('img')->store('images', 'public');
                $estrategia->img = $imagePath;
            }

            $estrategia->save();
    
            return redirect('/estrategias');
        }
    }

    public function show($id) {
        $estrategia = EstrategiaReg::find($id);
        if (!$estrategia) {
            // Manejo de error si el registro no se encuentra
        }
        return view('estrategias.show', compact('estrategia'));
    }

    public function edit($id) {
        $estrategias = EstrategiaReg::find($id);
    
        if (!$estrategias) {
            // Manejo de error si el registro no se encuentra
        }
    
        return view('estrategias.edit', compact('estrategias'));
    }

    public function mostrarImagen($imagen){
        return response()->file(storage_path('app/public/images/' . $imagen));
    }
}