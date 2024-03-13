<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingDocs extends Model
{
    use HasFactory;

    protected $fillable = [
        'landing_id',
        'nombre_documento',
        'ruta_documento',
    ];

    public function landing(){

    return $this->belongsTo(Landing::class, 'landing_id');
    
    }
}
