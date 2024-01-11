<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;

class HomeController extends Controller
{
    public function index()
    {
        $home = Home::all();
        return view('home.index', compact('home'));
    }

    public function create()
    {
        return view('home.create');
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
            $input['minibanner1'] = $path;
        }
    
       
        if ($request->hasFile('minibanner2')) {
            $path = $request->file('minibanner2')->store('public/minibanners');
            $input['minibanner2'] = $path;
        }
    
      
        if ($request->hasFile('minibanner3')) {
            $path = $request->file('minibanner3')->store('public/minibanners');
            $input['minibanner3'] = $path;
        }
       
        if ($request->hasFile('minibanner4')) {
            $path = $request->file('minibanner4')->store('public/minibanners');
            $input['minibanner4'] = $path;
        }
        
        if ($request->hasFile('minibanner5')) {
            $path = $request->file('minibanner5')->store('public/minibanners');
            $input['minibanner5'] = $path;
        }
    
        if ($request->hasFile('minibanner6')) {
            $path = $request->file('minibanner6')->store('public/minibanners');
            $input['minibanner6'] = $path;
        }
       
         if ($request->hasFile('minibanner7')) {
            $path = $request->file('minibanner7')->store('public/minibanners');
            $input['minibanner7'] = $path;
        }
      
         if ($request->hasFile('minibanner8')) {
            $path = $request->file('minibanner8')->store('public/minibanners');
            $input['minibanner8'] = $path;
        }
    
         if ($request->hasFile('minibanner9')) {
            $path = $request->file('minibanner9')->store('public/minibanners');
            $input['minibanner9'] = $path;
        }
       
         if ($request->hasFile('minibanner10')) {
            $path = $request->file('minibanner10')->store('public/minibanners');
            $input['minibanner10'] = $path;
        }
     
         if ($request->hasFile('minibanner11')) {
            $path = $request->file('minibanner11')->store('public/minibanners');
            $input['minibanner11'] = $path;
        }
        
         if ($request->hasFile('minibanner12')) {
            $path = $request->file('minibanner12')->store('public/minibanners');
            $input['minibanner12'] = $path;
        }
    
        
        Home::create($input);
    
        return redirect('/home/create')->with('success', 'Registro creado correctamente.');
    }
}
