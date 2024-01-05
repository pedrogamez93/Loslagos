<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsejerosLlanquihue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ConsejerosLlanquihueController extends Controller
{
    public function index(){
        $consejeros = ConsejerosLlanquihue::all();
        return view('consejerosllanquihue.index', compact('consejeros'));
    }

    public function create()
    {
        return view('consejerosllanquihue.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'profesion' => 'required|string|max:255',
            'partidopolitico' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'actividad' => 'required|string|max:255',
            'institucion' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'correo' => 'required|email|max:255',
            'region' => 'required|string|max:255',
            'provincia' => 'required|string|max:255',
            'comuna' => 'required|string|max:255',
            'periodosenconcejo' => 'required|string|max:255',
            'comisiones' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ajusta las reglas según tus necesidades
        ]);
    
        // Procesar la imagen y almacenarla en el servidor
        $imagenPath = $request->file('imagen')->store('images', 'public');
    
        // Crear un nuevo registro en la tabla
        $consejero = ConsejerosLlanquihue::create([
            'nombres' => $request->input('nombres'),
            'apellidos' => $request->input('apellidos'),
            'profesion' => $request->input('profesion'),
            'partidopolitico' => $request->input('partidopolitico'),
            'cargo' => $request->input('cargo'),
            'actividad' => $request->input('actividad'),
            'institucion' => $request->input('institucion'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
            'correo' => $request->input('correo'),
            'region' => $request->input('region'),
            'provincia' => $request->input('provincia'),
            'comuna' => $request->input('comuna'),
            'periodosenconcejo' => $request->input('periodosenconcejo'),
            'comisiones' => $request->input('comisiones'),
            'imagen' => $imagenPath, // Almacenar la ruta de la imagen en la base de datos
        ]);
    
        // Redirigir a la vista de detalles o a donde desees
        return redirect()->route('consejerosllanquihue.index', ['consejero' => $consejero->id]);
        }

        public function edit($id)
        {
            $consejero = ConsejerosLlanquihue::findOrFail($id);
            return view('consejerosllanquihue.edit', compact('consejero'));
        }

        public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'profesion' => 'required|string|max:255',
            'partidopolitico' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'actividad' => 'required|string|max:255',
            'institucion' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'correo' => 'required|email|max:255',
            'region' => 'required|string|max:255',
            'provincia' => 'required|string|max:255',
            'comuna' => 'required|string|max:255',
            'periodosenconcejo' => 'required|string|max:255',
            'comisiones' => 'required|string|max:255',
            // Otras validaciones según sean necesarias
        ]);

        // Añadir validación de imagen solo si se ha proporcionado una imagen
        $validator->sometimes('imagen', 'image|mimes:jpeg,png,jpg,gif|max:2048', function ($input) {
            return $input->hasFile('imagen');
        });

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }

        // Obtener el consejero existente
        $consejero = ConsejerosLlanquihue::findOrFail($id);

        // Actualizar los campos con los nuevos valores
        $consejero->nombres = $request->input('nombres');
        $consejero->apellidos = $request->input('apellidos');
        $consejero->profesion = $request->input('profesion');
        $consejero->partidopolitico = $request->input('partidopolitico');
        $consejero->cargo = $request->input('cargo');
        $consejero->actividad = $request->input('actividad');
        $consejero->institucion = $request->input('institucion');
        $consejero->direccion = $request->input('direccion');
        $consejero->telefono = $request->input('telefono');
        $consejero->correo = $request->input('correo');
        $consejero->region = $request->input('region');
        $consejero->provincia = $request->input('provincia');
        $consejero->comuna = $request->input('comuna');
        $consejero->periodosenconcejo = $request->input('periodosenconcejo');
        $consejero->comisiones = $request->input('comisiones');

        // Si se proporciona una nueva imagen, actualizarla
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('images', 'public');
            $consejero->imagen = $imagenPath;
        }

        // Guardar los cambios en la base de datos
        $consejero->save();

        // Redirigir a la vista de detalles o a donde desees
        return redirect()->route('consejerosllanquihue.index', ['consejero' => $consejero->id]);
    }
    public function destroy($id)
    {
        $consejero = ConsejerosLlanquihue::findOrFail($id);
        $consejero->delete();

        return redirect()->route('consejerosllanquihue.index');
    }

    public function show($id){
        $consejero = ConsejerosLlanquihue::findOrFail($id);
        return view('consejerosllanquihue.show', compact('consejero'));
    }
}
