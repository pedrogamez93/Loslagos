<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactanosMailable extends Mailable
{
    public $nombre;
    public $apellido;
    public $email;
    public $sexo;
    public $direccion;
    public $provincia;
    public $comuna;
    public $telefono;
    public $tipo_mensaje;
    public $mensaje;
    public $date;
    public $usted_escribe_como;
    public $actividad_oficio;
    public $intitucion_a_enviar;
    public $tema_mensaje;
    public $proposito_objetivo;
    public $solicita_respuestas;
    public $mensaje_sugerencia_reclamo;
    
    public function __construct($nombre, $apellido, $email, $sexo, $direccion, $provincia, $comuna, $telefono, $tipo_mensaje, $mensaje,
    $date, $usted_escribe_como, $actividad_oficio, $intitucion_a_enviar, $tema_mensaje, $proposito_objetivo, $solicita_respuestas, $mensaje_sugerencia_reclamo)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->sexo = $sexo;
        $this->direccion = $direccion;
        $this->provincia = $provincia;
        $this->comuna = $comuna;
        $this->telefono = $telefono;
        $this->tipo_mensaje = $tipo_mensaje;
        $this->mensaje = $mensaje;
        $this->date = $date;
        $this->usted_escribe_como = $usted_escribe_como;
        $this->actividad_oficio = $actividad_oficio;
        $this->intitucion_a_enviar = $intitucion_a_enviar;
        $this->tema_mensaje = $tema_mensaje;
        $this->proposito_objetivo = $proposito_objetivo;
        $this->solicita_respuestas = $solicita_respuestas;
        $this->mensaje_sugerencia_reclamo = $mensaje_sugerencia_reclamo;
    }

    public function build()
    {
        return $this->view('emails.contactanos')
                    ->subject('Nuevo mensaje de contacto');
    }
}
