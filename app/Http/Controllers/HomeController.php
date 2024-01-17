<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Salaprensa;
use App\Models\Documentonew;
use App\Models\TramitesDigitales
;
class HomeController extends Controller
{
    public function index()
    {
        $home = Home::where('id', 1)->first();
        $tramitesDigitales = DB::table('tramites_digitales')->latest()->take(12)->get();
        $salaprensa = Salaprensa::latest()->take(12)->get();
        return view('home.index', compact('home','tramitesDigitales','salaprensa'));
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

            // Repite este patrón para minibanner4, minibanner5, ... hasta minibanner12
        ]);
    
        $input = $request->all();
    
  
        if ($request->hasFile('minibanner1')) {
            $path = $request->file('minibanner1')->store('public/minibanners');
            $input['minibanners1'] = $path;
        }
    
       
        if ($request->hasFile('minibanner2')) {
            $path = $request->file('minibanner2')->store('public/minibanners');
            $input['minibanners2'] = $path;
        }
    
      
        if ($request->hasFile('minibanner3')) {
            $path = $request->file('minibanner3')->store('public/minibanners');
            $input['minibanners3'] = $path;
        }
       
        if ($request->hasFile('minibanner4')) {
            $path = $request->file('minibanner4')->store('public/minibanners');
            $input['minibanners4'] = $path;
        }
        
        if ($request->hasFile('minibanner5')) {
            $path = $request->file('minibanner5')->store('public/minibanners');
            $input['minibanners5'] = $path;
        }
    
        if ($request->hasFile('minibanner6')) {
            $path = $request->file('minibanner6')->store('public/minibanners');
            $input['minibanners6'] = $path;
        }
       
         if ($request->hasFile('minibanner7')) {
            $path = $request->file('minibanner7')->store('public/minibanners');
            $input['minibanners7'] = $path;
        }
      
         if ($request->hasFile('minibanner8')) {
            $path = $request->file('minibanner8')->store('public/minibanners');
            $input['minibanners8'] = $path;
        }
    
         if ($request->hasFile('minibanner9')) {
            $path = $request->file('minibanner9')->store('public/minibanners');
            $input['minibanners9'] = $path;
        }
       
         if ($request->hasFile('minibanner10')) {
            $path = $request->file('minibanner10')->store('public/minibanners');
            $input['minibanners10'] = $path;
        }
     
         if ($request->hasFile('minibanner11')) {
            $path = $request->file('minibanner11')->store('public/minibanners');
            $input['minibanners11'] = $path;
        }
        
         if ($request->hasFile('minibanner12')) {
            $path = $request->file('minibanner12')->store('public/minibanners');
            $input['minibanners12'] = $path;
        }
    
        
        Home::create($input);
    
        return redirect('/home/create')->with('success', 'Registro creado correctamente.');
    } 



        
    public function update(Request $request)
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

            // Repite este patrón para minibanner4, minibanner5, ... hasta minibanner12
        ]);
    
        $input = $request->all();

      
        $home = Home::where('id', 1)->first();
  
        if ($request->hasFile('minibanner1')) {
            
            Storage::delete($home->minibanners1);
            $path = $request->file('minibanner1')->store('public/minibanners');
            $input['minibanners1'] = $path;

        }
    
       
        if ($request->hasFile('minibanner2')) {
            Storage::delete($home->minibanner2);
            $path = $request->file('minibanner2')->store('public/minibanners');
            $input['minibanner2'] = $path;
        }
    
      
        if ($request->hasFile('minibanner3')) {
            Storage::delete($home->minibanner3);
            $path = $request->file('minibanner3')->store('public/minibanners');
            $input['minibanner3'] = $path;
        }
       
        if ($request->hasFile('minibanner4')) {
            Storage::delete($home->minibanner4);
            $path = $request->file('minibanner4')->store('public/minibanners');
            $input['minibanner4'] = $path;
        }
        
        if ($request->hasFile('minibanner5')) {
            Storage::delete($home->minibanner5);
            $path = $request->file('minibanner5')->store('public/minibanners');
            $input['minibanner5'] = $path;
        }
    
        if ($request->hasFile('minibanner6')) {
            Storage::delete($home->minibanner6);
            $path = $request->file('minibanner6')->store('public/minibanners');
            $input['minibanner6'] = $path;
        }
       
         if ($request->hasFile('minibanner7')) {
            Storage::delete($home->minibanner7);
            $path = $request->file('minibanner7')->store('public/minibanners');
            $input['minibanner7'] = $path;
        }
      
         if ($request->hasFile('minibanner8')) {
            Storage::delete($home->minibanner8);
            $path = $request->file('minibanner8')->store('public/minibanners');
            $input['minibanner8'] = $path;
        }
    
         if ($request->hasFile('minibanner9')) {
            Storage::delete($home->minibanner9);
            $path = $request->file('minibanner9')->store('public/minibanners');
            $input['minibanner9'] = $path;
        }
       
         if ($request->hasFile('minibanner10')) {
            Storage::delete($home->minibanner10);
            $path = $request->file('minibanner10')->store('public/minibanners');
            $input['minibanner10'] = $path;
        }
     
         if ($request->hasFile('minibanner11')) {
            Storage::delete($home->minibanner11);
            $path = $request->file('minibanner11')->store('public/minibanners');
            $input['minibanner11'] = $path;
        }
        
         if ($request->hasFile('minibanner12')) {
            Storage::delete($home->minibanner12);
            $path = $request->file('minibanner12')->store('public/minibanners');
            $input['minibanner12'] = $path;
        }
    
        
        $home->update($input);
    
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

    // Realiza la búsqueda en las tablas
    $resultados1 = Salaprensa::where('titulo', 'like', "%$query%")
        ->orWhere('descripcion', 'like', "%$query%")
        ->orWhere('categoria', 'like', "%$query%")
        ->get();

    $resultados2 = TramitesDigitales::where('titulo', 'like', "%$query%")
        ->orWhere('tags', 'like', "%$query%")
        ->orWhere('descripcion', 'like', "%$query%")
        ->get();

    $resultados3 = Documentonew::where('tipo_documento', 'like', "%$query%")
        ->orWhere('provincia', 'like', "%$query%")
        ->orWhere('comuna', 'like', "%$query%")
        ->get();

    // Combina los resultados de todas las tablas en una sola colección
    $resultados = $resultados1->merge($resultados2)->merge($resultados3);

    // Redirige a la vista 'buscador' con los resultados
    return view('Home.buscador', ['resultados' => $resultados]);
}



}
