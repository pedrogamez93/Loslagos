<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingImages extends Model
{
    use HasFactory;

    protected $fillable = [
        'landing_id',
        'nombre_imagen',
        'ruta_imagen',
    ];

    public function landing(){

    return $this->belongsTo(Landing::class, 'landing_id');
    
    }
}
