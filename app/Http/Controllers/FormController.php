<?php

namespace App\Http\Controllers;

use App\Mail\ContactanosMailable;
use App\Models\Formulario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class FormController extends Controller
{
    public function verFormularios()
    {
        $formularios = Formulario::all(); // Obtén todos los registros de la tabla formularios

        return view('formulariodecontacto.verformularios', ['formularios' => $formularios]);
    }
    public function index()
{
    return view('formulariodecontacto');
}

public function store (Request $request)
    {
        //dd($request->all());
        $data = $request->validate([
        'nombre' => 'required',
        'apellido' => 'required',
        'email' => 'required',
        'sexo' => 'required',
        'direccion' => 'required',
        'provincia' => 'required',
        'comuna' => 'required',
        'telefono' => 'required',
        'tipo_mensaje' => '',
        'mensaje' => '',
        'date' => '',
        'usted_escribe_como' => '',
        'actividad_oficio' => '',
        'intitucion_a_enviar' => '',
        'tema_mensaje' => '',
        'proposito_objetivo' => '',
        'solicita_respuestas' => '',
        'mensaje_sugerencia_reclamo' => '',
         ]);
         

         // Procesar los datos del formulario
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $email = $request->input('email');
        $sexo = $request->input('sexo');
        $direccion = $request->input('direccion');
        $provincia = $request->input('provincia');
        $comuna = $request->input('comuna');
        $telefono = $request->input('telefono');
        $tipo_mensaje = $request->input('tipo_mensaje');
        $mensaje = $request->input('mensaje');
        $date = $request->input('date');
        $usted_escribe_como = $request->input('usted_escribe_como');
        $actividad_oficio = $request->input('actividad_oficio');
        $intitucion_a_enviar = $request->input('intitucion_a_enviar');
        $tema_mensaje = $request->input('tema_mensaje');
        $proposito_objetivo = $request->input('proposito_objetivo');
        $solicita_respuestas = $request->input('solicita_respuestas');
        $mensaje_sugerencia_reclamo = $request->input('mensaje_sugerencia_reclamo');

        // Enviar el correo electrónico
        $correo = new ContactanosMailable($nombre, $apellido, $email, $sexo, $direccion, $provincia, $comuna, $telefono, $tipo_mensaje, $mensaje,
         $date, $usted_escribe_como, $actividad_oficio, $intitucion_a_enviar, $tema_mensaje, $proposito_objetivo, $solicita_respuestas,
          $mensaje_sugerencia_reclamo);
        Mail::to('info@goreloslagos.cl')->send($correo);

        Formulario::create($data);
    
         

        return redirect(route('contactanos.index'))->with('success', 'Artículo creado con éxito');
    }



    public function borrarFormulario($id)
    {
        $formulario = Formulario::findOrFail($id);
        $formulario->delete();

        return redirect()->route('verformularios')->with('success', 'Formulario eliminado exitosamente');
    }


    public function detalleFormulario($id)
    {
        $formulario = Formulario::findOrFail($id);

        return view('formulariodecontacto.detalleformulario', ['formulario' => $formulario]);
    }

    public function descargarCSV()
    {
        // Obtener todos los formularios de la base de datos
        $formularios = Formulario::all();
    
        // Crear el contenido del archivo CSV
        $csvData = "ID,Nombre,Apellido,Email,Sexo,Direccion,Provincia,Comuna,Telefono,Tipo de Mensaje,Mensaje,Fecha de Nacimiento,Usted Escribe Como,Actividad u Oficio,Institucion a Enviar,Tema del Mensaje,Proposito u Objetivo,Mensaje de Sugerencia o Reclamo,Fecha de Creación\n";
    
        foreach ($formularios as $formulario) {
            // Agregar cada registro al contenido del CSV
            $csvData .= "{$formulario->id},{$formulario->nombre},{$formulario->apellido},{$formulario->email},{$formulario->sexo},{$formulario->direccion},{$formulario->provincia},{$formulario->comuna},{$formulario->telefono},{$formulario->tipo_mensaje},{$formulario->mensaje},{$formulario->date},{$formulario->usted_escribe_como},{$formulario->actividad_oficio},{$formulario->intitucion_a_enviar},{$formulario->tema_mensaje},{$formulario->proposito_objetivo},{$formulario->mensaje_sugerencia_reclamo},{$formulario->created_at}\n";
        }
    
        // Generar un nombre de archivo único
        $filename = 'formularios_' . Str::random(10) . '.csv';
    
        // Almacenar el archivo CSV en el sistema de archivos temporal
        Storage::put($filename, $csvData);
    
        // Devolver la respuesta al navegador para descargar el archivo CSV
        return response()->download(storage_path("app/{$filename}"), 'formularios.csv')
            ->deleteFileAfterSend(); // Eliminar el archivo después de enviarlo
    }
    
    
}
