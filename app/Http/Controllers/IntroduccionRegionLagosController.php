<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IntroduccionRegionLagos;

class IntroduccionRegionLagosController extends Controller
{
    //
    public function index()
    {
        $articulo = IntroduccionRegionLagos::all();
        if ($articulo->isNotEmpty()) {
            // La consulta devolvió al menos un registro
            $primerArticulo = $articulo->first();
            $id = $primerArticulo->id;
            $articulo = IntroduccionRegionLagos::find($id);
            return view('IntroduccionRegionLagos.edit', compact('articulo'));
            
        } else {
            // La consulta no devolvió ningún registro
            return view('IntroduccionRegionLagos.create');
        }
    }
    

    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required',
            'subtitulo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'image|max:2048',
        ]);
    
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('images', 'public');
            $data['imagen'] = $imagenPath;
        }
    
        IntroduccionRegionLagos::create($data);
    
        return redirect(route('IntroduccionRegionLagos.index'))->with('success', 'Artículo creado con éxito');
    }
    public function show(IntroduccionRegionLagos $articulo)
    {
        
        return view('show', compact('articulo'));
    }
    
        public function edit($id)
        {
            $articulo = IntroduccionRegionLagos::find($id);
            return view('edit', compact('articulo'));
        }
    
        public function update(Request $request, $id)
        {
            $data = $request->validate([
                'titulo' => 'required',
                'subtitulo' => 'required',
                'descripcion' => 'required',
                'imagen' => 'image|max:2048',
            ]);
        
            $articulo = IntroduccionRegionLagos::find($id);
        
            if ($articulo) {
                if ($request->hasFile('imagen')) {
                    $imagenPath = $request->file('imagen')->store('images', 'public');
                    $data['imagen'] = $imagenPath;
                }
                $articulo->update($data);
                return redirect()->route('IntroduccionRegionLagos.index')->with('success', 'Artículo actualizado con éxito');
            } else {
                return redirect()->route('IntroduccionRegionLagos.index')->with('error', 'Artículo no encontrado');
            }
        }
}
