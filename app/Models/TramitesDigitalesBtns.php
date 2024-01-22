<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TramitesDigitalesBtns extends Model
{
    use HasFactory;

    protected $fillable = [
        'tramite_id',
        'nombre_btn',
        'url',
    ];

    public function tramite(){

    return $this->belongsTo(TramitesDigitales::class, 'tramite_id');
    
    }
}
