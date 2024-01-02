<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organigramas;

class OrganigramaController extends Controller
{
    public function index() {
        // Obtén los datos que deseas mostrar en la vista
        $organigrama = Organigramas::latest()->first();
    
        if ($organigrama) {
            // Si encontraste registros, pasa los datos a la vista
            return view('organigrama.index', compact('organigrama'));
        } else {
            // Si no hay registros, puedes manejarlo de alguna manera
            return view('organigrama.index')->with('message', 'No se encontraron datos de "Cómo funciona"');
        }
    }

    public function create() {
        return view('organigrama.create');
    }

    public function store(Request $request) {
        // Valida que la solicitud sea de tipo POST
        if ($request->isMethod('post')) {
            // Valida y guarda los datos en la base de datos
            $request->validate([
                'titulo' => 'required',
                'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            $organigrama = new Organigramas;
            $organigrama->titulo = $request->input('titulo');
            
            if ($request->hasFile('img')) {
                $imagePath = $request->file('img')->store('images', 'public');
                $organigrama->img = $imagePath;
            }

            $organigrama->save();
    
            return redirect('/organigrama');
        }
    }

    public function mostrarImagen($imagen){
        return response()->file(storage_path('app/public/images/' . $imagen));
    }
}
