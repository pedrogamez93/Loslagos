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
        $Introduccion = IntroduccionRegionLagos::find($id);
        return view('edit', compact('Introduccion'));
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
    // Fin Introduccion
    // Inicio Antecedentes
    public function indexAntecedentes()
    {
        $articulo = AntecedentesRegion::all();
        if ($articulo->isNotEmpty()) {
            // La consulta devolvió al menos un registro
            $primerArticulo = $articulo->first();
            $id = $primerArticulo->id;
            $Antecedentes = AntecedentesRegion::find($id);
            return view('IntroduccionRegionLagos.AntecedentesRegion.show', compact('articulo'));
            
        } else {
            // La consulta no devolvió ningún registro
            return view('IntroduccionRegionLagos.AntecedentesRegion.create');
        }
    }
    public function createAntecedentes()
    {
        return view('IntroduccionRegionLagos.AntecedentesRegion.create');
    }
    public function storeAntecedentes(Request $request)
    {
        $data = $request->validate([
            'nombreseccion' => 'required',
            'subtitulo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'image|max:2048',
        ]);
    
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('images', 'public');
            $data['imagen'] = $imagenPath;
        }
    
        AntecedentesRegion::create($data);
    
        return redirect(route('AntecedentesRegionLagos.indexAntecedentes'))->with('success', 'Artículo creado con éxito');
    }
    public function showAntecedentes(AntecedentesRegion $Antecedentes)
    {
        
        return view('IntroduccionRegionLagos.show', compact('Antecedentes'));
    }
    public function editAntecedentes($id)
    {
        $Introduccion = AntecedentesRegion::find($id);
        return view('IntroduccionRegionLagos.AntecedentesRegion.edit', compact('Introduccion'));
    }
    public function destroyAntecedentes($id)
{
    $articulo = AntecedentesRegion::find($id);

    if ($articulo) {
        $articulo->delete();
        return redirect()->route('AntecedentesRegionLagos.indexAntecedentes')->with('success', 'Artículo eliminado con éxito');
    } else {
        return redirect()->route('AntecedentesRegionLagos.indexAntecedentes')->with('error', 'Artículo no encontrado');
    }
}
public function updateAntecedentes(Request $request, $id)
{
    $data = $request->validate([
        'nombreseccion' => 'required',
        'subtitulo' => 'required',
        'descripcion' => 'required',
        'imagen' => 'image|max:2048',
    ]);

    $articulo = AntecedentesRegion::find($id);

    if ($articulo) {
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('images', 'public');
            $data['imagen'] = $imagenPath;
        }
        $articulo->update($data);
        return redirect()->route('AntecedentesRegionLagos.indexAntecedentes')->with('success', 'Artículo actualizado con éxito');
    } else {
        return redirect()->route('AntecedentesRegionLagos.indexAntecedentes')->with('error', 'Artículo no encontrado');
    }
} 
    // Fin Antecedentes
    // Inicio Cargo
    public function indexCargos()
    {
        $articulo = CargoRegionLagos::all();
        if ($articulo->isNotEmpty()) {
            // La consulta devolvió al menos un registro
            $primerArticulo = $articulo->first();
            $id = $primerArticulo->id;
            $Antecedentes = CargoRegionLagos::find($id);
            return view('IntroduccionRegionLagos.CargosRegion.show', compact('articulo'));
            
        } else {
            // La consulta no devolvió ningún registro
            return view('IntroduccionRegionLagos.CargosRegion.create');
        }
    }
    public function storeCargos(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
         ]);
    
        CargoRegionLagos::create($data);
    
        return redirect(route('CargoRegionLagos.indexCargos'))->with('success', 'Artículo creado con éxito');
    }
    public function createCargos()
    {
        return view('IntroduccionRegionLagos.CargosRegion.create');
    }
    public function editCargos($id)
    {
        $Introduccion = CargoRegionLagos::find($id);
        return view('IntroduccionRegionLagos.CargosRegion.edit', compact('Introduccion'));
    }
    public function destroyCargos($id)
{
    $articulo = CargoRegionLagos::find($id);

    if ($articulo) {
        $articulo->delete();
        return redirect()->route('CargoRegionLagos.indexCargos')->with('success', 'Artículo eliminado con éxito');
    } else {
        return redirect()->route('CargoRegionLagos.indexCargos')->with('error', 'Artículo no encontrado');
    }
}
public function updateCargos(Request $request, $id)
{
    $data = $request->validate([
        'nombre' => 'required',
    ]);

    $articulo = CargoRegionLagos::find($id);

    if ($articulo) {
        $articulo->update($data);
        return redirect()->route('CargoRegionLagos.indexCargos')->with('success', 'Artículo actualizado con éxito');
    } else {
        return redirect()->route('CargoRegionLagos.indexCargos')->with('error', 'Artículo no encontrado');
    }
} 
    // Fin Cargo

}
