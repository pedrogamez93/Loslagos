<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\IntroduccionController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ComofuncionaGrController;
use App\Http\Controllers\EstrategiasController;
use App\Http\Controllers\InversionesPublicController;
use App\Http\Controllers\MisionGobController;
use App\Http\Controllers\LeygbsController;
use App\Http\Controllers\OrganigramaController;
use App\Http\Controllers\DptoGestionPersonasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\SalaprensaController;
use App\Http\Controllers\AsambleaClimaticaController;
use App\Http\Controllers\AudienciasController;
use App\Http\Controllers\DisenoPoliticoRegionalesController;
use App\Http\Controllers\PoliticaPersonasMayoresController;
use App\Http\Controllers\PlanificacionInstitucionalController;
use App\Http\Controllers\TramitesDigitalesController;
use App\Http\Controllers\ProgramasController;
use App\Http\Controllers\TodosLosProgramasController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\PreguntasFrecuentesController;
use App\Http\Controllers\FormController;

use App\Http\Controllers\ComiteCienciasController;
use App\Http\Controllers\ConcursosPublicosController;
use App\Http\Controllers\ConcejoRegionalController;
use App\Http\Controllers\ConsejoRegionalDocsViewsController;
use App\Http\Controllers\PresidenteConcejoController;
use App\Http\Controllers\ConsejerosChiloeController;
use App\Http\Controllers\ConsejerosLlanquihueController;
use App\Http\Controllers\ConsejerosOsornoController;
use App\Http\Controllers\ConsejerosPalenaController;
use App\Http\Controllers\DocumentosDeGestionController;

use App\Http\Controllers\SitiosController;
use App\Http\Controllers\DocumentonewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|sdsdsd
*/
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('Home.index');
Route::get('/home/create', [HomeController::class, 'create'])->name('Home.create');
Route::post('/home/store', [HomeController::class, 'store']);
Route::get('/home/actualizar', [HomeController::class, 'actualizar'])->name('Home.actualizar');;
Route::put('/home/update', [HomeController::class, 'update']);
Route::get('/mostrar-imagen/{carpeta}/{imagen}', [HomeController::class, 'mostrarImagen'])->name('mostrar.imagen');
Route::get('/buscador', [HomeController::class, 'buscador'])->name('Home.buscador');



/*DOCUMENTOS */
Route::get('/documentos', [DocumentonewController::class, 'index'])->name('documentos.index');
Route::get('/documentos/create', [DocumentonewController::class, 'create'])->name('documentos.create');
Route::post('/documentossubir', [DocumentonewController::class, 'store'])->name('documentos.store');;
Route::post('/documentos/buscar', [DocumentonewController::class, 'buscar']);
Route::get('/documentos/{id}/edit', [DocumentonewController::class, 'edit'])->name('documentos.edit');
Route::put('/documentos/{id}', [DocumentonewController::class, 'update'])->name('documentos.update');
Route::get('/documentos/ver-documentos', [DocumentonewController::class, 'indexTabla'])->name('documentos.verdocumentos');
Route::delete('/documentos/eliminar/{id}', [DocumentonewController::class, 'destroy'])->name('documentos.destroy');
Route::get('/documentos/download/{id}', [DocumentonewController::class, 'download'])->name('documentos.download');
Route::get('/descargar-archivo/{archivo}', [DocumentonewController::class, 'descargarArchivo'])->name('descargar.archivo');

/*FUNCIONARIOS */

Route::get('/funcionario', [FuncionarioController::class, 'index']);
Route::get('/funcionarios/create', [FuncionarioController::class, 'create'])->name('funcionarios.create');
Route::post('/funcionariossubir', [FuncionarioController::class, 'store']);
Route::post('/funcionarios/buscar', [FuncionarioController::class, 'buscar']);
Route::get('/funcionarios/{id}/edit', [FuncionarioController::class, 'edit'])->name('funcionarios.edit');
Route::put('/funcionarios/{id}', [FuncionarioController::class, 'update'])->name('funcionarios.update');
Route::get('/funcionarios/ver-funcionarios', [FuncionarioController::class, 'indexTabla'])->name('funcionarios.verfuncionarios');
Route::get('/funcionarios/{id}/detalle', [FuncionarioController::class, 'show'])->name('funcionarios.show');
Route::delete('/funcionarios/eliminar/{id}', [FuncionarioController::class, 'destroy'])->name('funcionarios.destroy');
Route::get('/funcionarios/{imagen}', [FuncionarioController::class, 'mostrarImagen'])->name('imagen.mostrar');
Route::get('/ubicaciones', [FuncionarioController::class, 'obtenerUbicaciones']);

//Sala de prensa
Route::get('/saladeprensa', [SalaprensaController::class, 'index'])->name('salaprensa.index');
Route::get('/saladeprensa/create', [SalaprensaController::class, 'create'])->name('salaprensa.create');
Route::post('/saladeprensasubir', [SalaprensaController::class, 'store'])->name('salaprensa.store');
Route::get('/saladeprensa/{id}/edit', [SalaprensaController::class, 'edit'])->name('salaprensa.edit');
Route::put('/saladeprensa/{id}', [SalaprensaController::class, 'update'])->name('salaprensa.update');
Route::get('/saladeprensa/ver-noticias', [SalaprensaController::class, 'indexTabla'])->name('salaprensa.vernoticia');
Route::delete('/saladeprensa/eliminar/{id}', [SalaprensaController::class, 'destroy'])->name('salaprensa.destroy');
//Route::get('/saladeprensa/{imagen}', [SalaprensaController::class, 'mostrarImagen'])->name('imagen.mostrar');
Route::get('/mostrar-imagen/{carpeta}/{imagen}', [SalaprensaController::class, 'mostrarImagen'])->name('mostrar.imagen');
Route::get('/saladeprensa/{id}', [SalaprensaController::class, 'show'])->name('salaprensa.show');

//Route::resource('/', HomeController::class);

//Sala de prensa
Route::get('/sitiodegobierno', [SitiosController::class, 'index']);
Route::get('/sitiodegobierno/create', [SitiosController::class, 'create'])->name('sitiodegobierno.create');;
Route::post('/sitiossubir', [SitiosController::class, 'store'])->name('sitiodegobierno.store');
Route::get('/sitiodegobierno/{id}/edit', [SitiosController::class, 'edit'])->name('sitiodegobierno.edit');
Route::put('/sitiodegobierno/{id}', [SitiosController::class, 'update'])->name('sitiodegobierno.update');
Route::get('/sitiodegobierno/ver-sitios', [SitiosController::class, 'indexTabla'])->name('sitiodegobierno.vernoticia');
Route::delete('/sitiodegobierno/eliminar/{id}', [SitiosController::class, 'destroy'])->name('sitiodegobierno.destroy');
Route::get('/sitiodegobierno/{imagen}', [SitiosController::class, 'mostrarImagen'])->name('imagen.mostrar');

//Route::resource('/', HomeController::class);



/*RUTAS CRUD INIT*/
Route::resource('introducciones', IntroduccionController::class)->middleware('auth');
Route::get('/images/{imagen}', [IntroduccionController::class, 'mostrarImagen'])->name('imagen.mostrar');

Route::resource('comofuncionagrs', ComofuncionaGrController::class)->middleware('auth');
Route::get('/images/{imagen}', [ComofuncionaGrController::class, 'mostrarImagen'])->name('imagen.mostrar');

Route::resource('estrategias', EstrategiasController::class)->middleware('auth');
Route::get('/images/{imagen}', [EstrategiasController::class, 'mostrarImagen'])->name('imagen.mostrar');

Route::resource('inversiones', InversionesPublicController::class)->middleware('auth');
Route::get('/images/{imagen}', [InversionesPublicController::class, 'mostrarImagen'])->name('imagen.mostrar');

Route::resource('mision', MisionGobController::class)->middleware('auth');
Route::get('/images/{imagen}', [MisionGobController::class, 'mostrarImagen'])->name('imagen.mostrar');

Route::resource('leygobiernoregional', LeygbsController::class)->middleware('auth');

Route::resource('organigrama', OrganigramaController::class)->middleware('auth');
Route::get('/images/{imagen}', [OrganigramaController::class, 'mostrarImagen'])->name('imagen.mostrar');

Route::resource('dptogestionpersonas', DptoGestionPersonasController::class)->except(['destroy'])->middleware('auth');
Route::get('/dptogestionpersonas/{id}/edit', [DptoGestionPersonasController::class, 'edit'])->name('dptogestionpersonas.edit')->middleware('auth');
Route::put('/dptogestionpersonas/{dptogestionpersona}', [DptoGestionPersonasController::class, 'update'])->name('dptogestionpersonas.update')->middleware('auth');
Route::delete('/dptogestionpersonas/{dptogestionpersona}/documentos/{documentoId}', [DptoGestionPersonasController::class, 'deleteDocumento'])->name('eliminardoc')->middleware('auth');
Route::delete('/dptogestionpersonas/{departamentoId}', [DptoGestionPersonasController::class, 'deleteDepartamento'])->name('eliminar_departamento')->middleware('auth');


Route::resource('asambleaclimatica', AsambleaClimaticaController::class)->middleware('auth');
Route::delete('/asambleaclimatica/{asambleaId}/documentos/{documentoId}', [AsambleaClimaticaController::class, 'deleteDocumento'])->name('eliminar_documento')->middleware('auth');
Route::delete('/asamblea/{id}', [AsambleaClimaticaController::class, 'destroyasamblea'])->name('ruta_eliminar_asamblea')->middleware('auth');

Route::resource('audienciasdepartes', AudienciasController::class)->middleware('auth');
Route::delete('/audiencia/{audienciaId}/documentos/{documentoId}', [AudienciasController::class, 'destroyDocAudiencia'])->name('eliminar_doc_audiencia')->middleware('auth');
Route::delete('/audiencia/{id}', [AudienciasController::class, 'destroyaudiencia'])->name('ruta_eliminar_audiencia')->middleware('auth');

Route::resource('disenopoliticoregionales', DisenoPoliticoRegionalesController::class)->middleware('auth');
Route::delete('/eliminar-diseno/{id}', [DisenoPoliticoRegionalesController::class, 'eliminarDisenoCompleto'])->name('eliminar_diseno_completo')->middleware('auth');

Route::resource('listplanificainstitucional', PlanificacionInstitucionalController::class)->middleware('auth');

Route::resource('comiteciencias', ComiteCienciasController::class)->middleware('auth');
Route::delete('/eliminar-documento/{documentoId}', [ComiteCienciasController::class, 'eliminarDocumento'])->middleware('auth');

Route::resource('concursospublicos', ConcursosPublicosController::class)->middleware('auth');
Route::delete('/eliminar-documento/{documentoId}', [ConcursosPublicosController::class, 'eliminarDocumento'])->middleware('auth');

Route::resource('presidenteconcejo', PresidenteConcejoController::class)->middleware('auth');

Route::resource('consejerosllanquihue', ConsejerosLlanquihueController::class)->middleware('auth');
Route::get('/consejeros/{id}', [ConsejerosLlanquihueController::class, 'show'])->name('consejeros.show')->middleware('auth');

Route::resource('consejeroschiloe', ConsejerosChiloeController::class)->middleware('auth');
Route::get('/consejeros/{id}', [ConsejerosChiloeController::class, 'show'])->name('consejeros.show')->middleware('auth');

Route::resource('consejerososorno', ConsejerosOsornoController::class);
Route::get('/consejeros/{id}', [ConsejerosOsornoController::class, 'show'])->name('consejeros.show');

Route::resource('consejerospalena', ConsejerosPalenaController::class)->middleware('auth');
Route::get('/consejeros/{id}', [ConsejerosPalenaController::class, 'show'])->name('consejeros.show')->middleware('auth');


Route::resource('concejoregional', ConcejoRegionalController::class)->middleware('auth');
Route::get('/imagesConcejo/{img}', [ConcejoRegionalController::class, 'mostrarImagen'])->name('img.mostrar')->middleware('auth');

Route::get('/concejoregional/{concejoId}/edit', [ConcejoRegionalController::class, 'edit'])->name('concejoregional.edit')->middleware('auth');

Route::get('/editar-seccion/{seccionId}', [ConcejoRegionalController::class, 'editarSeccion'])->name('editar.seccion')->middleware('auth');

Route::put('/concejoregional/{concejoId}/update', [ConcejoRegionalController::class, 'update'])->name('concejoregional.update')->middleware('auth');

Route::put('/seccion/{seccionId}/actualizar', [ConcejoRegionalController::class, 'updateSeccion'])->name('nombre.ruta.actualizar.seccion')->middleware('auth');

//Route::get('/concejoregional/{concejoId}/edit/{seccionId}', 'ConcejoRegionalController@edit')->name('concejoregional.edit');
//Route::put('concejoregional/{concejoId}/seccion/{seccionId}', 'ConcejoRegionalController@update')->name('concejoregional.update');
//Route::delete('/concejoregional/{concejoId}/secciones/{seccionId}', 'ConcejoRegionalController@destroySeccion')->name('concejoregional.destroySeccion');

Route::resource('politicapersonasmayores', PoliticaPersonasMayoresController::class)->middleware('auth');
Route::put('/politicapersonasmayores/{id}', [PoliticaPersonasMayoresController::class, 'update'])->name('politicapersonasmayores.update')->middleware('auth');
Route::delete('/ultimoRegistro/{ultimoRegistroId}/documentos/{documentoId}', [PoliticaPersonasMayoresController::class, 'destroyDocPolitica'])->name('eliminar_doc_politica')->middleware('auth');
Route::delete('/ultimoRegistro/{id}', [PoliticaPersonasMayoresController::class, 'destroypolitica'])->name('ruta_eliminar_pol')->middleware('auth');

// Rutas para los disenopoliticoregionales
Route::delete('/eliminar/formulario/{id}', [DisenoPoliticoRegionalesController::class, 'eliminarFormulario'])->name('eliminar.formulario')->middleware('auth');
Route::delete('/eliminar/encuesta/{id}', [DisenoPoliticoRegionalesController::class, 'eliminarEncuesta'])->name('eliminar.encuesta')->middleware('auth');
Route::put('/disenopoliticoregionales/{id}', [DisenoPoliticoRegionalesController::class, 'update'])->name('disenopoliticoregionales.update')->middleware('auth');
//Route::match(['put', 'patch'], '/disenopoliticoregionales/{disenopoliticoregionales}', 'App\Http\Controllers\DisenoPoliticoRegionalesController@update')->name('disenopoliticoregionales.update');

// Rutas para los tr�mites
Route::resource('tramites', TramitesDigitalesController::class)->middleware('auth');
Route::get('/iconos/{icono}', [TramitesDigitalesController::class, 'mostrarImagen'])->name('icono.mostrar');

//Route::get('/tramites/{id}', 'TramitesDigitalesController@show')->name('tramites.show');
Route::get('/tramites/{id}', [TramitesDigitalesController::class, 'show'])->name('tramites.show')->middleware('auth');

//Route::put('/tramites/{tramite}/edit', [TramitesDigitalesController::class, 'edit'])->name('tramites.update');

Route::put('/tramites/{tramite}', [TramitesDigitalesController::class, 'update'])->name('tramites.update')->middleware('auth');

Route::delete('/tramites/{id}', [TramitesDigitalesController::class, 'destroy'])->name('tramites.destroy')->middleware('auth');
Route::delete('/tramites/docs/{docId}', [TramitesDigitalesController::class, 'destroyDoc'])->name('tramites.destroyDoc')->middleware('auth');
Route::delete('/tramites/btns/{btnId}', [TramitesDigitalesController::class, 'destroyBtn'])->name('tramites.destroyBtn')->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*RUTAS VIEWS FRONT*/
Route::get('/gobiernoregional/acerca', 'App\Http\Controllers\CategoriesController@index');

Route::get('/gobiernoregional/acerca/comofunciona', 'App\Http\Controllers\CategoriesController@comofuncionaGrIndex');

Route::get('/gobiernoregional/acerca/estrategiaregional', 'App\Http\Controllers\CategoriesController@estrategiaregGrIndex');

Route::get('/gobiernoregional/acerca/inversionpublica', 'App\Http\Controllers\CategoriesController@inversionespublicasGrIndex');

Route::get('/gobiernoregional/acerca/misiongobierno', 'App\Http\Controllers\CategoriesController@misiongobiernoGrIndex');

Route::get('/gobiernoregional/leygobiernoregional', 'App\Http\Controllers\CategoriesController@leygobiernoregIndex');

Route::get('/gobiernoregional/organigrama', 'App\Http\Controllers\CategoriesController@organigramaIndex');

Route::get('/gobiernoregional/dptogestionpersonas', 'App\Http\Controllers\CategoriesController@dptogestionpersonasIndex');

Route::get('/gobiernoregional/tramitesdigitales', 'App\Http\Controllers\CategoriesController@tramitesdigitalesIndex');

Route::get('/gobiernoregional/asambleaclimatica', 'App\Http\Controllers\CategoriesController@asambleaclimaticaIndex');

Route::get('/gobiernoregional/asambleaclimatica/audienciadepartes', 'App\Http\Controllers\CategoriesController@audienciadepartesIndex');

Route::get('/gobiernoregional/politicasostenibilidadhidrica', 'App\Http\Controllers\CategoriesController@politicasostenibilidadhidricaIndex');

Route::get('/gobiernoregional/disenopoliticapersonasmayores', 'App\Http\Controllers\CategoriesController@politicapersonasmayoresIndex');

Route::get('/gobiernoregional/planificacioninstitucional', 'App\Http\Controllers\CategoriesController@planificacioninstitucionalIndex');

Route::get('/gobiernoregional/comitecienciastecnologias', 'App\Http\Controllers\CategoriesController@comitecienciastecnologiasIndex');

Route::get('/gobiernoregional/concursopublico', 'App\Http\Controllers\CategoriesController@concursopublicoIndex');

Route::get('/consejoregional/introduccion', 'App\Http\Controllers\CategoriesController@consejoregionalIndex');

Route::get('/consejoregional/presidenteconsejo', 'App\Http\Controllers\CategoriesController@presidenteconsejoIndex');

Route::get('/consejoregional/consejerososorno', 'App\Http\Controllers\CategoriesController@consejerososornoIndex');

Route::get('/consejoregional/consejeroschiloe', 'App\Http\Controllers\CategoriesController@consejeroschiloeIndex');

Route::get('/consejoregional/consejerosllanquihue', 'App\Http\Controllers\CategoriesController@consejerosllanquihueIndex');

Route::get('/consejoregional/consejerospalena', 'App\Http\Controllers\CategoriesController@consejerospalenaIndex');

/* DOCUMENTOS DE GESTION VISTAS*/
Route::get('/gobiernoregional/documentosdegestion', 'App\Http\Controllers\DocumentosDeGestionController@index')->name('DocumentosDeGestionController.index');

Route::get('/gobiernoregional/comisionregbordecostero', 'App\Http\Controllers\DocumentosDeGestionController@Indexcomisionregbordecostero')->name('comisionregbordecostero.Indexcomisionregbordecostero');

Route::get('/gobiernoregional/controlesssi', 'App\Http\Controllers\DocumentosDeGestionController@Indexcontrolesssi')->name('controlesssi.Indexcontrolesssi');

Route::get('/gobiernoregional/estadosituacionfndr', 'App\Http\Controllers\DocumentosDeGestionController@Indexestadosituacionfndr')->name('estadosituacionfndr.Indexestadosituacionfndr');

Route::get('/gobiernoregional/informeejecucion', 'App\Http\Controllers\DocumentosDeGestionController@Indexinformeejecucion')->name('informeejecucion.Indexinformeejecucion');

Route::get('/gobiernoregional/informegastosley', 'App\Http\Controllers\DocumentosDeGestionController@Indexinformegastosley')->name('informegastosley.Indexinformegastosley');

Route::get('/gobiernoregional/planregulador', 'App\Http\Controllers\DocumentosDeGestionController@Indexplanregulador')->name('planregulador.Indexplanregulador');

Route::get('/gobiernoregional/presupuesto', 'App\Http\Controllers\DocumentosDeGestionController@Indexpresupuesto')->name('presupuesto.Indexpresupuesto');

Route::get('/gobiernoregional/receptoresfondos', 'App\Http\Controllers\DocumentosDeGestionController@Indexreceptoresfondos')->name('receptoresfondos.Indexreceptoresfondos');

Route::get('/gobiernoregional/unidaddecontrol', 'App\Http\Controllers\DocumentosDeGestionController@Indexunidaddecontrol')->name('unidaddecontrol.Indexunidaddecontrol');
/* FIN DOCUMENTOS DE GESTION VISTAS*/

/*DOCUMENTOS EN CONSEJO REGIONAL VISTAS*/
Route::get('/consejoregional/actas', 'App\Http\Controllers\ConsejoRegionalDocsViewsController@Indexactas')->name('actas.Indexactas');
Route::get('/consejoregional/actas/{id}', 'App\Http\Controllers\ConsejoRegionalDocsViewsController@showActa')->name('actas.showActa');

Route::get('/consejoregional/certificadosdeacuerdos', 'App\Http\Controllers\ConsejoRegionalDocsViewsController@Indexcertificadosdeacuerdos')->name('certificadosdeacuerdos.Indexcertificadosdeacuerdos');

Route::get('/consejoregional/resumendegastos', 'App\Http\Controllers\ConsejoRegionalDocsViewsController@Indexresumendegastos')->name('resumendegastos.Indexresumendegastos');

Route::get('/consejoregional/tablassesionesconsejo', 'App\Http\Controllers\ConsejoRegionalDocsViewsController@Indextablassesionesconsejo')->name('tablassesionesconsejo.Indextablassesionesconsejo');
/*FIN DOCUMENTOS EN CONSEJO REGIONAL VISTAS*/

Route::get('/IntroduccionRegionLagos', 'App\Http\Controllers\IntroduccionRegionLagosController@index')->name('IntroduccionRegionLagos.index')->middleware('auth');
Route::get('/IntroduccionRegionLagos/create', 'App\Http\Controllers\IntroduccionRegionLagosController@create')->name('IntroduccionRegionLagos.create')->middleware('auth');
Route::post('/IntroduccionRegionLagos/store', 'App\Http\Controllers\IntroduccionRegionLagosController@store')->name('IntroduccionRegionLagos.store')->middleware('auth');
Route::get('/IntroduccionRegionLagos/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@edit')->name('IntroduccionRegionLagos.edit')->middleware('auth');
Route::put('/IntroduccionRegionLagos/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@update')->name('IntroduccionRegionLagos.update')->middleware('auth');

Route::get('/InformaciondelaRegion', 'App\Http\Controllers\IntroduccionRegionLagosController@indexAntecedentes')->name('AntecedentesRegionLagos.indexAntecedentes')->middleware('auth');
Route::get('/InformaciondelaRegion/createAntecedentes', 'App\Http\Controllers\IntroduccionRegionLagosController@createAntecedentes')->name('AntecedentesRegionLagos.createAntecedentes')->middleware('auth');
Route::post('/InformaciondelaRegion/storeAntecedentes', 'App\Http\Controllers\IntroduccionRegionLagosController@storeAntecedentes')->name('AntecedentesRegionLagos.storeAntecedentes')->middleware('auth');
Route::get('/InformaciondelaRegion/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@editAntecedentes')->name('AntecedentesRegionLagos.editAntecedentes')->middleware('auth');
Route::put('/InformaciondelaRegion/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@updateAntecedentes')->name('AntecedentesRegionLagos.updateAntecedentes')->middleware('auth');
Route::get('/InformaciondelaRegion/show', 'App\Http\Controllers\IntroduccionRegionLagosController@showAntecedentes')->name('AntecedentesRegionLagos.showAntecedentes')->middleware('auth');
Route::delete('/InformaciondelaRegion/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@destroyAntecedentes')->name('AntecedentesRegionLagos.destroyAntecedentes')->middleware('auth');

Route::get('/CargoRegionLagos', 'App\Http\Controllers\IntroduccionRegionLagosController@indexCargos')->name('CargoRegionLagos.indexCargos')->middleware('auth');
Route::get('/CargoRegionLagos/createCargo', 'App\Http\Controllers\IntroduccionRegionLagosController@createCargos')->name('CargoRegionLagos.createCargo')->middleware('auth');
Route::post('/CargoRegionLagos/storeCargo', 'App\Http\Controllers\IntroduccionRegionLagosController@storeCargos')->name('CargoRegionLagos.storeCargo')->middleware('auth');
Route::get('/CargoRegionLagos/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@editCargos')->name('CargoRegionLagos.editCargo')->middleware('auth');
Route::put('/CargoRegionLagos/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@updateCargos')->name('CargoRegionLagos.updateCargo')->middleware('auth');
Route::get('/CargoRegionLagos/show', 'App\Http\Controllers\IntroduccionRegionLagosController@showCargos')->name('CargoRegionLagos.showCargo')->middleware('auth');
Route::delete('/CargoRegionLagos/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@destroyCargos')->name('CargoRegionLagos.destroyCargo')->middleware('auth');

Route::get('/AutoridadesRegionLagos', 'App\Http\Controllers\IntroduccionRegionLagosController@indexAutoridades')->name('AutoridadesRegionLagos.indexAutoridades')->middleware('auth');
Route::get('/AutoridadesRegionLagos/create', 'App\Http\Controllers\IntroduccionRegionLagosController@createAutoridades')->name('AutoridadesRegionLagos.createAutoridades')->middleware('auth');
Route::post('/AutoridadesRegionLagos/store', 'App\Http\Controllers\IntroduccionRegionLagosController@storeAutoridades')->name('AutoridadesRegionLagos.storeAutoridades')->middleware('auth');
Route::get('/AutoridadesRegionLagos/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@editAutoridades')->name('AutoridadesRegionLagos.editAutoridades')->middleware('auth');
Route::put('/AutoridadesRegionLagos/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@updateAutoridades')->name('AutoridadesRegionLagos.updateAutoridades')->middleware('auth');
Route::get('/AutoridadesRegionLagos/show', 'App\Http\Controllers\IntroduccionRegionLagosController@showAutoridades')->name('AutoridadesRegionLagos.showAutoridades')->middleware('auth');
Route::delete('/AutoridadesRegionLagos/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@destroyAutoridades')->name('AutoridadesRegionLagos.destroyAutoridades')->middleware('auth');

Route::get('/EstadisticasRegionLagos', 'App\Http\Controllers\IntroduccionRegionLagosController@indexEstadisticas')->name('EstadisticasRegionLagos.indexEstadisticas')->middleware('auth');
Route::get('/EstadisticasRegionLagos/create', 'App\Http\Controllers\IntroduccionRegionLagosController@createEstadisticas')->name('EstadisticasRegionLagos.createEstadisticas')->middleware('auth');
Route::post('/EstadisticasRegionLagos/store', 'App\Http\Controllers\IntroduccionRegionLagosController@storeEstadisticas')->name('EstadisticasRegionLagos.storeEstadisticas')->middleware('auth');
Route::get('/EstadisticasRegionLagos/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@editEstadisticas')->name('EstadisticasRegionLagos.editEstadisticas')->middleware('auth');
Route::put('/EstadisticasRegionLagos/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@updateEstadisticas')->name('EstadisticasRegionLagos.updateEstadisticas')->middleware('auth');
Route::get('/EstadisticasRegionLagos/show', 'App\Http\Controllers\IntroduccionRegionLagosController@showEstadisticas')->name('EstadisticasRegionLagos.showEstadisticas')->middleware('auth');
Route::delete('/EstadisticasRegionLagos/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@destroyEstadisticas')->name('EstadisticasRegionLagos.destroyEstadisticas')->middleware('auth');

Route::get('/DinamicaEconomicaRegionLagos', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosDinamicaE')->name('DinamicaEconomicaRegionLagos.indexDinamicaEconomica')->middleware('auth');
Route::post('/DinamicaEconomicaRegionLagos/store', 'App\Http\Controllers\IntroduccionRegionLagosController@storeRegionlagosDinamicaE')->name('DinamicaEconomicaRegionLagos.storeDinamicaEconomica')->middleware('auth');
Route::get('/DinamicaEconomicaRegionLagos/create', 'App\Http\Controllers\IntroduccionRegionLagosController@createRegionlagosDinamicaE')->name('DinamicaEconomicaRegionLagos.createDinamicaEconomica')->middleware('auth');
Route::get('/DinamicaEconomicaRegionLagos/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@editRegionlagosDinamicaE')->name('DinamicaEconomicaRegionLagos.editDinamicaEconomica')->middleware('auth');
Route::put('/DinamicaEconomicaRegionLagos/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@updateRegionlagosDinamicaE')->name('DinamicaEconomicaRegionLagos.updateDinamicaEconomica')->middleware('auth');
Route::delete('/DinamicaEconomicaRegionLagos/delete/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@destroyRegionlagosDinamicaE')->name('DinamicaEconomicaRegionLagos.destroyDinamicaEconomica')->middleware('auth');

Route::get('/ExportacionSegunBloqueEconomico', 'App\Http\Controllers\IntroduccionRegionLagosController@indexExportacionSegunBloqueEconomico')->name('ExportacionSegunBloqueEconomico.index')->middleware('auth');
Route::post('/ExportacionSegunBloqueEconomico/store', 'App\Http\Controllers\IntroduccionRegionLagosController@storeExportacionSegunBloqueEconomico')->name('ExportacionSegunBloqueEconomico.store')->middleware('auth');
Route::get('/ExportacionSegunBloqueEconomico/create', 'App\Http\Controllers\IntroduccionRegionLagosController@createExportacionSegunBloqueEconomico')->name('ExportacionSegunBloqueEconomico.create')->middleware('auth');
Route::get('/ExportacionSegunBloqueEconomico/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@editExportacionSegunBloqueEconomico')->name('ExportacionSegunBloqueEconomico.edit')->middleware('auth');
Route::put('/ExportacionSegunBloqueEconomico/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@updateExportacionSegunBloqueEconomico')->name('ExportacionSegunBloqueEconomico.update')->middleware('auth');
Route::delete('/ExportacionSegunBloqueEconomico/delete/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@destroyExportacionSegunBloqueEconomico')->name('ExportacionSegunBloqueEconomico.destroy')->middleware('auth');

Route::get('/ExportacionSegunRamaActividad', 'App\Http\Controllers\IntroduccionRegionLagosController@indexExportacionSegunRamaActividad')->name('ExportacionSegunRamaActividad.index')->middleware('auth');
Route::post('/ExportacionSegunRamaActividad/store', 'App\Http\Controllers\IntroduccionRegionLagosController@storeExportacionSegunRamaActividad')->name('ExportacionSegunRamaActividad.store')->middleware('auth');
Route::get('/ExportacionSegunRamaActividad/create', 'App\Http\Controllers\IntroduccionRegionLagosController@createExportacionSegunRamaActividad')->name('ExportacionSegunRamaActividad.create')->middleware('auth');
Route::get('/ExportacionSegunRamaActividad/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@editExportacionSegunRamaActividad')->name('ExportacionSegunRamaActividad.edit')->middleware('auth');
Route::put('/ExportacionSegunRamaActividad/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@updateExportacionSegunRamaActividad')->name('ExportacionSegunRamaActividad.update')->middleware('auth');
Route::delete('/ExportacionSegunRamaActividad/delete/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@destroyExportacionSegunRamaActividad')->name('ExportacionSegunRamaActividad.destroy')->middleware('auth');

Route::get('/ActividadesEconomica', 'App\Http\Controllers\IntroduccionRegionLagosController@indexActividadesEconomica')->name('ActividadEconomica.index')->middleware('auth');
Route::post('/ActividadesEconomica/store', 'App\Http\Controllers\IntroduccionRegionLagosController@storeActividadesEconomica')->name('ActividadEconomica.store')->middleware('auth');
Route::get('/ActividadesEconomica/create', 'App\Http\Controllers\IntroduccionRegionLagosController@createActividadesEconomica')->name('ActividadEconomica.create')->middleware('auth');
Route::get('/ActividadesEconomica/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@editActividadesEconomica')->name('ActividadEconomica.edit')->middleware('auth');
Route::put('/ActividadesEconomica/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@updateActividadesEconomica')->name('ActividadEconomica.update')->middleware('auth');
Route::delete('/ActividadesEconomica/delete/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@destroyActividadesEconomica')->name('ActividadEconomica.destroy')->middleware('auth');
Route::get('/ActividadesEconomicaI/delete/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@destroyActividadesEconomicaI')->name('ActividadEconomicaI.destroy')->middleware('auth');
Route::get('/ActividadesEconomica/show', 'App\Http\Controllers\IntroduccionRegionLagosController@showActividadesEconomica')->name('ActividadEconomica.show')->middleware('auth');

Route::get('/FNDR', 'App\Http\Controllers\IntroduccionRegionLagosController@indexFNDR')->name('FNDR.index')->middleware('auth');
Route::post('/FNDR/store', 'App\Http\Controllers\IntroduccionRegionLagosController@storeFNDR')->name('FNDR.store')->middleware('auth');
Route::get('/FNDR/create', 'App\Http\Controllers\IntroduccionRegionLagosController@createFNDR')->name('FNDR.create')->middleware('auth');
Route::get('/FNDR/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@editFNDR')->name('FNDR.edit')->middleware('auth');
Route::put('/FNDR/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@updateFNDR')->name('FNDR.update')->middleware('auth');
Route::delete('/FNDR/delete/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@destroyFNDR')->name('FNDR.destroy')->middleware('auth');

Route::get('/InversionesD', 'App\Http\Controllers\IntroduccionRegionLagosController@indexInversionesG')->name('InversionesD.index')->middleware('auth');
Route::post('/InversionesD/store', 'App\Http\Controllers\IntroduccionRegionLagosController@storeInversionesG')->name('InversionesD.store')->middleware('auth');
Route::get('/InversionesD/create', 'App\Http\Controllers\IntroduccionRegionLagosController@createInversionesG')->name('InversionesD.create')->middleware('auth');
Route::get('/InversionesD/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@editInversionesG')->name('InversionesD.edit')->middleware('auth');
Route::put('/InversionesD/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@updateInversionesG')->name('InversionesD.update')->middleware('auth');
Route::delete('/InversionesD/delete/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@deleteInversionesG')->name('InversionesD.destroy')->middleware('auth');

Route::get('/InversionPublicaEfectiva', 'App\Http\Controllers\IntroduccionRegionLagosController@indexInversionPublicaEfectiva')->name('InversionPublicaEfectiva.index')->middleware('auth');
Route::post('/InversionPublicaEfectiva/store', 'App\Http\Controllers\IntroduccionRegionLagosController@storeInversionPublicaEfectiva')->name('InversionPublicaEfectiva.store')->middleware('auth');
Route::get('/InversionPublicaEfectiva/create', 'App\Http\Controllers\IntroduccionRegionLagosController@createInversionPublicaEfectiva')->name('InversionPublicaEfectiva.create')->middleware('auth');
Route::get('/InversionPublicaEfectiva/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@editInversionPublicaEfectiva')->name('InversionPublicaEfectiva.edit')->middleware('auth');
Route::put('/InversionPublicaEfectiva/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@updateInversionPublicaEfectiva')->name('InversionPublicaEfectiva.update')->middleware('auth');
Route::delete('/InversionPublicaEfectiva/delete/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@deleteInversionPublicaEfectiva')->name('InversionPublicaEfectiva.destroy')->middleware('auth');

Route::get('/FinanciamientoporProvincias', 'App\Http\Controllers\IntroduccionRegionLagosController@indexFinanciamientoporProvincias')->name('FinanciamientoporProvincias.index')->middleware('auth');
Route::post('/FinanciamientoporProvincias/store', 'App\Http\Controllers\IntroduccionRegionLagosController@storeFinanciamientoporProvincias')->name('FinanciamientoporProvincias.store')->middleware('auth');
Route::get('/FinanciamientoporProvincias/create', 'App\Http\Controllers\IntroduccionRegionLagosController@createFinanciamientoporProvincias')->name('FinanciamientoporProvincias.create')->middleware('auth');
Route::get('/FinanciamientoporProvincias/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@editFinanciamientoporProvincias')->name('FinanciamientoporProvincias.edit')->middleware('auth');
Route::put('/FinanciamientoporProvincias/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@updateFinanciamientoporProvincias')->name('FinanciamientoporProvincias.update')->middleware('auth');
Route::delete('/FinanciamientoporProvincias/delete/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@deleteFinanciamientoporProvincias')->name('FinanciamientoporProvincias.destroy')->middleware('auth');

Route::get('/PoliticaPrivacidad', 'App\Http\Controllers\IntroduccionRegionLagosController@indexPoliticaPrivacidad')->name('PoliticaPrivacidad.index')->middleware('auth');
Route::post('/PoliticaPrivacidad/store', 'App\Http\Controllers\IntroduccionRegionLagosController@storePoliticaPrivacidad')->name('PoliticaPrivacidad.store')->middleware('auth');
Route::get('/PoliticaPrivacidad/create', 'App\Http\Controllers\IntroduccionRegionLagosController@createPoliticaPrivacidad')->name('PoliticaPrivacidad.create')->middleware('auth');
Route::get('/PoliticaPrivacidad/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@editPoliticaPrivacidad')->name('PoliticaPrivacidad.edit')->middleware('auth');
Route::put('/PoliticaPrivacidad/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@updatePoliticaPrivacidad')->name('PoliticaPrivacidad.update')->middleware('auth');
Route::delete('/PoliticaPrivacidad/delete/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@deletePoliticaPrivacidad')->name('PoliticaPrivacidad.destroy')->middleware('auth');

//Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');


//frond region los lagos
Route::get('/regionlagos/introduccion', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosIntro');
Route::get('/regionlagos/introduccion/{imagen}', 'App\Http\Controllers\IntroduccionRegionLagosController@imagenesP')->name('imagenesP.mostrar');
Route::get('/regionlagos/autoridades/senador/{titulo}', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosBuscarAutoridadesSenador')->name('BuscarAutoridadesSenador.show');
Route::get('/regionlagos/autoridades/diputados/{titulo}', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosBuscarAutoridadesDiputados')->name('BuscarAutoridadesDiputados.show');
Route::get('/regionlagos/autoridades/seremis/{titulo}', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosBuscarAutoridadesSeremis')->name('BuscarAutoridadesSeremis.show');
Route::get('/regionlagos/autoridades/servicios/{titulo}', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosBuscarAutoridadesServicios')->name('BuscarAutoridadesServicios.show');
Route::get('/regionlagos/autoridades/municipalidades/{titulo}', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosBuscarAutoridadesMunicipalidades')->name('BuscarAutoridadesMunicipalidades.show');
Route::get('/regionlagos/autoridades/{titulo}', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosAutoridades')->name('RegionlagosAutoridades.show');
Route::get('/regionlagos/PoblacionSuperficie/', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosPoblacionSuperficie')->name('PoblacionSuperficie.index');
Route::get('/regionlagos/PoblacionSuperficie/{titulo}', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosPoblacionSuperficieProvincia')->name('PoblacionSuperficieProvincia.show');
Route::get('/regionlagos/DinamicaEconomica/', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosDinamicaEconomica')->name('DinamicaEconomica.index');
Route::get('/regionlagos/antecedentesregion', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosAntecedentesregion')->name('antecedentesregion.index');
Route::get('/regionlagos/ExportacionSegunRamaActividad', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosExportacionSegunRamaActividad')->name('RegionlagosExportacionSegunRamaActividad.index');
Route::get('/regionlagos/ExportacionSegunBloqueEconomico', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosExportacionSegunBloqueEconomico')->name('RegionlagosExportacionSegunBloqueEconomico.index');
Route::get('/regionlagos/FNDR', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosFNDR')->name('RegionlagosFNDR.index');
Route::get('/regionlagos/ActividadEconomica', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosFNDR')->name('RegionlagosActividadEconomica.index');
Route::get('/regionlagos/ActividadEconomica/{titulo}', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosBuscarActividadEconomica')->name('RegionlagosBuscarActividadEconomica.show');
Route::get('/regionlagos/InversionesD/', 'App\Http\Controllers\IntroduccionRegionLagosController@indexInversionesWeb')->name('Inversiones.index');
Route::get('/regionlagos/InversionPublicaEfectiva/', 'App\Http\Controllers\IntroduccionRegionLagosController@indexInversionPublicaEfectivaWeb')->name('InversionPublicaEfectivaWeb.index');
Route::get('/regionlagos/FinanciamientoporProvincias/', 'App\Http\Controllers\IntroduccionRegionLagosController@indexFinanciamientoporProvinciasWeb')->name('FinanciamientoporProvinciasWeb.index');
Route::get('/regionlagos/PoliticaPrivacidad/', 'App\Http\Controllers\IntroduccionRegionLagosController@indexPoliticaPrivacidadWeb')->name('PoliticaPrivacidadWeb.index');
Route::get('/regionlagos/PoliticaPrivacidad/', 'App\Http\Controllers\IntroduccionRegionLagosController@indexPoliticaPrivacidadWeb')->name('PoliticaPrivacidadWeb.index');
Route::get('/regionlagos/{titulo}', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosprovincias')->name('Regionlagosprovincias.show');
Route::get('/mapa', 'App\Http\Controllers\IntroduccionRegionLagosController@indexMapaWeb')->name('MapaWeb.show');



//PROGRAMAS
Route::resource('programas', ProgramasController::class);

Route::put('/programas/{programa}', [ProgramasController::class, 'update'])->name('programas.update');


Route::get('/todoslosprogramas', 'App\Http\Controllers\TodosLosProgramasController@todoslosprogramasIndex');

//Route::get('/todos-los-programas', 'TuControlador@mostrarTodosLosProgramas');

//Route::get('/programas/{programa}', 'TodosLosProgramasController@show')->name('programas.show');
Route::get('/programas/{id}', [ProgramasController::class, 'show'])->name('programas.show');



//PREGUNTAS FRECUENTES
Route::resource('preguntas-frecuentes', PreguntasFrecuentesController::class);
//Route::get('/preguntas-frecuentes/{id}', [PreguntasFrecuentes::class, 'show'])->name('preguntas-frecuentes.show');
//Route::resource('preguntas', PreguntaController::class);

Route::get('/preguntas', [PreguntaController::class, 'index']);
Route::resource('preguntas', PreguntaController::class);

Route::get('/preguntas/{pregunta}/edit', [PreguntaController::class, 'edit'])->name('preguntas.edit');

Route::get('/preguntasfrecuentes', 'App\Http\Controllers\PreguntasFrecuentesController@preguntasfrecuentesIndex');


    //FORMULARIO DE CONTACTO
Route::get('/contactanos', 'App\Http\Controllers\FormController@index')->name('contactanos.index');
    //PROCESAR FORMULARIO Y ENVIAR CORREO ELECTRONICO
Route::post('/contactanos/store', 'App\Http\Controllers\FormController@store')->name('contactanos.store');
    //FORMULARIOS ENVIADOS BACKEND
Route::get('/verformularios', [FormController::class, 'verFormularios'])->name('verformularios');

Route::get('/verformularios', [FormController::class, 'verFormularios'])->name('verformularios');
Route::get('/detalle/formulario/{id}', [FormController::class, 'detalleFormulario'])->name('detalle.formulario');
Route::delete('/borrar/formulario/{id}', [FormController::class, 'borrarFormulario'])->name('borrar.formulario');
    //DESCARGAR FORMULARIOS CSV
Route::get('/descargar-csv', [FormController::class, 'descargarCSV'])->name('descargar.csv');