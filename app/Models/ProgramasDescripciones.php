<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramasDescripciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'bajada',
    ];
    
    public function programa()
    {
    return $this->belongsTo(Programas::class, 'programa_id');
    }
}

