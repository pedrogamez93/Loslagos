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

Route::get('/gobiernoregional/comofunciona', 'App\Http\Controllers\CategoriesController@comofuncionaGrIndex');

Route::get('/gobiernoregional/estrategiasregionales', 'App\Http\Controllers\CategoriesController@estrategiaregGrIndex');

Route::get('/gobiernoregional/inversionespublicas', 'App\Http\Controllers\CategoriesController@inversionespublicasGrIndex');

Route::get('/gobiernoregional/misiongobierno', 'App\Http\Controllers\CategoriesController@misiongobiernoGrIndex');