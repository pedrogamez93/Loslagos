<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biblioteca;

class BibliotecaController extends Controller
{
    public function index()
    {
        $biblioteca = Biblioteca::all();
        if ($biblioteca->isNotEmpty()) {
            return view('biblioteca.index', compact('biblioteca'));
        } else {
            return view('biblioteca.create', compact('biblioteca'));
           
        }
           
    }

    public function create()
    {
        return view('biblioteca.create');
    }

    public function edit($id)
    {
        $planificacion = Biblioteca::find($id);
        return view('biblioteca.edit', compact('biblioteca'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required',
            'urldocs.*' => 'file|mimes:pdf,doc,docx',
        ]);

        if ($request->hasFile('urldocs')) {
            $urlPath = $request->file('urldocs')->store('documentosbiblioteca');
            $data['urldocs'] = $urlPath;
        }
                // Almacena en la base de datos
                Biblioteca::create($data);


        return redirect(route('biblioteca.index'))->with('success', 'Artículo creado con éxito');
    }

    public function show(Biblioteca $biblioteca)
    {
        $biblioteca = Biblioteca::all();
        return view('biblioteca.show', compact('biblioteca'));
    }

    public function destroy($id)
    {
        $biblioteca = Biblioteca::find($id);
    
        if ($biblioteca) {
            $biblioteca->delete();
            return redirect()->route('biblioteca.index')->with('success', 'Artículo eliminado con éxito');
        } else {
            return redirect()->route('biblioteca.index')->with('error', 'Artículo no encontrado');
        }
    }
}
