<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Salaprensa;
use App\Models\Documentonew;
use App\Models\TramitesDigitales;
use App\Models\popup;
use Illuminate\Support\Facades\Log;

 

class HomeController extends Controller
{
    public function index()
    {
         // Verificar si ya existe un registro
        $existeRegistro = DB::table('home')->exists();

        // Si no existe un registro, realiza la inserción
        if (!$existeRegistro) {
            DB::table('home')->insert([
                'id' => '1',
                'titulobanner' => 'Tu Titulo',
                'descripcionbanner' => 'Tu Descripción',
                'minibanners1' => 'public/minibanners/default_image.png',
                'url_minibanner1' => '#',
                'minibanners2' => 'public/minibanners/default_image.png',
                'url_minibanner2' => '#',
                'minibanners3' => 'public/minibanners/default_image.png',
                'url_minibanner3' => '#',
                'minibanners4' => 'public/minibanners/default_image.png',
                'url_minibanner4' => '#',
                'minibanners5' => 'public/minibanners/default_image.png',
                'url_minibanner5' => '#',
                'minibanners6' => 'public/minibanners/default_image.png',
                'url_minibanner6' => '#',
                'minibanners7' => 'public/minibanners/default_image.png',
                'url_minibanner7' => '#',
                'minibanners8' => 'public/minibanners/default_image.png',
                'url_minibanner8' => '#',
                'minibanners9' => 'public/minibanners/default_image.png',
                'url_minibanner9' => '#',
                'minibanners10' => 'public/minibanners/default_image.png',
                'url_minibanner10' => '#',
                'minibanners11' => 'public/minibanners/default_image.png',
                'url_minibanner11' => '#',
                'minibanners12' => 'public/minibanners/default_image.png',
                'url_minibanner12' => '#',
                'slider1' => 'public/minibanners/default_image.png',
                'slider2' => 'public/minibanners/default_image.png',
                'slider3' => 'public/minibanners/default_image.png',
                'slider4' => 'public/minibanners/default_image.png',
                'slider5' => 'public/minibanners/default_image.png',
            ]);

            
        }

       
    
    

     
        $home = Home::where('id', 1)->first();
        $tramitesDigitales = DB::table('tramites_digitales')->latest()->take(12)->get();
        $salaprensa = Salaprensa::latest()->take(12)->get();
        $popup = popup::all();
        $popupUnico = $popup->first();

        if ($popupUnico) {
            $idpopup = $popupUnico->id;
            // Resto del código si $popupUnico no es null
        } else {
            // Manejar el caso en el que $popupUnico es null
            $idpopup = null; // O cualquier otro valor predeterminado que desees
        }

        return view('home.index', compact('home','tramitesDigitales','salaprensa','popupUnico'));
    }

    public function actualizar()
    { 
       
        $home = Home::where('id', 1)->first();
        
        if (!$home) {
            abort(404); // O redirige a otra página, según tus necesidades
        }
        
        return view('home.edit', compact('home'));
    }

    public function create()
    { 
       
        $home = Home::where('id', 1)->first();
        
        return view('home.create', compact('home'));
    }


    public function slider()
    { 
       
        $home = Home::where('id', 1)->first();
        
        return view('home.slider', compact('home'));
    }

    public function updateSlider(Request $request)
{
    $request->validate([
        'slider1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'slider2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'slider3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'slider4' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'slider5' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    $home = Home::where('id', 1)->first();
    $changes = [];

    // Repite este patrón para slider1 hasta slider5
    for ($i = 1; $i <= 5; $i++) {
        $sliderField = "slider$i";

        if ($request->hasFile($sliderField)) {
            // Elimina la imagen anterior
            Storage::delete($home->$sliderField);

            // Almacena la nueva imagen
            $path = $request->file($sliderField)->store('public/sliders');
            $changes[$sliderField] = $path;
        }
    }

    if (!empty($changes)) {
        $home->update($changes);
    }

    return redirect('/home/slider')->with('success', 'Registro actualizado correctamente.');
}




    public function store(Request $request)
    {
        $request->validate([
            'titulobanner' => 'required',
            'descripcionbanner' => 'required',
            // Agrega reglas de validación para cada minibanner
            'minibanner1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner1' => 'nullable',
            'minibanner2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner2' => 'nullable',
            'minibanner3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner3' => 'nullable',
            'minibanner4' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner4' => 'nullable',
            'minibanner5' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner5' => 'nullable',
            'minibanner6' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner6' => 'nullable',
            'minibanner7' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner7' => 'nullable',
            'minibanner8' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner8' => 'nullable',
            'minibanner9' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner9' => 'nullable',
            'minibanner10' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner10' => 'nullable',
            'minibanner11' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner11' => 'nullable',
            'minibanner12' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner12' => 'nullable',
            'minibanner13' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'url_minibanner13' => 'nullable',
        'minibanner14' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'url_minibanner14' => 'nullable',
        'minibanner15' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'url_minibanner15' => 'nullable',
        'minibanner16' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'url_minibanner16' => 'nullable',

            // Repite este patrón para minibanner4, minibanner5, ... hasta minibanner12
        ]);
    
        $input = $request->all();
    
  
        for ($i = 13; $i <= 16; $i++) {
            $minibannerField = "minibanner$i";
            $urlMinibannerField = "url_minibanner$i";
    
            if ($request->hasFile($minibannerField)) {
                $path = $request->file($minibannerField)->store('public/minibanners');
                $input[$minibannerField] = $path;
            }
        }
        
        Home::create($input);
    
        return redirect('/home/create')->with('success', 'Registro creado correctamente.');
    } 



        
    public function update(Request $request)
    {
        $request->validate([
            'titulobanner' => 'nullable',
            'descripcionbanner' => 'nullable',
            // Agrega reglas de validación para cada minibanner
            'minibanner1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner1' => 'nullable',
            'minibanner2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner2' => 'nullable',
            'minibanner3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner3' => 'nullable',
            'minibanner4' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner4' => 'nullable',
            'minibanner5' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner5' => 'nullable',
            'minibanner6' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner6' => 'nullable',
            'minibanner7' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner7' => 'nullable',
            'minibanner8' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner8' => 'nullable',
            'minibanner9' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner9' => 'nullable',
            'minibanner10' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner10' => 'nullable',
            'minibanner11' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner11' => 'nullable',
            'minibanner12' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner12' => 'nullable',
            'minibanner13' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner13' => 'nullable',
            'minibanner14' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner14' => 'nullable',
            'minibanner15' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner15' => 'nullable',
            'minibanner16' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_minibanner16' => 'nullable',
        ]);
    
        $input = $request->all();
    $home = Home::where('id', 1)->first();

    $changes = [];


    if ($request->has('titulobanner')) {
        $changes['titulobanner'] = $request->titulobanner;
    }

    if ($request->has('descripcionbanner')) {
        $changes['descripcionbanner'] = $request->descripcionbanner;
    }

    

  // Repite este patrón para minibanner1 hasta minibanner16
for ($i = 1; $i <= 16; $i++) {
    $minibannerField = "minibanners$i";
    $urlMinibannerField = "url_minibanner$i";

    if ($request->hasFile($minibannerField)) {
        // Elimina la imagen anterior
        Storage::delete($home->$minibannerField);
    
        // Almacena la nueva imagen
        $path = $request->file($minibannerField)->store('public/minibanners');
        $input[$minibannerField] = $path;
    
        // Limpia la URL si hay una imagen nueva
        //$input[$urlMinibannerField] = null;
       // $changes[$urlMinibannerField] = $request->$urlMinibannerField;
        $changes[$minibannerField] = $path;

    }
    elseif ($request->input($urlMinibannerField) !== null) {
        // Si no hay nueva imagen, pero hay una URL proporcionada, guarda la URL
       // $input[$urlMinibannerField] = $request->$urlMinibannerField;

        // Limpia la dirección de la imagen si hay una URL nueva
        //$input[$minibannerField] = null;
        $changes[$urlMinibannerField] = $request->input($urlMinibannerField);
    }
}



if (!empty($changes)) {
   
    $home->update($changes);
}


    return redirect('/home/actualizar')->with('success', 'Registro actualizado correctamente.');
}

    
    public function mostrarImagen($carpeta, $imagen)
{
    $rutaCompleta = storage_path("app/public/{$carpeta}/{$imagen}");

    if (file_exists($rutaCompleta)) {
        return response()->file($rutaCompleta);
    } else {
        abort(404); // O redirige a una página de error según tus necesidades
    }
}


public function buscador(Request $request)
{
    $query = $request->input('q');

    // Convertir la consulta a minúsculas (puedes usar strtoupper para convertir a mayúsculas)
    $queryLower = strtolower($query);

   // Pagina los resultados de cada tabla por separado
$resultados1 = Salaprensa::whereRaw('LOWER(titulo) like ?', ["%$queryLower%"])
->orWhereRaw('LOWER(descripcion) like ?', ["%$queryLower%"])
->orWhereRaw('LOWER(categoria) like ?', ["%$queryLower%"])
->paginate(10);

$resultados2 = TramitesDigitales::whereRaw('LOWER(titulo) like ?', ["%$queryLower%"])
->orWhereRaw('LOWER(tags) like ?', ["%$queryLower%"])
->orWhereRaw('LOWER(descripcion) like ?', ["%$queryLower%"])
->paginate(10);

$resultados3 = Documentonew::whereRaw('LOWER(tipo_documento) like ?', ["%$queryLower%"])
->orWhereRaw('LOWER(provincia) like ?', ["%$queryLower%"])
->orWhereRaw('LOWER(comuna) like ?', ["%$queryLower%"])
->paginate(10);

// Combina los resultados paginados de todas las tablas en una sola colección
$resultados = $resultados1->merge($resultados2)->merge($resultados3);

// Redirige a la vista 'buscador' con los resultados paginados y la variable $query
return view('Home.buscador', ['resultados' => $resultados, 'query' => $query]);
}





}
