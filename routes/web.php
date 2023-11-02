<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IntroduccionController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ComofuncionaGrController;
use App\Http\Controllers\EstrategiasController;
use App\Http\Controllers\InversionesPublicController;
use App\Http\Controllers\MisionGobController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('introducciones', IntroduccionController::class);

Route::resource('comofuncionagrs', ComofuncionaGrController::class);

Route::resource('estrategias', EstrategiasController::class);

Route::resource('inversiones', InversionesPublicController::class);

Route::resource('mision', MisionGobController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/gobiernoregional/acerca', 'App\Http\Controllers\CategoriesController@index');

<<<<<<< Updated upstream
Route::get('/gobiernoregional/acerca/comofunciona', 'App\Http\Controllers\CategoriesController@comofuncionaGrIndex');

Route::get('/gobiernoregional/acerca/estrategiaregional', 'App\Http\Controllers\CategoriesController@estrategiaregGrIndex');

Route::get('/gobiernoregional/acerca/inversionpublica', 'App\Http\Controllers\CategoriesController@inversionespublicasGrIndex');

Route::get('/gobiernoregional/acerca/misiongobierno', 'App\Http\Controllers\CategoriesController@misiongobiernoGrIndex');

=======
>>>>>>> Stashed changes
Route::get('/IntroduccionRegionLagos', 'App\Http\Controllers\IntroduccionRegionLagosController@index')->name('IntroduccionRegionLagos.index');
Route::get('/IntroduccionRegionLagos/create', 'App\Http\Controllers\IntroduccionRegionLagosController@create')->name('IntroduccionRegionLagos.create');
Route::post('/IntroduccionRegionLagos/store', 'App\Http\Controllers\IntroduccionRegionLagosController@store')->name('IntroduccionRegionLagos.store');
Route::get('/IntroduccionRegionLagos/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@edit')->name('IntroduccionRegionLagos.edit');
Route::put('/IntroduccionRegionLagos/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@update')->name('IntroduccionRegionLagos.update');

Route::get('/AntecedentesRegionLagos', 'App\Http\Controllers\IntroduccionRegionLagosController@indexAntecedentes')->name('AntecedentesRegionLagos.indexAntecedentes');
Route::get('/AntecedentesRegionLagos/createAntecedentes', 'App\Http\Controllers\IntroduccionRegionLagosController@createAntecedentes')->name('AntecedentesRegionLagos.createAntecedentes');
Route::post('/AntecedentesRegionLagos/storeAntecedentes', 'App\Http\Controllers\IntroduccionRegionLagosController@storeAntecedentes')->name('AntecedentesRegionLagos.storeAntecedentes');
Route::get('/AntecedentesRegionLagos/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@editAntecedentes')->name('AntecedentesRegionLagos.editAntecedentes');
Route::put('/AntecedentesRegionLagos/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@updateAntecedentes')->name('AntecedentesRegionLagos.updateAntecedentes');
Route::get('/AntecedentesRegionLagos/show', 'App\Http\Controllers\IntroduccionRegionLagosController@showAntecedentes')->name('AntecedentesRegionLagos.showAntecedentes');
Route::delete('/AntecedentesRegionLagos/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@destroyAntecedentes')->name('AntecedentesRegionLagos.destroyAntecedentes');

Route::get('/CargoRegionLagos', 'App\Http\Controllers\IntroduccionRegionLagosController@indexCargos')->name('CargoRegionLagos.indexCargos');
Route::get('/CargoRegionLagos/createCargo', 'App\Http\Controllers\IntroduccionRegionLagosController@createCargos')->name('CargoRegionLagos.createCargo');
Route::post('/CargoRegionLagos/storeCargo', 'App\Http\Controllers\IntroduccionRegionLagosController@storeCargos')->name('CargoRegionLagos.storeCargo');
Route::get('/CargoRegionLagos/edit/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@editCargos')->name('CargoRegionLagos.editCargo');
Route::put('/CargoRegionLagos/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@updateCargos')->name('CargoRegionLagos.updateCargo');
Route::get('/CargoRegionLagos/show', 'App\Http\Controllers\IntroduccionRegionLagosController@showCargos')->name('CargoRegionLagos.showCargo');
<<<<<<< Updated upstream
Route::delete('/CargoRegionLagos/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@destroyCargos')->name('CargoRegionLagos.destroyCargo');
=======
Route::delete('/CargoRegionLagos/{id}', 'App\Http\Controllers\IntroduccionRegionLagosController@destroyCargos')->name('CargoRegionLagos.destroyCargo');
>>>>>>> Stashed changes
