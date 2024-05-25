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
use App\Http\Controllers\PoliticadeturismoController;

use App\Http\Controllers\EventoController;
use App\Http\Controllers\BibliotecaController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\SeminarioController;
use App\Http\Controllers\DifusionController;
use App\Http\Controllers\PresentacionesController;
use App\Http\Controllers\ImagenRegionController;

use App\Http\Controllers\SesionController;

use App\Http\Controllers\LandingController;

use App\Http\Controllers\PopupController;

use App\Http\Controllers\HomefndrController;

use App\Http\Controllers\FondosFndrController;
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
Route::get('/home/create', [HomeController::class, 'create'])->name('Home.create')->middleware('auth');
Route::post('/home/store', [HomeController::class, 'store']);
Route::get('/home/actualizar', [HomeController::class, 'actualizar'])->name('Home.actualizar')->middleware('auth');
Route::put('/home/update', [HomeController::class, 'update']);
Route::put('/home/updateslider', [HomeController::class, 'updateslider']);
Route::get('/mostrar-imagen/{carpeta}/{imagen}', [HomeController::class, 'mostrarImagen'])->name('mostrar.imagen');
Route::get('/buscador', [HomeController::class, 'buscador'])->name('Home.buscador');
Route::get('/home/slider', [HomeController::class, 'slider'])->name('Home.slider');
Route::get('/home/banners', [HomeController::class, 'banners'])->name('Home.banners');
Route::put('/home/updatebanners', [HomeController::class, 'updatebanners'])->name('Home.updatebanners');;

/*DOCUMENTOS */

Route::get('/documentos/create', [DocumentonewController::class, 'create'])->name('documentos.create')->middleware('auth');
Route::post('/documentossubir', [DocumentonewController::class, 'store'])->name('documentos.store');

Route::get('/documentos', [DocumentonewController::class, 'index'])->name('documentos.index');
Route::match(['get', 'post'], '/documentos/buscar', [DocumentonewController::class, 'buscar'])->name('documentos.buscar');

Route::get('/documentos/{id}/edit', [DocumentonewController::class, 'edit'])->name('documentos.edit')->middleware('auth');
Route::put('/documentos/{id}', [DocumentonewController::class, 'update'])->name('documentos.update')->middleware('auth');
Route::get('/documentos/ver-documentos', [DocumentonewController::class, 'indexTabla'])->name('documentos.verdocumentos')->middleware('auth');
Route::delete('/documentos/eliminar/{id}', [DocumentonewController::class, 'destroy'])->name('documentos.destroy')->middleware('auth');
Route::get('/documentos/download/{id}', [DocumentonewController::class, 'download'])->name('documentos.download');
Route::get('/documentos/descargar/{archivo}', [DocumentonewController::class, 'descargarArchivo'])->name('descargar.archivo');

/*FUNCIONARIOS */

Route::get('/funcionario', [FuncionarioController::class, 'index']);
Route::get('/funcionarios/create', [FuncionarioController::class, 'create'])->name('funcionarios.create')->middleware('auth');
Route::post('/funcionariossubir', [FuncionarioController::class, 'store']);
Route::post('/funcionarios/buscar', [FuncionarioController::class, 'buscar']);
Route::post('/funcionarios/cargamasiva', [FuncionarioController::class, 'cargamasiva']);
Route::get('/funcionarios/cargamasiva', [FuncionarioController::class, 'getcargarMasiva'])->name('funcionarios.cargamasiva')->middleware('auth');
Route::get('/funcionario', [FuncionarioController::class, 'index']);
Route::get('/funcionarios/{id}/edit', [FuncionarioController::class, 'edit'])->name('funcionarios.edit')->middleware('auth');
Route::put('/funcionarios/{id}', [FuncionarioController::class, 'update'])->name('funcionarios.update')->middleware('auth');
Route::get('/funcionarios/ver-funcionarios', [FuncionarioController::class, 'indexTabla'])->name('funcionarios.verfuncionarios')->middleware('auth');
Route::get('/funcionarios/{id}/detalle', [FuncionarioController::class, 'show'])->name('funcionarios.show');
Route::delete('/funcionarios/eliminar/{id}', [FuncionarioController::class, 'destroy'])->name('funcionarios.destroy')->middleware('auth');
Route::get('/funcionarios/{carpeta}/{imagen}', [FuncionarioController::class, 'mostrarImagen'])->name('imagen.mostrar');
Route::get('/ubicaciones', [FuncionarioController::class, 'obtenerUbicaciones']);
Route::get('/descargar-planilla', function () {
    $pathToFile = public_path('storage/funcionarioplanilla.csv');
    return response()->download($pathToFile);
})->name('descargar.planilla');

//Sala de prensa
Route::get('/saladeprensa', [SalaprensaController::class, 'index'])->name('salaprensa.index');
Route::get('/saladeprensa/create', [SalaprensaController::class, 'create'])->name('salaprensa.create')->middleware('auth');
Route::post('/saladeprensasubir', [SalaprensaController::class, 'store'])->name('salaprensa.store')->middleware('auth');
Route::get('/saladeprensa/{id}/edit', [SalaprensaController::class, 'edit'])->name('salaprensa.edit');
Route::put('/saladeprensa/{id}', [SalaprensaController::class, 'update'])->name('salaprensa.update')->middleware('auth');
Route::get('/saladeprensa/ver-noticias', [SalaprensaController::class, 'indexTabla'])->name('salaprensa.vernoticia')->middleware('auth');
Route::delete('/saladeprensa/eliminar/{id}', [SalaprensaController::class, 'destroy'])->name('salaprensa.destroy')->middleware('auth');
//Route::get('/saladeprensa/{imagen}', [SalaprensaController::class, 'mostrarImagen'])->name('imagen.mostrar');
Route::get('/mostrar-imagen/{carpeta}/{imagen}', [SalaprensaController::class, 'mostrarImagen'])->name('mostrar.imagen');
Route::get('/saladeprensa/{id}', [SalaprensaController::class, 'show'])->name('salaprensa.show');

//Route::resource('/', HomeController::class);

//Sala de prensa
Route::get('/sitiodegobierno', [SitiosController::class, 'index']);
Route::get('/sitiodegobierno/create', [SitiosController::class, 'create'])->name('sitiodegobierno.create')->middleware('auth');
Route::post('/sitiossubir', [SitiosController::class, 'store'])->name('sitiodegobierno.store')->middleware('auth');
Route::get('/sitiodegobierno/{id}/edit', [SitiosController::class, 'edit'])->name('sitiodegobierno.edit')->middleware('auth');
Route::put('/sitiodegobierno/{id}', [SitiosController::class, 'update'])->name('sitiodegobierno.update')->middleware('auth');
Route::get('/sitiodegobierno/ver-sitios', [SitiosController::class, 'indexTabla'])->name('sitiodegobierno.vernoticia')->middleware('auth');
Route::delete('/sitiodegobierno/eliminar/{id}', [SitiosController::class, 'destroy'])->name('sitiodegobierno.destroy')->middleware('auth');
Route::get('/sitiodegobierno/{imagen}', [SitiosController::class, 'mostrarImagen'])->name('imagen.mostrar');



// Ruta para mostrar todas las sesiones (index)
//Route::get('/sesiones', [SesionController::class, 'index'])->name('sesiones.index');

// Ruta para mostrar el formulario de creación de sesiones (create)
//Route::get('/sesiones/crear', [SesionController::class, 'create'])->name('sesiones.create');

// Ruta para almacenar una nueva sesión (store)
//Route::post('/sesiones', [SesionController::class, 'store'])->name('sesiones.store');

// Ruta para mostrar el formulario de edición
//Route::get('/sesiones/{sesion}/editar', [SesionController::class, 'edit'])->name('sesiones.edit');

// Ruta para actualizar los datos de la sesión
//Route::put('/sesiones/{sesion}', [SesionController::class, 'update'])->name('sesiones.update');

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
Route::resource('disenopoliticoregionales', DisenoPoliticoRegionalesController::class)->middleware('auth');
Route::delete('/eliminar-diseno/{id}', [DisenoPoliticoRegionalesController::class, 'eliminarDisenoCompleto'])->name('eliminar_diseno_completo')->middleware('auth');
Route::delete('/eliminar/formulario/{id}', [DisenoPoliticoRegionalesController::class, 'eliminarFormulario'])->name('eliminar.formulario')->middleware('auth');
Route::delete('/eliminar/encuesta/{id}', [DisenoPoliticoRegionalesController::class, 'eliminarEncuesta'])->name('eliminar.encuesta')->middleware('auth');
Route::put('/disenopoliticoregionales/{id}', [DisenoPoliticoRegionalesController::class, 'update'])->name('disenopoliticoregionales.update')->middleware('auth');
Route::get('/disenopoliticoregionales/{id}/edit', [DisenoPoliticoRegionalesController::class, 'edit'])->name('disenopoliticoregionales.edit')->middleware('auth');
//Route::match(['put', 'patch'], '/disenopoliticoregionales/{disenopoliticoregionales}', 'App\Http\Controllers\DisenoPoliticoRegionalesController@update')->name('disenopoliticoregionales.update');

// Rutas para los tr�mites
Route::resource('tramites', TramitesDigitalesController::class);
Route::get('/iconos/{icono}', [TramitesDigitalesController::class, 'mostrarImagen'])->name('icono.mostrar');

//Route::get('/tramites/{id}', 'TramitesDigitalesController@show')->name('tramites.show');
Route::get('/tramites/{id}', [TramitesDigitalesController::class, 'show'])->name('tramites.show');

//Route::put('/tramites/{tramite}/edit', [TramitesDigitalesController::class, 'edit'])->name('tramites.update');

Route::put('/tramites/{tramite}', [TramitesDigitalesController::class, 'update'])->name('tramites.update');

Route::delete('/tramites/{id}', [TramitesDigitalesController::class, 'destroy'])->name('tramites.destroy');
Route::delete('/tramites/docs/{docId}', [TramitesDigitalesController::class, 'destroyDoc'])->name('tramites.destroyDoc');
Route::delete('/tramites/btns/{btnId}', [TramitesDigitalesController::class, 'destroyBtn'])->name('tramites.destroyBtn');
Route::get('/tramites/documentos/download/{id}', 'App\Http\Controllers\TramitesDigitalesController@downloadTramitesDigitalesDocs')->name('downloadTramitesDigitalesDocs');
//RUTAS PARA LOS EVENTOS DE LA AGENDA

Route::resource('eventos', EventoController::class);

Route::delete('/eventos/{evento}', [EventoController::class, 'destroy'])->name('eventos.destroy');

Route::get('/eventos/{evento}', [EventoController::class, 'show'])->name('eventos.show');

Route::get('/eventos/{evento}/edit', [EventoController::class, 'edit'])->name('eventos.edit');

Route::get('/eventos/imagen/{imagen}', [EventoController::class, 'mostrarImagene'])->name('eventos.mostrar.imagene');

Route::get('/politica-turismo/agenda', [CategoriesController::class, 'agendaindex'])->name('agenda.index');
//Route::get('/eventos/imagen/{imagen}', [EventoController::class, 'mostrarImagene'])->name('eventos.mostrar.imagene');

//RUTAS PARA LA BIBLIOTECA

Route::resource('biblioteca', BibliotecaController::class);

Route::get('/politica-turismo/biblioteca', 'App\Http\Controllers\CategoriesController@bibliotecaIndex');

//RUTAS PARA GALERIA

Route::resource('galerias', GaleriaController::class);

Route::delete('galerias-back/{galeria}', [GaleriaController::class, 'galeriadestroy'])->name('galerias-back.destroy');
Route::delete('imagenes/{imagen}', [GaleriaController::class, 'destroyImagen'])->name('imagenes.destroy');
Route::get('/galerias/{id}/edit', [GaleriaController::class, 'edit'])->name('galerias.edit');

Route::get('/politica-turismo/galerias', 'App\Http\Controllers\CategoriesController@galeriaIndex');

Route::get('/galerias/{imagen}', [GaleriaController::class, 'mostrargaleriaImagen'])->name('imagen.mostrar');

//RUTAS PARA SEMINARIO

Route::resource('seminarios', SeminarioController::class);

Route::get('/seminarios/edit/{id}', [SeminarioController::class, 'edit'])->name('seminarios.edit');

Route::delete('/documentos/{id}', [SeminarioController::class, 'destroyDocumento'])->name('documentos.destroy');

Route::delete('/galerias/{galeria}', [SeminarioController::class, 'eliminarGaleria'])->name('galerias.eliminar');

Route::get('/galerias/{id}', [SeminarioController::class, 'show'])->name('galerias.show');

Route::get('/seminario-internacional', [CategoriesController::class, 'seminarioIndex'])->name('seminario.internacional');

//RUTAS PARA DIFUSION

Route::resource('difusion', DifusionController::class);

Route::delete('/difusion-docs/{id}', [DifusionController::class, 'destroyDocs'])->name('difusion-docs.destroy');

Route::get('/politica-turismo/difusion', 'App\Http\Controllers\CategoriesController@difusionindex');

//RUTAS PARA PRESENTACIONES

Route::resource('presentaciones', PresentacionesController::class);

Route::get('/politica-turismo/presentaciones', 'App\Http\Controllers\CategoriesController@presentacionIndex');

//RUTAS PARA IMAGENREGION

Route::resource('imagenregion', ImagenRegionController::class);

Route::delete('/imagenregion-docs/{id}', [ImagenRegionController::class, 'destroyDocs'])->name('imagenregion-docs.destroy');

Route::get('/politica-turismo/imagenregion', 'App\Http\Controllers\CategoriesController@imagenregionindex');

//RUTAS PARA LAS LANDING DINAMICAS

Route::resource('landings', LandingController::class);

// En routes/web.php
Route::get('/search-landings', [LandingController::class, 'search'])->name('landings.search');

// Ruta para eliminar una imagen
Route::delete('/landing-image/{id}', [LandingController::class, 'deleteImage'])->name('landing-image.destroy');

// Ruta para eliminar un botón externo
Route::delete('/landing-button/{id}', [LandingController::class, 'deleteButton'])->name('landing-button.destroy');

// Ruta para eliminar un documento
Route::delete('/landing-document/{id}', [LandingController::class, 'deleteDocument'])->name('landing-document.destroy');

//FIN RUTAS PARA LAS LANDING DINAMICAS

//RUTAS PARA LOS FONDOSFNDR

Route::resource('fondosfndr', FondosFndrController::class);
Route::get('/fondosfndr/{id}', [FondosFndrController::class, 'show'])->name('fondosfndr.show');
Route::get('/fondosfndr', [FondosFndrController::class, 'index'])->name('fondosfndr.index');


Route::put('/fondosfndr/{fondo}', [FondosFndrController::class, 'update'])->name('fondos.update');

Route::delete('/documentos/{documento}', 'FondosFndrController@destroyDocumento')->name('documentos.destroy');




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
// Route::get('/gobiernoregional/leygobiernoregional/downloadLey/{id}', 'App\Http\Controllers\CategoriesController@downloadLey')->name('ley.download');
Route::get('/gobiernoregional/leygobiernoregional/download/{id}', 'App\Http\Controllers\CategoriesController@downloadLey')->name('ley.download');
//Route::get('/gobiernoregional/leygobiernoregional/descargar/{archivo}', 'App\Http\Controllers\CategoriesController@descargarArchivo')->name('ley.archivo');

Route::get('/gobiernoregional/organigrama', 'App\Http\Controllers\CategoriesController@organigramaIndex');

Route::get('/gobiernoregional/dptogestionpersonas', 'App\Http\Controllers\CategoriesController@dptogestionpersonasIndex');
Route::get('/gobiernoregional/dptogestionpersonas/download/{id}', 'App\Http\Controllers\CategoriesController@downloaddptogestionpersonas')->name('dptogestionpersonas.download');

Route::get('/gobiernoregional/tramitesdigitales', 'App\Http\Controllers\CategoriesController@tramitesdigitalesIndex');

Route::get('/gobiernoregional/asambleaclimatica', 'App\Http\Controllers\CategoriesController@asambleaclimaticaIndex');
Route::get('/gobiernoregional/asambleaclimatica/download/{id}', 'App\Http\Controllers\CategoriesController@downloadAsamblea')->name('downloadAsamblea');


Route::get('/gobiernoregional/asambleaclimatica/audienciadepartes', 'App\Http\Controllers\CategoriesController@audienciadepartesIndex');

Route::get('/gobiernoregional/politicasostenibilidadhidrica', 'App\Http\Controllers\CategoriesController@politicasostenibilidadhidricaIndex');

Route::get('/gobiernoregional/disenopoliticapersonasmayores', 'App\Http\Controllers\CategoriesController@politicapersonasmayoresIndex');
Route::get('/gobiernoregional/disenopoliticapersonasmayores/documentos/download/{id}', 'App\Http\Controllers\CategoriesController@downloadPoliticaPersonasMayoresDocs')->name('downloadPoliticaPersonasMayoresDocs');

Route::get('/gobiernoregional/planificacioninstitucional', 'App\Http\Controllers\CategoriesController@planificacioninstitucionalIndex');
Route::get('/gobiernoregional/planificacioninstitucional/documentos/download/{id}', 'App\Http\Controllers\CategoriesController@downloadPlanificacionInstitucionalDocs')->name('downloadPlanificacionInstitucionalDocs');

Route::get('/gobiernoregional/comitecienciastecnologias', 'App\Http\Controllers\CategoriesController@comitecienciastecnologiasIndex');
Route::get('/gobiernoregional/comitecienciastecnologias/documentos/download/{id}', 'App\Http\Controllers\CategoriesController@downloadcomitecienciastecnologias')->name('downloadcomitecienciastecnologias');

Route::get('/gobiernoregional/concursopublico', 'App\Http\Controllers\CategoriesController@concursopublicoIndex');
Route::get('/gobiernoregional/concursopublico/documentos/download/{id}', 'App\Http\Controllers\CategoriesController@downloadconcursopublico')->name('downloadconcursopublico');

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
Route::get('/consejoregional/download/{id}', 'App\Http\Controllers\ConsejoRegionalDocsViewsController@download')->name('actas.download');

Route::get('/consejoregional/certificadosdeacuerdos', 'App\Http\Controllers\ConsejoRegionalDocsViewsController@Indexcertificadosdeacuerdos')->name('certificadosdeacuerdos.Indexcertificadosdeacuerdos');

Route::get('/consejoregional/resumendegastos', 'App\Http\Controllers\ConsejoRegionalDocsViewsController@Indexresumendegastos')->name('resumendegastos.Indexresumendegastos');

Route::get('/consejoregional/tablassesionesconsejo', 'App\Http\Controllers\ConsejoRegionalDocsViewsController@Indextablassesionesconsejo')->name('tablassesionesconsejo.Indextablassesionesconsejo');
/*FIN DOCUMENTOS EN CONSEJO REGIONAL VISTAS*/

/*TABLAS SESIONES DEL CONSEJO*/
Route::resource('sesiones-consejo', SesionController::class)->names([
    'index'   => 'sesionesConsejo.index',
    'create'  => 'sesionesConsejo.create',
    'store'   => 'sesionesConsejo.store',
    'show'    => 'sesionesConsejo.show',
    'edit'    => 'sesionesConsejo.edit',
    'update'  => 'sesionesConsejo.update',
    'destroy' => 'sesionesConsejo.destroy',
]);

Route::get('/sesiones/{anio}', 'App\Http\Controllers\ConsejoRegionalDocsViewsController@showFiltroAno')->name('sesiones_por_anio');
/*FIN TABLAS SESIONES DEL CONSEJO*/

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
Route::get('/AutoridadesRegionLagos/buscar', 'App\Http\Controllers\IntroduccionRegionLagosController@buscarAutoridades')->name('buscarAutoridades.show');

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

//RUTAS POLITICAS DE TURISMO BACK
Route::get('/programas/Politicadeturismo', 'App\Http\Controllers\PoliticadeturismoController@indexPoliticadeturismo')->name('Politicadeturismo.index')->middleware('auth');
Route::post('/Politicadeturismo/store', 'App\Http\Controllers\PoliticadeturismoController@storePoliticadeturismo')->name('Politicadeturismo.store')->middleware('auth');

Route::get('/programas/Politicadeturismo/create', 'App\Http\Controllers\PoliticadeturismoController@createPoliticadeturismo')->name('Politicadeturismo.create')->middleware('auth');
Route::get('/programas/Politicadeturismo/edit/{id}', 'App\Http\Controllers\PoliticadeturismoController@editPoliticadeturismo')->name('Politicadeturismo.edit')->middleware('auth');
Route::put('/programas/Politicadeturismo/{id}', 'App\Http\Controllers\PoliticadeturismoController@updatePoliticadeturismo')->name('Politicadeturismo.update')->middleware('auth');
//RUTAS POLITICAS DE TURISMO FRONTEND
Route::get('/formulacionpoliticadeturismo', 'App\Http\Controllers\PoliticadeturismoController@indexPoliticadeturismoWeb')->name('PoliticadeturismoWeb.show');
//RUTAS Productos de la Política de Turismo

Route::get('/programas/ProductosdelaPoliticadeTurismo', 'App\Http\Controllers\PoliticadeturismoController@indexProductosdelaPoliticadeTurismo')->name('ProductosdelaPoliticadeTurismo.index')->middleware('auth');
Route::post('/programas/ProductosdelaPoliticadeTurismo/store', 'App\Http\Controllers\PoliticadeturismoController@storeProductosdelaPoliticadeTurismo')->name('ProductosdelaPoliticadeTurismo.store')->middleware('auth');
Route::get('/programas/ProductosdelaPoliticadeTurismo/create', 'App\Http\Controllers\PoliticadeturismoController@createProductosdelaPoliticadeTurismo')->name('ProductosdelaPoliticadeTurismo.create')->middleware('auth');
Route::get('/programas/ProductosdelaPoliticadeTurismo/edit/{id}', 'App\Http\Controllers\PoliticadeturismoController@editProductosdelaPoliticadeTurismo')->name('ProductosdelaPoliticadeTurismo.edit')->middleware('auth');
Route::put('/programas/ProductosdelaPoliticadeTurismo/{id}', 'App\Http\Controllers\PoliticadeturismoController@updateProductosdelaPoliticadeTurismo')->name('ProductosdelaPoliticadeTurismo.update')->middleware('auth');

//RUTAS Lanzamiento Política

Route::get('/productosdelapoliticadeturismo', 'App\Http\Controllers\PoliticadeturismoController@indexProductosdelaPoliticadeTurismoWeb')->name('ProductosdelaPoliticadeTurismoWeb.show');

Route::get('/programas/LanzamientoPolitica', 'App\Http\Controllers\PoliticadeturismoController@indexLanzamientoPolitica')->name('LanzamientoPolitica.index')->middleware('auth');
Route::post('/programas/LanzamientoPolitica/store', 'App\Http\Controllers\PoliticadeturismoController@storeLanzamientoPolitica')->name('LanzamientoPolitica.store')->middleware('auth');
Route::get('/programas/LanzamientoPolitica/create', 'App\Http\Controllers\PoliticadeturismoController@createLanzamientoPolitica')->name('LanzamientoPolitica.create')->middleware('auth');
Route::get('/programas/LanzamientoPolitica/edit/{id}', 'App\Http\Controllers\PoliticadeturismoController@editLanzamientoPolitica')->name('LanzamientoPolitica.edit')->middleware('auth');
Route::put('/programas/LanzamientoPolitica/{id}', 'App\Http\Controllers\PoliticadeturismoController@updateLanzamientoPolitica')->name('LanzamientoPolitica.update')->middleware('auth');

//RUTAS Lanzamiento Política FRONTEND
Route::get('/LanzamientoPolitica', 'App\Http\Controllers\PoliticadeturismoController@indexLanzamientoPoliticaWeb')->name('LanzamientoPoliticaWeb.show');

Route::get('/programas/PoliticaRegionalTurismo', 'App\Http\Controllers\PoliticadeturismoController@indexPoliticaRegionalTurismo')->name('PoliticaRegionalTurismo.index')->middleware('auth');
Route::post('/programas/PoliticaRegionalTurismo/store', 'App\Http\Controllers\PoliticadeturismoController@storePoliticaRegionalTurismo')->name('PoliticaRegionalTurismo.store')->middleware('auth');
Route::get('/programas/PoliticaRegionalTurismo/create', 'App\Http\Controllers\PoliticadeturismoController@createPoliticaRegionalTurismo')->name('PoliticaRegionalTurismo.create')->middleware('auth');
Route::get('/programas/PoliticaRegionalTurismo/edit/{id}', 'App\Http\Controllers\PoliticadeturismoController@editPoliticaRegionalTurismo')->name('PoliticaRegionalTurismo.edit')->middleware('auth');
Route::put('/programas/PoliticaRegionalTurismo/{id}', 'App\Http\Controllers\PoliticadeturismoController@updatePoliticaRegionalTurismo')->name('PoliticaRegionalTurismo.update')->middleware('auth');

//RUTAS Lanzamiento Política FRONTEND
Route::get('/PoliticaRegionalTurismo', 'App\Http\Controllers\PoliticadeturismoController@indexPoliticaRegionalTurismoWeb')->name('PoliticaRegionalTurismoWeb.show');

Route::get('/programas/TrabajoParticipativoMetodologia', 'App\Http\Controllers\PoliticadeturismoController@indexTrabajoParticipativoMetodologia')->name('TrabajoParticipativoMetodologia.index')->middleware('auth');
Route::post('/programas/TrabajoParticipativoMetodologia/store', 'App\Http\Controllers\PoliticadeturismoController@storeTrabajoParticipativoMetodologia')->name('TrabajoParticipativoMetodologia.store')->middleware('auth');
Route::get('/programas/TrabajoParticipativoMetodologia/create', 'App\Http\Controllers\PoliticadeturismoController@createTrabajoParticipativoMetodologia')->name('TrabajoParticipativoMetodologia.create')->middleware('auth');
Route::get('/programas/TrabajoParticipativoMetodologia/edit/{id}', 'App\Http\Controllers\PoliticadeturismoController@editTrabajoParticipativoMetodologia')->name('TrabajoParticipativoMetodologia.edit')->middleware('auth');
Route::put('/programas/TrabajoParticipativoMetodologia/{id}', 'App\Http\Controllers\PoliticadeturismoController@updateTrabajoParticipativoMetodologia')->name('TrabajoParticipativoMetodologia.update')->middleware('auth');

//RUTAS Lanzamiento Política FRONTEND
Route::get('/TrabajoParticipativoMetodologia', 'App\Http\Controllers\PoliticadeturismoController@indexTrabajoParticipativoMetodologiaWeb')->name('TrabajoParticipativoMetodologiaWeb.show');

Route::get('/programas/TrabajoParticipativoTalleresProvinciales', 'App\Http\Controllers\PoliticadeturismoController@indexTrabajoParticipativoTalleresProvinciales')->name('TrabajoParticipativoTalleresProvinciales.index')->middleware('auth');
Route::post('/programas/TrabajoParticipativoTalleresProvinciales/store', 'App\Http\Controllers\PoliticadeturismoController@storeTrabajoParticipativoTalleresProvinciales')->name('TrabajoParticipativoTalleresProvinciales.store')->middleware('auth');
Route::get('/programas/TrabajoParticipativoTalleresProvinciales/create', 'App\Http\Controllers\PoliticadeturismoController@createTrabajoParticipativoTalleresProvinciales')->name('TrabajoParticipativoTalleresProvinciales.create')->middleware('auth');
Route::get('/programas/TrabajoParticipativoTalleresProvinciales/edit/{id}', 'App\Http\Controllers\PoliticadeturismoController@editTrabajoParticipativoTalleresProvinciales')->name('TrabajoParticipativoTalleresProvinciales.edit')->middleware('auth');
Route::put('/programas/TrabajoParticipativoTalleresProvinciales/{id}', 'App\Http\Controllers\PoliticadeturismoController@updateTrabajoParticipativoTalleresProvinciales')->name('TrabajoParticipativoTalleresProvinciales.update')->middleware('auth');

//RUTAS Lanzamiento Política FRONTEND
Route::get('/TrabajoParticipativoTalleresProvinciales', 'App\Http\Controllers\PoliticadeturismoController@indexTrabajoParticipativoTalleresProvincialesWeb')->name('TrabajoParticipativoTalleresProvincialesWeb.show');

Route::get('/programas/MesaPublicoPrivada', 'App\Http\Controllers\PoliticadeturismoController@indexMesaPublicoPrivada')->name('MesaPublicoPrivada.index')->middleware('auth');
Route::post('/programas/MesaPublicoPrivada/store', 'App\Http\Controllers\PoliticadeturismoController@storeMesaPublicoPrivada')->name('MesaPublicoPrivada.store')->middleware('auth');
Route::get('/programas/MesaPublicoPrivada/create', 'App\Http\Controllers\PoliticadeturismoController@createMesaPublicoPrivada')->name('MesaPublicoPrivada.create')->middleware('auth');
Route::get('/programas/MesaPublicoPrivada/edit/{id}', 'App\Http\Controllers\PoliticadeturismoController@editMesaPublicoPrivada')->name('MesaPublicoPrivada.edit')->middleware('auth');
Route::put('/programas/MesaPublicoPrivada/{id}', 'App\Http\Controllers\PoliticadeturismoController@updateMesaPublicoPrivada')->name('MesaPublicoPrivada.update')->middleware('auth');

//RUTAS Lanzamiento Política FRONTEND
Route::get('/MesaPublicoPrivada', 'App\Http\Controllers\PoliticadeturismoController@indexMesaPublicoPrivadaWeb')->name('MesaPublicoPrivadaWeb.show');

Route::get('/programas/ComiteTecnicodeGestion', 'App\Http\Controllers\PoliticadeturismoController@indexComiteTecnicodeGestion')->name('ComiteTecnicodeGestion.index')->middleware('auth');
Route::post('/programas/ComiteTecnicodeGestion/store', 'App\Http\Controllers\PoliticadeturismoController@storeComiteTecnicodeGestion')->name('ComiteTecnicodeGestion.store')->middleware('auth');
Route::get('/programas/ComiteTecnicodeGestion/create', 'App\Http\Controllers\PoliticadeturismoController@createComiteTecnicodeGestion')->name('ComiteTecnicodeGestion.create')->middleware('auth');
Route::get('/programas/ComiteTecnicodeGestion/edit/{id}', 'App\Http\Controllers\PoliticadeturismoController@editComiteTecnicodeGestion')->name('ComiteTecnicodeGestion.edit')->middleware('auth');
Route::put('/programas/ComiteTecnicodeGestion/{id}', 'App\Http\Controllers\PoliticadeturismoController@updateComiteTecnicodeGestion')->name('ComiteTecnicodeGestion.update')->middleware('auth');

//RUTAS Lanzamiento Política FRONTEND
Route::get('/ComiteTecnicodeGestion', 'App\Http\Controllers\PoliticadeturismoController@indexComiteTecnicodeGestionWeb')->name('ComiteTecnicodeGestion.show');

Route::get('/programas/Subcomisiones', 'App\Http\Controllers\PoliticadeturismoController@indexSubcomisiones')->name('Subcomisiones.index')->middleware('auth');
Route::post('/programas/Subcomisiones/store', 'App\Http\Controllers\PoliticadeturismoController@storeSubcomisiones')->name('Subcomisiones.store')->middleware('auth');
Route::get('/programas/Subcomisiones/create', 'App\Http\Controllers\PoliticadeturismoController@createSubcomisiones')->name('Subcomisiones.create')->middleware('auth');
Route::get('/programas/Subcomisiones/edit/{id}', 'App\Http\Controllers\PoliticadeturismoController@editSubcomisiones')->name('Subcomisiones.edit')->middleware('auth');
Route::put('/programas/Subcomisiones/{id}', 'App\Http\Controllers\PoliticadeturismoController@updateSubcomisiones')->name('Subcomisiones.update')->middleware('auth');

//RUTAS Lanzamiento Política FRONTEND
Route::get('/Subcomisiones', 'App\Http\Controllers\PoliticadeturismoController@indexSubcomisionesWeb')->name('Subcomisiones.show');


//PROGRAMAS 
Route::resource('programas', ProgramasController::class);

Route::put('/programas/{programa}', [ProgramasController::class, 'update'])->name('programas.update');


Route::get('/todoslosprogramas', 'App\Http\Controllers\TodosLosProgramasController@todoslosprogramasIndex');

//Route::get('/todos-los-programas', 'TuControlador@mostrarTodosLosProgramas');

// Rutas para eliminar botones, descripciones, documentos y fotografías
Route::delete('/programa/boton/{id}', [ProgramasController::class, 'destroyBoton'])->name('programa.boton.destroy');
Route::delete('/programa/descripcion/{id}', [ProgramasController::class, 'destroyDescripcion'])->name('programa.descripcion.destroy');
Route::delete('/programa/documento/{id}', [ProgramasController::class, 'destroyDocumento'])->name('programa.documento.destroy');
Route::delete('/programa/fotografia/{id}', [ProgramasController::class, 'destroyFotografia'])->name('programa.fotografia.destroy');

Route::post('/programas/{programa}/agregar-descripcion', [ProgramasController::class, 'agregarDescripcion'])->name('programas.agregar-descripcion');

Route::post('/programas/{programa}/agregar-documento', [ProgramasController::class, 'agregarDocumento'])->name('programas.agregar-documento');
Route::post('/programas/{programa}/agregar-fotografia', [ProgramasController::class, 'agregarFotografia'])->name('programas.agregar-fotografia');
Route::post('/programas/{programa}/agregar-boton', [ProgramasController::class, 'agregarBoton'])->name('programas.agregar-boton');



//Route::get('/programas/{programa}', 'TodosLosProgramasController@show')->name('programas.show');
Route::get('/programas/{id}', [ProgramasController::class, 'show'])->name('programas.show');

Route::get('/imagenes_programas/{imagen}', [ProgramasController::class, 'mostrarImagen'])->name('imagen.mostrar');
Route::get('/directorio_destino/{nombreArchivo}', [ProgramasController::class, 'mostrarFotografia'])->name('nombreArchivo.mostrar');

//PREGUNTAS FRECUENTES
Route::resource('preguntas-frecuentes', PreguntasFrecuentesController::class);
//Route::get('/preguntas-frecuentes/{id}', [PreguntasFrecuentes::class, 'show'])->name('preguntas-frecuentes.show');
//Route::resource('preguntas', PreguntaController::class);

Route::get('/preguntas', [PreguntaController::class, 'index'])->middleware('auth')->middleware('auth');
Route::resource('preguntas', PreguntaController::class)->middleware('auth');

Route::get('/preguntas/{pregunta}/edit', [PreguntaController::class, 'edit'])->name('preguntas.edit')->middleware('auth');

Route::get('/preguntasfrecuentes', 'App\Http\Controllers\PreguntasFrecuentesController@preguntasfrecuentesIndex');


    //FORMULARIO DE CONTACTO
Route::get('/contactanos', 'App\Http\Controllers\FormController@index')->name('contactanos.index');
    //PROCESAR FORMULARIO Y ENVIAR CORREO ELECTRONICO
Route::post('/contactanos/store', 'App\Http\Controllers\FormController@store')->name('contactanos.store');
    //FORMULARIOS ENVIADOS BACKEND
Route::get('/verformularios', [FormController::class, 'verFormularios'])->name('verformularios')->middleware('auth');

Route::get('/verformularios', [FormController::class, 'verFormularios'])->name('verformularios')->middleware('auth');
Route::get('/detalle/formulario/{id}', [FormController::class, 'detalleFormulario'])->name('detalle.formulario');
Route::delete('/borrar/formulario/{id}', [FormController::class, 'borrarFormulario'])->name('borrar.formulario');
    //DESCARGAR FORMULARIOS CSV
Route::get('/descargar-csv', [FormController::class, 'descargarCSV'])->name('descargar.csv');

Route::resource('/popups', PopupController::class);

Route::get('/popups', 'App\Http\Controllers\PopupController@index')->name('popups.index')->middleware('auth');
Route::get('/popups/create', 'App\Http\Controllers\PopupController@create')->name('popups.create')->middleware('auth');
Route::post('/popups/store', 'App\Http\Controllers\PopupController@store')->name('popups.store')->middleware('auth');
Route::get('/popups/edit/{id}', 'App\Http\Controllers\PopupController@edit')->name('popups.edit')->middleware('auth');
Route::put('/popups/{id}', 'App\Http\Controllers\PopupController@update')->name('popups.update')->middleware('auth');



Route::resource('homefndr', HomefndrController::class)->middleware('auth');


// Ruta para mostrar el formulario de edición
Route::get('/homefndr/{id}/edit', [App\Http\Controllers\HomefndrController::class, 'edit'])->name('homefndr.edit')->middleware('auth');

// Ruta para procesar el formulario de edición y actualizar el registro
Route::put('/homefndr/{id}', [App\Http\Controllers\HomefndrController::class, 'update'])->name('homefndr.update')->middleware('auth');

Route::get('/homefndrs', [HomefndrController::class, 'homefndrsindex'])->name('homefndrs.index');
Route::delete('/documentos/{id}', [FondosFndrController::class, 'destroyDoc'])->name('documentos.destroy');
//Route::post('/programas/{programa}/agregar-documento', [ProgramasController::class, 'agregarDocumento'])->name('programas.agregar-documento');
Route::post('/fondos/{fondo}/agregar-documento', [FondosFndrController::class, 'agregarDocumento'])->name('fondos.agregar-documento');





