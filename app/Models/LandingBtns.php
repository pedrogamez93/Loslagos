<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingBtns extends Model
{
    use HasFactory;

    protected $fillable = [
        'landing_id',
        'nombre_btn',
        'url',
    ];

    public function landing(){

        return $this->belongsTo(Landing::class, 'landing_id');
        
        }
}
