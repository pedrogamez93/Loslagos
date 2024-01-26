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
use App\Models\DisenoPoliticoRegionales;
use App\Models\DisenoPoliticoRegionalesBtnEncuestas;
use App\Models\DisenoPoliticoRegionalesBtnforms;
use App\Models\PoliticaPersonasMayores;
use App\Models\PoliticaPersonasMayoresDocs;
use App\Models\PlanificacionInstitucional;
use App\Models\ComiteCiencias;
use App\Models\ComiteCienciasDocs;
use App\Models\ConcursosPublicos;
use App\Models\ConcursosPublicosDocs;

use App\Models\ConsejoRegional;
use App\Models\Seccion;
use App\Models\presidenteconcejo;
use App\Models\ConsejerosChiloe;
use App\Models\ConsejerosLlanquihue;
use App\Models\ConsejerosOsorno;
use App\Models\ConsejerosPalena;
use App\Models\Evento;
use App\Models\Biblioteca;
use App\Models\Galeria;
use App\Models\Imagen;

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

    public function politicasostenibilidadhidricaIndex() {
        // Obtén el último registro de DiseñoPolíticaRegionales
        $ultimoRegistro = DisenoPoliticoRegionales::latest()->first();
    
        // Obtén los formularios relacionados
        $formularios = $ultimoRegistro->btnForms;
    
        // Obtén las encuestas relacionadas
        $encuestas = $ultimoRegistro->btnEncuestas;
    
        return view('politicasostenibilidadhidrica', compact('formularios', 'encuestas', 'ultimoRegistro'));
    }

    public function politicapersonasmayoresIndex() {
        // Obtén el último politicapersonasmayores
        $ultimoRegistro = PoliticaPersonasMayores::latest()->first();
    
        // Asegúrate de verificar si existe un registro antes de intentar acceder a sus documentos
        $docs = $ultimoRegistro ? $ultimoRegistro->documentos : collect();
    
        return view('disenopoliticapersonasmayores', compact('ultimoRegistro', 'docs'));
    }

    public function planificacioninstitucionalIndex() {
        $planificacion = PlanificacionInstitucional::all();
        
        return view('planificacioninstitucional', ['planificacion' => $planificacion]);
    }

    public function comitecienciastecnologiasIndex() {
        // Obtener todos los registros de ConcursosPublicos con documentos relacionados
        $comites = ComiteCiencias::with('documentos')->get();
        
        // Pasa la información a la vista
        return view('comitecienciastecnologias', ['comites' => $comites]);
    }

    public function concursopublicoIndex() {
        // Obtener todos los registros de ConcursosPublicos con documentos relacionados
        $concursos = ConcursosPublicos::with('documentos')->get();
        
        // Pasa la información a la vista
        return view('concursopublico', ['concursos' => $concursos]);
    }

    public function consejoregionalIndex() {
        $consejo = ConsejoRegional::with('secciones')->latest()->first();
    
        return view('consejoregional', compact('consejo'));
    }

    public function presidenteconsejoIndex() {
        // Obtener el último registro de presidente del concejo
        $presidente = presidenteconcejo::latest()->first();
    
        // Verificar si existe un registro y devolver la vista correspondiente
        if ($presidente) {
            // Si hay un registro disponible, pasa la variable a la vista
            return view('presidenteconsejo', compact('presidente'));
        } else {
            // Si no hay registros, puedes manejarlo de alguna manera, 
            // por ejemplo, mostrando un mensaje o redirigiendo a otra página
            return view('presidenteconsejo')->with('message', 'No se encontraron datos del presidente del concejo');
        }
    }

    public function consejerososornoIndex() {
        // Obtener todos los registros de los consejeros
        $consejeros = ConsejerosOsorno::all();
    
        // Verificar si existe un registro y devolver la vista correspondiente
        if ($consejeros) {
            // Si hay un registro disponible, pasa la variable a la vista
            return view('consejerososorno', compact('consejeros'));
        } else {
            // Si no hay registros, puedes manejarlo de alguna manera, 
            // por ejemplo, mostrando un mensaje o redirigiendo a otra página
            return view('consejerososorno')->with('message', 'No se encontraron datos del consejero');
        }
    }

    public function consejeroschiloeIndex() {
        // Obtener todos los registros de los consejeros
        $consejeros = ConsejerosChiloe::all();
    
        // Verificar si existe un registro y devolver la vista correspondiente
        if ($consejeros) {
            // Si hay un registro disponible, pasa la variable a la vista
            return view('consejeroschiloe', compact('consejeros'));
        } else {
            // Si no hay registros, puedes manejarlo de alguna manera, 
            // por ejemplo, mostrando un mensaje o redirigiendo a otra página
            return view('consejeroschiloe')->with('message', 'No se encontraron datos del consejero');
        }
    }

    public function consejerosllanquihueIndex() {
        // Obtener todos los registros de los consejeros
        $consejeros = ConsejerosLlanquihue::all();
    
        // Verificar si existe un registro y devolver la vista correspondiente
        if ($consejeros) {
            // Si hay un registro disponible, pasa la variable a la vista
            return view('consejerosllanquihue', compact('consejeros'));
        } else {
            // Si no hay registros, puedes manejarlo de alguna manera, 
            // por ejemplo, mostrando un mensaje o redirigiendo a otra página
            return view('consejerosllanquihue')->with('message', 'No se encontraron datos del consejero');
        }
    }

    public function consejerospalenaIndex() {
        // Obtener todos los registros de los consejeros
        $consejeros = ConsejerosPalena::all();
    
        // Verificar si existe un registro y devolver la vista correspondiente
        if ($consejeros) {
            // Si hay un registro disponible, pasa la variable a la vista
            return view('consejerospalena', compact('consejeros'));
        } else {
            // Si no hay registros, puedes manejarlo de alguna manera, 
            // por ejemplo, mostrando un mensaje o redirigiendo a otra página
            return view('consejerospalena')->with('message', 'No se encontraron datos del consejero');
        }
    }

    public function agendaindex(){

        // Obtiene todos los eventos
        $eventos = Evento::orderBy('fecha_inicio', 'asc')->get();
    
        // Pasa los eventos a la vista
        return view('agenda', ['eventos' => $eventos]);
    }

    public function bibliotecaIndex() {
        $biblioteca = Biblioteca::all();
        
        return view('biblioteca', ['biblioteca' => $biblioteca]);
    }

    public function galeriaIndex() {
        $galerias = Galeria::all();
        
        return view('galerias', ['galerias' => $galerias]);
    }

}