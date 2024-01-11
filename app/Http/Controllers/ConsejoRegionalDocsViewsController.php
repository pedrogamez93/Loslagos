<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsejoRegionalDocsViewsController extends Controller
{
    public function Indexactas(){

        return view('consejoregionaldocsviews.actas.index');
    }

    public function Indexcertificadosdeacuerdos(){

        return view('consejoregionaldocsviews.certificadosdeacuerdos.index');
    }

    public function Indexresumendegastos(){

        return view('consejoregionaldocsviews.resumendegastos.index');
    }

    public function Indextablassesionesconsejo(){

        return view('consejoregionaldocsviews.tablassesionesconsejo.index');
    }   
}
