<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\AsambleaClimaticaController;
use App\Http\Controllers\AudienciasController;
use App\Http\Controllers\DisenoPoliticoRegionalesController;
use App\Http\Controllers\PoliticaPersonasMayoresController;
use App\Http\Controllers\PlanificacionInstitucionalController;
//use App\Http\Controllers\TramitesDigitalesDocsController;
use App\Http\Controllers\TramitesDigitalesController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index']);

/*DOCUMENTOS */
Route::get('/documentos', [DocumentoController::class, 'index']);
Route::get('/documentos/create', [DocumentoController::class, 'create'])->name('documentos.create');
Route::post('/documentos', [DocumentoController::class, 'store']);
Route::post('/documentos/buscar', [DocumentoController::class, 'buscar']);

/*FUNCIONARIOS */

Route::get('/funcionario', [FuncionarioController::class, 'index']);
Route::get('/funcionario/create', [FuncionarioController::class, 'create'])->name('funcionario.create');
Route::post('/funcionarios', [FuncionarioController::class, 'store']);
Route::post('/funcionario/buscar', [FuncionarioController::class, 'buscar']);

//Route::resource('/', HomeController::class);

/*RUTAS CRUD INIT*/
Route::resource('introducciones', IntroduccionController::class);

Route::resource('comofuncionagrs', ComofuncionaGrController::class);

Route::resource('estrategias', EstrategiasController::class);

Route::resource('inversiones', InversionesPublicController::class);

Route::resource('mision', MisionGobController::class);

Route::resource('leygobiernoregional', LeygbsController::class);

Route::resource('organigrama', OrganigramaController::class);

Route::resource('dptogestionpersonas', DptoGestionPersonasController::class);

Route::resource('asambleaclimatica', AsambleaClimaticaController::class);

Route::resource('audienciasdepartes', AudienciasController::class);

Route::resource('disenopoliticoregionales', DisenoPoliticoRegionalesController::class);

Route::resource('listplanificainstitucional', PlanificacionInstitucionalController::class);


Route::resource('politicapersonasmayores', PoliticaPersonasMayoresController::class);
Route::put('/politicapersonasmayores/{id}', [PoliticaPersonasMayoresController::class, 'update'])->name('politicapersonasmayores.update');

// Rutas para los disenopoliticoregionales
Route::delete('/eliminar/formulario/{id}', [DisenoPoliticoRegionalesController::class, 'eliminarFormulario'])->name('eliminar.formulario');
Route::delete('/eliminar/encuesta/{id}', [DisenoPoliticoRegionalesController::class, 'eliminarEncuesta'])->name('eliminar.encuesta');
Route::put('/disenopoliticoregionales/{id}', [DisenoPoliticoRegionalesController::class, 'update'])->name('disenopoliticoregionales.update');
//Route::match(['put', 'patch'], '/disenopoliticoregionales/{disenopoliticoregionales}', 'App\Http\Controllers\DisenoPoliticoRegionalesController@update')->name('disenopoliticoregionales.update');

// Rutas para los trámites
Route::resource('tramites', TramitesDigitalesController::class);

//Route::get('/tramites/{id}', 'TramitesDigitalesController@show')->name('tramites.show');
Route::get('/tramites/{id}', [TramitesDigitalesController::class, 'show'])->name('tramites.show');

//Route::put('/tramites/{tramite}/edit', [TramitesDigitalesController::class, 'edit'])->name('tramites.update');

Route::put('/tramites/{tramite}', [TramitesDigitalesController::class, 'update'])->name('tramites.update');

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

Route::get('/IntroduccionRegionLagos', 'App\Http\Controllers\IntroduccionRegionLagosController@index')->name('IntroduccionRegionLagos.index');
Route::get('/IntroduccionRegionLagos/create', 'App\Http\Controllers\IntroduccionRegionLagosController@create')->name('IntroduccionRegionLagos.create');
Route::post('/IntroduccionRegionLagos/store', 'App\Http\Controllers\IntroduccionRegionLagosController@store')->name('IntroduccionRegionLagos.store');
Route::get('/IntroduccionRegionLagos/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@edit')->name('IntroduccionRegionLagos.edit');
Route::put('/IntroduccionRegionLagos/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@update')->name('IntroduccionRegionLagos.update');

Route::get('/InformaciondelaRegion', 'App\Http\Controllers\IntroduccionRegionLagosController@indexAntecedentes')->name('AntecedentesRegionLagos.indexAntecedentes');
Route::get('/InformaciondelaRegion/createAntecedentes', 'App\Http\Controllers\IntroduccionRegionLagosController@createAntecedentes')->name('AntecedentesRegionLagos.createAntecedentes');
Route::post('/InformaciondelaRegion/storeAntecedentes', 'App\Http\Controllers\IntroduccionRegionLagosController@storeAntecedentes')->name('AntecedentesRegionLagos.storeAntecedentes');
Route::get('/InformaciondelaRegion/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@editAntecedentes')->name('AntecedentesRegionLagos.editAntecedentes');
Route::put('/InformaciondelaRegion/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@updateAntecedentes')->name('AntecedentesRegionLagos.updateAntecedentes');
Route::get('/InformaciondelaRegion/show', 'App\Http\Controllers\IntroduccionRegionLagosController@showAntecedentes')->name('AntecedentesRegionLagos.showAntecedentes');
Route::delete('/InformaciondelaRegion/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@destroyAntecedentes')->name('AntecedentesRegionLagos.destroyAntecedentes');

Route::get('/CargoRegionLagos', 'App\Http\Controllers\IntroduccionRegionLagosController@indexCargos')->name('CargoRegionLagos.indexCargos');
Route::get('/CargoRegionLagos/createCargo', 'App\Http\Controllers\IntroduccionRegionLagosController@createCargos')->name('CargoRegionLagos.createCargo');
Route::post('/CargoRegionLagos/storeCargo', 'App\Http\Controllers\IntroduccionRegionLagosController@storeCargos')->name('CargoRegionLagos.storeCargo');
Route::get('/CargoRegionLagos/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@editCargos')->name('CargoRegionLagos.editCargo');
Route::put('/CargoRegionLagos/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@updateCargos')->name('CargoRegionLagos.updateCargo');
Route::get('/CargoRegionLagos/show', 'App\Http\Controllers\IntroduccionRegionLagosController@showCargos')->name('CargoRegionLagos.showCargo');
Route::delete('/CargoRegionLagos/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@destroyCargos')->name('CargoRegionLagos.destroyCargo');

Route::get('/AutoridadesRegionLagos', 'App\Http\Controllers\IntroduccionRegionLagosController@indexAutoridades')->name('AutoridadesRegionLagos.indexAutoridades');
Route::get('/AutoridadesRegionLagos/create', 'App\Http\Controllers\IntroduccionRegionLagosController@createAutoridades')->name('AutoridadesRegionLagos.createAutoridades');
Route::post('/AutoridadesRegionLagos/store', 'App\Http\Controllers\IntroduccionRegionLagosController@storeAutoridades')->name('AutoridadesRegionLagos.storeAutoridades');
Route::get('/AutoridadesRegionLagos/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@editAutoridades')->name('AutoridadesRegionLagos.editAutoridades');
Route::put('/AutoridadesRegionLagos/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@updateAutoridades')->name('AutoridadesRegionLagos.updateAutoridades');
Route::get('/AutoridadesRegionLagos/show', 'App\Http\Controllers\IntroduccionRegionLagosController@showAutoridades')->name('AutoridadesRegionLagos.showAutoridades');
Route::delete('/AutoridadesRegionLagos/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@destroyAutoridades')->name('AutoridadesRegionLagos.destroyAutoridades');

Route::get('/EstadisticasRegionLagos', 'App\Http\Controllers\IntroduccionRegionLagosController@indexEstadisticas')->name('EstadisticasRegionLagos.indexEstadisticas');
Route::get('/EstadisticasRegionLagos/create', 'App\Http\Controllers\IntroduccionRegionLagosController@createEstadisticas')->name('EstadisticasRegionLagos.createEstadisticas');
Route::post('/EstadisticasRegionLagos/store', 'App\Http\Controllers\IntroduccionRegionLagosController@storeEstadisticas')->name('EstadisticasRegionLagos.storeEstadisticas');
Route::get('/EstadisticasRegionLagos/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@editEstadisticas')->name('EstadisticasRegionLagos.editEstadisticas');
Route::put('/EstadisticasRegionLagos/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@updateEstadisticas')->name('EstadisticasRegionLagos.updateEstadisticas');
Route::get('/EstadisticasRegionLagos/show', 'App\Http\Controllers\IntroduccionRegionLagosController@showEstadisticas')->name('EstadisticasRegionLagos.showEstadisticas');
Route::delete('/EstadisticasRegionLagos/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@destroyEstadisticas')->name('EstadisticasRegionLagos.destroyEstadisticas');

//frond region los lagos
Route::get('/regionlagos/introduccion', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosIntro');

Route::get('/regionlagos/autoridades/senador/{titulo}', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosBuscarAutoridadesSenador')->name('BuscarAutoridadesSenador.show');
Route::get('/regionlagos/autoridades/diputados/{titulo}', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosBuscarAutoridadesDiputados')->name('BuscarAutoridadesDiputados.show');
Route::get('/regionlagos/autoridades/seremis/{titulo}', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosBuscarAutoridadesSeremis')->name('BuscarAutoridadesSeremis.show');
Route::get('/regionlagos/autoridades/servicios/{titulo}', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosBuscarAutoridadesServicios')->name('BuscarAutoridadesServicios.show');
Route::get('/regionlagos/autoridades/municipalidades/{titulo}', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosBuscarAutoridadesMunicipalidades')->name('BuscarAutoridadesMunicipalidades.show');
Route::get('/regionlagos/autoridades/{titulo}', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosAutoridades')->name('RegionlagosAutoridades.show');
Route::get('/regionlagos/PoblacionSuperficie/', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosDinamicaEconomica')->name('RegionlagosDinamicaEconomica.index');
//Route::get('/regionlagos/PoblacionSuperficie/{titulo}', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosAutoridades')->name('RegionlagosAutoridades.show');
Route::get('/regionlagos/antecedentesregion', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosAntecedentesregion')->name('antecedentesregion.index');;
Route::get('/regionlagos/{titulo}', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosprovincias')->name('Regionlagosprovincias.show');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');