<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Introduccion;

class IntroduccionController extends Controller{

    public function index() {
        // Obtén los datos que deseas mostrar en la vista
        $introducciones = Introduccion::latest()->first();
    
        if ($introducciones) {
            // Si encontraste registros, pasa los datos a la vista
            return view('introduccion.index', compact('introducciones'));
        } else {
            // Si no hay registros, puedes manejarlo de alguna manera
            return view('introduccion.create')->with('message', 'No se encontraron introducciones');
        }
    }
        /*$introduccion = Introduccion::latest()->first();
    
        if ($introduccion) {
            return view('edit', compact('introduccion'));
        } else {
            return view('create');
        }*/
    

    public function create() {

    return view('introduccion.create');

    }

    public function store(Request $request) {
        // Valida que la solicitud sea de tipo POST
        if ($request->isMethod('post')) {
            // Valida y guarda los datos en la base de datos
            $request->validate([
                'tag_comentario' => 'required',
                'titulo' => 'required',
                'bajada' => 'required',
                'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            $introduccion = new Introduccion;
            $introduccion->tag_comentario = $request->input('tag_comentario');
            $introduccion->titulo = $request->input('titulo');
            $introduccion->bajada = $request->input('bajada');
            
            if ($request->hasFile('img')) {
                $imagePath = $request->file('img')->store('images', 'public');
                $introduccion->img = $imagePath;
            }

            $introduccion->save();
    
            return redirect('/introducciones');
        }
    }

    public function show($id) {
    // Recupera el registro específico con el ID proporcionado y muestra una vista para verlo
    $introduccion = Introduccion::find($id);
    return view('introduccion.show', compact('introduccion'));

    }

    public function edit($id) {
        $introduccion = Introduccion::find($id);
    
        if (!$introduccion) {
            // Manejo de error si el registro no se encuentra
        }
    
        return view('introduccion.edit', compact('introduccion'));
    }

    public function mostrarImagen($imagen){
        return response()->file(storage_path('app/public/images/' . $imagen));
    }
}
