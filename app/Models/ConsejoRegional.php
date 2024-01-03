<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsejoRegional extends Model
{
    protected $fillable = [
        'tag_comentario',
        'titulo',
        'bajada',
        'img',
    ];

    public function secciones()
    {
        return $this->hasMany(Seccion::class, 'consejo_regional_id');
    }
}