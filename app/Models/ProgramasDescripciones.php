<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramasDescripciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo_descripcion',
        'bajada_descripcion',
        'programa_id',
    ];
    
    public function programa()
    {
    return $this->belongsTo(Programas::class, 'programa_id');
    }
}

