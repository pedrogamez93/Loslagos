<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComofuncionaGr extends Model
{
    use HasFactory;
    protected $table = '_comofunciona_gr';
    protected $fillable = ['tag_comentario', 'titulo', 'bajada', 'img',];
}
