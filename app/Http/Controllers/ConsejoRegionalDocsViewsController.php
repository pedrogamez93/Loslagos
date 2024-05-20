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

class ConsejoRegionalDocsViewsController extends Controller
{
    public function Indexactas()
    {
        // Obtener todas las actas y su relación con Documentonew con paginación
        $actas = Acta::with('documentonew')->paginate(8); // 8 actas por página

        // Pasar las actas a la vista
        return view('consejoregionaldocsviews.actas.index', ['actas' => $actas]);
    }

    public function showActa($id)
    {
        // Obtener la acta específica por ID y su relación con Documentonew
        $acta = Acta::with('documentonew')->findOrFail($id);

        // Pasar la acta a la vista de detalles
        return view('consejoregionaldocsviews.actas.show', ['acta' => $acta]);
    }


    public function Indexcertificadosdeacuerdos()
    {
        // Obtener todos los acuerdos y su relación con Documentonew
        $acuerdos = Acuerdo::with('documentonew')->get();
        $acuerdos = Acuerdo::with('documentonew')->paginate(10); 
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

    public function Indextablassesionesconsejo(){

    // Obtener todas las sesiones ordenadas por fecha
    $sesiones = Sesion::with('documentos')->orderBy('fecha_hora', 'desc')->get();

    // Agrupar las sesiones por año y mes
    $sesionesAgrupadas = $sesiones->groupBy(function($sesion) {
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

    public function showFiltroAno($anio)
    {
        // Obtener los años únicos de la tabla documentos_sesiones
        $anios = Documento_Sesion::selectRaw('EXTRACT(YEAR FROM fechadoc) AS anio')
                                 ->groupBy('anio')
                                 ->pluck('anio'); // Usar pluck para obtener solo los valores 'anio'
    
        $documentos = Documento_Sesion::select('documentos_sesiones.*', DB::raw('EXTRACT(MONTH FROM fechadoc) as mes'))
                                      ->whereRaw("EXTRACT(YEAR FROM fechadoc) = ?", [$anio])
                                      ->orderByRaw("EXTRACT(MONTH FROM fechadoc) DESC")
                                      ->get()
                                      ->groupBy('mes'); // Agrupamos los documentos por mes
    
        return view('consejoregionaldocsviews.tablassesionesconsejo.show', compact('documentos', 'anios'));
    }

}
