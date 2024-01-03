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
use App\Http\Controllers\ComiteCienciasController;
use App\Http\Controllers\ConcursosPublicosController;
use App\Http\Controllers\ConcejoRegionalController;

use App\Http\Controllers\SitiosController;

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
Route::get('/documentos/{id}/edit', [DocumentoController::class, 'edit'])->name('documentos.edit');
Route::put('/documentos/{id}', [DocumentoController::class, 'update'])->name('documentos.update');
Route::get('/documentos/ver-documentos', [DocumentoController::class, 'indexTabla'])->name('documentos.verdocumentos');
Route::delete('/documentos/eliminar/{id}', [DocumentoController::class, 'destroy'])->name('documentos.destroy');
/*FUNCIONARIOS */

Route::get('/funcionario', [FuncionarioController::class, 'index']);
Route::get('/funcionarios/create', [FuncionarioController::class, 'create'])->name('funcionarios.create');
Route::post('/funcionarios', [FuncionarioController::class, 'store']);
Route::post('/funcionarios/buscar', [FuncionarioController::class, 'buscar']);
Route::get('/funcionarios/{id}/edit', [FuncionarioController::class, 'edit'])->name('funcionarios.edit');
Route::put('/funcionarios/{id}', [FuncionarioController::class, 'update'])->name('funcionarios.update');
Route::get('/funcionarios/ver-funcionarios', [FuncionarioController::class, 'indexTabla'])->name('funcionarios.verfuncionarios');
Route::delete('/funcionarios/eliminar/{id}', [FuncionarioController::class, 'destroy'])->name('funcionarios.destroy');

//Sala de prensa
Route::get('/saladeprensa', [SalaprensaController::class, 'index']);
Route::get('/saladeprensa/create', [SalaprensaController::class, 'create']);
Route::post('/saladeprensasubir', [SalaprensaController::class, 'store'])->name('salaprensa.store');
Route::get('/saladeprensa/{id}/edit', [SalaprensaController::class, 'edit'])->name('salaprensa.edit');
Route::put('/saladeprensa/{id}', [SalaprensaController::class, 'update'])->name('salaprensa.update');
Route::get('/saladeprensa/ver-noticias', [SalaprensaController::class, 'indexTabla'])->name('salaprensa.vernoticia');
Route::delete('/saladeprensa/eliminar/{id}', [SalaprensaController::class, 'destroy'])->name('salaprensa.destroy');
Route::get('/salaprensa/{imagen}', [SalaprensaController::class, 'mostrarImagen'])->name('imagen.mostrar');
//Route::resource('/', HomeController::class);

//Sala de prensa
Route::get('/sitios', [SitiosController::class, 'index']);
Route::get('/sitios/create', [SitiosController::class, 'create']);
Route::post('/sitiossubir', [SitiosController::class, 'store'])->name('salaprensa.store');
Route::get('/sitios/{id}/edit', [SitiosController::class, 'edit'])->name('salaprensa.edit');
Route::put('/sitios/{id}', [SitiosController::class, 'update'])->name('salaprensa.update');
Route::get('/sitios/ver-noticias', [SitiosController::class, 'indexTabla'])->name('salaprensa.vernoticia');
Route::delete('/sitios/eliminar/{id}', [SitiosController::class, 'destroy'])->name('salaprensa.destroy');
Route::get('/sitios/{imagen}', [SitiosController::class, 'mostrarImagen'])->name('imagen.mostrar');
//Route::resource('/', HomeController::class);



/*RUTAS CRUD INIT*/
Route::resource('introducciones', IntroduccionController::class);
Route::get('/images/{imagen}', [IntroduccionController::class, 'mostrarImagen'])->name('imagen.mostrar');

Route::resource('comofuncionagrs', ComofuncionaGrController::class);
Route::get('/images/{imagen}', [ComofuncionaGrController::class, 'mostrarImagen'])->name('imagen.mostrar');

Route::resource('estrategias', EstrategiasController::class);
Route::get('/images/{imagen}', [EstrategiasController::class, 'mostrarImagen'])->name('imagen.mostrar');

Route::resource('inversiones', InversionesPublicController::class);
Route::get('/images/{imagen}', [InversionesPublicController::class, 'mostrarImagen'])->name('imagen.mostrar');

Route::resource('mision', MisionGobController::class);
Route::get('/images/{imagen}', [MisionGobController::class, 'mostrarImagen'])->name('imagen.mostrar');

Route::resource('leygobiernoregional', LeygbsController::class);

Route::resource('organigrama', OrganigramaController::class);
Route::get('/images/{imagen}', [OrganigramaController::class, 'mostrarImagen'])->name('imagen.mostrar');

Route::resource('dptogestionpersonas', DptoGestionPersonasController::class);

Route::resource('asambleaclimatica', AsambleaClimaticaController::class);

Route::resource('audienciasdepartes', AudienciasController::class);

Route::resource('disenopoliticoregionales', DisenoPoliticoRegionalesController::class);

Route::resource('listplanificainstitucional', PlanificacionInstitucionalController::class);

Route::resource('comiteciencias', ComiteCienciasController::class);

Route::delete('/eliminar-documento/{documentoId}', [ComiteCienciasController::class, 'eliminarDocumento']);

Route::resource('concursospublicos', ConcursosPublicosController::class);

Route::delete('/eliminar-documento/{documentoId}', [ConcursosPublicosController::class, 'eliminarDocumento']);

Route::resource('concejoregional', ConcejoRegionalController::class);

Route::delete('/concejoregional/{concejoId}/secciones/{seccionId}', 'ConcejoRegionalController@destroySeccion')->name('concejoregional.destroySeccion');

Route::resource('politicapersonasmayores', PoliticaPersonasMayoresController::class);
Route::put('/politicapersonasmayores/{id}', [PoliticaPersonasMayoresController::class, 'update'])->name('politicapersonasmayores.update');

// Rutas para los disenopoliticoregionales
Route::delete('/eliminar/formulario/{id}', [DisenoPoliticoRegionalesController::class, 'eliminarFormulario'])->name('eliminar.formulario');
Route::delete('/eliminar/encuesta/{id}', [DisenoPoliticoRegionalesController::class, 'eliminarEncuesta'])->name('eliminar.encuesta');
Route::put('/disenopoliticoregionales/{id}', [DisenoPoliticoRegionalesController::class, 'update'])->name('disenopoliticoregionales.update');
//Route::match(['put', 'patch'], '/disenopoliticoregionales/{disenopoliticoregionales}', 'App\Http\Controllers\DisenoPoliticoRegionalesController@update')->name('disenopoliticoregionales.update');

// Rutas para los trámites
Route::resource('tramites', TramitesDigitalesController::class);
Route::get('/iconos/{icono}', [TramitesDigitalesController::class, 'mostrarImagen'])->name('icono.mostrar');

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

Route::get('/gobiernoregional/comitecienciastecnologias', 'App\Http\Controllers\CategoriesController@comitecienciastecnologiasIndex');

Route::get('/gobiernoregional/concursopublico', 'App\Http\Controllers\CategoriesController@concursopublicoIndex');

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

Route::get('/DinamicaEconomicaRegionLagos', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosDinamicaE')->name('DinamicaEconomicaRegionLagos.indexDinamicaEconomica');
Route::post('/DinamicaEconomicaRegionLagos/store', 'App\Http\Controllers\IntroduccionRegionLagosController@storeRegionlagosDinamicaE')->name('DinamicaEconomicaRegionLagos.storeDinamicaEconomica');
Route::get('/DinamicaEconomicaRegionLagos/create', 'App\Http\Controllers\IntroduccionRegionLagosController@createRegionlagosDinamicaE')->name('DinamicaEconomicaRegionLagos.createDinamicaEconomica');
Route::get('/DinamicaEconomicaRegionLagos/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@editRegionlagosDinamicaE')->name('DinamicaEconomicaRegionLagos.editDinamicaEconomica');
Route::put('/DinamicaEconomicaRegionLagos/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@updateRegionlagosDinamicaE')->name('DinamicaEconomicaRegionLagos.updateDinamicaEconomica');
Route::delete('/DinamicaEconomicaRegionLagos/delete/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@destroyRegionlagosDinamicaE')->name('DinamicaEconomicaRegionLagos.destroyDinamicaEconomica');

Route::get('/ExportacionSegunBloqueEconomico', 'App\Http\Controllers\IntroduccionRegionLagosController@indexExportacionSegunBloqueEconomico')->name('ExportacionSegunBloqueEconomico.index');
Route::post('/ExportacionSegunBloqueEconomico/store', 'App\Http\Controllers\IntroduccionRegionLagosController@storeExportacionSegunBloqueEconomico')->name('ExportacionSegunBloqueEconomico.store');
Route::get('/ExportacionSegunBloqueEconomico/create', 'App\Http\Controllers\IntroduccionRegionLagosController@createExportacionSegunBloqueEconomico')->name('ExportacionSegunBloqueEconomico.create');
Route::get('/ExportacionSegunBloqueEconomico/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@editExportacionSegunBloqueEconomico')->name('ExportacionSegunBloqueEconomico.edit');
Route::put('/ExportacionSegunBloqueEconomico/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@updateExportacionSegunBloqueEconomico')->name('ExportacionSegunBloqueEconomico.update');
Route::delete('/ExportacionSegunBloqueEconomico/delete/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@destroyExportacionSegunBloqueEconomico')->name('ExportacionSegunBloqueEconomico.destroy');

Route::get('/ExportacionSegunRamaActividad', 'App\Http\Controllers\IntroduccionRegionLagosController@indexExportacionSegunRamaActividad')->name('ExportacionSegunRamaActividad.index');
Route::post('/ExportacionSegunRamaActividad/store', 'App\Http\Controllers\IntroduccionRegionLagosController@storeExportacionSegunRamaActividad')->name('ExportacionSegunRamaActividad.store');
Route::get('/ExportacionSegunRamaActividad/create', 'App\Http\Controllers\IntroduccionRegionLagosController@createExportacionSegunRamaActividad')->name('ExportacionSegunRamaActividad.create');
Route::get('/ExportacionSegunRamaActividad/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@editExportacionSegunRamaActividad')->name('ExportacionSegunRamaActividad.edit');
Route::put('/ExportacionSegunRamaActividad/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@updateExportacionSegunRamaActividad')->name('ExportacionSegunRamaActividad.update');
Route::delete('/ExportacionSegunRamaActividad/delete/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@destroyExportacionSegunRamaActividad')->name('ExportacionSegunRamaActividad.destroy');

Route::get('/ActividadesEconomica', 'App\Http\Controllers\IntroduccionRegionLagosController@indexActividadesEconomica')->name('ActividadEconomica.index');
Route::post('/ActividadesEconomica/store', 'App\Http\Controllers\IntroduccionRegionLagosController@storeActividadesEconomica')->name('ActividadEconomica.store');
Route::get('/ActividadesEconomica/create', 'App\Http\Controllers\IntroduccionRegionLagosController@createActividadesEconomica')->name('ActividadEconomica.create');
Route::get('/ActividadesEconomica/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@editActividadesEconomica')->name('ActividadEconomica.edit');
Route::put('/ActividadesEconomica/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@updateActividadesEconomica')->name('ActividadEconomica.update');
Route::delete('/ActividadesEconomica/delete/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@destroyActividadesEconomica')->name('ActividadEconomica.destroy');
Route::get('/ActividadesEconomica/show', 'App\Http\Controllers\IntroduccionRegionLagosController@showActividadesEconomica')->name('ActividadEconomica.show');

Route::get('/FNDR', 'App\Http\Controllers\IntroduccionRegionLagosController@indexFNDR')->name('FNDR.index');
Route::post('/FNDR/store', 'App\Http\Controllers\IntroduccionRegionLagosController@storeFNDR')->name('FNDR.store');
Route::get('/FNDR/create', 'App\Http\Controllers\IntroduccionRegionLagosController@createFNDR')->name('FNDR.create');
Route::get('/FNDR/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@editFNDR')->name('FNDR.edit');
Route::put('/FNDR/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@updateFNDR')->name('FNDR.update');
Route::delete('/FNDR/delete/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@destroyFNDR')->name('FNDR.destroy');

Route::get('/InversionPublicaEfectiva', 'App\Http\Controllers\IntroduccionRegionLagosController@indexInversionPublicaEfectiva')->name('InversionPublicaEfectiva.index');
Route::post('/InversionPublicaEfectiva/store', 'App\Http\Controllers\IntroduccionRegionLagosController@storeInversionPublicaEfectiva')->name('InversionPublicaEfectiva.store');
Route::get('/InversionPublicaEfectiva/create', 'App\Http\Controllers\IntroduccionRegionLagosController@createInversionPublicaEfectiva')->name('InversionPublicaEfectiva.create');
Route::get('/InversionPublicaEfectiva/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@editInversionPublicaEfectiva')->name('InversionPublicaEfectiva.edit');
Route::put('/InversionPublicaEfectiva/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@updateInversionPublicaEfectiva')->name('InversionPublicaEfectiva.update');
Route::delete('/InversionPublicaEfectiva/delete/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@deleteInversionPublicaEfectiva')->name('InversionPublicaEfectiva.destroy');

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
Route::get('/regionlagos/inversiones/', 'App\Http\Controllers\IntroduccionRegionLagosController@indexInversiones')->name('Inversiones.index');
Route::get('/regionlagos/InversionPublicaEfectiva/', 'App\Http\Controllers\IntroduccionRegionLagosController@indexInversionPublicaEfectivaWeb')->name('InversionPublicaEfectivaWeb.index');

Route::get('/regionlagos/{titulo}', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosprovincias')->name('Regionlagosprovincias.show');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::resource('programas', ProgramasController::class);

// Route::put('/programas/{programa}', [ProgramasController::class, 'update'])->name('programas.update');


// Route::get('/todoslosprogramas', 'App\Http\Controllers\TodosLosProgramasController@todoslosprogramasIndex');

//Route::get('/todos-los-programas', 'TuControlador@mostrarTodosLosProgramas');

//Route::get('/programas/{programa}', 'TodosLosProgramasController@show')->name('programas.show');
// Route::get('/programas/{id}', [Programas::class, 'show'])->name('programas.show');


