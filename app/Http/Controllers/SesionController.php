<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Sesion;
use App\Models\Documento_Sesion;

class SesionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sesiones = Sesion::with('documentos')->get(); // Asegúrate de que la relación se llame 'documentos'
        return view('sesiones_consejo.index', compact('sesiones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sesiones_consejo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Registro de la sesión
        $sesion = new Sesion();
        $sesion->nombre = $request->nombre;
        $sesion->fecha_hora = $request->fecha_hora;
        $sesion->lugar = $request->lugar;
        $sesion->save();
    
        // Manejo de múltiples archivos
        if ($request->hasFile('documento')) {
            foreach ($request->file('documento') as $documento) {
                if ($documento->isValid()) {
                    $path = $documento->store('public/documentos_sesiones');
                    $doc = new Documento_Sesion();
                    $doc->sesion_id = $sesion->id;
                    $doc->nombre = $documento->getClientOriginalName();
                    $doc->url = $path;
                    $doc->save();
                }
            }
        }
    
        return redirect()->route('sesiones.index')->with('success', 'Sesión creada con éxito');
    }
    
    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
