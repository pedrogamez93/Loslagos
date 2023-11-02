<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntroduccionRegionLagos extends Model
{
    use HasFactory;
    protected $table = 'IntroduccionRegionLagos';
    protected $fillable = ['id','titulo', 'subtitulo', 'descripcion', 'imagen'];
}
