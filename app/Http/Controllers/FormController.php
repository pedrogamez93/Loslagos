<?php

namespace App\Http\Controllers;

use App\Mail\ContactanosMailable;
use App\Models\Formulario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;



class FormController extends Controller
{
    public function showForm()
    {
        return view('formulariodecontacto');
    }

    public function viewForm()
    {
        return view('formulariodecontacto.verformularios');
    }
    
    public function store(Request $request)
    {
        // Validar los datos del formulario según tus necesidades
       /* $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|email',
            'sexo' => 'required|string',
            'direccion' => 'required|string',
            'provincia' => 'required|string',
            'comuna' => 'required|string',
            'telefono' => 'required|string',
            'tipo_mensaje' => 'required|string',
            'date' => 'required|date_format:Y-m-d',
            'usted_escribe_como' => 'required|string',
            'actividad_oficio' => 'required|string',
            'intitucion_a_enviar' => 'required|string',
            'tema_mensaje' => 'required|string',
            'proposito_objetivo' => 'required|string',
            'solicita_respuestas' => 'required|string',
            'mensaje' => 'required|string',
        ]);
        */
        
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
        Mail::to('ingluisguedez@gmail.com')->send($correo);

        // Puedes agregar lógica adicional aquí, como redireccionar a una página de éxito
        return redirect()->route('nombre_de_ruta_de_exito');
    }

    public function procesarFormulario(Request $request)
    {
        // Validar los datos del formulario, si es necesario
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required',
            'sexo' => 'required',
            'direccion' => 'required',
            'provincia' => 'required',
            'comuna' => 'required',
            'telefono' => 'required',
            'tipo_mensaje' => 'required',
            'mensaje' => 'required',
            'date' => 'required',
            'usted_escribe_como' => 'required',
            'actividad_oficio' => 'required',
            'intitucion_a_enviar' => 'required',
            'tema_mensaje' => 'required',
            'proposito_objetivo' => 'required',
            'solicita_respuestas' => 'required',
            'mensaje_sugerencia_reclamo' => 'required',
            // ... otras reglas de validación según tus campos
        ]);

        // Crear una nueva instancia del modelo Formulario
        $formulario = new Formulario;

        // Asignar los valores del formulario al modelo
        $formulario->nombre = $request->input('nombre');
        $formulario->apellido = $request->input('apellido');
        $formulario->email = $request->input('email');
        $formulario->sexo = $request->input('sexo');
        $formulario->direccion = $request->input('direccion');
        $formulario->provincia = $request->input('provincia');
        $formulario->comuna = $request->input('comuna');
        $formulario->telefono = $request->input('telefono');
        $formulario->tipo_mensaje = $request->input('tipo_mensaje');
        $formulario->mensaje = $request->input('mensaje');
        $formulario->date = $request->input('date');
        $formulario->usted_escribe_como = $request->input('usted_escribe_como');
        $formulario->actividad_oficio = $request->input('actividad_oficio');
        $formulario->intitucion_a_enviar = $request->input('intitucion_a_enviar');
        $formulario->tema_mensaje = $request->input('tema_mensaje');
        $formulario->proposito_objetivo = $request->input('proposito_objetivo');
        $formulario->solicita_respuestas = $request->input('solicita_respuestas');
        $formulario->mensaje_sugerencia_reclamo = $request->input('mensaje_sugerencia_reclamo');
        // ... asignar otros campos según tus necesidades

        // Guardar el formulario en la base de datos
        $formulario->save();

        // Redireccionar o devolver una respuesta según tus necesidades
        return redirect()->route('ruta.donde.quieres.redirigir');
    }
}
