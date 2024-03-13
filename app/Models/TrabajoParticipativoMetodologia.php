<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrabajoParticipativoMetodologia extends Model
{
    use HasFactory;
    protected $table = 'trabajo_participativo_metodologias';
    protected $fillable = ['nombre','titulo','descripcion'];

    public function TrabajoParticipativoMetodologiaI()
    {
        return $this->hasMany(TrabajoParticipativoMetodologiaI::class, 'TrabajoParticipativoMetodologiaI_id');
    } 
}
