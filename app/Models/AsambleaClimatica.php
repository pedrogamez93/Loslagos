<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsambleaClimatica extends Model
{
    use HasFactory;

    protected $table = 'asamblea_climaticas';

    protected $fillable = [
        'titulo_one',
        'descripcion_one',
        'titulo_two',
        'descripcion_two',
        'titulo_tree',
        'descripcion_tree',
        'titulo_four',
        'descripcion_four',
        'titulo_five',
        'descripcion_five',
        'titulo_six',
        'descripcion_six',
        'titulo_seccion_two',
    ];

    public function documentos()
    {
        return $this->hasMany(AsambleaClimaticaDocs::class, 'asamblea_climaticas_id');
    }
}
