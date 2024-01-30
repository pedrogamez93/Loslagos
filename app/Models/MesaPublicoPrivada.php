<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MesaPublicoPrivada extends Model
{
    use HasFactory;
    protected $table = 'mesa_publico_privadas';
    protected $fillable = ['nombre','titulo','descripcion'];

    public function MesaPublicoPrivadaI()
    {
        return $this->hasMany(MesaPublicoPrivadaI::class, 'MesaPublicoPrivadaI_id');
    } 
}
