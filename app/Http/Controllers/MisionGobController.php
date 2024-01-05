<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MisionGob;

class MisionGobController extends Controller{

       public function index() {
        // Obtén los datos que deseas mostrar en la vista
        $mision = MisionGob::latest()->first();
    
        if ($mision) {
            // Si encontraste registros, pasa los datos a la vista
            return view('mision.index', compact('mision'));
        } else {
            // Si no hay registros, puedes manejarlo de alguna manera
            return view('mision.create')->with('message', 'No se encontraron datos de "Cómo funciona"');
        }
    }

    public function create() {
        return view('mision.create');
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
    
            $mision = new MisionGob;
            $mision->tag_comentario = $request->input('tag_comentario');
            $mision->titulo = $request->input('titulo');
            $mision->bajada = $request->input('bajada');
            $mision->enlace = $request->input('enlace');
            
            if ($request->hasFile('img')) {
                $imagePath = $request->file('img')->store('images', 'public');
                $mision->img = $imagePath;
            }

            $mision->save();
    
            return redirect('/mision');
        }
    }

    public function show($id) {
        $mision = MisionGob::find($id);
        if (!$mision) {
            // Manejo de error si el registro no se encuentra
        }
        return view('mision.show', compact('mision'));
    }

    public function edit($id) {
        $mision = MisionGob::find($id);
    
        if (!$mision) {
            // Manejo de error si el registro no se encuentra
        }
    
        return view('mision.edit', compact('mision'));
    }

    public function mostrarImagen($imagen){
        return response()->file(storage_path('app/public/images/' . $imagen));
    }
}
