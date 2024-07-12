<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Documento;
use App\Models\DocumentoGeneral;
use App\Models\Documentonew;
use App\Models\Acta;
use App\Models\Acuerdo;
use App\Models\ResumenGastos;
use App\Models\Sesion;
use App\Models\Documento_Sesion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Node\Block\Document;
use Illuminate\Support\Facades\Log;
class ConsejoRegionalDocsViewsController extends Controller
{
    public function Indexactas()
    {
        // Obtener los documentos de tipo "Acta"
        $documentosActas = Documentonew::where('tipo_documento', 'Acta')
            ->orderBy('fecha_hora_sesion', 'desc')
            ->paginate(8);
    
        return view('consejoregionaldocsviews.actas.index', ['actas' => $documentosActas]);
    }

    public function showActa($id)
    {
        // Obtener la acta específica por ID y su relación con Documentonew
        $acta = Acta::with('documentonew')->findOrFail($id);

        // Pasar la acta a la vista de detalles
        return view('consejoregionaldocsviews.actas.show', ['acta' => $acta]);
    }

    public function downloadActas($id)
    {
        $documento = Documentonew::findOrFail($id);
    
        // Log para depuración del documento
        \Log::info("Documento encontrado: " . json_encode($documento));
    
        if ($documento) {
            // Ajuste de la ruta eliminando el prefijo duplicado 'public/public/' y reemplazando '\' por '/'
            $rutaCompleta = str_replace('public/public/', 'public/', $documento->archivo);
            $rutaCompleta = str_replace('\\', '/', $rutaCompleta);
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
    

    
    public function download($id)
    {
        // Busca el documento por su ID
        $documento = Documentonew::findOrFail($id);
    
        // Obtiene la ruta completa del archivo en el almacenamiento
        $filePath = storage_path('app/documentos/' . $documento->archivo);
    
        // Log para depurar la ruta del archivo
        Log::info('Ruta del archivo: ' . $filePath);
    
        // Verifica si el archivo existe
        if (file_exists($filePath)) {
            // Log para depurar la existencia del archivo
            Log::info('El archivo existe: ' . $filePath);
    
            // Retorna la respuesta de descarga
            return response()->download($filePath, basename($documento->archivo));
        } else {
            // Log para depurar la no existencia del archivo
            Log::error('El archivo no existe: ' . $filePath);
    
            // Retorna una respuesta JSON con un mensaje de error
            return response()->json(['error' => 'El archivo no existe. Ruta verificada: ' . $filePath], 404);
        }
    }
    

public function Indexcertificadosdeacuerdos(Request $request)
{
    $query = Acuerdo::with('documentonew');

    // Aplicar filtros si están presentes en la solicitud
    if ($request->filled('fecha_dia')) {
        $query->whereDay('fecha', $request->input('fecha_dia'));
    }
    if ($request->filled('fecha_mes')) {
        $query->whereMonth('fecha', $request->input('fecha_mes'));
    }
    if ($request->filled('fecha_ano')) {
        $query->whereYear('fecha', $request->input('fecha_ano'));
    }
    if ($request->filled('codigo_bip')) {
        $query->where('codigo_bip', 'like', '%' . $request->input('codigo_bip') . '%');
    }

    // Ordenar los acuerdos por fecha en orden descendente
    $query->orderBy('fecha', 'desc');

    // Obtener los acuerdos paginados
    $acuerdos = $query->paginate(10);

    // Pasar los acuerdos a la vista
    return view('consejoregionaldocsviews.certificadosdeacuerdos.index', ['acuerdos' => $acuerdos]);
}

    public function Indexresumendegastos()
    {
        // Obtener los resúmenes de gastos con paginación
        $resumenesGastos = ResumenGastos::with('documentonew')->paginate(8); // 8 ítems por página

        // Pasar los resúmenes de gastos a la vista
        return view('consejoregionaldocsviews.resumendegastos.index', ['resumenesGastos' => $resumenesGastos]);
    }

    public function Indextablassesionesconsejo()
    {
        // Obtener todas las sesiones ordenadas por fecha
        $sesiones = Sesion::with('documentos')->orderBy('fecha_hora', 'desc')->get();
    
        // Agrupar las sesiones por año y mes
        $sesionesAgrupadas = $sesiones->groupBy(function ($sesion) {
            return Carbon::parse($sesion->fecha_hora)->format('Y-m');
        });
    
        // Obtener la próxima sesión (la primera sesión en la lista ordenada)
        $proximaSesion = $sesiones->first();
    
        // Obtener los años únicos de la tabla documentos_sesiones
        $anios = Documento_Sesion::selectRaw('EXTRACT(YEAR FROM fechadoc) AS anio')
            ->groupBy('anio')
            ->pluck('anio'); // Usar pluck para obtener solo los valores 'anio'
    
        // Obtener valores únicos y convertirlos en un array
        $aniosUnique = $anios->unique()->toArray();
    
        return view('consejoregionaldocsviews.tablassesionesconsejo.index', [
            'proximaSesion' => $proximaSesion,
            'sesionesAgrupadas' => $sesionesAgrupadas,
            'anios' => $aniosUnique
        ]);
    }

    public function downloadtablassesionesconsejo($id)
{
    $documento = Documento_Sesion::find($id);

    // Log para depuración del documento
    Log::info("Documento encontrado: " . json_encode($documento));

    if ($documento) {
        $rutaCompleta = $documento->url; // Esta es la ruta almacenada en la base de datos
        
        // Eliminar el prefijo 'public/' de la ruta si existe
        $rutaRelativa = str_replace('public/', '', $rutaCompleta);
        
        // Construir la ruta completa al archivo
        $rutaArchivo = storage_path('app/public/' . $rutaRelativa);

        Log::info("Ruta completa del archivo: " . $rutaArchivo);

        if (file_exists($rutaArchivo) && is_file($rutaArchivo)) {
            return response()->download($rutaArchivo);
        } else {
            Log::error("El archivo no existe o es un directorio: " . $rutaArchivo);
            return response()->json(['error' => 'El archivo no existe o es un directorio.'], 404);
        }
    } else {
        Log::error("Documento no encontrado con id: " . $id);
        return response()->json(['error' => 'Documento no encontrado.'], 404);
    }
}

public function showFiltroAno($anio)
{
    // Obtener los años únicos de la tabla documentos_sesiones
    $anios = Documento_Sesion::selectRaw('EXTRACT(YEAR FROM fechadoc) AS anio')
                             ->groupBy('anio')
                             ->pluck('anio'); // Usar pluck para obtener solo los valores 'anio'

    $sesiones = Sesion::with('documentos')
                      ->whereYear('fecha_hora', $anio)
                      ->orderByRaw("EXTRACT(MONTH FROM fecha_hora) DESC")
                      ->orderBy('fecha_hora', 'desc')
                      ->get()
                      ->groupBy(function($date) {
                          return Carbon::parse($date->fecha_hora)->format('m');
                      });

    return view('consejoregionaldocsviews.tablassesionesconsejo.show', compact('sesiones', 'anios'));
}


}
