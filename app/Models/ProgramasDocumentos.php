<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramasDocumentos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombreDocumento',
        'urlDocumento',
    ];

    public function programa()
    {
        return $this->belongsTo(Programas::class, 'programa_id');
    }
}


    
