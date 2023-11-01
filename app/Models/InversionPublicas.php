<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InversionPublicas extends Model
{
    use HasFactory;
    protected $table = 'inversionespublicas';
    protected $fillable = ['tag_comentario', 'titulo', 'bajada', 'img','enlace',];
}
