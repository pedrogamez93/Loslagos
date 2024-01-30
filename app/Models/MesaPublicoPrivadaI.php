<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MesaPublicoPrivadaI extends Model
{
    use HasFactory;
    protected $table = 'mesa_publico_privada_i_s';
    protected $fillable = ['MesaPublicoPrivadaI_id','nombreA', 'archivo'];

    public function MesaPublicoPrivada(){

    return $this->belongsTo(MesaPublicoPrivada::class, 'MesaPublicoPrivadaI_id');
    
    }
}
