<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PoliticaDeTurismo;
use App\Models\ProductosdelaPoliticadeTurismo;
use App\Models\ProductosdelaPoliticadeTurismoI;
use App\Models\LamzamientoPoliticaTurismo;
use App\Models\PoliticaRegionalTurismo;
use App\Models\TrabajoParticipativoMetodologia;
use App\Models\TrabajoParticipativoMetodologiaI;
use App\Models\TrabajoParticipativoTalleresProvinciales;
use App\Models\trabajoparticipativotalleresprovincialesI;
use App\Models\MesaPublicoPrivada;
use App\Models\MesaPublicoPrivadaI;
use App\Models\ComiteTecnicodeGestion;
use App\Models\ComiteTecnicodeGestionI;
use App\Models\Subcomisiones;
use App\Models\SubcomisionesI;


class PoliticadeturismoController extends Controller
{
    public function indexPoliticadeturismo()
    {
        $articulo = PoliticaDeTurismo::all();
        if ($articulo->isNotEmpty()) {
            // La consulta devolvió al menos un registro
            $primerArticulo = $articulo->first();
            $id = $primerArticulo->id;
            $articulo = PoliticaDeTurismo::find($id);
            return view('politicadeturismo.edit', compact('articulo'));
            
        } else {
            // La consulta no devolvió ningún registro
            return view('politicadeturismo.create');
        }
        

    }
    public function indexPoliticadeturismoWeb()
    {
        $mostrarpolitica = PoliticaDeTurismo::all();
        $primerArticulo = $mostrarpolitica->first();
        return view('politicadeturismo.formulacionpoliticadeturismo', compact('primerArticulo'));
        

    }

    
    public function createPoliticadeturismo()
    {
        return view('politicadeturismo.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePoliticadeturismo(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required',
            'subtitulo' => 'required',
            'descripcion' => 'required',
        ]);

        PoliticaDeTurismo::create($data);
    
        return redirect(route('Politicadeturismo.index'))->with('success', 'Guardado exitosamente');
    }
    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPoliticadeturismo($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPoliticadeturismo($id)
    {
        $articulo = PoliticaDeTurismo::find($id);
        return view('politicadeturismo.edit', compact('articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePoliticadeturismo(Request $request, $id)
    {
        $data = $request->validate([
            'titulo' => 'required',
            'subtitulo' => 'required',
            'descripcion' => 'required',
        ]);

        $articulo = PoliticaDeTurismo::find($id);

        if ($articulo) {
            $articulo->update($data);
            return redirect()->route('Politicadeturismo.index')->with('success', 'Artículo actualizado con éxito');
        } else {
            return redirect()->route('Politicadeturismo.index')->with('error', 'Artículo no encontrado');
        }
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
    public function indexProductosdelaPoliticadeTurismo()
    {
        $articulo = ProductosdelaPoliticadeTurismo::all();
        if ($articulo->isNotEmpty()) {
            // La consulta devolvió al menos un registro
            $primerArticulo = $articulo->first();
            $id = $primerArticulo->id;
            $articulo1 = ProductosdelaPoliticadeTurismo::find($id);
            return view('politicadeturismo.productosdelapoliticadeturismo.show', compact('articulo'));
            
        } else {
            // La consulta no devolvió ningún registro
            return view('politicadeturismo.productosdelapoliticadeturismo.create');
        }
        

    }
    public function indexProductosdelaPoliticadeTurismoWeb()
    {
        $datosPrincipales  = ProductosdelaPoliticadeTurismo::with('ProductosdelaPoliticadeTurismoI')->get();
        return view('politicadeturismo.productosdelapoliticadeturismo.ProductosdelaPoliticadeTurismo', compact('datosPrincipales'));
        
        //return view('politicadeturismo.productosdelapoliticadeturismo.ProductosdelaPoliticadeTurismo');

    }

    
    public function createProductosdelaPoliticadeTurismo()
    {
        return view('politicadeturismo.productosdelapoliticadeturismo.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProductosdelaPoliticadeTurismo(Request $request)
    {
        
        $data = $request->validate([
            'titulo' => 'required',
            'nombreA' => 'required',
            'archivo' => 'required',
        ]);
      
        
        $Productos =  ProductosdelaPoliticadeTurismo::create([
            'titulo' => $request->input('nombre'),
            /*'nombre' => $request->input('nombre'),
            'url' => $request->input('url'),*/
        ]);
  
        // Verificar y almacenar documentos
        if ($request->hasFile('archivo')) {
            $documentos = $request->file('archivo');
            $tituloP = $request->input('titulo');
            $nombreA = $request->input('nombreA');
            $nombresDocumentos = $request->input('archivo');

            foreach ($documentos as $key => $documento) {
                 $path = $documento->store('public/productosdelapoliticadeturismo');
                 $nombre = isset($nombresDocumentos[$key]) ? $nombresDocumentos[$key] : 'documento_' . ($key + 1);
                
                // Crear registro en la base de datos
                $doc = ProductosdelaPoliticadeTurismoI::create([
                    'titulo' => $tituloP[$key],
                    'nombre' => $nombreA[$key],
                    'url' => $path,
                    'ProductosdelaPoliticadeTurismoI_id' => $Productos->id,
                ]);
            }
        }
        return redirect(route('ProductosdelaPoliticadeTurismo.index'))->with('success', 'Guardado exitosamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProductosdelaPoliticadeTurismo(ProductosdelaPoliticadeTurismo $articulo)
    {
        
        //return view('politicadeturismo.ProductosdelaPoliticadeTurismo.show', compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProductosdelaPoliticadeTurismo($id)
    {
        $producto = ProductosdelaPoliticadeTurismo::findOrFail($id);
        // Obtener los registros relacionados
        $items = $producto->ProductosdelaPoliticadeTurismoI;
        return view('politicadeturismo.ProductosdelaPoliticadeTurismo.edit', compact('producto', 'items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProductosdelaPoliticadeTurismo(Request $request, $id)
    {
        $data = $request->validate([
            'tituloA' => 'required',
        ]);
        $articulo = ProductosdelaPoliticadeTurismo::find($id);
        $articulo->update([
            'titulo' => $data['tituloA'],
        ]);
        
        $idPrincipal = $request->input('idPrincipal');
        //ProductosdelaPoliticadeTurismoI::where('ProductosdelaPoliticadeTurismoI_id', $idPrincipal)->delete();
        if ($request->hasFile('archivo')) {
            $documentos = $request->file('archivo');
            $tituloP = $request->input('titulo');
            $nombreA = $request->input('nombreA');
            $nombresDocumentos = $request->input('archivo');

            foreach ($documentos as $key => $documento) {
                 $path = $documento->store('public/productosdelapoliticadeturismo');
                 $nombre = isset($nombresDocumentos[$key]) ? $nombresDocumentos[$key] : 'documento_' . ($key + 1);
                
                // Crear registro en la base de datos
                $doc = ProductosdelaPoliticadeTurismoI::create([
                    'titulo' => $tituloP[$key],
                    'nombre' => $nombreA[$key],
                    'url' => $path,
                    'ProductosdelaPoliticadeTurismoI_id' => $idPrincipal,
                ]);
            }
        }
        
        return redirect()->route('ProductosdelaPoliticadeTurismo.edit', $idPrincipal)->with('success', 'Archivo Actualizado');
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyProductosdelaPoliticadeTurismo($id)
    {
        $articulo = ProductosdelaPoliticadeTurismo::find($id);
    
        if ($articulo) {
            $articulo->delete();
            return redirect()->route('ProductosdelaPoliticadeTurismo.index')->with('success', 'Artículo eliminado con éxito');
        } else {
            return redirect()->route('ProductosdelaPoliticadeTurismo.index')->with('error', 'Artículo no encontrado');
        }
    }
    public function destroyProductosdelaPoliticadeTurismoItems($id)
    {
        $articulo = ProductosdelaPoliticadeTurismoI::find($id);
    
        if ($articulo) {
            $articulo->delete();
            return redirect()->route('ProductosdelaPoliticadeTurismo.edit', $articulo->ProductosdelaPoliticadeTurismoI_id)->with('success', 'Archivo Eliminado');
        } else {
            return redirect()->route('ProductosdelaPoliticadeTurismo.edit', $articulo->ProductosdelaPoliticadeTurismoI_id)->with('success', 'Archivo Eliminado');
        }
    }
    public function downloadProductosdelaPoliticadeTurismo($id)
    {
        $documento = ProductosdelaPoliticadeTurismoI::findOrFail($id);
    
        // Log para depuración del documento
        \Log::info("Documento encontrado: " . json_encode($documento));
    
        if ($documento) {
            $rutaCompleta = $documento->url; // Esta es la ruta almacenada en la base de datos
    
            // Construir la ruta completa al archivo
            $rutaArchivo = storage_path('app/' . $rutaCompleta);
    
            \Log::info("Ruta completa del archivo: " . $rutaArchivo);
    
            if (file_exists($rutaArchivo) && is_file($rutaArchivo)) {
                return response()->download($rutaArchivo);
            } else {
                \Log::error("El archivo no existe o es un directorio: " . $rutaArchivo);
                return response()->json(['error' => 'El archivo no existe o es un directorio.'], 404);
            }
        } else {
            \Log::error("Documento no encontrado con id: " . $id);
            return response()->json(['error' => 'Documento no encontrado.'], 404);
        }
    }
    
    public function indexLanzamientoPolitica ()
    {
        $articulo = LamzamientoPoliticaTurismo::all();
        if ($articulo->isNotEmpty()) {
            // La consulta devolvió al menos un registro
            $primerArticulo = $articulo->first();
            $id = $primerArticulo->id;
            $articulo = LamzamientoPoliticaTurismo::find($id);
            return view('politicadeturismo.lanzamientopoliticaturismo.edit', compact('articulo'));
            
        } else {
            // La consulta no devolvió ningún registro
            return view('politicadeturismo.lanzamientopoliticaturismo.create');
        }
        

    }
    public function indexLanzamientoPoliticaWeb()
    {
        $primerArticulo = LamzamientoPoliticaTurismo::first();
        
        return view('politicadeturismo.lanzamientopoliticaturismo.lanzamientopoliticaturismo', compact('primerArticulo'));
        

    }

    
    public function createLanzamientoPolitica()
    {
        return view('politicadeturismo.lanzamientopoliticaturismo.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeLanzamientoPolitica(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required',
            'nombreA' => 'required',
            'archivo' => 'nullable|max:86400',

        ]);
    
        if ($request->hasFile('archivo')) {
            $imagenPath = $request->file('archivo')->store('public/productosdelapoliticadeturismo');
            $data['archivo'] = $imagenPath;
        }
        LamzamientoPoliticaTurismo::create($data);
        return redirect(route('LanzamientoPolitica.index'))->with('success', 'Guardado exitosamente');
    }

    public function downloadLanzamientoPolitica($id)
{
    $documento = LamzamientoPoliticaTurismo::findOrFail($id);

    // Log para depuración del documento
    \Log::info("Documento encontrado: " . json_encode($documento));

    if ($documento) {
        $rutaCompleta = $documento->archivo; // Esta es la ruta almacenada en la base de datos

        // Construir la ruta completa al archivo
        $rutaArchivo = storage_path('app/' . $rutaCompleta);

        \Log::info("Ruta completa del archivo: " . $rutaArchivo);

        if (file_exists($rutaArchivo) && is_file($rutaArchivo)) {
            return response()->download($rutaArchivo);
        } else {
            \Log::error("El archivo no existe o es un directorio: " . $rutaArchivo);
            return response()->json(['error' => 'El archivo no existe o es un directorio.'], 404);
        }
    } else {
        \Log::error("Documento no encontrado con id: " . $id);
        return response()->json(['error' => 'Documento no encontrado.'], 404);
    }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showLanzamientoPolitica($id)
    {
        //
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editLanzamientoPolitica($id)
    {
        $articulo = LamzamientoPoliticaTurismo::find($id);
        return view('politicadeturismo.lanzamientopoliticaturismo.edit', compact('articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateLanzamientoPolitica(Request $request, $id)
    {
        //dd($request->all());
        $data = $request->validate([
            'titulo' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required',
            'nombreA' => 'required',
            //'archivo' => 'nullable|mimes:pdf,doc,docx,zip,rar|max:86400',

        ]);
        
        if ($request->hasFile('archivo')) {
            $imagenPath = $request->file('archivo')->store('public/productosdelapoliticadeturismo');
            $data['archivo'] = $imagenPath;
            
        }

        $articulo = LamzamientoPoliticaTurismo::find($id);
        
        if ($articulo) {
            $articulo->update($data);
            return redirect()->route('LanzamientoPolitica.index')->with('success', 'Artículo actualizado con éxito');
        } else {
            return redirect()->route('LanzamientoPolitica.index')->with('error', 'Artículo no encontrado');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyLanzamientoPolitica($id)
    {
        //
    } 
    public function indexPoliticaRegionalTurismo ()
    {
        $articulo = PoliticaRegionalTurismo::all();
        if ($articulo->isNotEmpty()) {
            // La consulta devolvió al menos un registro
            $primerArticulo = $articulo->first();
            $id = $primerArticulo->id;
            $articulo = PoliticaRegionalTurismo::find($id);
            return view('politicadeturismo.politicaregionalturismo.edit', compact('articulo'));
            
        } else {
            // La consulta no devolvió ningún registro
            return view('politicadeturismo.politicaregionalturismo.create');
        }
        

    }
    public function indexPoliticaRegionalTurismoWeb()
    {
        $mostrarpolitica = PoliticaRegionalTurismo::all();
        $primerArticulo = $mostrarpolitica->first();
        return view('politicadeturismo.lanzamientopoliticaturismo.lanzamientopoliticaturismo', compact('primerArticulo'));
        

    }

    
    public function createPoliticaRegionalTurismo()
    {
        return view('politicadeturismo.politicaregionalturismo.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePoliticaRegionalTurismo(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required',
            'url' => 'nullable|mimes:pdf,doc,docx,zip,rar|max:86400',

        ]);
    
        if ($request->hasFile('url')) {
            $imagenPath = $request->file('url')->store('productosdelapoliticadeturismo', 'public');
            $data['url'] = $imagenPath;
        }
        PoliticaRegionalTurismo::create($data);
        return redirect(route('PoliticaRegionalTurismo.index'))->with('success', 'Guardado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPoliticaRegionalTurismo($id)
    {
        //
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPoliticaRegionalTurismo($id)
    {
        $articulo = PoliticaRegionalTurismo::find($id);
        return view('politicadeturismo.politicaregionalturismo.edit', compact('articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePoliticaRegionalTurismo(Request $request, $id)
    {
        $data = $request->validate([
            'titulo' => 'required',
            'url' => 'nullable|mimes:pdf,doc,docx,zip,rar|max:86400',

        ]);
    
        if ($request->hasFile('url')) {
            $imagenPath = $request->file('url')->store('productosdelapoliticadeturismo', 'public');
            $data['url'] = $imagenPath;
        }

        $articulo = PoliticaRegionalTurismo::find($id);

        if ($articulo) {
            $articulo->update($data);
            return redirect()->route('PoliticaRegionalTurismo.index')->with('success', 'Artículo actualizado con éxito');
        } else {
            return redirect()->route('PoliticaRegionalTurismo.index')->with('error', 'Artículo no encontrado');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyPoliticaRegionalTurismo($id)
    {
        //
    } 
    public function destroyTrabajoParticipativoMetodologiaItems($id)
    {
        $articulo = TrabajoParticipativoMetodologiaI::find($id);
    
        if ($articulo) {
            $articulo->delete();
            return redirect()->route('TrabajoParticipativoMetodologia.index')->with('success', 'Archivo Eliminado');
        } else {
            return redirect()->route('TrabajoParticipativoMetodologia.index')->with('success', 'Archivo Eliminado');
        }
    }
    public function indexTrabajoParticipativoMetodologia ()
    {
        $articulo1 = TrabajoParticipativoMetodologia::all();
        if ($articulo1->isNotEmpty()) {
            // La consulta devolvió al menos un registro
            $primerArticulo = $articulo1->first();
            $id = $primerArticulo->id;
            $articulo = TrabajoParticipativoMetodologia::find($id);
            // Obtener los registros relacionados
            $items = $articulo->TrabajoParticipativoMetodologiaI;
            return view('politicadeturismo.trabajoparticipativometodologia.edit', compact('articulo','items'));
            
        } else {
            // La consulta no devolvió ningún registro
            return view('politicadeturismo.trabajoparticipativometodologia.create');
        }
        

    }
    public function indexTrabajoParticipativoMetodologiaWeb()
    {
        $datosPrincipales  = TrabajoParticipativoMetodologia::with('TrabajoParticipativoMetodologiaI')->get();
        return view('politicadeturismo.trabajoparticipativometodologia.trabajoparticipativometodologia', compact('datosPrincipales'));
        
        

    }

    
    public function createTrabajoParticipativoMetodologia()
    {
        return view('politicadeturismo.trabajoparticipativometodologia.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTrabajoParticipativoMetodologia(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'titulo' => 'required',
            'descripcion' => 'required',

        ]);
        
        
        $Productos =  TrabajoParticipativoMetodologia::create([
            'titulo' => $request->input('titulo'),
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
        ]);
    
        // Verificar y almacenar documentos
        if ($request->hasFile('archivo')) {
            $documentos = $request->file('archivo');
            $nombresDocumentos = $request->input('nombreA');

            foreach ($documentos as $key => $documento) {
                
                 $path = $documento->store('public/productosdelapoliticadeturismo');
                 $nombre = isset($nombresDocumentos[$key]) ? $nombresDocumentos[$key] : 'documento_' . ($key + 1);
                
                // Crear registro en la base de datos
                $doc = TrabajoParticipativoMetodologiaI::create([
                    'TrabajoParticipativoMetodologiaI_id' => $Productos->id,
                    'nombreA' => $nombre,
                    'archivo' => $path,
                ]);
            }
        }
        return redirect(route('TrabajoParticipativoMetodologia.index'))->with('success', 'Guardado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showTrabajoParticipativoMetodologia($id)
    {
        //
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editTrabajoParticipativoMetodologia($id)
    {
        $articulo = TrabajoParticipativoMetodologiaI::find($id);
        return view('politicadeturismo.trabajoparticipativometodologia.edit', compact('articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateTrabajoParticipativoMetodologia(Request $request, $id)
    {
        //dd($request->all());
        $data = $request->validate([
            'nombreA' => 'required',
        ]);
    // Verificar y almacenar documentos
    if ($request->hasFile('archivo')) {
        $documentos = $request->file('archivo');
        $nombresDocumentos = $request->input('nombreA');
        $idPrincipal = $request->input('idPrincipal');

        foreach ($documentos as $key => $documento) {
            
             $path = $documento->store('public/productosdelapoliticadeturismo');
             $nombre = isset($nombresDocumentos[$key]) ? $nombresDocumentos[$key] : 'documento_' . ($key + 1);
            
            // Crear registro en la base de datos
            $doc = TrabajoParticipativoMetodologiaI::create([
                'TrabajoParticipativoMetodologiaI_id' => $idPrincipal,
                'nombreA' => $nombresDocumentos[$key],
                'archivo' => $path,
            ]);
        }
    }
    return redirect(route('TrabajoParticipativoMetodologia.index'))->with('success', 'Guardado exitosamente');
        
    }
    public function downloadTrabajoParticipativoMetodologia($id)
    {
        $documento = TrabajoParticipativoMetodologiaI::findOrFail($id);
    
        // Log para depuración del documento
        \Log::info("Documento encontrado: " . json_encode($documento));
    
        if ($documento) {
            $rutaCompleta = $documento->archivo; // Esta es la ruta almacenada en la base de datos
    
            // Construir la ruta completa al archivo
            $rutaArchivo = storage_path('app/' . $rutaCompleta);
    
            \Log::info("Ruta completa del archivo: " . $rutaArchivo);
    
            if (file_exists($rutaArchivo) && is_file($rutaArchivo)) {
                return response()->download($rutaArchivo);
            } else {
                \Log::error("El archivo no existe o es un directorio: " . $rutaArchivo);
                return response()->json(['error' => 'El archivo no existe o es un directorio.'], 404);
            }
        } else {
            \Log::error("Documento no encontrado con id: " . $id);
            return response()->json(['error' => 'Documento no encontrado.'], 404);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyTrabajoParticipativoMetodologia($id)
    {
        //
    } 
    public function destroyTrabajoParticipativoTalleresProvincialesItems($id)
    {
        $articulo = TrabajoParticipativoTalleresProvincialesI::find($id);
    
        if ($articulo) {
            $articulo->delete();
            return redirect()->route('TrabajoParticipativoTalleresProvinciales.index')->with('success', 'Archivo Eliminado');
        } else {
            return redirect()->route('TrabajoParticipativoTalleresProvinciales.index')->with('success', 'Archivo Eliminado');
        }
    }
    public function downloadTrabajoParticipativoTalleresProvinciales($id)
    {
        $documento = TrabajoParticipativoTalleresProvincialesI::findOrFail($id);
    
        // Log para depuración del documento
        \Log::info("Documento encontrado: " . json_encode($documento));
    
        if ($documento) {
            $rutaCompleta = $documento->archivo; // Esta es la ruta almacenada en la base de datos
    
            // Construir la ruta completa al archivo
            $rutaArchivo = storage_path('app/' . $rutaCompleta);
    
            \Log::info("Ruta completa del archivo: " . $rutaArchivo);
    
            if (file_exists($rutaArchivo) && is_file($rutaArchivo)) {
                return response()->download($rutaArchivo);
            } else {
                \Log::error("El archivo no existe o es un directorio: " . $rutaArchivo);
                return response()->json(['error' => 'El archivo no existe o es un directorio.'], 404);
            }
        } else {
            \Log::error("Documento no encontrado con id: " . $id);
            return response()->json(['error' => 'Documento no encontrado.'], 404);
        }
    }
    public function indexTrabajoParticipativoTalleresProvinciales ()
    {
        $articulo = TrabajoParticipativoTalleresProvinciales::all();
        if ($articulo->isNotEmpty()) {
            // La consulta devolvió al menos un registro
            $primerArticulo = $articulo->first();
            $id = $primerArticulo->id;
            $articulo = TrabajoParticipativoTalleresProvinciales::find($id);

            
            $items = $articulo->TrabajoParticipativoTalleresProvincialesI;
            return view('politicadeturismo.trabajoparticipativotalleresprovinciales.edit', compact('articulo','items'));
            
        } else {
            // La consulta no devolvió ningún registro
            return view('politicadeturismo.trabajoparticipativotalleresprovinciales.create');
        }
        

    }
    public function indexTrabajoParticipativoTalleresProvincialesWeb()
    {
        $datosPrincipales  = TrabajoParticipativoTalleresProvinciales::with('TrabajoParticipativoTalleresProvincialesI')->get();
        return view('politicadeturismo.trabajoparticipativotalleresprovinciales.trabajoparticipativotalleresprovinciales', compact('datosPrincipales'));
        
        

    }

    
    public function createTrabajoParticipativoTalleresProvinciales()
    {
        return view('politicadeturismo.trabajoparticipativotalleresprovinciales.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTrabajoParticipativoTalleresProvinciales(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'titulo' => 'required',
            'descripcion' => 'required',
            'tituloA' => 'required',

        ]);
        
        
        $Productos =  TrabajoParticipativoTalleresProvinciales::create([
            'titulo' => $request->input('titulo'),
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'tituloA' => $request->input('tituloA'),
        ]);
    
        // Verificar y almacenar documentos
        if ($request->hasFile('archivo')) {
            $documentos = $request->file('archivo');
            $nombresDocumentos = $request->input('nombreA');

            foreach ($documentos as $key => $documento) {
                 $path = $documento->store('public/productosdelapoliticadeturismo');
                 $nombre = isset($nombresDocumentos[$key]) ? $nombresDocumentos[$key] : 'documento_' . ($key + 1);
                
                // Crear registro en la base de datos
                $doc = TrabajoParticipativoTalleresProvincialesI::create([
                    'TrabajoParticipativoTalleresProvincialesI_id' => $Productos->id,
                    'nombreA' => $nombre,
                    'archivo' => $path,
                ]);
            }
        }
        return redirect(route('TrabajoParticipativoTalleresProvinciales.index'))->with('success', 'Guardado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showTrabajoParticipativoTalleresProvinciales($id)
    {
        //
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editTrabajoParticipativoTalleresProvinciales($id) 
    {
        $articulo = PoliticaRegionalTurismo::find($id);
        return view('politicadeturismo.trabajoparticipativometodologia.edit', compact('articulo'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateTrabajoParticipativoTalleresProvinciales(Request $request, $id)
    {
        $data = $request->validate([
            'titulo' => 'required',
        ]);
    
        if ($request->hasFile('archivo')) {
            $documentos = $request->file('archivo');
            $nombresDocumentos = $request->input('nombreA');
            $idPrincipal = $request->input('idPrincipal');

            foreach ($documentos as $key => $documento) {
                 $path = $documento->store('public/productosdelapoliticadeturismo');
                 $nombre = isset($nombresDocumentos[$key]) ? $nombresDocumentos[$key] : 'documento_' . ($key + 1);
                
                // Crear registro en la base de datos
                $doc = TrabajoParticipativoTalleresProvincialesI::create([
                    'TrabajoParticipativoTalleresProvincialesI_id' => $idPrincipal,
                    'nombreA' => $nombre,
                    'archivo' => $path,
                ]);
            }
            return redirect(route('TrabajoParticipativoTalleresProvinciales.index'))->with('success', 'Guardado exitosamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyTrabajoParticipativoTalleresProvinciales($id)
    {
        //
    } 
    public function indexMesaPublicoPrivada ()
    {
        $articulo = MesaPublicoPrivada::all();
        if ($articulo->isNotEmpty()) {
            // La consulta devolvió al menos un registro
            $primerArticulo = $articulo->first();
            $id = $primerArticulo->id;
            $articulo = MesaPublicoPrivada::find($id);
            $items = $articulo->MesaPublicoPrivadaI;
            
            return view('politicadeturismo.mesapublicoprivada.edit', compact('articulo','items'));
            
        } else {
            // La consulta no devolvió ningún registro
            return view('politicadeturismo.mesapublicoprivada.create');
        }
        

    }
    public function downloadMesaPublicoPrivada($id)
    {
        $documento = MesaPublicoPrivadaI::findOrFail($id);
    
        // Log para depuración del documento
        \Log::info("Documento encontrado: " . json_encode($documento));
    
        if ($documento) {
            $rutaCompleta = $documento->archivo; // Esta es la ruta almacenada en la base de datos
    
            // Construir la ruta completa al archivo
            $rutaArchivo = storage_path('app/' . $rutaCompleta);
    
            \Log::info("Ruta completa del archivo: " . $rutaArchivo);
    
            if (file_exists($rutaArchivo) && is_file($rutaArchivo)) {
                return response()->download($rutaArchivo);
            } else {
                \Log::error("El archivo no existe o es un directorio: " . $rutaArchivo);
                return response()->json(['error' => 'El archivo no existe o es un directorio.'], 404);
            }
        } else {
            \Log::error("Documento no encontrado con id: " . $id);
            return response()->json(['error' => 'Documento no encontrado.'], 404);
        }
    }
    public function indexMesaPublicoPrivadaWeb()
    {
        $datosPrincipales  = MesaPublicoPrivada::with('MesaPublicoPrivadaI')->get();
        return view('politicadeturismo.mesapublicoprivada.mesapublicoprivada', compact('datosPrincipales'));
        
        

    }

    
    public function createMesaPublicoPrivada()
    {
        return view('politicadeturismo.mesapublicoprivada.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMesaPublicoPrivada(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'titulo' => 'required',
            'descripcion' => 'required',
        ]);
        
        
        $Productos =  MesaPublicoPrivada::create([
            'titulo' => $request->input('titulo'),
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
        ]);
    
        // Verificar y almacenar documentos
        if ($request->hasFile('archivo')) {
            $documentos = $request->file('archivo');
            $nombresDocumentos = $request->input('nombreA');

            foreach ($documentos as $key => $documento) {
                 $path = $documento->store('public/productosdelapoliticadeturismo');
                 $nombre = isset($nombresDocumentos[$key]) ? $nombresDocumentos[$key] : 'documento_' . ($key + 1);
                
                // Crear registro en la base de datos
                $doc = MesaPublicoPrivadaI::create([
                    'MesaPublicoPrivadaI_id' => $Productos->id,
                    'nombreA' => $nombre,
                    'archivo' => $path,
                ]);
            }
        }
        return redirect(route('MesaPublicoPrivada.index'))->with('success', 'Guardado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showMesaPublicoPrivada($id)
    {
        //
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editMesaPublicoPrivada($id)
    {
        $articulo = PoliticaRegionalTurismo::find($id);
        return view('politicadeturismo.mesapublicoprivada.edit', compact('articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateMesaPublicoPrivada(Request $request, $id)
    {
        $data = $request->validate([
            'titulo' => 'required',
            'url' => 'nullable|mimes:pdf,doc,docx,zip,rar|max:86400',

        ]);
    
        if ($request->hasFile('url')) {
            $imagenPath = $request->file('url')->store('public/productosdelapoliticadeturismo');
            $data['url'] = $imagenPath;
        }

        $articulo = PoliticaRegionalTurismo::find($id);

        if ($articulo) {
            $articulo->update($data);
            return redirect()->route('MesaPublicoPrivada.index')->with('success', 'Artículo actualizado con éxito');
        } else {
            return redirect()->route('MesaPublicoPrivada.index')->with('error', 'Artículo no encontrado');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyMesaPublicoPrivada($id)
    {
        //
    } 
    public function downloadComiteTecnicodeGestion($id)
    {
        $documento = ComiteTecnicodeGestionI::findOrFail($id);
    
        // Log para depuración del documento
        \Log::info("Documento encontrado: " . json_encode($documento));
    
        if ($documento) {
            $rutaCompleta = $documento->archivo; // Esta es la ruta almacenada en la base de datos
    
            // Construir la ruta completa al archivo
            $rutaArchivo = storage_path('app/' . $rutaCompleta);
    
            \Log::info("Ruta completa del archivo: " . $rutaArchivo);
    
            if (file_exists($rutaArchivo) && is_file($rutaArchivo)) {
                return response()->download($rutaArchivo);
            } else {
                \Log::error("El archivo no existe o es un directorio: " . $rutaArchivo);
                return response()->json(['error' => 'El archivo no existe o es un directorio.'], 404);
            }
        } else {
            \Log::error("Documento no encontrado con id: " . $id);
            return response()->json(['error' => 'Documento no encontrado.'], 404);
        }
    }
    public function indexComiteTecnicodeGestion()
    {
        $articulo = ComiteTecnicodeGestion::all();
        if ($articulo->isNotEmpty()) {
            // La consulta devolvió al menos un registro
            $primerArticulo = $articulo->first();
            $id = $primerArticulo->id;
            $articulo = ComiteTecnicodeGestion::find($id);
            $items = $articulo->ComiteTecnicodeGestionI;
            
            
            return view('politicadeturismo.comitetecnicodegestion.edit', compact('articulo','items'));
            
        } else {
            // La consulta no devolvió ningún registro
            return view('politicadeturismo.comitetecnicodegestion.create');
        }
        

    }
    public function indexComiteTecnicodeGestionWeb()
    {
        $datosPrincipales  = ComiteTecnicodeGestion::with('ComiteTecnicodeGestionI')->get();
        return view('politicadeturismo.comitetecnicodegestion.comitetecnicodegestion', compact('datosPrincipales'));
        
        

    }

    
    public function createComiteTecnicodeGestion()
    {
        return view('politicadeturismo.comitetecnicodegestion.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeComiteTecnicodeGestion(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'titulo' => 'required',
            'descripcion' => 'required',
        ]);
        
        
        $Productos =  ComiteTecnicodeGestion::create([
            'titulo' => $request->input('titulo'),
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
        ]);
    
        // Verificar y almacenar documentos
        if ($request->hasFile('archivo')) {
            $documentos = $request->file('archivo');
            $nombresDocumentos = $request->input('nombreA');

            foreach ($documentos as $key => $documento) {
                 $path = $documento->store('public/productosdelapoliticadeturismo');
                 $nombre = isset($nombresDocumentos[$key]) ? $nombresDocumentos[$key] : 'documento_' . ($key + 1);
                
                // Crear registro en la base de datos
                $doc = ComiteTecnicodeGestionI::create([
                    'ComiteTecnicodeGestionI_id' => $Productos->id,
                    'nombreA' => $nombre,
                    'archivo' => $path,
                ]);
            }
        }
        return redirect(route('ComiteTecnicodeGestion.index'))->with('success', 'Guardado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showComiteTecnicodeGestion($id)
    {
        //
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editComiteTecnicodeGestion($id)
    {
        $articulo = PoliticaRegionalTurismo::find($id);
        return view('politicadeturismo.comitetecnicodegestion.edit', compact('articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateComiteTecnicodeGestion(Request $request, $id)
    {
        $data = $request->validate([
            'titulo' => 'required',
            'url' => 'nullable|mimes:pdf,doc,docx,zip,rar|max:86400',

        ]);
    
        if ($request->hasFile('url')) {
            $imagenPath = $request->file('url')->store('public/productosdelapoliticadeturismo');
            $data['url'] = $imagenPath;
        }

        $articulo = PoliticaRegionalTurismo::find($id);

        if ($articulo) {
            $articulo->update($data);
            return redirect()->route('ComiteTecnicodeGestion.index')->with('success', 'Artículo actualizado con éxito');
        } else {
            return redirect()->route('ComiteTecnicodeGestion.index')->with('error', 'Artículo no encontrado');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyComiteTecnicodeGestion($id)
    {
        //
    } 
    public function downloadSubcomisiones($id)
    {
        $documento = SubcomisionesI::findOrFail($id);
    
        // Log para depuración del documento
        \Log::info("Documento encontrado: " . json_encode($documento));
    
        if ($documento) {
            $rutaCompleta = $documento->archivo; // Esta es la ruta almacenada en la base de datos
    
            // Construir la ruta completa al archivo
            $rutaArchivo = storage_path('app/' . $rutaCompleta);
    
            \Log::info("Ruta completa del archivo: " . $rutaArchivo);
    
            if (file_exists($rutaArchivo) && is_file($rutaArchivo)) {
                return response()->download($rutaArchivo);
            } else {
                \Log::error("El archivo no existe o es un directorio: " . $rutaArchivo);
                return response()->json(['error' => 'El archivo no existe o es un directorio.'], 404);
            }
        } else {
            \Log::error("Documento no encontrado con id: " . $id);
            return response()->json(['error' => 'Documento no encontrado.'], 404);
        }
    }
    public function indexSubcomisiones()
    {
        $articulo = Subcomisiones::all();
        if ($articulo->isNotEmpty()) {
            // La consulta devolvió al menos un registro
            $primerArticulo = $articulo->first();
            $id = $primerArticulo->id;
            $articulo = Subcomisiones::find($id);
            $items = $articulo->SubcomisionesI;
            
            return view('politicadeturismo.subcomisiones.edit', compact('articulo','items'));
            
        } else {
            // La consulta no devolvió ningún registro
            return view('politicadeturismo.subcomisiones.create');
        }
        

    }
    public function indexSubcomisionesWeb()
    {
        $datosPrincipales  = Subcomisiones::with('SubcomisionesI')->get();
        return view('politicadeturismo.subcomisiones.subcomisiones', compact('datosPrincipales'));
        
        

    }

    
    public function createSubcomisiones()
    {
        return view('politicadeturismo.subcomisiones.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSubcomisiones(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'titulo' => 'required',
            'descripcion' => 'required',
        ]);
        
        
        $Productos =  Subcomisiones::create([
            'titulo' => $request->input('titulo'),
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
        ]);
    
        // Verificar y almacenar documentos
        if ($request->hasFile('archivo')) {
            $documentos = $request->file('archivo');
            $nombresDocumentos = $request->input('nombreA');

            foreach ($documentos as $key => $documento) {
                 $path = $documento->store('public/productosdelapoliticadeturismo');
                 $nombre = isset($nombresDocumentos[$key]) ? $nombresDocumentos[$key] : 'documento_' . ($key + 1);
                
                // Crear registro en la base de datos
                $doc = SubcomisionesI::create([
                    'SubcomisionesI_id' => $Productos->id,
                    'nombreA' => $nombre,
                    'archivo' => $path,
                ]);
            }
        }
        return redirect(route('Subcomisiones.index'))->with('success', 'Guardado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showSubcomisiones($id)
    {
        //
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editSubcomisiones($id)
    {
        $articulo = Subcomisiones::find($id);
        return view('politicadeturismo.subcomisiones.edit', compact('articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSubcomisiones(Request $request, $id)
    {
        $data = $request->validate([
            'titulo' => 'required',
            'url' => 'nullable|mimes:pdf,doc,docx,zip,rar|max:86400',

        ]);
    
        if ($request->hasFile('url')) {
            $imagenPath = $request->file('url')->store('public/productosdelapoliticadeturismo');
            $data['url'] = $imagenPath;
        }

        $articulo = Subcomisiones::find($id);

        if ($articulo) {
            $articulo->update($data);
            return redirect()->route('Subcomisiones.index')->with('success', 'Artículo actualizado con éxito');
        } else {
            return redirect()->route('Subcomisiones.index')->with('error', 'Artículo no encontrado');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroySubcomisiones($id)
    {
        //
    } 
    
    
}
