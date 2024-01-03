<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programas;


class TodosLosProgramasController extends Controller
{
    //
    public function todoslosprogramasIndex()
    {
        $programas = Programas::all(); // Cambiar el nombre del modelo

        return view('todoslosprogramas', compact('programas'));
        
    }
 
}
