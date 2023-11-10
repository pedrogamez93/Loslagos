<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TramitesDigitalesDocs extends Model
{
    use HasFactory;

    protected $fillable = [
        'tramite_id',
        'nombre_documento',
        'ruta_documento',
        'nombre_comprimido',
        'ruta_comprimido',
    ];

    public function tramite(){

    return $this->belongsTo(TramitesDigitales::class, 'tramite_id');
    
    }
}
