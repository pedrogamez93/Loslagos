<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salaprensa;

class SalaprensaController extends Controller
{
    public function index()
    {
        $salapresa = Salaprensa::all();
        return view('salapresa.index', compact('salapresa'));
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
