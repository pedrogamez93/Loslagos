<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::all();
        return view('funcionarios.index', compact('funcionarios'));
    }

    public function create()
    {
        return view('funcionarios.create');
    }

    public function store(Request $request)
    {
      

        $datosf = request()->except('_token');
        if($request->hasFile('foto')){
            $datosf['foto'] = $request->file('foto')->store('fotofuncionario','public');

        }

        $datosf['created_at'] = now();
        $datosf['updated_at'] = now();

        Funcionario::insert($datosf);
        return redirect('/funcionarios')->with('success', 'Documento guardado exitosamente');
    }
}
