<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Introduccion;
use App\Models\ComofuncionaGr;
use App\Models\EstrategiaReg;
use App\Models\InversionPublicas;
use App\Models\MisionGob;
use App\Models\Ley;
use App\Models\Organigramas;
use App\Models\DptoGestionPersonas;
use App\Models\DocGestionPersonas;
use App\Models\TramitesDigitales;
use App\Models\TramitesDigitalesDocs;
use App\Models\AsambleaClimatica;
use App\Models\AsambleaClimaticaDocs;
use App\Models\AudienciasPartes;
use App\Models\AudienciasPartesDocs;

class CategoriesController extends Controller{
    
    public function index(){

        $introduccion = Introduccion::latest()->first();

        return view('acerca.introduccionF', ['introduccion' => $introduccion]);
    }

    public function comofuncionaGrIndex(){

    $comofunciona = ComofuncionaGr::latest()->first();

    return view('acerca.comofunciona', ['comofunciona' => $comofunciona]);
}

    public function estrategiaregGrIndex(){

        $estrategia = EstrategiaReg::latest()->first();

        return view('acerca.estrategiaregional', ['estrategia' => $estrategia]);
}

    public function inversionespublicasGrIndex(){

        $inversiones = InversionPublicas::latest()->first();

        return view('acerca.inversionpublica', ['inversiones' => $inversiones]);
    }

    public function misiongobiernoGrIndex(){

        $mision = MisionGob::latest()->first();

        return view('acerca.misiongobierno', ['mision' => $mision]);
    }

    public function leygobiernoregIndex(){

        $ley = Ley::latest()->first();

        return view('leygobiernoregional', ['ley' => $ley]);
    }

    public function organigramaIndex(){

        $organigrama = Organigramas::latest()->first();

        return view('organigrama', ['organigrama' => $organigrama]);
    }

    public function dptogestionpersonasIndex(){

        $ultimoDepartamento = DptoGestionPersonas::latest()->first();
        $documentosUltimoDepartamento = $ultimoDepartamento ? $ultimoDepartamento->documentos : collect();
        $documentosTodos = DocGestionPersonas::all(); // Obtener todos los documentos
    
        return view('dptogestionpersonas', [
            'departamento' => $ultimoDepartamento,
            'documentosUltimoDepartamento' => $documentosUltimoDepartamento,
            'documentosTodos' => $documentosTodos,
        ]);   

    }

    public function tramitesdigitalesIndex() {
        // Obtén todos los trámites
        $tramites = TramitesDigitales::all();
    
        // Pasa la información a la vista
        return view('tramitesdigitales', ['tramites' => $tramites]);
    }

    public function asambleaclimaticaIndex() {
        // Obtener el último registro de AsambleaClimatica con documentos relacionados
        $asamblea = AsambleaClimatica::with('documentos')->latest()->first();
    
        // Pasa la información a la vista
        return view('asambleaclimatica', ['asamblea' => $asamblea]);
    }

    public function audienciadepartesIndex() {
        // Obtener el último registro de audiencia con documentos relacionados
        $audiencia = AudienciasPartes::with('documentos')->latest()->first();
    
        // Pasa la información a la vista
        return view('audienciadepartes', ['audiencia' => $audiencia]);
    }

}