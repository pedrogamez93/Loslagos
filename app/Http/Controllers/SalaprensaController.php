<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salaprensa;

class SalaprensaController extends Controller
{
    public function index()
    {
        // Obtén las noticias con paginación
        $noticias = Salaprensa::paginate(12); // 12 noticias por página, ajusta según tus necesidades
    
        // Retorna la vista con las noticias paginadas
        return view('salaprensa.index', ['noticias' => $noticias]);
    }

    public function create()
    {
        return view('salapresa.create');
    }

    public function store(Request $request)
    {
        // Lógica para almacenar el documento
    }
}
