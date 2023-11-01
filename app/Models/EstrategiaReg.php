<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstrategiaReg extends Model
{
    use HasFactory;
    protected $table = 'estrategiaregs';
    protected $fillable = ['tag_comentario', 'titulo', 'bajada', 'img','enlace',];
}
