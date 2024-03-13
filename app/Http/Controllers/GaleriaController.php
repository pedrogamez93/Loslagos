<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Galeria;
use App\Models\Imagen;
use Illuminate\Support\Facades\Storage;

class GaleriaController extends Controller{

    public function index(){

    $galerias = Galeria::all();

    if ($galerias->isEmpty()) {
        return redirect()->route('galerias.create');
    }

    return view('galerias.index', ['galerias' => $galerias]);

    }

    public function create(){

    return view('galerias.create');

    }

    public function store(Request $request){
        Log::info('Entrando al método store');
    
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255', // Asegúrate de que sea requerido y una cadena
            'nombre_imagenes.*' => 'nullable|string|max:255',
            'archivo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validar cada imagen
        ]);
    
        Log::info('Datos validados:', $validatedData);
    
        // Crear una nueva galería
        $galeria = new Galeria();
        $galeria->nombre = $request->nombre;
        $galeria->save();
    
        Log::info('Galería creada:', ['id' => $galeria->id]);
    
        // Procesar las imágenes si existen
        if ($request->hasfile('archivo')) {
            foreach ($request->file('archivo') as $index => $imagen) {
                $path = $imagen->store('imagenes_galerias', 'public'); // Guardar imagen y obtener ruta
    
                // Crear un nuevo modelo Imagen y asociarlo con la galería
                $nuevaImagen = new Imagen();
                $nuevaImagen->galeria_id = $galeria->id;
                $nuevaImagen->nombre_imagen = $request->nombre_imagenes[$index] ?? $imagen->getClientOriginalName();
                $nuevaImagen->archivo = $path;
                $nuevaImagen->save();
    
                Log::info('Imagen añadida a la base de datos:', ['id' => $nuevaImagen->id]);
            }
        }
    
        // Redirigir a alguna parte con un mensaje de éxito
        return redirect()->route('galerias.index')->with('success', 'Galería creada exitosamente.');
    }
    
    public function update(Request $request, $id){
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre' => 'nullable|string|max:255',
            'nombre_imagenes.*' => 'nullable|string|max:255', // Cambiado de 'nombre.*' a 'nombre_imagenes.*'
            'archivo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validar cada imagen
        ]);
    
        // Encontrar la galería por ID y actualizar su nombre
        $galeria = Galeria::findOrFail($id);
        $galeria->nombre = $request->nombre ?? $galeria->nombre; // Actualiza solo si se proporciona un nuevo nombre
        $galeria->save();
    
        // Procesar las nuevas imágenes si existen
        if ($request->hasfile('archivo')) {
            foreach ($request->file('archivo') as $index => $imagen) {
                $path = $imagen->store('imagenes_galerias', 'public'); // Guardar imagen y obtener ruta
    
                // Crear un nuevo modelo Imagen y asociarlo con la galería
                $nuevaImagen = new Imagen();
                $nuevaImagen->galeria_id = $galeria->id;
                $nuevaImagen->nombre_imagen = $request->nombre_imagenes[$index] ?? $imagen->getClientOriginalName(); // Usa el nombre proporcionado por el usuario o el nombre original del archivo
                $nuevaImagen->archivo = $path;
                $nuevaImagen->save();
            }
        }
    
        // Redirigir a alguna parte con un mensaje de éxito
        return redirect()->route('galerias.edit', $galeria->id)->with('success', 'Galería actualizada exitosamente.');
    }

    public function destroyImagen($id){

    $imagen = Imagen::findOrFail($id);
    Storage::delete($imagen->archivo); // Elimina el archivo de la imagen
    $imagen->delete(); // Elimina el registro de la imagen de la base de datos

    return back()->with('success', 'Imagen eliminada exitosamente.');

    }

    public function galeriadestroy($id){

    $galeria = Galeria::with('imagenes')->findOrFail($id);

    // Elimina todas las imágenes asociadas
    foreach ($galeria->imagenes as $imagen) {
        Storage::delete($imagen->archivo); // Elimina el archivo de la imagen
        $imagen->delete(); // Elimina el registro de la imagen de la base de datos
    }

    $galeria->delete(); // Elimina la galería

    return redirect()->route('galerias.index')->with('success', 'Galería eliminada exitosamente.');

    }

    public function edit($id){

    // Buscar la galería por su ID
    $galeria = Galeria::with('imagenes')->findOrFail($id);

    // Pasar la galería a la vista
    return view('galerias.edit', compact('galeria'));

    }

    public function show($id) {

    // Encontrar la galería por su ID
    $galeria = Galeria::with('imagenes')->findOrFail($id);

    // Pasar la galería a la vista
    return view('galerias.show', compact('galeria'));
    
    }

   /* public function mostrargaleriaImagen($imagen) {
        return response()->file(storage_path('app/public/imagenes_galerias/' . $imagen));
    }*/

    public function mostrargaleriaImagen($id) {
        $imagen = Imagen::findOrFail($id);
        return response()->file(storage_path('app/public/imagenes_galerias/' . $imagen->nombre_archivo));
    }


}
