<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InversionPublicas;

class InversionesPublicController extends Controller
{
    public function index() {
        // Obtén los datos que deseas mostrar en la vista
        $inversiones = InversionPublicas::latest()->first();
    
        if ($inversiones) {
            // Si encontraste registros, pasa los datos a la vista
            return view('inversion.index', compact('inversiones'));
        } else {
            // Si no hay registros, puedes manejarlo de alguna manera
            return view('inversion.index')->with('message', 'No se encontraron datos de "Cómo funciona"');
        }
    }

    public function create() {
        return view('inversion.create');
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
    
            $inversiones = new InversionPublicas;
            $inversiones->tag_comentario = $request->input('tag_comentario');
            $inversiones->titulo = $request->input('titulo');
            $inversiones->bajada = $request->input('bajada');
            $inversiones->enlace = $request->input('enlace');
            
            if ($request->hasFile('img')) {
                $imagePath = $request->file('img')->store('images', 'public');
                $inversiones->img = $imagePath;
            }

            $inversiones->save();
    
            return redirect('/inversion');
        }
    }

    public function show($id) {
        $inversiones = InversionPublicas::find($id);
        if (!$inversiones) {
            // Manejo de error si el registro no se encuentra
        }
        return view('inversion.show', compact('inversiones'));
    }

    public function edit($id) {
        $inversiones = InversionPublicas::find($id);
    
        if (!$inversiones) {
            // Manejo de error si el registro no se encuentra
        }
    
        return view('inversion.edit', compact('inversiones'));
    }
}
