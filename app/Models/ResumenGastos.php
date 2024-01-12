<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResumenGastos extends Model{


    use HasFactory;

    protected $table = 'resumen_gastos';  

    protected $fillable = [
        'documentonew_id',
        'nombre',
        'portada',
        'publicacion',
    ];

    public function documentonew()
    {
        return $this->belongsTo(Documentonew::class);
    }
}
