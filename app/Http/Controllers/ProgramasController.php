<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programas;
use App\Models\Programasbtn;
use App\Models\ProgramasColecciones;
use App\Models\ProgramasDescripciones;
use App\Models\ProgramasDocumentos;
use App\Models\ProgramasFotografias;
use Illuminate\Support\Facades\Storage;




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
    $iconoPath = $request->file('imagen')->store('imagenes_programas', 'public');
    $programas->update(['imagen' => $iconoPath]);
}

try {
    // Procesar documentos (individuales y comprimidos)
    $nombresDocumentos = $request->input('nombreDocumento');
    $urlDocumentos = $request->file('urlDocumento') ?? [];

    foreach ($urlDocumentos as $key => $documento) {
        // Obtener el nombre original del documento
        $nombreOriginal = $documento->getClientOriginalName();
        
        // Guardar el documento con su nombre original
        $urlDocumento = $documento->storeAs('documentosprogramas', $nombreOriginal);

        // Almacena en la base de datos
        ProgramasDocumentos::create([
            'programa_id' => $programas->id,
            'nombreDocumento' => $nombreOriginal,
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
                            $ruta = 'public/directorio_destino/' . $nombreArchivo;
                            $archivo->move(public_path('directorio_destino'), $nombreArchivo);
            
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
    $programa = Programas::findOrFail($id);
    $botones = $programa->botones;
    $descripciones = $programa->descripcion;
    $documentos = $programa->documentos;
    $colecciones = $programa->colecciones;

    // Obtener las fotografías de cada colección
    foreach ($colecciones as $coleccion) {
        $coleccion->fotografias;
    }

    return view('programas.edit', compact('programa', 'botones', 'descripciones', 'documentos', 'colecciones'));
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
    // Validar los datos entrantes
    $request->validate([
        'titulo' => 'required|string|max:255',
        'bajada' => 'nullable|string',
        'bajada_programa' => 'nullable|string',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Encontrar el programa
    $programa = Programas::findOrFail($id);

    // Actualizar los campos del programa
    $programa->titulo = $request->input('titulo');
    $programa->bajada = $request->input('bajada');
    $programa->bajada_programa = $request->input('bajada_programa');

    // Procesar la imagen si está presente
    if ($request->hasFile('imagen')) {
        // Eliminar la imagen anterior si existe
        if ($programa->imagen) {
            Storage::delete('public/' . $programa->imagen);
        }

        // Guardar la nueva imagen
        $iconoPath = $request->file('imagen')->store('imagenes_programas', 'public');
        $programa->imagen = $iconoPath;
    }

    // Guardar los cambios
    $programa->save();

    // Redirigir con mensaje de éxito
    return redirect()->route('programas.index')->with('success', 'Programa editado exitosamente.');
}


    public function agregarDescripcion(Request $request, $id)
{
    // Validación de los datos del formulario si es necesario

    // Buscar el programa por ID
    $programa = Programas::find($id);
    $seleccion = $request->input('si_descripcion');

    // Verificar si el programa existe
    if ($programa) {
        if ($seleccion == "si") { // Corregir aquí para que coincida con el valor del formulario
            $titulo_descripcion = $request->input('titulo_descripcion', []);
            $bajada_descripcion = $request->input('bajada_descripcion', []);

            foreach ($titulo_descripcion as $key => $titulo) { // No necesitas el operador de fusión de null aquí
                ProgramasDescripciones::create([
                    'titulo_descripcion' => $titulo,
                    'bajada_descripcion' => $bajada_descripcion[$key], // Accede al mismo índice en el array de bajada_descripcion
                    'programa_id' => $programa->id
                ]);
            }

            return redirect()->back()->with('success', 'Texto descriptivo agregado correctamente.');
        } else {
            // No se seleccionó agregar descripción, puedes agregar un mensaje de error si lo deseas
            return redirect()->back()->with('error', 'No se seleccionó agregar descripción.');
        }
    }

    return redirect()->back()->with('error', 'No se encontró el programa.');
}



public function agregarBoton(Request $request, $id)
{
    // Buscar el programa por ID
    $programa = Programas::find($id);
    $seleccion = $request->input('si_boton');

    // Verificar si el programa existe
    if ($programa) {
        if ($seleccion == "si") {
            

// Obtener los datos del formulario
$textos_boton = $request->input('nombrebtn', []);
$urls_boton = $request->input('urlbtn', []);


            // Verificar si se han proporcionado datos para los botones
            if (!empty($textos_boton) && !empty($urls_boton)) {
                // Iterar sobre los botones proporcionados
                foreach ($textos_boton as $key => $texto) {
                    // Crear un nuevo botón en la base de datos
                    Programasbtn::create([
                        'nombrebtn' => $texto,
                        'urlbtn' => $urls_boton[$key],
                        'programa_id' => $programa->id

                    ]);
                }

                return redirect()->back()->with('success', 'Botones agregados correctamente.');
            } else {
                // No se proporcionaron datos para los botones
                return redirect()->back()->with('error', 'Por favor, proporcione al menos un botón para agregar.');
            }
        } else {
            // No se seleccionó agregar botones
            return redirect()->back()->with('info', 'No se seleccionó agregar botones.');
        }
    }

    return redirect()->back()->with('error', 'No se encontró el programa.');
}





public function agregarDocumento(Request $request, $id)
{
    // Buscar el programa por ID
    $programa = Programas::find($id);

    // Verificar si el programa existe
    if ($programa) {
        // Obtener los archivos cargados
        $documentos = $request->file('urlDocumento');

        // Verificar si se han cargado archivos
        if ($documentos) {
            foreach ($documentos as $documento) {
                // Guardar cada archivo en la carpeta deseada y registrar la información en la base de datos
                $documento_path = $documento->store('documentos');
                ProgramasDocumentos::create([
                    'nombreDocumento' => $documento->getClientOriginalName(),
                    'urlDocumento' => $documento_path,
                    'programa_id' => $programa->id
                ]);
            }
            return redirect()->back()->with('success', 'Documentos agregados correctamente.');
        } else {
            return redirect()->back()->with('error', 'No se seleccionaron documentos para agregar.');
        }
    }

    return redirect()->back()->with('error', 'No se encontró el programa.');
}


public function agregarFotografia(Request $request, $id)
{
    // Buscar el programa por ID
    $programa = Programas::find($id);
    $seleccion = $request->input('si_fotografia');

    // Verificar si el programa existe
    if ($programa) {
        if ($seleccion == "si") {
            // Obtener las fotografías cargadas
            $fotografias = $request->file('fotografias');

            // Verificar si se han cargado fotografías
            if ($fotografias) {
                // Asumiendo que el programa tiene una colección existente
                $coleccion = $programa->colecciones()->first(); // Obtener la primera colección asociada al programa

                if ($coleccion) {
                    foreach ($fotografias as $fotografia) {
                        // Guardar cada fotografía en la carpeta 'public/directorio_destino'
                        $nombreArchivo = $fotografia->getClientOriginalName();
                        $ruta = 'directorio_destino/' . $nombreArchivo;
                        $fotografia->move(public_path('directorio_destino'), $nombreArchivo);

                        // Agregar la fotografía a la colección existente
                        $coleccion->fotografias()->create([
                            'nombre' => $nombreArchivo,
                            'ruta' => $ruta,
                        ]);
                    }
                    return redirect()->back()->with('success', 'Fotografías agregadas correctamente a la colección.');
                } else {
                    return redirect()->back()->with('error', 'No se encontró una colección asociada al programa.');
                }
            } else {
                return redirect()->back()->with('error', 'No se seleccionaron fotografías para agregar.');
            }
        } else {
            // No se seleccionó agregar fotografías
            return redirect()->back()->with('info', 'No se seleccionó agregar fotografías.');
        }
    }

    return redirect()->back()->with('error', 'No se encontró el programa.');
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

public function destroyBoton($id)
{
    $boton = Programasbtn::findOrFail($id);
    $boton->delete();

    return redirect()->back()->with('success', 'Botón eliminado correctamente.');
}



// Método para eliminar una descripción
public function destroyDescripcion($id)
{
    $descripcion = ProgramasDescripciones::findOrFail($id);
    $descripcion->delete();

    return redirect()->back()->with('success', 'Descripción eliminada correctamente.');
}

// Método para eliminar un documento
public function destroyDocumento($id)
{
    $documento = ProgramasDocumentos::findOrFail($id);
    $documento->delete();

    return redirect()->back()->with('success', 'Documento eliminado correctamente.');
}

// Método para eliminar una fotografía
public function destroyFotografia($id)
{
    $fotografia = ProgramasFotografias::findOrFail($id);
    $fotografia->delete();

    return redirect()->back()->with('success', 'Fotografía eliminada correctamente.');
}


 public function abrirDocumento($id)
    {
        // Encuentra el documento por ID
        $documento = ProgramasDocumentos::find($id);
        
        if (!$documento) {
            // Maneja el caso en que el documento no se encuentra
            return response()->json(['error' => 'Documento no encontrado'], 404);
        }

        // Obtén la URL del documento
        $path = storage_path('app/' . $documento->urlDocumento);

        // Verifica si el archivo existe
        if (!file_exists($path)) {
            return response()->json(['error' => 'Archivo no encontrado en el servidor'], 404);
        }

        // Forzar la descarga del archivo
        return response()->download($path, $documento->nombreDocumento);
    }
    
}
