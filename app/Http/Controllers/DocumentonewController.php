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
            'tipo_documento' => 'nullable|string',
            'nombre' => 'nullable|string',
        ]);
    
        $categoria = trim($request->input('tipo_documento'));
        $nombre = trim($request->input('nombre'));
    
        // Log para depuración de los parámetros recibidos
        Log::info("Parámetros de búsqueda recibidos: tipo_documento = '$categoria', nombre = '$nombre'");
    
        // Inicializar el query
        $documentos = Documentonew::query();
    
        // Aplicar filtro por categoría si está presente
        if ($categoria) {
            $documentos->whereRaw('LOWER(tipo_documento) LIKE ?', ['%' . strtolower($categoria) . '%']);
            Log::info("Filtro aplicado: tipo_documento = $categoria");
        }
    
        // Aplicar filtro por nombre si está presente
        if ($nombre) {
            $documentos->where(function($query) use ($nombre) {
                $query->whereRaw('LOWER(archivo) LIKE ?', ['%' . strtolower($nombre) . '%'])
                      ->orWhereRaw('LOWER(tema) LIKE ?', ['%' . strtolower($nombre) . '%'])
                      ->orWhereRaw('CAST(numero_sesion AS TEXT) LIKE ?', ['%' . strtolower($nombre) . '%'])
                      ->orWhereRaw('LOWER(lugar) LIKE ?', ['%' . strtolower($nombre) . '%'])
                      ->orWhereRaw('LOWER(comuna) LIKE ?', ['%' . strtolower($nombre) . '%'])
                      ->orWhereRaw('LOWER(provincia) LIKE ?', ['%' . strtolower($nombre) . '%'])
                      ->orWhereRaw('LOWER(tipo_documento) LIKE ?', ['%' . strtolower($nombre) . '%']);
            });
            Log::info("Filtro aplicado: nombre = $nombre");
        }
    
        // Paginar los resultados
        $documentos = $documentos->paginate(15);
        Log::info("Documentos encontrados: " . json_encode($documentos->items()));
    
        // Verificar si la búsqueda no arrojó resultados
        if ($documentos->isEmpty()) {
            Log::info("No se encontraron documentos que coincidan con los criterios de búsqueda.");
            return view('documentos.sinResultados');
        }
    
        // Nueva consulta para los últimos 5 archivos
        $ultimosDocumentos = Documentonew::where('publicacion', 'si')
                                        ->where('portada', 'si')
                                        ->orderBy('created_at', 'desc')
                                        ->take(5)
                                        ->get();
        Log::info("Últimos documentos encontrados: " . json_encode($ultimosDocumentos));
    
        return view('documentos.resultados', compact('documentos', 'ultimosDocumentos'));
    }
    
    
    
    public function store(Request $request)
    {
        // Registrar que el método store ha sido invocado
        Log::info('Método store invocado.');
    
        try {
            // Iniciar una transacción
            DB::beginTransaction();
    
            $archivoPath = null; // Inicializa la variable $archivoPath
    
            if ($request->hasFile('archivo')) {
                $archivoPath = $request->file('archivo')->store('public/documentos');
                Log::info('Archivo subido:', ['path' => $archivoPath]);
            } else {
                Log::info('No se subió ningún archivo.');
            }
    
            // Crear el objeto $documento después de asignar la ruta relativa
            $documento = Documentonew::create(array_merge(
                $request->except(['_token']),
                ['archivo' => $archivoPath] // Utiliza url para obtener la ruta relativa
            ));
            Log::info('Documento creado:', ['documento_id' => $documento->id]);
    
            // Dependiendo del tipo de documento, crea el registro correspondiente en la tabla específica
            switch ($request->tipo_documento) {
                case 'Actas':
                    $lastActaId = Acta::max('id') + 1;
                    $acta = new Acta(['id' => $lastActaId, 'documentonew_id' => $documento->id]);
                    $acta->save();
                    $documento->acta()->save($acta);
                    Log::info('Acta creada:', ['acta_id' => $acta->id]);
                    break;
    
                case 'Acuerdos':
                    $lastAcuerdoId = Acuerdo::max('id') + 1;
                    $acuerdo = new Acuerdo(['id' => $lastAcuerdoId, 'documentonew_id' => $documento->id]);
                    $acuerdo->save();
                    $documento->acuerdo()->save($acuerdo);
                    Log::info('Acuerdo creado:', ['acuerdo_id' => $acuerdo->id]);
                    break;
    
                case 'Resumengastos':
                    $lastResumengastosId = ResumenGastos::max('id') + 1;
                    $resumengastos = new ResumenGastos([
                        'id' => $lastResumengastosId,
                        'documentonew_id' => $documento->id,
                        'nombre' => $request->input('nombre'),
                        'portada' => $request->input('portada'),
                        'publicacion' => $request->input('publicacion'),
                        'categoria' => $request->input('categoria'),
                    ]);
                    $resumengastos->save();
                    $documento->resumenGastos()->save($resumengastos);
                    Log::info('Resumen de gastos creado:', ['resumengastos_id' => $resumengastos->id]);
                    break;
    
                case 'Documentogeneral':
                    $lastDocumentogeneralId = DocumentoGeneral::max('id') + 1;
                    $documentogeneral = new DocumentoGeneral([
                        'id' => $lastDocumentogeneralId,
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
                    $documento->documentoGeneral()->save($documentogeneral);
                    Log::info('Documento general creado:', ['documentogeneral_id' => $documentogeneral->id]);
                    break;
    
                // Agrega más casos según sea necesario
    
                default:
                    Log::warning('Tipo de documento no manejado:', ['tipo_documento' => $request->tipo_documento]);
                    break;
            }
    
            // Confirmar la transacción
            DB::commit();
    
            Log::info('Transacción completada exitosamente.');
            return redirect()->route('documentos.create')->with('success', 'Documento creado exitosamente.');
        } catch (\Exception $e) {
            // Revertir la transacción en caso de error
            DB::rollBack();
    
            Log::error('Error al crear el documento:', ['error' => $e->getMessage()]);
    
            // Imprimir mensaje de error en el navegador (puede ser removido en producción)
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

    
    public function indexTabla(Request $request)
    {
        $query = Documentonew::query();

        if ($request->filled('tipo_documento')) {
            $query->where('tipo_documento', 'like', '%' . $request->tipo_documento . '%');
        }

        if ($request->filled('tema')) {
            $query->where('tema', 'like', '%' . $request->tema . '%');
        }

        if ($request->filled('lugar')) {
            $query->where('lugar', 'like', '%' . $request->lugar . '%');
        }

        $documentos = $query->paginate(10);

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

    

        public function destroy($id)
        {
            $documento = Documentonew::findOrFail($id);
            $documento->delete();

            return redirect()->route('documentos.verdocumentos')->with('success', 'Documento eliminado exitosamente');
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
