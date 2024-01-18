<?php

namespace App\Http\Controllers;

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
    public function Index(){

        

        return view('documentosdegestion.index');
    }

    public function Indexcomisionregbordecostero()
    {
        $documentosBodeCostero = DocumentoGeneral::with('documentonew')
            ->where('categoria', 'Bode costero')
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

    public function Indexcontrolesssi(){

        return view('documentosdegestion.controlesssi.index');
    }

    public function Indexestadosituacionfndr(){

        return view('documentosdegestion.estadosituacionfndr.index');
    }

    public function Indexinformeejecucion(){

        return view('documentosdegestion.informeejecucion.index');
    }

    public function Indexinformegastosley(){

        return view('documentosdegestion.informegastosley.index');
    }

    public function Indexplanregulador(){

        return view('documentosdegestion.planregulador.index');
    }

    public function Indexpresupuesto(){

        return view('documentosdegestion.presupuesto.index');
    }

    public function Indexreceptoresfondos(){

        return view('documentosdegestion.receptoresfondos.index');
    }

    public function Indexunidaddecontrol(){

        return view('documentosdegestion.unidaddecontrol.index');
    }
}
