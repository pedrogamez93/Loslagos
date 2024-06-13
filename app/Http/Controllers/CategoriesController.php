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
use Illuminate\Support\Facades\Log;
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
use App\Models\Seminario;
use App\Models\DocumentoSeminario;
use App\Models\GaleriaSeminario;
use App\Models\ImagenSeminario;
use App\Models\DifusionDocs;
use App\Models\Difusion;
use App\Models\Presentaciones;
use App\Models\ImagenRegion;
use App\Models\ImagenRegionDocs;
use Illuminate\Support\Facades\Storage;


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

    public function downloadLey($id)
    {
        $leyencontrado = Ley::find($id);
    
        // Log para depuración del documento
        Log::info("Leyes encontradas: " . json_encode($leyencontrado));
    
        if ($leyencontrado) {
            $rutaCompleta = $leyencontrado->enlacedoc;
            $archivo = basename($rutaCompleta); // Obtener solo el nombre del archivo
            
            // Ajustar la ruta al archivo correctamente
            $rutaArchivo = storage_path('app/public/documentos/' . $archivo);
    
            if (file_exists($rutaArchivo) && is_file($rutaArchivo)) {
                return response()->download($rutaArchivo);
            } else {
                return response()->json(['error' => 'El archivo no existe o es un directorio.'], 404);
            }
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
    
        // Verificar si la ruta es un archivo y no un directorio
        if (is_file($rutaArchivo)) {
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
            // Manejar el caso en que la ruta no es un archivo o no existe
            Log::error("El archivo no existe o es un directorio: $rutaArchivo");
            return response()->json(['error' => 'El archivo no existe o es un directorio.'], 404);
        }
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

    public function downloaddptogestionpersonas($id)
    {
        $documento = DocGestionPersonas::find($id);
    
        // Log para depuración del documento
        Log::info("Documento encontrado: " . json_encode($documento));
    
        if ($documento) {
            $rutaCompleta = $documento->ruta; // Esta es la ruta almacenada en la base de datos
            
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
    
    public function downloadAsamblea($id)
    {
        // Encuentra el documento por su ID
        $documento = AsambleaClimaticaDocs::findOrFail($id);
    
        // Log para depuración del documento
        Log::info("Documento encontrado: " . json_encode($documento));
    
        if ($documento) {
            $rutaCompleta = $documento->ruta_documento; // Esta es la ruta almacenada en la base de datos
            
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
    

    public function audienciadepartesIndex() {
        // Obtener el último registro de audiencia con documentos relacionados
        $audiencia = AudienciasPartes::with('documentos')->latest()->first();
    
        // Pasa la información a la vista
        return view('audienciadepartes', ['audiencia' => $audiencia]);
    }

    public function downloadAudienciadepartes($id)
{
    $documento = AudienciasPartesDocs::findOrFail($id);

    // Log para depuración del documento
    \Log::info("Documento encontrado: " . json_encode($documento));

    if ($documento) {
        $rutaCompleta = $documento->url_doc; // Esta es la ruta almacenada en la base de datos

        // Construir la ruta completa al archivo
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

    public function downloadPoliticaPersonasMayoresDocs($id)
{
    // Encuentra el documento por su ID
    $documento = PoliticaPersonasMayoresDocs::findOrFail($id);

    // Log para depuración del documento
    Log::info("Documento encontrado: " . json_encode($documento));

    if ($documento) {
        $rutaCompleta = $documento->urldocs; // Esta es la ruta almacenada en la base de datos
        
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

    public function planificacioninstitucionalIndex() {
        $planificacion = PlanificacionInstitucional::all();
        
        return view('planificacioninstitucional', ['planificacion' => $planificacion]);
    }

    public function downloadPlanificacionInstitucionalDocs($id)
    {
        // Encuentra el documento por su ID
        $documento = PlanificacionInstitucional::findOrFail($id);
    
        // Log para depuración del documento
        Log::info("Documento encontrado: " . json_encode($documento));
    
        if ($documento) {
            $rutaCompleta = $documento->urldocs; // Esta es la ruta almacenada en la base de datos
    
            // Construir la ruta completa al archivo
            $rutaArchivo = storage_path('app/public/' . $rutaCompleta);
    
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
    

    public function comitecienciastecnologiasIndex() {
        // Obtener todos los registros de ConcursosPublicos con documentos relacionados
        $comites = ComiteCiencias::with('documentos')->get();
        
        // Pasa la información a la vista
        return view('comitecienciastecnologias', ['comites' => $comites]);
    }

    public function downloadcomitecienciastecnologias($id)
{
    // Encuentra el documento por su ID
    $documento = ComiteCienciasDocs::findOrFail($id);

    // Log para depuración del documento
    Log::info("Documento encontrado: " . json_encode($documento));

    if ($documento) {
        $rutaCompleta = $documento->ruta_documento; // Esta es la ruta almacenada en la base de datos

        // Construir la ruta completa al archivo
        $rutaArchivo = storage_path('app/public/' . $rutaCompleta);

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

    public function concursopublicoIndex() {
        // Obtener todos los registros de ConcursosPublicos con documentos relacionados
        $concursos = ConcursosPublicos::with('documentos')->get();
        
        // Pasa la información a la vista
        return view('concursopublico', ['concursos' => $concursos]);
    }

    public function downloadconcursopublico($id)
    {
        // Encuentra el documento por su ID
        $documento = ConcursosPublicosDocs::findOrFail($id);
    
        // Log para depuración del documento
        Log::info("Documento encontrado: " . json_encode($documento));
    
        if ($documento) {
            $rutaCompleta = $documento->ruta_documento; // Esta es la ruta almacenada en la base de datos
    
            // Construir la ruta completa al archivo
            $rutaArchivo = storage_path('app/public/' . $rutaCompleta);
    
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

    public function downloadbiblioteca($id)
    {
        $documento = Biblioteca::findOrFail($id);
    
        // Log para depuración del documento
        Log::info("Documento encontrado: " . json_encode($documento));
    
        if ($documento) {
            $rutaCompleta = $documento->urldocs; // Esta es la ruta almacenada en la base de datos
    
            // Construir la ruta completa al archivo
            $rutaArchivo = storage_path('app/' . $rutaCompleta);
    
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

    public function galeriaIndex() {
        $galerias = Galeria::all();
        
        return view('galerias', ['galerias' => $galerias]);
    }

    public function seminarioIndex() {
        // Obtén el último registro de seminario con documentos y galerías (incluyendo imágenes de las galerías)
        $lastRegistro = Seminario::with(['documentos', 'galerias.imagenes'])->latest()->first();
    
        if (!$lastRegistro) {
            // Manejar el caso en que no haya seminarios
            return view('seminariointernacional', ['mensaje' => 'No hay seminarios disponibles.']);
        }
    
        // Pasar los datos a la vista
        return view('seminariointernacional', [
            'galerias' => $lastRegistro->galerias,
            'documentos' => $lastRegistro->documentos,
            'lastRegistro' => $lastRegistro
        ]);
    }

    public function downloadseminario($id)
{
    $documento = DocumentoSeminario::findOrFail($id);

    // Log para depuración del documento
    Log::info("Documento encontrado: " . json_encode($documento));

    if ($documento) {
        $rutaCompleta = $documento->url_doc; // Esta es la ruta almacenada en la base de datos

        // Construir la ruta completa al archivo
        $rutaArchivo = storage_path('app/public/' . $rutaCompleta);

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

    public function difusionindex() {

        $difusion = Difusion::with('documentos')->latest()->first();

        if (!$difusion) {
            return redirect()->route('difusion.create');
        }

        return view('difusion', compact('difusion'));
    }

    public function downloadifusion($id)
    {
        $documento = DifusionDocs::findOrFail($id);
    
        // Log para depuración del documento
        Log::info("Documento encontrado: " . json_encode($documento));
    
        if ($documento) {
            $rutaCompleta = $documento->urldoc; // Esta es la ruta almacenada en la base de datos
            
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


    public function presentacionIndex() {
        $presentacion = Presentaciones::all();
        
        return view('presentaciones', ['presentacion' => $presentacion]);
    }

    public function downloadpresentaciones($id)
    {
        $documento = Presentaciones::findOrFail($id);
    
        // Log para depuración del documento
        Log::info("Documento encontrado: " . json_encode($documento));
    
        if ($documento) {
            $rutaCompleta = $documento->urldocs; // Esta es la ruta almacenada en la base de datos
            
            // Construir la ruta completa al archivo
            $rutaArchivo = storage_path('app/' . $rutaCompleta);
    
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
    

    public function imagenregionindex() {

        $imagenregion = ImagenRegion::with('documentos')->latest()->first();

        if (!$imagenregion) {
            return redirect()->route('imagenregion.create');
        }

        return view('imagenregion', compact('imagenregion'));
    }

    public function downloadimagenregion($id)
    {
        $documento = ImagenRegionDocs::findOrFail($id);
    
        // Log para depuración del documento
        Log::info("Documento encontrado: " . json_encode($documento));
    
        if ($documento) {
            $rutaCompleta = $documento->urldoc; // Esta es la ruta almacenada en la base de datos
            
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
    



}