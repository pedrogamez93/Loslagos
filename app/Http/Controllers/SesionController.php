<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Sesion;
use App\Models\Documento_Sesion;

class SesionController extends Controller
{
    /**
     * Display a listing of the resource.
     * Ordena y agrupa las sesiones por fecha, y muestra la próxima sesión.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todas las sesiones ordenadas por fecha
        $sesiones = Sesion::with('documentos')->orderBy('fecha_hora', 'desc')->get();
    
        // Agrupar las sesiones por año y mes
        $sesionesAgrupadas = $sesiones->groupBy(function($sesion) {
            return Carbon::parse($sesion->fecha_hora)->format('Y-m');
        });
    
        // Obtener la próxima sesión (la primera sesión en la lista ordenada)
        $proximaSesion = $sesiones->first();
    
        return view('sesiones-consejo.index', [
            'proximaSesion' => $proximaSesion,
            'sesionesAgrupadas' => $sesionesAgrupadas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sesiones-consejo.create');
    }

    /**
     * Store a newly created resource in storage.
     * Valida los datos de entrada, registra la sesión y maneja la carga de múltiples documentos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
       
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_hora' => 'required|date',
            'lugar' => 'required|string|max:255',
            'nombredoc.*' => 'string|max:255',
            'url.*' => 'file|mimes:pdf|max:10240',
            'fechadoc.*' => 'nullable|date',
        ]);

        $sesion = Sesion::create([
            'nombre' => $validatedData['nombre'],
            'fecha_hora' => $validatedData['fecha_hora'],
            'lugar' => $validatedData['lugar'],
        ]);
    
        $nombresDocumentos = $request->input('nombredoc');
    
        if ($request->hasFile('url')) {
            foreach ($request->file('url') as $key => $documento) {
                if ($documento->isValid()) {
                    $path = $documento->store('public/documentos_sesiones');
    
                    // Obtener el nombre del documento correspondiente
                    $nombreDocumento = isset($nombresDocumentos[$key]) ? $nombresDocumentos[$key] : '';
    
                    // Obtener el valor de fechadoc
                    $fechadoc = isset($validatedData['fechadoc'][$key]) ? $validatedData['fechadoc'][$key] : null;
                   
                    $doc = new Documento_Sesion([
                        'sesion_id' => $sesion->id,
                        'nombredoc' => $nombreDocumento,
                        'url' => $path,
                        'fechadoc' => $fechadoc, // Corregimos la coma aquí
                    ]);
                    $doc->save();
                }
            }
        }
    
        return redirect()->route('sesionesConsejo.index')->with('success', 'Sesión creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sesion = Sesion::with('documentos')->findOrFail($id);
        return view('sesionesConsejo.show', compact('sesion'));
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
        return view('sesionesConsejo.edit', compact('sesion'));
    }

    /**
     * Update the specified resource in storage.
     * Valida y actualiza la información de la sesión, maneja la eliminación y adición de documentos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_hora' => 'required|date',
            'lugar' => 'required|string|max:255',
        ]);

        $sesion = Sesion::findOrFail($id);
        $sesion->update($validatedData);

        if ($request->has('documentos_eliminados')) {
            Documento_Sesion::destroy($request->documentos_eliminados);
        }

        if ($request->hasFile('nuevos_documentos')) {
            foreach ($request->file('nuevos_documentos') as $documento) {
                $path = $documento->store('public/documentos_sesiones');
                $sesion->documentos()->create([
                    'nombre' => $documento->getClientOriginalName(),
                    'url' => $path
                ]);
            }
        }

        return redirect()->route('sesionesConsejo.index')->with('success', 'Sesión actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     * Elimina una sesión y sus documentos asociados.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sesion = Sesion::with('documentos')->findOrFail($id);
        $sesion->documentos()->delete();
        $sesion->delete();

        return redirect()->route('sesionesConsejo.index')->with('success', 'Sesión eliminada con éxito');
    }
}