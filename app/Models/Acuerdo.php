<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acuerdo extends Model
{

    use HasFactory;

    protected $table = 'acuerdos';  


    protected $fillable = [
        'id',
        'documentonew_id',
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
