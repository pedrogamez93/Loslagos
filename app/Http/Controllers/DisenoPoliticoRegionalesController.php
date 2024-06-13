<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\DisenoPoliticoRegionales;
use App\Models\DisenoPoliticoRegionalesBtnforms;
use App\Models\DisenoPoliticoRegionalesBtnEncuestas;

use Illuminate\Http\Request;

class DisenoPoliticoRegionalesController extends Controller
{
    public function index() {
        // Obtén el último registro de DisenoPoliticoRegionales
        $ultimoRegistro = DisenoPoliticoRegionales::latest()->first();
    
        // Si no hay registros, redirige al formulario de creación
        if (!$ultimoRegistro) {
            return redirect()->route('disenopoliticoregionales.create'); // Asegúrate de cambiar 'ruta_crear_diseno' por la ruta real de tu formulario de creación
        }
    
        // Obtén los formularios y encuestas relacionados si existe un registro
        $formularios = $ultimoRegistro->btnForms;
        $encuestas = $ultimoRegistro->btnEncuestas;
    
        return view('disenopoliticoregionales.index', compact('ultimoRegistro', 'formularios', 'encuestas'));
    }

    public function create(){
        return view('disenopoliticoregionales.create');
    }

    public function store(Request $request){
        $request->validate([
            'titulo' => 'required|string|max:255',
            'bajada' => 'nullable|string',
            'titulo_seccion_form' => 'nullable|string',
            'titulo_seccion_encue' => 'nullable|string',
            'bajada_seccion_encue' => 'nullable|string',
            'nombre_form.*' => 'nullable||string|max:255',
            'url_form.*' => 'nullable||url',
            'nombre_encuesta.*' => 'nullable||string|max:255',
            'nombre_btn_encuesta.*' => 'nullable||string|max:255',
            'url_btn_encuesta.*' => 'nullable||url',
        ]);
    
        // Crear el diseño político regional
        $nuevoDiseño = DisenoPoliticoRegionales::create([
            'titulo' => $request->input('titulo'),
            'bajada' => $request->input('bajada'),
            'titulo_seccion_form' => $request->input('titulo_seccion_form'),
            'titulo_seccion_encue' => $request->input('titulo_seccion_encue'),
            'bajada_seccion_encue' => $request->input('bajada_seccion_encue'),
        ]);
    
        // Crear formularios asociados
        $nombreBtnForms = $request->input('nombre_btn_form');
        $urlBtnForms = $request->input('url_btn_form');
        
        if (!is_null($nombreBtnForms) && is_iterable($nombreBtnForms)) {
            foreach ($nombreBtnForms as $index => $nombreBtnForm) {
                if (array_key_exists($index, $urlBtnForms)) {
                    DisenoPoliticoRegionalesBtnforms::create([
                        'nombre_btn_form' => $nombreBtnForm,
                        'url_btn_form' => $urlBtnForms[$index],
                        'diseno_politico_regionales_id' => $nuevoDiseño->id,
                    ]);
                }
            }
        }
    
        // Crear encuestas asociadas
        $nombreEncuestas = $request->input('nombre_encuesta');
        $nombreBtnEncuestas = $request->input('nombre_btn_encuesta');
        $urlBtnEncuestas = $request->input('url_btn_encuesta');
    
        if (!is_null($nombreEncuestas) && is_iterable($nombreEncuestas)) {
            foreach ($nombreEncuestas as $index => $nombreEncue) {
                if (array_key_exists($index, $nombreBtnEncuestas) && array_key_exists($index, $urlBtnEncuestas)) {
                    DisenoPoliticoRegionalesBtnEncuestas::create([
                        'nombre_encuesta' => $nombreEncue, // Aquí corregí el nombre de la variable
                        'nombre_btn_encuesta' => $nombreBtnEncuestas[$index],
                        'url_btn_encuesta' => $urlBtnEncuestas[$index],
                        'diseno_politico_regionales_id' => $nuevoDiseño->id,
                    ]);
                }
            }
        }
    
        return redirect()->route('disenopoliticoregionales.index');
    }

    public function edit($id)
    {
        // Obtén el registro de DiseñoPolíticaRegionales con el ID proporcionado
        $ultimoRegistro = DisenoPoliticoRegionales::findOrFail($id);
    
        // Verifica si el registro existe
        if ($ultimoRegistro) {
            // Obtén los formularios relacionados
            $formularios = $ultimoRegistro->btnForms;
    
            // Obtén las encuestas relacionadas
            $encuestas = $ultimoRegistro->btnEncuestas;
    
            // Retorna la vista con el registro y su ID
            return view('disenopoliticoregionales.edit', compact('ultimoRegistro', 'formularios', 'encuestas', 'id'));
        } else {
            // No hay registro con el ID proporcionado, puedes manejar esto según tus necesidades
            return view('disenopoliticoregionales.edit')->with('message', 'No se encontró el registro con el ID proporcionado.');
        }
    }

    public function update(Request $request, $id) {
        $request->validate([
            'titulo' => 'string|max:255',
            'bajada' => 'nullable|string',
            'titulo_seccion_form' => 'nullable|string',
            'titulo_seccion_encue' => 'nullable|string',
            'bajada_seccion_encue' => 'nullable|string',
            'nombre_btn_form.*' => 'string|max:255',
            'url_btn_form.*' => 'nullable|url',
            'nombre_encuesta.*' => 'nullable|string|max:255',
            'nombre_btn_encuesta.*' => 'nullable|string|max:255',
            'url_btn_encuesta.*' => 'nullable|url',
        ]);
    
            // Obtén el registro que se va a actualizar
            $ultimoRegistro = DisenoPoliticoRegionales::findOrFail($id);

            // Actualiza solo si se reciben datos para cada campo
            if ($request->has('titulo')) {
                $ultimoRegistro->titulo = $request->input('titulo');
            }
            if ($request->has('bajada')) {
                $ultimoRegistro->bajada = $request->input('bajada');
            }
            if ($request->has('titulo_seccion_form')) {
                $ultimoRegistro->titulo_seccion_form = $request->input('titulo_seccion_form');
            }
            if ($request->has('titulo_seccion_encue')) {
                $ultimoRegistro->titulo_seccion_encue = $request->input('titulo_seccion_encue');
            }
            if ($request->has('bajada_seccion_encue')) {
                $ultimoRegistro->bajada_seccion_encue = $request->input('bajada_seccion_encue');
            }

            // Guarda los cambios en el registro
            $ultimoRegistro->save();

    
        // Crear formularios asociados actualizados
        $nombreBtnForms = $request->input('nombre_btn_form');
        $urlBtnForms = $request->input('url_btn_form');

        if (!is_null($nombreBtnForms) && is_iterable($nombreBtnForms)) {
            foreach ($nombreBtnForms as $index => $nombreBtnForm) {
                if (array_key_exists($index, $urlBtnForms) && !empty($nombreBtnForm) && !empty($urlBtnForms[$index])) {
                    DisenoPoliticoRegionalesBtnforms::create([
                        'nombre_btn_form' => $nombreBtnForm,
                        'url_btn_form' => $urlBtnForms[$index],
                        'diseno_politico_regionales_id' => $ultimoRegistro->id,
                    ]);
                }
            }
        }

        // Crear encuestas asociadas actualizadas
        $nombreEncuestas = $request->input('nombre_encuesta');
        $nombreBtnEncuestas = $request->input('nombre_btn_encuesta');
        $urlBtnEncuestas = $request->input('url_btn_encuesta');

        if (!is_null($nombreEncuestas) && is_iterable($nombreEncuestas)) {
            foreach ($nombreEncuestas as $index => $nombreEncue) {
                if (array_key_exists($index, $nombreBtnEncuestas) && array_key_exists($index, $urlBtnEncuestas)
                    && !empty($nombreEncue) && !empty($nombreBtnEncuestas[$index]) && !empty($urlBtnEncuestas[$index])) {
                    DisenoPoliticoRegionalesBtnEncuestas::create([
                        'nombre_encuesta' => $nombreEncue,
                        'nombre_btn_encuesta' => $nombreBtnEncuestas[$index],
                        'url_btn_encuesta' => $urlBtnEncuestas[$index],
                        'diseno_politico_regionales_id' => $ultimoRegistro->id,
                    ]);
                }
            }
        }
    
        return redirect()->route('disenopoliticoregionales.index');
    }
    
    public function eliminarEncuesta($id){
    // Encuentra y elimina la encuesta por su ID
    DisenoPoliticoRegionalesBtnEncuestas::findOrFail($id)->delete();

    return redirect()->back();
    }

    public function eliminarFormulario($id){
    // Encuentra y elimina el formulario por su ID
    DisenoPoliticoRegionalesBtnforms::findOrFail($id)->delete();

    return redirect()->back();
    }

    public function eliminarDisenoCompleto($id)
    {
        $ultimoRegistro = DisenoPoliticoRegionales::findOrFail($id);
    
        // Eliminar formularios y encuestas asociadas
        DisenoPoliticoRegionalesBtnforms::where('diseno_politico_regionales_id', $id)->delete();
        DisenoPoliticoRegionalesBtnEncuestas::where('diseno_politico_regionales_id', $id)->delete();
    
        // Eliminar el registro principal
        $ultimoRegistro->delete();
    
        return redirect()->route('disenopoliticoregionales.create')->with('success', 'Diseño eliminado con éxito');
    }
}
