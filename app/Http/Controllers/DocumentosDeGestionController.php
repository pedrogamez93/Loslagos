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
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Node\Block\Document;

class DocumentosDeGestionController extends Controller
{
    public function Index()
    {
        $categorias = [
            'Cuenta PublicaRegional',
            'Estrategia Regional de Desarrollo 2030',
            'Estado Financieros Gobierno Regional de Los Lagos',
            'Boletin Informativo',
            'Difusion Proyectos FNDR y Normativa Grafica GORE',
            'Estrategia, Politica y Planes Regionales',
            'Convenios Internacinales',
            'Documentos de Consulta GORE LOS LAGOS'
        ];
    
        $documentosPorCategoria = [];
        foreach ($categorias as $categoria) {
            $documentosPorCategoria[$categoria] = DocumentoGeneral::with('documentonew')
                ->where('categoria', $categoria)
                ->get();
        }
    
        return view('documentosdegestion.index', ['documentosPorCategoria' => $documentosPorCategoria]);
    }

    public function Indexcomisionregbordecostero()
    {
        $categorias = ['Bode costero', 'C.R.U.B.C'];
    
        $documentosBodeCostero = DocumentoGeneral::with('documentonew')
            ->whereIn('categoria', $categorias)
            ->get();
    
        // Añadir el atributo 'ruta_documento' a cada documento
        foreach ($documentosBodeCostero as $documento) {
            if ($documento->documentonew) {
                $documento->ruta_documento = $documento->documentonew->archivo;
            } else {
                $documento->ruta_documento = null; // O un valor por defecto si es necesario
            }
        }
    
        return view('documentosdegestion.comisionregbordecostero.index', ['documentos' => $documentosBodeCostero]);
    }

    public function Indexcontrolesssi()
    {
        $documentosControlesSSI = DocumentoGeneral::with('documentonew')
            ->where('categoria', 'Controles SSI')
            ->paginate(10); 
    
        // Añadir el atributo 'ruta_documento' a cada documento
        foreach ($documentosControlesSSI as $documento) {
            if ($documento->documentonew) {
                $documento->ruta_documento = $documento->documentonew->archivo;
            } else {
                $documento->ruta_documento = null; // O un valor por defecto si es necesario
            }
        }
    
        // Pasar los documentos a la vista
        return view('documentosdegestion.controlesssi.index', ['documentosControlesSSI' => $documentosControlesSSI]);
    }

    public function Indexestadosituacionfndr()
    {
        $anioActual = Carbon::now()->year;
        $documentos = DocumentoGeneral::with('documentonew')
            ->where('categoria', 'Estado Situacion FNDR')
            ->get();
    
        $documentosAgrupados = $documentos->groupBy(function($documento) {
            return Carbon::parse($documento->fecha)->year; // Asumiendo que 'fecha' es un campo en tus documentos
        });
    
        return view('documentosdegestion.estadosituacionfndr.index', [
            'documentosAgrupados' => $documentosAgrupados,
            'anioActual' => $anioActual
        ]);
    }

    public function Indexinformeejecucion()
    {
        $anioActual = Carbon::now()->year;
        $documentos = DocumentoGeneral::with('documentonew')
            ->where('categoria', 'Informe Ejecucion PROPIR')
            ->get();
    
        $documentosAgrupados = $documentos->groupBy(function($documento) {
            return Carbon::parse($documento->fecha)->year; // Asume que 'fecha' es un campo en tus documentos
        });
    
        return view('documentosdegestion.informeejecucion.index', [
            'documentosAgrupados' => $documentosAgrupados,
            'anioActual' => $anioActual
        ]);
    }

    public function Indexinformegastosley(){

        return view('documentosdegestion.informegastosley.index');
    }

    public function Indexplanregulador()
    {
        $documentosPlanRegulador = DocumentoGeneral::with('documentonew')
            ->where('categoria', 'Plan Regulador Comunal')
            ->get();
    
        return view('documentosdegestion.planregulador.index', ['documentosPlanRegulador' => $documentosPlanRegulador]);
    }

    public function Indexpresupuesto(){

        return view('documentosdegestion.presupuesto.index');
    }

    public function Indexreceptoresfondos()
    {
        $documentosReceptoresFondos = DocumentoGeneral::with('documentonew')
            ->where('categoria', 'Receptores Fondos Publicos Ley 19.62')
            ->get();
    
        return view('documentosdegestion.receptoresfondos.index', ['documentosReceptoresFondos' => $documentosReceptoresFondos]);
    }

    public function Indexunidaddecontrol(){

        return view('documentosdegestion.unidaddecontrol.index');
    }
}
