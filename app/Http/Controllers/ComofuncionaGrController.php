<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComofuncionaGr;

class ComofuncionaGrController extends Controller
{
    public function index() {
        // Obtén el último registro de ComofuncionaGr
        $comofunciona = ComofuncionaGr::latest()->first();
    
        if (!$comofunciona) {
            // Si no hay registros, redirige a la vista de creación
            return redirect()->route('comofunciona.create')->with('message', 'No se encontraron datos de "Cómo funciona"');
        }
    
        // Si hay registros, pasa los datos a la vista
        return view('comofunciona.index', compact('comofunciona'));
    }

    public function create() {
        return view('comofunciona.create');
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
    
            $comofunciona = new ComofuncionaGr;
            $comofunciona->tag_comentario = $request->input('tag_comentario');
            $comofunciona->titulo = $request->input('titulo');
            $comofunciona->bajada = $request->input('bajada');
            
            if ($request->hasFile('img')) {
                $imagePath = $request->file('img')->store('images', 'public');
                $comofunciona->img = $imagePath;
            }

            $comofunciona->save();
    
            return redirect('/comofuncionagrs');
        }
    }

    public function show($id) {
        // Recupera el registro específico con el ID proporcionado y muestra una vista para verlo
        $comofunciona = ComofuncionaGr::find($id);
        return view('comofuncionagrs.show', compact('comofunciona'));
    }

    public function edit($id) {
        $comofunciona = ComofuncionaGr::find($id);
    
        if (!$comofunciona) {
            // Manejo de error si el registro no se encuentra
        }
    
        return view('comofuncionagrs.edit', compact('comofunciona'));
    }

    public function mostrarImagen($imagen){
        return response()->file(storage_path('app/public/images/' . $imagen));
    }
}