<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MisionGob extends Model
{
    use HasFactory;
    protected $table = 'misiongoberns';
    protected $fillable = ['tag_comentario', 'titulo', 'bajada', 'img','enlace',];
}
