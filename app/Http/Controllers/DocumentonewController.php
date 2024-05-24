<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documentonew;
use App\Models\Acta;
use App\Models\Acuerdo;
use App\Models\ResumenGastos;

use Illuminate\Support\Facades\Storage;
use App\Models\DocumentoGeneral;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class DocumentonewController extends Controller
{

 



    // Mostrar todos los documentos
    public function index()
    {
        
        $documentos = Documentonew::with(['acta', 'acuerdo', 'resumenGastos', 'documentoGeneral'])->get();


        return view('documentos.index', compact('documentos'));
    }

    // Mostrar el formulario para crear un nuevo documento
    public function create()
    {
       

        return view('documentos.create');
    }


    public function buscar(Request $request)
    {
        $request->validate([
            'tipo_documento' => 'nullable',
            'nombre' => 'nullable',
        ]);
    
        $categoria = $request->input('tipo_documento');
        $nombre = $request->input('nombre');
    
        $documentos = Documentonew::query();
    
        if ($categoria) {
            $documentos->where('tipo_documento', $categoria);
        }
    
        if ($nombre) {
            $documentos->where(function($query) use ($nombre) {
                $query->where('archivo', 'LIKE', "%$nombre%")
                      ->orWhere('tema', 'LIKE', "%$nombre%")
                      ->orWhere('numero', 'LIKE', "%$nombre%")
                      ->orWhere('lugar', 'LIKE', "%$nombre%")
                      ->orWhere('comuna', 'LIKE', "%$nombre%")
                      ->orWhere('provincia', 'LIKE', "%$nombre%")
                      ->orWhere('tipo_documento', 'LIKE', "%$nombre%");
            });
        }
    
        $documentos = $documentos->paginate(52);
    
        if ($documentos->isEmpty()) {
            return view('documentos.sinResultados');
        }
    
        // Nueva consulta para los últimos 5 archivos
        $ultimosDocumentos = Documentonew::where('publicacion', 'si')
                                        ->where('portada', 'si')
                                        ->orderBy('created_at', 'desc')
                                        ->take(5)
                                        ->get();
    
        return view('documentos.resultados', compact('documentos', 'ultimosDocumentos'));
    }
    
    
    
    
public function store(Request $request)
{
    try {

        
        // Iniciar una transacción
        DB::beginTransaction();
    
       
        $archivoPath = null; // Inicializa la variable $archivoPath

        if ($request->hasFile('archivo')) {
            $archivoPath = $request->file('archivo')->store('public/documentos');
        }
        
        // Crear el objeto $documento después de asignar la ruta relativa
        $documento = Documentonew::create(array_merge(
            $request->except(['_token']),
            ['archivo' => $archivoPath] // Utiliza url para obtener la ruta relativa
        ));


        // Dependiendo del tipo de documento, crea el registro correspondiente en la tabla específica
        switch ($request->tipo_documento) {
            case 'Actas':
                $acta = new Acta(['documentonew_id' => $documento->id]);
                $acta->save();
                // Establece la relación en el modelo Documentonew
                $documento->acta()->save($acta);
                break;

            case 'Acuerdos':
                $acuerdo = new Acuerdo(['documentonew_id' => $documento->id]);
                $acuerdo->save();
                // Establece la relación en el modelo Documentonew
                $documento->acuerdo()->save($acuerdo);
                break;

                case 'Resumengastos':
                    $resumengastos = new ResumenGastos([
                        'documentonew_id' => $documento->id,
                        'nombre' => $request->input('nombre'), // Ajusta con el nombre correcto del campo
                        'portada' => $request->input('portada'), // Ajusta con el nombre correcto del campo
                        'publicacion' => $request->input('publicacion'), // Ajusta con el nombre correcto del campo
                        'categoria' => $request->input('categoria'),
                    ]);
                    $resumengastos->save();
                    // Establece la relación en el modelo Documentonew
                    $documento->resumenGastos()->save($resumengastos);
                    break;
                

                case 'Documentogeneral':
                    $documentogeneral = new DocumentoGeneral([
                        'documentonew_id' => $documento->id,
                        'categoria' => $request->input('categoria'),
                        'titulo' => $request->input('titulo'),
                        'autor' => $request->input('autor'),
                        'sector' => $request->input('sector'),
                        'sub_sector' => $request->input('sub_sector'),
                        'financiamiento' => $request->input('financiamiento'),
                        'descripcion' => $request->input('descripcion'),
                        'portada' => $request->input('portada'),
                        'publicacion' => $request->input('publicacion'),
                    ]);
                    $documentogeneral->save();
                    // Establece la relación en el modelo Documentonew
                    $documento->documentoGeneral()->save($documentogeneral);
                    break;
                

            // Agrega más casos según sea necesario

            default:
                // Manejar otro tipo de documento si es necesario
                break;
        }

        // Confirmar la transacción
        DB::commit();

        return redirect()->route('documentos.create')->with('success', 'Documento creado exitosamente.');
    } catch (\Exception $e) {
        // Revertir la transacción en caso de error
        DB::rollBack();

        // Imprimir mensaje de error en el navegador
        dd($e->getMessage());

        // Manejar el error de manera apropiada (puede loggearse, mostrarse al usuario, etc.)
        return redirect()->back()->with('error', 'Error al crear el documento: ' . $e->getMessage());
    }
}

    // Mostrar un documento específico
    public function show($id)
    {
        $documento = Documentonew::with(['acta', 'acuerdo', 'resumenGastos', 'documentoGeneral'])->findOrFail($id);
        return view('documentos.show', compact('documento'));
    }

    public function indexTabla()
    {
        // Obtener todos los documentos con las relaciones cargadas
        $documentos = Documentonew::with(['acta', 'acuerdo', 'resumenGastos', 'documentoGeneral'])
                    ->paginate(10);
    
        // Retornar la vista con los documentos para mostrar en la tabla
        return view('documentos.tabladocumentos', compact('documentos'));
    }
    

    public function edit($id)
    {
        // Eager load the related models
        $documento = Documentonew::with(['acta', 'acuerdo', 'resumenGastos', 'documentoGeneral'])
            ->findOrFail($id);
    
        return view('documentos.edit', compact('documento'));
    }
    

    public function update(Request $request, $id)
{
    // Validación de datos
    // Puedes agregar aquí las reglas de validación según tus necesidades
    
    $documento = Documentonew::with(['acta', 'acuerdo', 'resumenGastos', 'documentoGeneral'])
                      ->findOrFail($id);

    // Update Documentonew with the provided data in the request
    $documento->fill($request->except(['_token'])); // Set the new values without saving

    // Check each field for changes and save only if there are changes
    if ($documento->isDirty()) {
        $documento->save();
    }

    // Now check for each related model and update accordingly
    $relationships = ['acta', 'acuerdo', 'resumenGastos', 'documentoGeneral'];

    foreach ($relationships as $relationship) {
        if ($documento->{$relationship}) {
            $documento->{$relationship}->fill($request->only($documento->{$relationship}->getFillable()));
            // Again, check if fields have been changed before saving
            if ($documento->{$relationship}->isDirty()) {
                $documento->{$relationship}->save();
            }
        }
    }

    return redirect()->route('documentos.verdocumentos')->with('success', 'Documento actualizado exitosamente.');
}

    

    // Eliminar un documento de la base de datos
    public function destroy($id)
    {
        $documento = Documentonew::findOrFail($id);
        $documento->delete();

        return redirect()->route('documentos.verdocumentos')->with('success', 'Documento eliminado exitosamente.');
    }

    public function download($id)
    {
        $documento = Documentonew::find($id);
    
        // Log para depuración del documento
        Log::info("Documento encontrado: " . json_encode($documento));
    
        if ($documento) {
            return $this->descargarArchivo($documento->archivo);
        } else {
            return response()->json(['error' => 'Documento no encontrado.'], 404);
        }
    }
   
    
    public function descargarArchivo($archivo)
    {
        // Log para depuración del nombre del archivo original
        Log::info("Nombre del archivo original: '$archivo'");
    
        // Limpiar el nombre del archivo para eliminar espacios en blanco, tabulaciones y caracteres especiales
        $archivo = trim($archivo);
        $archivo = str_replace("\t", "", $archivo);
        $archivo = preg_replace('/[^A-Za-z0-9_\-\.]/', '', $archivo);
    
        // Log para depuración del nombre del archivo limpio
        Log::info("Nombre del archivo limpio: '$archivo'");
    
        // Ajustar la ruta del archivo para reflejar la ubicación correcta
        $rutaArchivo = storage_path("app/documentos/$archivo");
    
        // Log para depuración de la ruta del archivo
        Log::info("Ruta del archivo: '$rutaArchivo'");
    
        // Verificar si el archivo existe
        if (file_exists($rutaArchivo)) {
            // Obtener el contenido del archivo
            $contenido = file_get_contents($rutaArchivo);
    
            // Obtener el tipo MIME del archivo
            $tipoMime = mime_content_type($rutaArchivo);
    
            // Configurar las cabeceras para la descarga
            $cabeceras = [
                'Content-Type' => $tipoMime,
                'Content-Disposition' => "attachment; filename=$archivo",
            ];
    
            // Devolver la respuesta con el contenido del archivo y las cabeceras
            return response($contenido, 200, $cabeceras);
        } else {
            // Manejar el caso en que el archivo no existe
            Log::error("El archivo no existe: $rutaArchivo");
            return response()->json(['error' => 'El archivo no existe.'], 404);
        }
    }
    


}
