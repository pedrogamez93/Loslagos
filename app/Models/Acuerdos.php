<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acuerdo extends Model
{

    use HasFactory;

    protected $table = 'acuerdos';  // Asumiendo que la tabla de actas se llama 'actas'


    protected $fillable = [
        'numero',
        'fecha',
        'descripcion',
        'codigo_bip',
    ];

    public function documentonew()
    {
        return $this->belongsTo(Documentonew::class);
    }
}
