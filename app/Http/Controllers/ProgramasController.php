<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programas;
use App\Models\Programasbtn;
use App\Models\ProgramasColecciones;
use App\Models\ProgramasDescripciones;
use App\Models\ProgramasDocumentos;
use App\Models\ProgramasFotografias;


class ProgramasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programas = Programas::all(); // Cambiar el nombre del modelo

        return view('programas.index', compact('programas'));
    //IMPRESION DE LA RELACION DE TABLAS
        $programas = Programas::with('descripcion')->get();
        return view('programas.index', compact('programas'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required',
            'bajada' => 'required',
            'bajada_programa' => 'required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          //  'imagen' => 'required|image|mimes:png,jpg,jpeg|max:2048', // Ajusta los formatos y el tamaño según tus necesidades
        ]);

        
        $programas = Programas::create($data);
        $programasid = $programas->id;
        $seleccion = $request->input('si_descripcion');
        $seleccion_btn = $request->input('si_btn');
        $seleccion_coleccion = $request->input('si_coleccion');

        // Procesar la imagen si está presente
        if ($request->hasFile('imagen')) {
            $iconoPath = $request->file('imagen')->store('imagenes_programas' , 'public');
            $programas->update(['imagen' => $iconoPath]);
        }
        /*// Procesar documentos (individuales y comprimidos)
        $nombreDocumento = $request->input('nombreDocumento') ?? [];

        $urlDocumento = $request->file('urlDocumento');
        //echo count($urlDocumento);

        foreach ($urlDocumento ?? [] as $key => $documento) {
             $nombreDocumento = $nombreDocumento[$key]?? 'documento_' . ($key + 1);
             $urlDocumento = $documento->store('documentosdeprograma', 'public');

            // Almacena en la base de datos
             ProgramasDocumentos::create([
                'nombreDocumento' => $nombreDocumento,
                'urlDocumento' => $urlDocumento,
                'programa_id' => $programasid,
            ]);
        }*/


        try {
            // Procesar documentos (individuales y comprimidos)
            $nombreDocumento = $request->input('nombreDocumento');
            $urlDocumento = $request->file('urlDocumento') ?? [];
    
            foreach ($urlDocumento ?? [] as $key => $documento) {
                $nombreDocumento = $nombresDocumentos[$key] ?? 'documento_' . ($key + 1);
                $urlDocumento = $documento->store('documentosprogramas');
                
                // Almacena en la base de datos
                    ProgramasDocumentos::create([
                    'programa_id' => $programas->id,
                    'nombreDocumento' => $nombreDocumento,
                    'urlDocumento' => $urlDocumento,
                ]);
            }
        } catch (\Exception $e) {
            // Manejar la excepción, por ejemplo, registrar un mensaje en los logs
            \Log::error('Error al procesar documentos: ' . $e->getMessage());
        }

        
          //DESCRIPCION
        if ($seleccion=="option1"){
            $titulo_descripcion = $request->input('titulo_descripcion', []);
            $bajada_descripcion = $request->input('bajada_descripcion', []);

            foreach ($titulo_descripcion ?? [] as $key => $campo) {
              ProgramasDescripciones::create(['titulo_descripcion' => $titulo_descripcion[$key],'bajada_descripcion' => $bajada_descripcion[$key],'programa_id' => $programasid]); // Ajusta según tus necesidades
             }
        }
            //botones
            if ($seleccion_btn=="option1"){
                $nombrebtn = $request->input('nombrebtn', []);
                $urlbtn = $request->input('urlbtn', []);

                foreach ($nombrebtn ?? [] as $key => $campo) {
                Programasbtn::create(['nombrebtn' => $nombrebtn[$key],'urlbtn' => $urlbtn[$key],'programa_id' => $programasid]); // Ajusta según tus necesidades
                }
            }

                //colecciones
                if ($seleccion_coleccion == "option1") {
                    $titulo_coleccion = $request->input('titulo_coleccion', []);
                
                    foreach ($titulo_coleccion ?? [] as $key => $titulo) {
                        $coleccionesid = ProgramasColecciones::create([
                            'titulo_coleccion' => $titulo_coleccion[$key],
                            'programa_id' => $programasid
                        ]); // Ajusta según tus necesidades
                
                        $coleccionesid = $coleccionesid->id;
                
                        if ($request->hasFile('ruta')) {
                            // Recorrer cada archivo asociado a la colección actual
                            foreach ($request->file('ruta') ?? [] as $archivo) {
                                // Realizar alguna operación con cada archivo, como almacenarlo, validar, etc.
                                $nombreArchivo = $archivo->getClientOriginalName();
                                $ruta = $archivo->storeAs('directorio_destino', $nombreArchivo);
                
                                $fotografiasid = ProgramasFotografias::create([
                                    'ruta' => $ruta,
                                    'coleccion_id' => $coleccionesid
                                ]); // Ajusta según tus necesidades
                            }
                        }
                    }
                }
                return redirect()->route('programas.index')->with('success', 'Programa creado exitosamente.');
    }
    public function mostrarImagen($imagen) {
        return response()->file(storage_path('app/public/imagenes_programas/' . $imagen));
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
            $programaColecciones = Programas::with('colecciones')->findOrFail($id);
            $programa  = Programas::findOrFail($id);
            $programaDescripcion = $programa->descripcion;
            $programaBtn = $programa->botones; 
            $programaDocumentos = $programa->documentos; 
            /*$programaColecciones = $programa->colecciones; 
            $programaFotografias = $programaColecciones->fotografias; */

          
           

            //$programa = Programas::where('id', $id)->get();
            return view('programas.show', compact('programa', 'programaDescripcion', 'programaBtn', 'programaDocumentos'));
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $programa=Programas::findOrfail($id);
        return view('programas.edit', compact('programa') );
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
        $programa = request()->except(['_token' , '_method']);
        Programas::where('id' , '=' ,$id)->update($programa);

        $programa=Programas::findOrfail($id);
        return redirect()->route('programas.index')->with('success', 'Programa editado exitosamente.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    // Buscar el programa por ID
    $programa = Programas::find($id);

    // Verificar si el programa existe
    if ($programa) {
        // Eliminar descripciones relacionadas
        $programa->descripcion()->delete();

        // Eliminar botones relacionados
        $programa->botones()->delete();

        // Eliminar documentos relacionados
        $programa->documentos()->delete();

        // Obtener y eliminar colecciones relacionadas
        $colecciones = $programa->colecciones;
        foreach ($colecciones as $coleccion) {
            // Eliminar fotografías asociadas a la colección
            $coleccion->fotografias()->delete();
        }

        // Eliminar colecciones relacionadas
        $programa->colecciones()->delete();

        // Finalmente, eliminar el programa
        $programa->delete();

        return redirect()->route('programas.index')->with('success', 'Programa eliminado exitosamente.');
    }

    return redirect()->route('programas.index')->with('error', 'No se encontró el programa.');
}

    
}
