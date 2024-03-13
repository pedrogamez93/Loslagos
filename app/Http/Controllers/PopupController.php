<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\popup;

class PopupController extends Controller
{
    public function index()
    {
        $articulo = Popup::all();
        if ($articulo->isNotEmpty()) {
            // La consulta devolvió al menos un registro
            $primerArticulo = $articulo->first();
            $id = $primerArticulo->id;
            $articulo = Popup::find($id);
            return view('popups.edit', compact('articulo'));
            
        } else {
            // La consulta no devolvió ningún registro
            return view('popups.create');
        }
    }

    public function create()
    {
        return view('popups.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'image_url' => 'image|max:10000',
            'url' => 'nullable|string',
            //'accion' => 'nullable|string',
            
        ]);
    
        if ($request->hasFile('image_url')) {
            $imagenPath = $request->file('image_url')->store('images', 'public');
            $data['image_url'] = $imagenPath;
        }
    
        popup::create($data);
    
        return redirect(route('popups.index'))->with('success', 'Artículo creado con éxito');
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'image_url' => 'image|max:10000',
            'url' => 'nullable|string',
            //'accion' => 'nullable|string',
        ]);
    
        $articulo = popup::find($id);
    
        if ($articulo) {
            if ($request->hasFile('image_url')) {
                $imagenPath = $request->file('image_url')->store('images', 'public');
                $data['image_url'] = $imagenPath;
            }
            $articulo->update($data);
            return redirect()->route('popups.index')->with('success', 'Artículo actualizado con éxito');
        } else {
            return redirect()->route('popups.index')->with('error', 'Artículo no encontrado');
        }
    } 
    public function destroy($id)
    {
        $articulo = Popup::find($id);
    
        if ($articulo) {
            $articulo->delete();
            return redirect()->route('popups.index')->with('success', 'Artículo eliminado con éxito');
        } else {
            return redirect()->route('popups.index')->with('error', 'Artículo no encontrado');
        }
    }
}
