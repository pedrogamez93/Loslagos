<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documentonew;
use App\Models\Acta;
use App\Models\Acuerdo;
use App\Models\ResumenGastos;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Storage;
use App\Models\DocumentoGeneral;

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



    
public function store(Request $request)
{
    try {
        // Iniciar una transacción
        DB::beginTransaction();

        $archivoPath = null; // Inicializa la variable $archivoPath

        if ($request->hasFile('archivo')) {
            $archivoPath = $request->file('archivo')->store('public/documentos');
        }
        
        
        $documento = Documentonew::create(array_merge(
            $request->except(['_token']),
            ['archivo' => $archivoPath] // Utiliza url para obtener la ruta relativa
        ));

        // Obtener el último ID insertado
        $lastInsertedId = $documento->id;

        switch ($request->tipo_documento) {
            case 'Actas':
                $acta = new Acta(['documentonew_id' => $lastInsertedId]);
                $acta->save();
                break;

            case 'Acuerdos':
                $acuerdo = new Acuerdo(['documentonew_id' => $lastInsertedId]);
                $acuerdo->save();
                break;

            case 'Resumengastos':
                $resumengastos = new ResumenGastos([
                    'documentonew_id' => $lastInsertedId,
                    'nombre' => $request->input('nombre'),
                    'portada' => $request->input('portada'),
                    'publicacion' => $request->input('publicacion'),
                    'categoria' => $request->input('categoria'),
                ]);
                $resumengastos->save();
                break;

            case 'Documentogeneral':
                $documentogeneral = new DocumentoGeneral([
                    'documentonew_id' => $lastInsertedId,
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
                break;

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
    // Busca el documento por su ID
    $documento = Documentonew::findOrFail($id);

    // Obtiene la ruta completa del archivo en el almacenamiento
    $filePath = storage_path('app/documentos/' . $documento->archivo);

    // Verifica si el archivo existe
    if (file_exists($filePath)) {
        // Retorna la respuesta de descarga
        return response()->download($filePath, basename($documento->archivo));
    } else {
        // Redirige de vuelta con un mensaje de error si el archivo no existe
        return redirect()->back()->with('error', 'El archivo no existe.');
    }
}

    

    

public function buscar(Request $request)
{
    // Validación de la entrada del usuario
    $request->validate([
        'tipo_documento' => 'nullable',
        'nombre' => 'nullable',
    ]);

    // Obtén las entradas del usuario tal como se ingresaron
    $categoria = $request->input('tipo_documento');
    $nombre = $request->input('nombre');

    // Crear la consulta base
    $documentos = Documentonew::query();

    // Si hay una categoría, filtra por ella
    if ($categoria) {
        $documentos->where('tipo_documento', $categoria);
    }

    // Si hay un nombre, añade filtros de búsqueda
    if ($nombre) {
        $documentos->where(function ($query) use ($nombre) {
            $query->where('archivo', 'LIKE', "%$nombre%")
                  ->orWhere('tipo_documento', 'LIKE', "%$nombre%")
                  ->orWhere('tema', 'LIKE', "%$nombre%")
                  ->orWhere('numero_sesion', 'LIKE', "%$nombre%")
                  ->orWhere('provincia', 'LIKE', "%$nombre%")
                  ->orWhere('comuna', 'LIKE', "%$nombre%");
        });
    }

    // Clonar la consulta antes de la paginación
    $documentos2 = clone $documentos;

    // Añadir logs de depuración
    Log::info("Buscar documentos con categoría: " . json_encode($categoria) . " y nombre: " . json_encode($nombre));

    // Paginación
    $documentos = $documentos->paginate(12);

    // Si no se encuentran documentos, registrar en log y mostrar vista de sin resultados
    if ($documentos->isEmpty()) {
        Log::info("No se encontraron documentos para la búsqueda con categoría: " . json_encode($categoria) . " y nombre: " . json_encode($nombre));
        return view('documentos.sinResultados');
    }

    // Devolver la vista con los documentos encontrados
    return view('documentos.resultados', compact('documentos', 'documentos2'));
}

    public function descargarArchivo($archivo)
{
    // Define la ruta del archivo en el almacenamiento
    $rutaArchivo = "public/documentos/$archivo";

    // Verifica si el archivo existe en el almacenamiento
    if (Storage::exists($rutaArchivo)) {
        // Obtén el contenido del archivo
        $contenido = Storage::get($rutaArchivo);

        // Obtén el tipo MIME del archivo
        $tipoMime = Storage::mimeType($rutaArchivo);

        // Configura las cabeceras para la descarga
        $cabeceras = [
            'Content-Type' => $tipoMime,
            'Content-Disposition' => "attachment; filename=\"$archivo\"",
        ];

        // Devuelve la respuesta con el contenido del archivo y las cabeceras
        return response($contenido, 200, $cabeceras);
    } else {
        // Maneja el caso en que el archivo no existe
        return redirect()->back()->with('error', 'El archivo no existe.');
    }
}

    


}
