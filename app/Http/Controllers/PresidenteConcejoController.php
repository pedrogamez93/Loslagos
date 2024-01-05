<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PresidenteConcejo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PresidenteConcejoController extends Controller
{
    public function index()
    {
        $presidente = PresidenteConcejo::latest()->first();
    
        if ($presidente) {
            // Si existe un presidente, redirige a la vista correspondiente o realiza alguna otra acción.
            return view('presidenteconcejo.index', compact('presidente'));
        } else {
            // Si no existe un presidente, redirige a la creación de uno nuevo.
            return redirect()->route('presidenteconcejo.create');
        }
    }

    public function create()
    {
        return view('presidenteconcejo.create');
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
        'institucion' => 'required|string|max:255',
        'direccion' => 'required|string|max:255',
        'telefono' => 'required|string|max:15',
        'correo' => 'required|email|max:255',
        'provincia' => 'required|string|max:255',
        'comuna' => 'required|string|max:255',
        'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ajusta las reglas según tus necesidades
    ]);

    // Procesar la imagen y almacenarla en el servidor
    $imagenPath = $request->file('imagen')->store('images', 'public');

    // Crear un nuevo registro en la tabla
    $presidente = PresidenteConcejo::create([
        'nombres' => $request->input('nombres'),
        'apellidos' => $request->input('apellidos'),
        'profesion' => $request->input('profesion'),
        'partidopolitico' => $request->input('partidopolitico'),
        'cargo' => $request->input('cargo'),
        'institucion' => $request->input('institucion'),
        'direccion' => $request->input('direccion'),
        'telefono' => $request->input('telefono'),
        'correo' => $request->input('correo'),
        'provincia' => $request->input('provincia'),
        'comuna' => $request->input('comuna'),
        'imagen' => $imagenPath, // Almacenar la ruta de la imagen en la base de datos
    ]);

    // Redirigir a la vista de detalles o a donde desees
    return redirect()->route('presidenteconcejo.index', ['presidente' => $presidente->id]);
    }

    public function edit($id)
{
    // Obtén el último registro
    $presidente = PresidenteConcejo::find($id);

    if ($presidente) {
        // Si existe un presidente, muestra el formulario del edit
        return view('presidenteconcejo.edit', compact('presidente'));
    } else {
        // Si no hay presidente, redirige a la creación de uno nuevo o a la vista que desees.
        return redirect()->route('presidenteconcejo.create');
    }
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
        'institucion' => 'required|string|max:255',
        'direccion' => 'required|string|max:255',
        'telefono' => 'required|string|max:15',
        'correo' => 'required|email|max:255',
        'provincia' => 'required|string|max:255',
        'comuna' => 'required|string|max:255',
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

    // Obtener el presidente existente
    $presidente = PresidenteConcejo::findOrFail($id);

    // Actualizar los campos con los nuevos valores
    $presidente->nombres = $request->input('nombres');
    $presidente->apellidos = $request->input('apellidos');
    $presidente->profesion = $request->input('profesion');
    $presidente->partidopolitico = $request->input('partidopolitico');
    $presidente->cargo = $request->input('cargo');
    $presidente->institucion = $request->input('institucion');
    $presidente->direccion = $request->input('direccion');
    $presidente->telefono = $request->input('telefono');
    $presidente->correo = $request->input('correo');
    $presidente->provincia = $request->input('provincia');
    $presidente->comuna = $request->input('comuna');

    // Si se proporciona una nueva imagen, actualizarla
    if ($request->hasFile('imagen')) {
        $imagenPath = $request->file('imagen')->store('images', 'public');
        $presidente->imagen = $imagenPath;
    }

    // Guardar los cambios en la base de datos
    $presidente->save();

    // Redirigir a la vista de detalles o a donde desees
    return redirect()->route('presidenteconcejo.index', ['presidente' => $presidente->id]);
}
public function destroy($id)
{
    $presidente = PresidenteConcejo::findOrFail($id);
    $presidente->delete();

    return redirect()->route('presidenteconcejo.create');
}
}
