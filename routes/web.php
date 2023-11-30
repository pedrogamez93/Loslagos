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
use App\Http\Controllers\AsambleaClimaticaController;
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
Route::get('/regionlagos/antecedentesregion', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosAntecedentesregion')->name('antecedentesregion.index');;
Route::get('/regionlagos/{titulo}', 'App\Http\Controllers\IntroduccionRegionLagosController@indexRegionlagosprovincias')->name('Regionlagosprovincias.show');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
