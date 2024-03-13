<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrabajoParticipativoTalleresProvinciales extends Model
{
    use HasFactory;
    protected $table = 'trabajo_participativo_talleres_provinciales';
    protected $fillable = ['nombre','titulo','descripcion','tituloA'];

    public function TrabajoParticipativoTalleresProvincialesI()
    {
        return $this->hasMany(TrabajoParticipativoTalleresProvincialesI::class, 'TrabajoParticipativoTalleresProvincialesI_id');
    } 
}
