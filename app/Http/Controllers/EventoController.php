<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Models\Evento;


class EventoController extends Controller{

    public function index(){

        // Obtiene todos los eventos
        $eventos = Evento::orderBy('fecha_inicio', 'asc')->get();
    
        // Verifica si hay eventos
        if ($eventos->isEmpty()) {
            // Redirige a la vista de creación si no hay eventos
            return redirect()->route('eventos.create');
        }
    
        // Pasa los eventos a la vista
        return view('eventos.index', ['eventos' => $eventos]);
    }

    public function create(){

        return view('eventos.create');
    }

    public function store(Request $request){

        // Validar los datos del formulario
     
        $request->validate([
            'titulo_evento' => 'required|max:255',
            'descripcion' => 'nullable|max:1000',
            'lugar' => 'nullable|max:4000',
            'imagen' => 'nullable|image|max:2048', // Asegúrate de ajustar las reglas según tus necesidades
            'fecha_inicio' => 'nullable|date_format:Y-m-d\TH:i',
            'fecha_termino' => 'nullable|date_format:Y-m-d\TH:i|after_or_equal:fecha_inicio',
        ]);

        // Procesar fechas
        $fechaInicio = $request->input('fecha_inicio')
        ? Carbon::createFromFormat('Y-m-d\TH:i', $request->input('fecha_inicio'))
        : null;
    
        $fechaTermino = $request->input('fecha_termino')
        ? Carbon::createFromFormat('Y-m-d\TH:i', $request->input('fecha_termino'))
        : null;
    
        // Registrar las fechas en los logs
        //Log::info('Fecha de inicio procesada: ', ['fecha_inicio' => $fechaInicio]);
        //Log::info('Fecha de término procesada: ', ['fecha_termino' => $fechaTermino]);

        // Crear el evento
        $evento = new Evento;
        $evento->titulo_evento = $request->input('titulo_evento');
        $evento->descripcion = $request->input('descripcion');
        $evento->lugar = $request->input('lugar');
        $evento->fecha_inicio = $fechaInicio;
        $evento->fecha_termino = $fechaTermino;

        // Procesar la imagen
        if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
            $imagenPath = $request->imagen->store('eventos_imagenes', 'public');
            $evento->imagen = $imagenPath;
        }

        $evento->save();

        // Redirigir a alguna parte con un mensaje de éxito
        return redirect()->route('eventos.index')->with('success', 'Evento creado exitosamente.');
    }

    public function destroy(Evento $evento){

    $evento->delete();

    return redirect()->route('eventos.index')->with('success', 'Evento eliminado exitosamente.');
    }

    public function show($id){

    // Buscar el evento por su ID
    $evento = Evento::findOrFail($id);

    // Pasar el evento a la vista
    return view('eventos.show', ['evento' => $evento]);

    }

    public function mostrarImagenEvento($filename)
    {
        $path = storage_path('app/public/eventos_imagenes/' . $filename);
    
        // Log de la ruta solicitada
        Log::info("Solicitud para mostrar imagen: " . $filename);
        Log::info("Ruta completa de la imagen: " . $path);
    
        if (!File::exists($path)) {
            Log::error("El archivo no existe: " . $path);
            abort(404, 'El archivo no existe.');
        }
    
        $file = File::get($path);
        $type = File::mimeType($path);
    
        Log::info("Tipo MIME del archivo: " . $type);
    
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
    
        Log::info("Imagen mostrada correctamente: " . $filename);
    
        return $response;
    }

    public function edit($id){

    $evento = Evento::findOrFail($id);
    return view('eventos.edit', ['evento' => $evento]);

    }

    public function update(Request $request, $id){

    // Validar los datos del formulario
    $request->validate([
        'titulo_evento' => 'sometimes|max:255',
        'descripcion' => 'nullable|max:1000',
        'lugar' => 'nullable|max:4000',
        'imagen' => 'nullable|image|max:2048',
        'fecha_inicio' => 'nullable|date_format:Y-m-d\TH:i',
        'fecha_termino' => 'nullable|date_format:Y-m-d\TH:i|after_or_equal:fecha_inicio',
    ]);

    // Obtener el evento a actualizar
    $evento = Evento::findOrFail($id);

    // Procesar fechas
    $fechaInicio = $request->input('fecha_inicio')
        ? Carbon::createFromFormat('Y-m-d\TH:i', $request->input('fecha_inicio'))
        : $evento->fecha_inicio;

    $fechaTermino = $request->input('fecha_termino')
        ? Carbon::createFromFormat('Y-m-d\TH:i', $request->input('fecha_termino'))
        : $evento->fecha_termino;

    // Actualizar el evento
    $evento->titulo_evento = $request->input('titulo_evento', $evento->titulo_evento);
    $evento->descripcion = $request->input('descripcion', $evento->descripcion);
    $evento->lugar = $request->input('lugar', $evento->lugar);
    $evento->fecha_inicio = $fechaInicio;
    $evento->fecha_termino = $fechaTermino;

    // Procesar la imagen
    if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
        // Opcional: eliminar imagen antigua si existe
        if ($evento->imagen) {
            Storage::delete('public/' . $evento->imagen);
        }
        $imagenPath = $request->imagen->store('eventos_imagenes', 'public');
        $evento->imagen = $imagenPath;
    }

    $evento->save();

    // Redirigir a alguna parte con un mensaje de éxito
    return redirect()->route('eventos.index')->with('success', 'Evento actualizado exitosamente.');
    }

    public function mostrarImagene($imagen) {

        return response()->file(storage_path('app/public/eventos_imagenes/' . $imagen));
    }
}
