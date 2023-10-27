<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Introduccion;


class CategoriesController extends Controller{
    
    public function index()
    {
        $introduccion = Introduccion::latest()->first();

        return view('introduccionF', ['introduccion' => $introduccion]);
    }

}