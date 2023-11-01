<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Introduccion extends Model
{
    protected $table = 'introduccion';
    protected $fillable = ['tag_comentario', 'titulo', 'bajada', 'img', 'tag_comentario_comof', 'titulocomof', 'bajadacomof', 'imgcomof'];
}