<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        // Obtener todas las sesiones ordenadas por fecha de forma descendente
        $sesiones = Sesion::with('documentos')->orderBy('fecha_hora', 'desc')->get();
    
        // Separar las sesiones por año y mes
        $sesionesSeparadas = $sesiones->groupBy(function($item) {
            return Carbon::parse($item->fecha_hora)->format('Y-m');
        });
    
        // Obtener la sesión más reciente para mostrarla como "Próxima Sesión"
        $proximaSesion = $sesiones->first();
    
        return view('sesiones_consejo.index', compact('proximaSesion', 'sesionesSeparadas'));
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
    
        return redirect()->route('sesiones_consejo.index')->with('success', 'Sesión creada con éxito');
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
        $sesion = Sesion::with('documentos')->findOrFail($id);
        return view('sesiones_consejo.edit', compact('sesion'));
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

    $sesion = Sesion::findOrFail($id);

    // Valida y actualiza la información de la sesión
    $validatedData = $request->validate([
        'nombre' => 'required|string|max:255',
        'fecha_hora' => 'required|date',
        'lugar' => 'required|string|max:255',
        // Agrega validaciones para los documentos si es necesario
    ]);

    $sesion->update($validatedData);


    
    $sesion = Sesion::findOrFail($id);
    $sesion->update($request->all());

    // Manejar la eliminación de documentos
    if ($request->has('documentos_eliminados')) {
        foreach ($request->documentos_eliminados as $documento_id) {
            Documento_Sesion::destroy($documento_id);
        }
    }

    
    // Manejar la adición de nuevos documentos
    if ($request->hasFile('nuevos_documentos')) {
        foreach ($request->file('nuevos_documentos') as $documento) {
            $path = $documento->store('public/documentos_sesiones');
            $sesion->documentos()->create([
                'nombre' => $documento->getClientOriginalName(),
                'url' => $path
            ]);
        }
    }

    return redirect()->route('sesiones_consejo.index')->with('success', 'Sesión actualizada con éxito');
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
