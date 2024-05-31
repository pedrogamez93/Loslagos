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
            'Cuenta Pública Regional',
            'Estrategia Regional de Desarrollo 2030',
            'Estado Financieros Gobierno Regional de Los Lagos',
            'Boletín Informativo',
            'Difusión Proyectos FNDR y Normativa Gráfica GORE',
            'Estrategia, Política y Planes Regionales',
            'Convenios Internacionales',
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

   public function downloadgestion($id)
{
    try {
        $documento = Documentonew::findOrFail($id);
        $filePath = $documento->archivo;

        if (Storage::exists($filePath)) {
            return Storage::download($filePath);
        } else {
            return redirect()->back()->with('error', 'Archivo no encontrado.');
        }
    } catch (\Exception $e) {
        Log::error('Error al descargar el archivo:', ['error' => $e->getMessage()]);
        return redirect()->back()->with('error', 'Error al descargar el archivo: ' . $e->getMessage());
    }
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
                // Verificar si el documento tiene una fecha asociada válida
                return ($documento->documentonew && $documento->documentonew->fecha_hora) ? Carbon::parse($documento->documentonew->fecha_hora)->year : null;
            });

            // Filtrar grupos vacíos (sin año)
            $documentosAgrupados = $documentosAgrupados->filter(function($group) {
                return $group->isNotEmpty();
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
                // Utilizar el campo fecha_hora del modelo Documentonew
                return $documento->documentonew ? Carbon::parse($documento->documentonew->fecha_hora)->year : null;
            });

            return view('documentosdegestion.informeejecucion.index', [
                'documentosAgrupados' => $documentosAgrupados,
                'anioActual' => $anioActual
            ]);
        }

        public function Indexinformegastosley()
        {
            $anioActual = Carbon::now()->year;
            $documentos = DocumentoGeneral::with('documentonew')
                ->where('categoria', 'Informe Gastos Ley 21.516') // Reemplaza 'Tu Categoria Aquí' con la categoría correcta
                ->get();
        
            $documentosAgrupados = $documentos->groupBy(function($documento) {
                // Utilizar el campo fecha_hora del modelo Documentonew si está disponible
                return $documento->documentonew ? Carbon::parse($documento->documentonew->fecha_hora)->year : null;
            });
        
            return view('documentosdegestion.informegastosley.index', [
                'documentosAgrupados' => $documentosAgrupados,
                'anioActual' => $anioActual
            ]);
        }

    public function Indexplanregulador()
    {
        $documentosPlanRegulador = DocumentoGeneral::with('documentonew')
            ->where('categoria', 'Plan Regulador Comunal')
            ->get();
    
        return view('documentosdegestion.planregulador.index', ['documentosPlanRegulador' => $documentosPlanRegulador]);
    }

    public function Indexpresupuesto()
    {
        $anioActual = Carbon::now()->year;
        $documentos = DocumentoGeneral::with('documentonew')
            ->where('categoria', 'Presupuesto')
            ->get();
    
        $documentosAgrupados = $documentos->groupBy(function($documento) {
            // Utilizar el campo fecha_hora del modelo Documentonew si está disponible
            return $documento->documentonew ? Carbon::parse($documento->documentonew->fecha_hora)->year : null;
        });
    
        // Filtrar grupos vacíos (sin año)
        $documentosAgrupados = $documentosAgrupados->filter(function($group) {
            return $group->isNotEmpty();
        });
    
        return view('documentosdegestion.presupuesto.index', [
            'documentosAgrupados' => $documentosAgrupados,
            'anioActual' => $anioActual
        ]);
    }

    public function Indexreceptoresfondos()
    {
        $documentosReceptoresFondos = DocumentoGeneral::with('documentonew')
            ->where('categoria', 'Receptores Fondos Publicos Ley 19.62')
            ->get();
    
        return view('documentosdegestion.receptoresfondos.index', ['documentosReceptoresFondos' => $documentosReceptoresFondos]);
    }

    public function Indexunidaddecontrol()
    {
        $anioActual = Carbon::now()->year;
        $documentos = DocumentoGeneral::with('documentonew')
            ->where('categoria', 'Unidad de Control')
            ->get();
    
        $documentosAgrupados = $documentos->groupBy(function($documento) {
            // Utilizar el campo fecha_hora del modelo Documentonew si está disponible
            return $documento->documentonew ? Carbon::parse($documento->documentonew->fecha_hora)->year : null;
        });
    
        // Filtrar grupos vacíos (sin año)
        $documentosAgrupados = $documentosAgrupados->filter(function($group) {
            return $group->isNotEmpty();
        });
    
        return view('documentosdegestion.unidaddecontrol.index', [
            'documentosAgrupados' => $documentosAgrupados,
            'anioActual' => $anioActual
        ]);
    }
}
