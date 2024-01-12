<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramasColecciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo_coleccion',
    ];

    public function programa()
{
    return $this->belongsTo(Programas::class, 'programa_id');
}

public function fotografias()
{
    return $this->hasMany(ProgramasFotografias::class, 'coleccion_id');
}
}
