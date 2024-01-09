<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentosDeGestionController extends Controller
{
    public function Index(){

        return view('documentosdegestion.index');
    }

    public function Indexcomisionregbordecostero(){

        return view('documentosdegestion.comisionregbordecostero.index');
    }

    public function Indexcontrolesssi(){

        return view('documentosdegestion.controlesssi.index');
    }

    public function Indexestadosituacionfndr(){

        return view('documentosdegestion.estadosituacionfndr.index');
    }

    public function Indexinformeejecucion(){

        return view('documentosdegestion.informeejecucion.index');
    }

    public function Indexinformegastosley(){

        return view('documentosdegestion.informegastosley.index');
    }

    public function Indexplanregulador(){

        return view('documentosdegestion.planregulador.index');
    }

    public function Indexpresupuesto(){

        return view('documentosdegestion.presupuesto.index');
    }

    public function Indexreceptoresfondos(){

        return view('documentosdegestion.receptoresfondos.index');
    }

    public function Indexunidaddecontrol(){

        return view('documentosdegestion.unidaddecontrol.index');
    }
}
